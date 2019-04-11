@extends('layouts.admin')
@section('content')
<div class="container">
<!-- <div class="row justify-content-center"> -->
<div class="col-lg-12">
<div class="card">
<div class="card-header">Data Buku</div>
<br>
<h2 class="card-title">&nbsp&nbspBuku</h2>
<p> &nbsp&nbsp&nbsp<a class="btn btn-primary btn-rounded btn-fw" href="{{ url('/admin/books/create') }}">Tambah</a>
<a class="btn btn-primary btn-rounded btn-fw" href="{{ url('/admin/export/books') }}">Export</a>
<div class="card-body">
{!! $html->table(['class'=>'table-striped']) !!}
</div>
</div>
</div>
<!-- </div> -->
</div>
@endsection
@section('scripts')
{!! $html->scripts() !!}
@endsection