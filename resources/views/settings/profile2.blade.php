@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-body">
	<br>
<center><h2 class="card-title">Profil</h2></center>
<br>
<div class="table-responsive">
<table class="table table-striped">
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
<br>
<a class="btn btn-primary btn-rounded btn-fw" href="{{ url('/settings/profile/edit') }}">Ubah</a>
</div>
</div>

</div>
</div>
</div>
</div>
@endsection

