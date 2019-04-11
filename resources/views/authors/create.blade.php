@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-heading">
	<br>
<center><h2 class="card-title">Tambah Penulis</h2></center>
</div>
<div class="card-body">
{!! Form::open(['url' => route('authors.store'),
'method' => 'post', 'class'=>'form-horizontal']) !!}
@include('authors._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection