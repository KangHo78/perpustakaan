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
            <div class="form-group">
              <label>Kode</label>
              <input type="text" class="form-control" name="kode">
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select name="kategori" class="form-control">
              <option>- Pilih Kategori -</option>
                @foreach ($kategoris as $kategori )
                <option value="{{ $kategori->mk_id }}">{{ $kategori->mk_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Penerbit</label>
              <select name="penerbit" class="form-control">
              <option>- Pilih Penerbit -</option>
                @foreach ($penerbits as $penerbit )
                <option value="{{ $penerbit->mpn_id }}">{{ $penerbit->mpn_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Pengarang</label>
              <select name="pengarang" class="form-control">
              <option>- Pilih Pengarang -</option>
                @foreach ($pengarangs as $pengarang )
                <option value="{{ $pengarang->mpg_id }}">{{ $pengarang->mpg_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
              <label>Desc</label>
              <textarea class="form-control" name="desc" rows="4"></textarea>
            </div>
            <div class="form-group">
              <label>Pinjam </label>&nbsp&nbsp&nbsp&nbsp
              <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="pinjam" id="exampleRadios1" value="Ya" checked>
              <label class="form-check-label" for="ya"> Ya </label>
              </div>
              <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="pinjam" id="exampleRadios1" value="Tidak" checked>
              <label class="form-check-label" for="tidak"> Tidak </label>
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
</script>