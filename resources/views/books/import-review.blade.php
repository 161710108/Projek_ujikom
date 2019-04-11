@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-heading">
<h2 class="card-title">Review Buku</h2>
</div>
<div class="card-body">
<p> <a class="btn btn-success" href="{{ url('/admin/books')}}">Selesai</a> </p>
<table class="table table-hover table-striped">
<thead>
<tr>
<th>Judul</th>
<th>Penulis</th>
<th>Jumlah</th>
<th></th>
</tr>
</thead>
<tbody>
@foreach ($books as $book)
<tr>
<td>{{ $book->title }}</td>
<td>{{ $book->cover }}</td>
<td>{{ $book->author->name }}</td>
<td>{{ $book->amount }}</td>
<td>
{!! Form::open(['url' => route('books.destroy', $book->id),
'id'
=> 'form-'.$book->id, 'method'=>'delete',
'data-confirm' => 'Yakin menghapus ' . $book->title . '?',
'class'
=> 'form-inline js-review-delete']) !!}
{!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close() !!}
</td>
</tr>
@endforeach
</tbody>
</table>
<p> <a class="btn btn-success" href="{{ url('/admin/books')}}">Selesai</a> </p>
</div>
</div>
</div>
</div>
</div>
@endsection