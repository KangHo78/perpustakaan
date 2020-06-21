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
            <li class="breadcrumb-item active">Create Kategori</li>
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
          <h3 class="card-title">Create Kategori</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
          <form class="form-save">
            <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Kode</label>
                  <input readonly="" value="{{ $kode }}" name="kode" type="text" class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Tgl Kembali</label>
                  <input type="text" readonly="" class="form-control datepicker" name="tgl_kembali">
                </div>
                
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>kode Peminjaman</label>
                  <select class="form-control select2 pilih_peminjaman" onchange="peminjaman()">
                    <option>- Pilih Kode Peminjaman -</option>
                    @foreach ($peminjaman as $element)
                        <option value="{{ $element->tpj_id }}">{{ $element->tpj_kode }} / {{ $element->peminjaman_anggota->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Peminjam</label>
                  <input type="text" readonly="" class="form-control peminjam" name="">
                </div>
              </div>
            </div>

            <table class="table table-bordered">
              <tr>
                <th>Kode</th>
                <th>Buku</th>
                <th>Isbn</th>
                <th>kondisi</th>
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
    var peminjam = $('.peminjam').val();
    var isbn = $('.isbn').val();
    if (peminjam == '' || peminjam == null || peminjam == undefined) {
      Swal.fire({
        title: 'Peminjam kosong.',
        icon: 'warning',
        confirmButtonText: 'Ok'
      })
      return false;
    }
    if (isbn == '' || isbn == null || isbn == undefined) {
      Swal.fire({
        title: 'buku belum dipilih.',
        icon: 'warning',
        confirmButtonText: 'Ok'
      })
      return false;
    } 
    $.ajax({
      url:'{{ route('transaksi_pengembalian_save') }}',
      data:$('.form-save').serialize(),
      type:'get',      
      success:function(data){
        if (data.status == 'sukses') {
          Swal.fire({
            title: 'Data Sudah Disimpan.',
            icon: 'success',
            confirmButtonText: 'Ok'
          }).then(function(result){
            location.href = '{{ route('transaksi_pengembalian_index') }}';
          })
        }else if(data.status == 'duplicate'){
          Swal.fire({
            title: 'Data Buku ada yang kembar/duplicate.',
            icon: 'warning',
            confirmButtonText: 'Ok'
          })
        }else if(data.status == 'bukan_user'){
          Swal.fire({
            title: 'Peminjam bukan termasuk user.',
            icon: 'warning',
            confirmButtonText: 'Ok'
          })
        }
      }

    });

  }
  function peminjaman(argument) {
      var id_peminjaman = $('.pilih_peminjaman').val();
      $('.drop').empty();
      $('.peminjam').val('');
      $.ajax({
      url:'{{ route('transaksi_pengembalian_get_data_peminjaman') }}',
      data:{id_peminjaman:id_peminjaman},
      type:'get',      
      success:function(data){
          

            $('.peminjam').val(data.hasil.peminjaman_anggota.name);
            $.each(data.hasil.peminjaman_dt, function( index, value ) {
              $('.drop').append(
                '<tr>'+
                  '<th>'+value.buku_dt.buku.mb_kode+'</th>'+
                  '<th>'+value.buku_dt.buku.mb_name+'</th>'+
                  '<th>'+value.buku_dt.mbdt_isbn+'</th>'+
                  '<th>'+
                    '<select class="form-control" name="kondisi[]">'+
                      '<option value="-"></option>'+
                      '<option value="BAIK">BAIK</option>'+
                      '<option value="RUSAK">RUSAK</option>'+
                      '<option value="HILANG">HILANG</option>'+
                    '</select>'+
                    '<input type="hidden" class="form-control isbn" value="'+value.buku_dt.mbdt_isbn+'" name="isbn[]">'+
                  '</th>'+
                '</tr>'
              );
            });
          
          
        
        
      }
    });
  }

  
</script>