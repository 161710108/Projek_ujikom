<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Datatables;
use App\Book;
use App\BorrowLog;
use App\User;
use Illuminate\Support\Facades\Session;
use Auth;
use Laratrust\LaratrustFacade as Laratrust;

class GuestController extends Controller
{
    public function index(Request $request, Builder $htmlBuilder)
{
if ($request->ajax()) {
$books = Book::with('author');
return Datatables::of($books)
->addColumn('stock', function($book){
    return $book->stock;
    })
->addColumn('action', function($book){
if (Laratrust::hasRole('admin')) return '';
return '<a class="btn btn-xs btn-primary" href="'.route('guest.books.borrow', $book->id).'">Pinjam</a>';
})
->make(true);
}
$html = $htmlBuilder
->addColumn(['data' => 'title', 'name'=>'title', 'title'=>'Judul'])
// ->addColumn(['data' => 'cover', 'name'=>'cover', 'title'=>'Sampul','render' => '"<img src=\"/img/"+data+"\" height=\"75px\" width=\"85px\"/>"'])
->addColumn(['data' => 'stock', 'name'=>'stock', 'title'=>'Stok', 'orderable'=>false, 'searchable'=>false])
->addColumn(['data' => 'author.name', 'name'=>'author.name', 'title'=>'Penulis'])
->addColumn(['data' => 'book_type', 'name'=>'book_type', 'title'=>'Tipe'])
->addColumn(['data' => 'tahun_terbit', 'name'=>'tahun_terbit', 'title'=>'Tahun Terbit'])
->addColumn(['data' => 'penerbit', 'name'=>'penerbit', 'title'=>'Penerbit']);
// ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
return view('guest.index')->with(compact('html'));
}

 public function create()
    {

        $books = Book::all(); 
        $borrow = BorrowLog::all();
        $users = User::all();
        return view('guest.create',compact('books','users','borrow'));
    }

   public function store(Request $request)
{
for($id = 0; $id < count($request->book_id); $id++){
$pinjam= new BorrowLog;
$pinjam->book_id=$request->book_id[$id];
$pinjam->user_id= $request->user_id[$id];
// $borrow=User::with('borrow')->get();
// print_r($borrow);die;
$ha = $pinjam->book->amount;
$ss = '1';
$pinjam->book->amount=$ha - $ss;
$pinjam->denda ='0';
$pinjam->save();
}
Session::flash("flash_notification", [
"level"=>"success", 
"message"=>"Berhasil meminjam"
]);
return redirect('/');
}
  public function borrow(Book $book)
{
    // cek apakah masih ada stok buku
if ($book->stock < 1) {
    Session::flash("flash_notification", [
"level"=>"success", 
"message"=>"Buku $book->title sedang tidak tersedia."
]);
    // throw new BookException("Buku $book->title sedang tidak tersedia.");
    }
// cek apakah buku ini sedang dipinjam oleh user
if($this->borrowLogs()->where('book_id',$book->id)->where('is_returned', 0)->count() > 0 ) {
   Session::flash("flash_notification", [
"level"=>"success", 
"message"=>"Buku $book->title sedang Anda pinjam."
]); 
// throw new BookException("Buku $book->title sedang Anda pinjam.");
}
$borrowLog = BorrowLog::create(['user_id'=>$this->id, 'book_id'=>$book->id, 'denda'=>'0']);
return $borrowLog;
}
//  public function borrow($id)
// {
//     try {
// $book = Book::findOrFail($id);
// Auth::user()->borrow($book);
// Session::flash("flash_notification", [
// "level"=>"success",
// "message"=>"Berhasil meminjam $book->title"
// ]);
// } catch (BookException $e) {
//     Session::flash("flash_notification", [
//     "level"
//     => "danger",
//     "message" => $e->getMessage()
//     ]);
// } catch (ModelNotFoundException $e) {
// Session::flash("flash_notification", [
// "level"=>"danger",
// "message"=>"Buku tidak ditemukan."
// ]);
// }
// return redirect('/');
// }
}

