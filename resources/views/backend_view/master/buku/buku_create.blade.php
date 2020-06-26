@extends('layouts_backend._main')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active">Create Buku</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- FORM -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Create Buku</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
          <form class="form-save">
          <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
              <label>Kode</label>
              <input type="text" value="{{ $kode }}" class="form-control" name="kode" readonly="">
            </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group">
              <label>Kategori</label>
              <select name="kategori" class="form-control">
                @foreach ($kategoris as $kategori )
                <option value="{{ $kategori->mk_id }}">{{ $kategori->mk_name }}</option>
                @endforeach
              </select>
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
              <label>Penerbit</label>
              <select name="penerbit" class="form-control">
                @foreach ($penerbits as $penerbit )
                <option value="{{ $penerbit->mpn_id }}">{{ $penerbit->mpn_name }}</option>
                @endforeach
              </select>
            </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group">
              <label>Pengarang</label>
              <select name="pengarang" class="form-control">
                @foreach ($pengarangs as $pengarang )
                <option value="{{ $pengarang->mpg_id }}">{{ $pengarang->mpg_name }}</option>
                @endforeach
              </select>
            </div>
            </div>
            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="col-sm-6">
            <div class="form-group">
              <div class="form-group">
              <label>Desc</label>
              <textarea class="form-control" name="desc" rows="4"></textarea>
            </div>
            <div class="form-group">
              <label>Pinjam </label>
              <select name="pinjam" class="form-control">
              <option>YA</option>
              <option>TIDAK</option>
              </select>
            </div>
            </div>
            </div>
            <button type="button" class="btn btn-sm btn-warning" onclick="add_item()">Add item</button>
            <table class="table  table-bordered table-stripped">
                <tr>
                  <th>Isbn</th>
                  <th>Rak</th>
                  <th>status</th>
                  <th>Kondisi</th>
                  <th>Aksi</th>
                </tr>
                <tbody class="drop">
                  
                </tbody>
            </table>
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="button" class="btn btn-primary" onclick="save()"><i class="fas fa-save"></i> Save</button>
        </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </section>
</div>
@endsection

<script type="text/javascript">
  function save(argument) {
    $.ajax({
      url:'{{ route('buku_save') }}',
      data:$('.form-save').serialize(),
      type:'get',      
      error:function(data){
        if(data.status == 422){
            Swal.fire({
              title: 'Pastikan Data Tidak Kosong.',
              icon: 'error',
              confirmButtonText: 'Ok'
            })
          }
        }, 
      success:function(data){
        if (data.status == 'sukses') {
          Swal.fire({
            title: 'Data Sudah Disimpan.',
            icon: 'success',
            confirmButtonText: 'Ok'
          }).then(function(result){
            location.href = '{{ route('buku_index') }}';
             })
        }
      }


    });

  }  

  function add_item (argument) {
    var remove = $('.remove').length;
    // console.log(remove);
    $('.drop').append(
      '<tr class="remove remove_'+(remove+1)+'">'+
        '<th><input class="form-control" name="isbn[]"></th>'+
        '<th>'+
            '<select name="kode_rak_dt[]" class="form-control">'+
              @foreach ($rak_bukus as $rak_buku )
              '<option value="{{ $rak_buku->mrbd_kode }}">{{ $rak_buku->mrbd_kode }}</option>'+
              @endforeach
            '</select>'+

        '</th>'+
        '<th>'+
            '<select name="status[]" class="form-control">'+
              '<option>TERSEDIA</option>'+
              '<option>TERPINJAM</option>'+
            '</select>'+
        '</th>'+
        '<th>'+
            '<select name="kondisi[]" class="form-control">'+
              '<option>BAIK</option>'+
              '<option>RUSAK</option>'+
              '<option>HILANG</option>'+
            '</select>'+
        '</th>'+
        '<input type="hidden" class="status" name="status[]" value="'+(remove+1)+'">'+
        '<th><button type="button" class="btn btn-sm btn-danger" onclick="remove_tr(\''+(remove+1)+'\')"><i class="fas fa-trash"></i></button></th>'+
      '</tr>'
    );
  }
  function remove_tr (argument) {
    console.log(argument);
    $('.remove_'+argument).remove();
  } 
</script>