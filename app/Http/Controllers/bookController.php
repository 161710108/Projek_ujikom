<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Datatables;
use App\Book;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\BorrowLog;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\BookException;
use File;
use Excel;
use PDF;
use Validator;
use App\Author;
use Alert;
use Carbon\Carbon;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        private function exportPdf($books) 
    { 
        $pdf = PDF::loadview('pdf.books', compact('books'));
           return $pdf->download('books.pdf'.date('Y-m-d_H-i-s').'.pdf');
          }

private function exportXls($books) 
{ Excel::create('Data Buku Larapus', function($excel) use ($books) { 
// Set the properties 
    $excel->setTitle('Data Buku Larapus')
     ->setCreator('Rahmat Awaludin');
$excel->sheet('Data Buku', function($sheet) use ($books) { 
    $row = 1; $sheet->row($row, [ 
        'Judul', 
        'Jumlah',
         'Stok', 
         'Penulis',
         'Tipe Buku',
         'Tahun Terbit',
         'Penerbit' 
     ]);
      foreach ($books as $book) { 
        $sheet->row(++$row, [ 
            $book->title, 
            $book->amount,
             $book->stock, 
             $book->author->name,
             $book->book_type,  
             $book->tahun_terbit,
             $book->penerbit
         ]); 
    }
     }); 
})->export('xls');
}
    public function export() 
    { 
        return view('books.export'); 
    }
