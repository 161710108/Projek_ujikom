@extends('layouts.app')
@section('content')
<div class="container">
<!-- <div class="row justify-content-center"> -->
<div class="col-md-12">
<div class="card">
<div class="card-header">Data Buku</div>
<br>
<p> &nbsp&nbsp&nbsp<a class="btn btn-primary" href="{{ route('guest.create') }}">Pinjam</a>
<div class="card-body">
{!! $html->table(['class'=>'table-striped','id'=>'example']) !!}
</div>
</div>
</div>
<!-- </div> -->
</div>
@endsection
@section('scripts')
{!! $html->scripts() !!}
<!-- <script type="text/javascript">
$(document).ready(function() {
    var table = $('#example').DataTable();
 
    $('#example tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
 
    $('#button').click( function () {
        alert( table.rows('.selected').data().length +' row(s) selected' );
    } );
} );
</script> -->
@endsection

