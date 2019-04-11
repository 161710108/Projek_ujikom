<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	{!! Form::label('name', 'Nama', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('name', null, ['class'=>'form-control']) !!}
		{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">
	{!! Form::label('tanggal_lahir', 'Tanggal Lahir', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::date('tanggal_lahir', null, ['class'=>'form-control']) !!}
		{!! $errors->first('tanggal_lahir', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('pendidikan') ? ' has-error' : '' }}">
	{!! Form::label('pendidikan', 'Pendidikan', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('pendidikan', null, ['class'=>'form-control']) !!}
		{!! $errors->first('pendidikan', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('pekerjaan') ? ' has-error' : '' }}">
	{!! Form::label('pekerjaan', 'Pekerjaan', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('pekerjaan', null, ['class'=>'form-control']) !!}
		{!! $errors->first('pekerjaan', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary btn-rounded btn-fw']) !!}
	</div>
</div>
