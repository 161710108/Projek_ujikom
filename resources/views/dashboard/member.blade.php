@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-heading">
	<br>
<center><h2 class="card-title">Dashboard</h2></center>
<br>
</div>
<div class="card-body">
Selamat Datang di Perpustakaan SMPN 2 DAYEUHKOLOT

 <div class="table-responsive">
				  <table class="table table-striped">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Judul Buku</th>
					  <th colspan="1"></th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach ($borrowLogs as $borrowLog)
				  	  <tr>
				  	  	@if ($borrowLogs->count() == 0)
							Tidak ada buku dipinjam
							@endif
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $borrowLog->book->title }}</td>
				    	
<td>
	{!! Form::open(['url' => route('member.books.return', $borrowLog->book_id),
'method'
=> 'put',
'class'
=> 'form-inline js-confirm',
'data-confirm' => "Anda yakin hendak mengembalikan " . $borrowLog->book->title . "?"] ) !!}
	{!! Form::submit('Kembalikan', ['class'=>'btn btn-xs btn-primary']) !!}
	{!! Form::close() !!}
</td>

				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
</div>
</div>
</div>
</div>
</div>
@endsection