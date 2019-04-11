@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-heading">
	<br>
<center><h2 class="card-title">Ubah Buku</h2></center>
</div>
<div class="card-body">
{!! Form::model($book, ['url' => route('books.update', $book->id),
'method' => 'put', 'files'=>'true', 'class'=>'form-horizontal']) !!}
@include('books.form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection