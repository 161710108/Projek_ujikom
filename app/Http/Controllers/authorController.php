<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Datatables;
use App\Author;
use Alert;
use Session;
class authorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, Builder $htmlBuilder)
    {
    if ($request->ajax()) {
    $authors = Author::select(['id', 'name','tanggal_lahir','pendidikan','pekerjaan']);
    return Datatables::of($authors)
    ->addColumn('action', function($author){
    return view('datatable.action', [
    'model'=> $author,
    'form_url'=> route('authors.destroy', $author->id),
    'edit_url' => route('authors.edit', $author->id),
    'confirm_message' => 'Yakin mau menghapus ' . $author->name . '?'
    ]);
    })->make(true);
    }
    $html = $htmlBuilder
    ->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Nama'])
    ->addColumn(['data' => 'tanggal_lahir', 'name'=>'tanggal_lahir', 'title'=>'Tanggal Lahir'])
    ->addColumn(['data' => 'pendidikan', 'name'=>'pendidikan', 'title'=>'Pendidikan'])
    ->addColumn(['data' => 'pekerjaan', 'name'=>'pekerjaan', 'title'=>'Pekerjaan'])
    ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, '\
    searchable'=>false]);
    return view('authors.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $authors = Author::all();   
        return view('authors.create',compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
   for($id = 0; $id < count($request->name); $id++){
                $authors = new Author;
                $authors->name = $request->name[$id];
                $authors->tanggal_lahir = $request->tanggal_lahir[$id];
                $authors->pendidikan = $request->pendidikan[$id];
                $authors->pekerjaan = $request->pekerjaan[$id];
                $authors->save();
               }
    Alert::success('Tambah Data','Berhasil')->autoclose(1500);
    return redirect()->route('authors.index');
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
        $author = Author::find($id);
        return view('authors.edit')->with(compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, ['name' => 'required|unique:authors,name,'. $id]);
        $author = Author::find($id);
        // $author->update($request->only('name'));
        if(!$author->update($request->all())) return redirect()->back();
        Alert::success('Edit Data','Berhasil')->autoclose(1500);
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       if(!Author::destroy($id)) return redirect()->back();
         Alert::success('Hapus Data','Berhasil')->autoclose(1500);
        return redirect()->route('authors.index');
    }
}
