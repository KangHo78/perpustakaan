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
            <li class="breadcrumb-item active">Edit Rak Buku</li>
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
          <h3 class="card-title">Edit Rak Buku</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
          <form class="form-save">
            <div class="form-group">
              <label>Kode</label>
              <input type="text" class="form-control" name="kode" value="{{ $data->mrb_kode }}">
              <input type="hidden" class="form-control" name="id" value="{{ $data->mrb_id }}">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="name" value="{{ $data->mrb_name }}">
            </div>
            <div class="form-group">
              <label>Lokasi</label>
              <input type="text" class="form-control" name="lokasi" value="{{ $data->mrb_lokasi_rak }}">
            </div>
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
      url:'{{ route('rak_buku_update') }}',
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
            location.href = '{{ route('rak_buku_index') }}';
             })
        }
      }
    });
  }
</script>