@extends('layouts.admin')
@section('content')
 <div class="container">
  <div class="row"> 
  	<div class="col-md-12">
  <!-- 	 <ul class="breadcrumb">
  	  <li>
  	  	<a href="{{ url('/home') }}">Dashboard</a></li> &nbsp > &nbsp
  	  	<li><a href="{{ url('/admin/books') }}">Buku</a></li>&nbsp > &nbsp
  	  	 <li class="active">Export Buku</li>
  	  	  </ul>  -->
  	  	  <div class="card"> <div class="card-heading"> 
  	  	  	<br>
  	  	  	<center><h2 class="card-title">Export Buku</h2></center>
  	  	  	 </div>
<div class="card-body">
{!! Form::open(['url' => route('export.books.post'),
'method' => 'post', 'class'=>'form-horizontal']) !!}
<div class="form-group {!! $errors->has('author_id') ? 'has-error' : '' !!}">
{!! Form::label('author_id', 'Penulis', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::select('author_id[]', [''=>'']+App\Author::pluck('name','id')->all(),
null, [
'class'=>'js-selectize',
'multiple',
'placeholder' => 'Pilih Penulis']) !!}
{!! $errors->first('author_id', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group {!! $errors->has('type') ? 'has-error' : '' !!}"> 
	{!! Form::label('type', 'Pilih Output', ['class'=>'col-md-2 control-label']) !!} 
   <div class="col-sm-4">
     <div class="form-radio">
       <label class="form-check-label">
         <input type="radio" class="form-check-input" name="type" id="membershipRadios1" value="xls" checked> Excel
       </label>
     </div>
   </div>
    <div class="col-sm-5">
      <div class="form-radio">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="type" id="membershipRadios2" value="pdf"> PDF
        </label>
      </div>
    </div>
		 </div>

<div class="form-group"> 
	<div class="col-md-4 col-md-offset-2">
	 {!! Form::submit('Download', ['class'=>'btn btn-primary btn-rounded btn-fw']) !!} 
	</div> 
</div> 
{!! Form::close() !!}
 </div> 
</div>
 </div> 
</div>
 </div> 
 @endsection