public function exportPost(Request $request) { 
    $this->validate($request, [ 
        'author_id'=>'required', 
        'type'=>'required|in:pdf,xls' 
    ], [ 
        'author_id.required'=>'Anda belum memilih penulis. Pilih minimal 1 penulis.' 
    ]);
$books = Book::whereIn('id', $request->get('author_id'))->get();

$handler = 'export' . ucfirst($request->get('type'));
 return $this->$handler($books);


}

  public function borrow($id)
{
    try {
$book = Book::findOrFail($id);
Auth::user()->borrow($book);
Session::flash("flash_notification", [
"level"=>"success",
"message"=>"Berhasil meminjam $book->title"
]);
} catch (BookException $e) {
    Session::flash("flash_notification", [
    "level"
    => "danger",
    "message" => $e->getMessage()
    ]);
} catch (ModelNotFoundException $e) {
Session::flash("flash_notification", [
"level"=>"danger",
"message"=>"Buku tidak ditemukan."
]);
}
return redirect('/');
}
public function returnBack(Request $request, $book_id)
{
$borrowLog = BorrowLog::where('user_id', Auth::user()->id)
->where('book_id', $book_id)
->where('is_returned', 0)
->first();
if ($borrowLog) {
$borrowLog->is_returned = true;
$now = Carbon::parse($borrowLog->created_at);
$n = Carbon::parse($borrowLog->updated_at);
$awal = $now->subDay();
$akhir = $n->subDay();
// $awal = new Carbon($borrowLog->created_at);
// $akhir = new Carbon ($borrowLog->updated_at);
$hasil = "{$awal->diffInDays($akhir)}";
if ($hasil <= 3) {
  $borrowLog->save();  
}else{
$uang = '1000';
$si = '3';
$borrowLog->denda=($hasil-$si) * $uang; 
$borrowLog->save();
}
Session::flash("flash_notification", [
"level"
=> "success",
"message" => "Berhasil mengembalikan " . $borrowLog->book->title.'<br>'."Denda Rp.".$borrowLog->denda
]);
}
return redirect('/user/guest');
}
    public function index(Request $request, Builder $htmlBuilder)
{
if ($request->ajax()) {
$books = Book::with('author');
return Datatables::of($books)
->addColumn('action', function($book){
return view('datatable.action', [
'model'=> $book,
'form_url'=> route('books.destroy', $book->id),
'edit_url'=> route('books.edit', $book->id),
'confirm_message' => 'Yakin mau menghapus ' . $book->title . '?'
]);
})->make(true);
}
$html = $htmlBuilder
->addColumn(['data' => 'title', 'name'=>'title', 'title'=>'Judul'])
->addColumn(['data' => 'amount', 'name'=>'amount', 'title'=>'Jumlah'])
->addColumn(['data' => 'author.name', 'name'=>'author.name', 'title'=>'Penulis'])    
// ->addColumn(['data' => 'cover', 'name'=>'cover', 'title'=>'Sampul','render' => '"<img src=\"/img/"+data+"\" height=\"75px\" width=\"85px\"/>"'])
->addColumn(['data' => 'book_type', 'name'=>'book_type', 'title'=>'Tipe'])
->addColumn(['data' => 'tahun_terbit', 'name'=>'tahun_terbit', 'title'=>'Tahun Terbit'])
->addColumn(['data' => 'penerbit', 'name'=>'penerbit', 'title'=>'Penerbit'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
return view('books.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $authors = Author::all();  
         $books   = Book::all(); 
        return view('books.create',compact('authors','books'));
         // return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        for($id = 0; $id < count($request->author_id); $id++){
                $books = new Book;
                $books->title = $request->title[$id];
                $books->author_id = $request->author_id[$id];
                $books->amount = $request->amount[$id];
                $books->book_type = $request->book_type[$id];
                $books->tahun_terbit = $request->tahun_terbit[$id];
                $books->penerbit = $request->penerbit[$id];
                // $books->cover = $request->cover[$id];
         //        if($request->hasfile('cover'))
         // {

         //    foreach($request->file('cover') as $image)
         //    {
         //        $name=md5(time()) . '.' . $image->getClientOriginalExtension();
         //        $image->move(public_path('/img/'), $name); 
         //        $data[] = $name;  
         //    }
         // }
         // $books->cover= $data[$id];
            $books->save();
        }
     Alert::success('Tambah Data','Berhasil')->autoclose(1500);
     return redirect()->route('books.index');
    }
     

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit')->with(compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateBookRequest $request, $id)
    // {
        
    //   $book = Book::find($id);
    //         if(!$book->update($request->all())) return redirect()->back();
    //         if ($request->hasFile('cover')) {
    //         // menambil cover yang diupload berikut ekstensinya
    //         $filename = null;
    //         $uploaded_cover = $request->file('cover');
    //         $extension = $uploaded_cover->getClientOriginalExtension();
    //         // membuat nama file random dengan extension
    //         $filename = md5(time()) . '.' . $extension;
    //         $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
    //         // memindahkan file ke folder public/img
    //         $uploaded_cover->move($destinationPath, $filename);
    //         // hapus cover lama, jika ada
    //         if ($book->cover) {
    //         $old_cover = $book->cover;
    //         $filepath = public_path() . DIRECTORY_SEPARATOR . 'img'
    //         . DIRECTORY_SEPARATOR . $book->cover;
    //         try {
    //         File::delete($filepath);
    //         } catch (FileNotFoundException $e) {
    //         // File sudah dihapus/tidak ada
    //         }
    //         }
    //         // ganti field cover dengan cover yang baru
    //         $book->cover = $filename;
    //     $book->save();
    // }
    //  Alert::success('Edit Data','Berhasil')->autoclose(1500);
    // return redirect()->route('books.index');
    
    // }
    public function update(Request $request, $id)
    {
       $this->validate($request,[
            'title' => 'required|',
            'author_id' => 'required|',
            'amount' => 'required|',
            'book_type' => 'required',
            'tahun_terbit' => 'required|',
            'penerbit' => 'required|'
        ]);
        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->amount = $request->amount;
        $book->book_type = $request->book_type;
        $book->tahun_terbit = $request->tahun_terbit;
        $book->penerbit = $request->penerbit;
        $book->save();
        Alert::success('Edit Data','Berhasil')->autoclose(1500);
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function destroy(Request $request, $id)
    {
         if(!Book::destroy($id)) return redirect()->back();
         Alert::success('Hapus Data','Berhasil')->autoclose(1500);
        return redirect()->route('books.index');
    }
    public function generateExcelTemplate() 
    {
Excel::create('Template Import Buku', function($excel) {
 // Set the properties 
    $excel->setTitle('Template Import Buku')
     ->setCreator('Larapus')
     ->setCompany('Larapus') 
     ->setDescription('Template import buku untuk Larapus');
$excel->sheet('Data Buku', function($sheet) { $row = 1;
 $sheet->row($row, [ 
    'judul', 
    'penulis', 
    'jumlah',
    'Tipe Buku',
    'Tahun Terbit',
    'Penerbit'
]);
 });
})->export('xlsx');
}
     public function importExcel(Request $request) 
     {
// validasi untuk memastikan file yang diupload adalah excel 
$this->validate($request, [ 
'excel' => 'required|mimes:xls,xlsx' ]); 
// ambil file yang baru diupload
 $excel = $request->file('excel'); 
 // baca sheet pertama
  $excels = Excel::selectSheetsByIndex(0)->load($excel, function($reader) { 
  // options, jika ada
   })->get();
// rule untuk validasi setiap row pada file excel
 $rowRules = [
  'judul' => 'required', 
 'penulis' => 'required', 
 'jumlah' => 'required',
 'tipe buku' => 'required',
 'tahun terbit' => 'required',
 'penerbit' => 'required' ];
// Catat semua id buku baru // ID ini kita butuhkan untuk menghitung total buku yang berhasil diimport 
 $books_id = [];
// looping setiap baris, mulai dari baris ke 2 (karena baris ke 1 adalah nama kolom)
 foreach ($excels as $row) { 
 // Membuat validasi untuk row di excel
  // Disini kita ubah baris yang sedang di proses menjadi array
  $validator = Validator::make($row->toArray(), $rowRules);
// Skip baris ini jika tidak valid, langsung ke baris selanjutnya
 if ($validator->fails()) continue;
// Syntax dibawah dieksekusi jika baris excel ini valid
// Cek apakah Penulis sudah terdaftar di database 
 $author = Author::where('name', $row['penulis'])->first();
// buat penulis jika belum ada
 if (!$author) {
$author = Author::create(['name'=>$row['penulis']]);
}
// buat buku baru 
$book = Book::create([ 
    'title' => $row['judul'], 
    'author_id' => $author->id,
    'amount' => $row['jumlah'], 
    'book_type' => $row['tipe buku'],
    'tahun_terbit' => $row['tahun terbit'],  
    'penerbit' => $row['penerbit']]);
// catat id dari buku yang baru dibuat
 array_push($books_id, $book->id);
}
// Ambil semua buku yang baru dibuat
 $books = Book::whereIn('id', $books_id)->get();
// redirect ke form jika tidak ada buku yang berhasil diimport 
 if ($books->count() == 0) { 
    Session::flash("flash_notification", 
        [ "level" => "danger", 
        "message" => "Tidak ada buku yang berhasil diimport." 
    ]); 
    return redirect()->back(); }
// set feedback 
    Session::flash("flash_notification", 
        [ "level" => "success",
         "message" => "Berhasil mengimport " . $books->count() . " buku." ]);
// Tampilkan halaman review buku
 return view('books.import-review')->with(compact('books'));

}

    public function bukuPdf()
    {
        $books = Book::all();
        $pdf = PDF::loadView('pdf.books', compact('books'));
        return $pdf->download('books.pdf'.date('Y-m-d_H-i-s').'.pdf');
    }
    public function bukuExcel(Request $request)
    {
        $nama = 'laporan_buku_'.date('Y-m-d_H-i-s');
        Excel::create($nama, function ($excel) use ($request) {
        $excel->sheet('Laporan Data Buku', function ($sheet) use ($request) {
        
        $sheet->mergeCells('A1:H1');
       // $sheet->setAllBorders('thin');
        $sheet->row(1, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setAlignment('center');
            $row->setFontWeight('bold');
        });
        $sheet->row(1, array('LAPORAN DATA BUKU'));
        $sheet->row(2, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setFontWeight('bold');
        });
        $author = Author::all();
        $books = Book::all();
       // $sheet->appendRow(array_keys($datas[0]));
        $sheet->row($sheet->getHighestRow(), function ($row) {
            $row->setFontWeight('bold');
        });
         $datasheet = array();
         $datasheet[0]  =   array("NO", "JUDUL", "JUMLAH", "STOK",  "PENULIS", "Tipe Buku", "Tahun Terbit", "Penerbit");
         $i=1;
        foreach ($books as $data) {
           // $sheet->appendrow($data);
          $datasheet[$i] = array($i,
                        $data['title'],
                        $data['amount'],
                        $data['stock'],
                        $data['author_id'],
                        $data['book_type'],
                        $data['tahun_terbit'],
                        $data['penerbit']
                        
                    );
          
          $i++;
        }
        $sheet->fromArray($datasheet);
    });
})->export('xls');
}


//  public function borrowed(Request $request)
// {
// for($id = 0; $id < count($request->book_id);$id++){
// $books = Book::findOrFail($request->book_id[$id]);
// $pinjam= new BorrowLog;
// $pinjam->book_id=$request->book_id[$id];
// $pinjam->user_id=Auth::user()[$id];
// $books= new Book;
// $books->amount=$this->amount - '1'[$id];
// $books->save();
// $pinjam->save();
// }
// Session::flash("flash_notification", [
// "level"=>"success", 
// "message"=>"Berhasil meminjam $book->title"
// ]);
// return redirect('/');
// }
// public function returnBack($book_id)
// {
// $borrowLog = BorrowLog::where('user_id', Auth::user()->id)
// ->where('book_id', $book_id)
// ->where('is_returned', 0)
// ->first();
// if ($borrowLog) {
// $borrowLog->is_returned = true;
// $borrowLog->save();
// Session::flash("flash_notification", [
// "level"
// => "success",
// "message" => "Berhasil mengembalikan " . $borrowLog->book->title
// ]);
// }
// return redirect('/home');
// }
}
