@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-heading">
	<br>
<h2 class="card-title"><center>Ubah Penulis</center></h2>
</div>
<div class="card-body">
{!! Form::model($author, ['url' => route('authors.update', $author->id),
'method'=>'put', 'class'=>'form-horizontal']) !!}
@include('authors.form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection