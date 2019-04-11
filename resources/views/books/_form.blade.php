<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
    <table id="table_book" class="table table-striped">
      <thead>
            <tr id="last">
              <th  width="76px" style="font-size: 18px" >Judul</th>
              <th  width="76px" style="font-size: 18px" >Penulis</th>
               <th  width="76px" style="font-size: 18px" >Jumlah</th>
               <!-- <th  width="76px" style="font-size: 18px" >Cover</th> -->
                <th  width="76px" style="font-size: 18px" >Tipe</th>
                <th  width="76px" style="font-size: 18px" >Tahun Terbit</th>
                <th  width="76px" style="font-size: 18px" >Penerbit</th>
             <th style="width: 40px"><button type="button" name="add" class="btn btn-primary btn-sm add" onclick="addrow()" style="width: 76px"><i class="menu-icon mdi mdi-plus"></i></button></th>
            </tr>
            </thead>
</table>
<br>
{!! Form::submit('Simpan', ['class'=>'btn btn-primary btn-rounded btn-fw','style'=>'height: 29.92px; width: 146px']) !!}
</form>
<script type="text/javascript">
function addrow(){
      var no = $('#table_book tr').length;
      var html = '';
      html +='<tr id="row_'+no+'">';
      html +='<td><input type="text" name="title[]" class="form-control title" multiple/></td>';
      html +='<td><select name="author_id[]" class="form-control"><option></option>@foreach($authors as $data)<option value="{{$data->id}}">{{$data->name }}</option>@endforeach</select></td>';
      html +='<td><input type="number" name="amount[]" class="form-control amount" style="width: 67.99306px;" multiple/></td>';
      // html +='<td><input type="file" class="form-control-file" name="cover[]" multiple="true"/></td>';
      html +='<td><select name="book_type[]" class="form-control" style="width: 90px;"><option></option><option value="Novel">Novel</option><option value="Pelajaran">Pelajaran</option></select></td>';
      html +='<td><input type="text" name="tahun_terbit[]" class="form-control tahun_terbit" style="width: 67.99306px;" multiple/></td>';
      html +='<td><input type="text" name="penerbit[]" class="form-control penerbit" multiple/></td>';
      html +='<td><button type="button" class="btn btn-danger btn-sm" onclick="remove('+ no +')"><i class="menu-icon mdi mdi-minus"></i></button></td></tr>';
      $('#last').after(html);
      
    }
    function remove(no){
      $('#row_'+no).remove();
    }
</script>

