<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	{!! Form::label('title', 'Judul', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('title', null, ['class'=>'form-control']) !!}
		{!! $errors->first('title', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {!! $errors->has('author_id') ? 'has-error' : '' !!}">
	{!! Form::label('author_id', 'Penulis', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('author_id', [''=>'']+App\Author::pluck('name','id')->all(), null, [
		'class'=>'js-selectize',
		'placeholder' => 'Pilih Penulis']) !!}
		{!! $errors->first('author_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
	{!! Form::label('amount', 'Jumlah', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::number('amount', null, ['class'=>'form-control', 'min'=>1]) !!}
		{!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
		@if (isset($book))
			<p class="help-block">{{ $book->borrowed }} buku sedang dipinjam</p>
		@endif
	</div>
</div>

<!-- <div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
	{!! Form::label('cover', 'Jumlah', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::file('cover') !!}
		@if (isset($book) && $book->cover)
			<p>
			{!! Html::image(asset('img/'.$book->cover), null, ['class'=>'img-rounded img-responsive']) !!}
			</p>
		@endif
		{!! $errors->first('cover', '<p class="help-block">:message</p>') !!}
	</div>
</div> -->

<div class="form-group{{ $errors->has('book_type') ? ' has-error' : '' }}">
	{!! Form::label('book_type', 'Tipe Buku', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		<!-- {!! Form::text('book_type', null, ['class'=>'form-control']) !!} -->
		<select name="book_type" class="form-control" name="book_type" id="inputDefault">
        <option @if(old('book_type',$book) == 'Novel') selected @endif >
            Novel
        </option>
        <option @if(old('book_type',$book) == 'Pelajaran') selected @endif >
            Pelajaran
        </option>
        </select>
		{!! $errors->first('book_type', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('tahun_terbit') ? ' has-error' : '' }}">
	{!! Form::label('tahun_terbit', 'Tahun Terbit', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('tahun_terbit', null, ['class'=>'form-control']) !!}
		{!! $errors->first('tahun_terbit', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('penerbit') ? ' has-error' : '' }}">
	{!! Form::label('penerbit', 'Penerbit', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('penerbit', null, ['class'=>'form-control']) !!}
		{!! $errors->first('penerbit', '<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary btn-rounded btn-fw']) !!}
	</div>
</div>