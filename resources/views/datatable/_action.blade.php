{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message] ) !!}
<a href="{{ $edit_url }}" class="btn btn-primary btn-rounded btn-fw">Ubah</a> |
<a href="{{ $show_url }}" class="btn btn-warning btn-rounded btn-fw">Show</a> |
{!! Form::submit('Hapus', ['class'=>'btn btn-danger btn-rounded btn-fw']) !!}
{!! Form::close()!!}