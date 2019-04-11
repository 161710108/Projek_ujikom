@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-header">Data Member</div>
<br>
<h2 class="panel-title"> &nbsp&nbspMember</h2>
<p> &nbsp&nbsp&nbsp<a class="btn btn-primary btn-rounded btn-fw" href="{{ url('/admin/members/create') }}">Tambah</a>
<div class="card-body">
{!! $html->table(['class'=>'table-striped']) !!}
</div>
</div>
</div>
</div>
</div>
@endsection
@section('scripts')
{!! $html->scripts() !!}
@endsection