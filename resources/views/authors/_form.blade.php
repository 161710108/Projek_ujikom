<form action="{{ route('authors.store') }}" method="post" >
			  		{{ csrf_field() }}
		<table id="item_table" class="table table-striped">
			<thead>
            <tr id="last">
              <th>Nama</th>
              <th>Tanggal Lahir</th>
              <th>Pendidikan</th>
              <th>Pekerjaan</th>
             <th style="width: 40px"><button type="button" name="add" class="btn btn-primary btn-sm add" onclick="addrow()" style="width: 76px"><i class="menu-icon mdi mdi-plus"></i></button></th>
            </tr>
            </thead>
</table>
<br>
{!! Form::submit('Simpan', ['class'=>'btn btn-primary btn-rounded btn-fw','style'=>'height: 29.92px; width: 146px']) !!}
</form>
<script type="text/javascript">
 function addrow(){
      var no = $('#item_table tr').length;
      var html = '';
      html +='<tr id="row_'+no+'">';
      html +='<td><input type="text" name="name[]" class="form-control name"/></td>';
      html +='<td><input type="date" name="tanggal_lahir[]" class="form-control tanggal_lahir"/></td>';
      html +='<td><input type="text" name="pendidikan[]" class="form-control pendidikan"/></td>';
      html +='<td><input type="text" name="pekerjaan[]" class="form-control pekerjaan"/></td>';
      html +='<td><button type="button" class="btn btn-danger btn-sm" onclick="remove('+ no +')"><i class="menu-icon mdi mdi-minus"></i></button></td></tr>';
      $('#last').after(html);
      
    }
    function remove(no){
      $('#row_'+no).remove();
    }
</script>
