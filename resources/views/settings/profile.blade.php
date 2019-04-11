@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-heading">
		<br>
<center>
<h2 class="card-title">Profil</h2></center>
<br>
</div>
<div class="card-body">
<table class="table">
<tbody>
<tr>
<td class="text-muted">Nama</td>
<td>{{ auth()->user()->name }}</td>
</tr>
<tr>
<td class="text-muted">Email</td>
<td>{{ auth()->user()->email }}</td>
</tr>
<tr>
<td class="text-muted">Login terakhir</td>
<td>{{ auth()->user()->last_login }}</td>
</tr>
</tbody>
</table>
<a class="btn btn-primary" href="{{ url('/settings/profile/edit') }}">Ubah</a>
</div>
</div>
</div>
</div>
</div>
@endsection