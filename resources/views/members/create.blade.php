@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-heading">
<h2 class="card-title">Tambah Member</h2>
</div>
<div class="card-body">
{!! Form::open(['url' => route('members.store'),
'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
@include('members._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection