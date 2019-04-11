@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-header">Data Penulis</div>
<br>
<h2 class="card-title">&nbsp&nbspPenulis</h2>
<p>&nbsp&nbsp&nbsp<a class="btn btn-primary btn-rounded btn-fw" href="{{ route('authors.create') }}">Tambah</a> </p>
<div class="card-body">
{!! $html->table(['class'=>'table table-striped']) !!}
</div>
</div>
</div>
</div>
</div>
@endsection
@section('scripts')
{!! $html->scripts() !!}
@endsection
