@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-header">
	<br>
<center><h2 class="card-title">Pinjam Buku</h2></center>
</div>
<div class="card-body">
<form action="{{ route('guest.store') }}" method="POST">
            {{ csrf_field() }}
    <table id="table_book" class="table table-striped">
      <thead>
            <tr id="last">
              <th  height='37px' width= '826px'style="font-size: 18px" >Judul</th>
              <th  width="76px" style="font-size: 18px" hidden>user</th>
             <th style="width: 40px"><button type="button" name="add" class="btn btn-primary btn-sm add" onclick="addrow()" style="width: 76px"><i class="menu-icon mdi mdi-plus"></i></button></th>
            </tr>
            </thead>
</table>
<br>
<div class="modal-footer">
{!! Form::submit('Pinjam', ['class'=>'btn btn-primary btn-rounded btn-fw','style'=>'height: 29.92px; width: 146px']) !!}
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
function addrow(){
      var no = $('#table_book tr').length;
      var html = '';
      html +='<tr id="row_'+no+'">';
      html +='<td><select name="book_id[]" class="form-control"><option></option>@foreach($books as $data)@if($data->stock >= 1)<option value="{{$data->id}}">{{$data->title }}</option> @else<option hidden></option> @endif @endforeach</select></td>';
         // html +='<td><select name="book_id[]" class="form-control"><option></option>@foreach($books as $data)@if($data->stock >= 1)<option value="{{$data->id}}">{{$data->title }}</option> @else<option hidden></option> @endif @endforeach</select></td>';
      html +='<td><input type="text" name="user_id[]" class="form-control user_id" value=" {{ auth()->user()->id }}" multiple hidden/></td>';
      html +='<td><button type="button" class="btn btn-danger btn-sm" onclick="remove('+ no +')"><i class="menu-icon mdi mdi-minus"></i></button></td></tr>';
      $('#last').after(html);
      
    }
    function remove(no){
      $('#row_'+no).remove();
    }
</script>
<!-- <script type="text/javascript">
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
<script type="text/javascript">
  $('#select-beast').selectize({
    create: true,
    sortField: 'text'
});
</script> -->
<!-- <script type="text/javascript">
 $('.js-selectize').selectize({
    sortField: 'text'
    });
 </script> -->
@endsection
