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
            <li class="breadcrumb-item">Transaksi</li>
            <li class="breadcrumb-item active">Edit Peminjaman</li>
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
          <h3 class="card-title">Edit Peminjaman</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
          <form class="form-save">
            <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Kode</label>
                  <input type="hidden" name="id" value="{{ $data->tpj_id }}">
                  <input readonly="" value="{{ $data->tpj_kode }}" name="kode" type="text" class="form-control"
                    placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Peminjam</label>
                  <select class="form-control select2 peminjam" name="peminjam">
                    <option>- Pilih Peminjam -</option>
                    @foreach ($user as $element)
                    <option value="{{ $element->id }}" @if ($element->id == $data->tpj_anggota) selected=""
                      @endif>{{ $element->kode }} / {{ $element->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Buku</label>
                  <select class="form-control select2 pilih_buku drop_peminjaman" onchange="buku()">
                    <option>- Pilih Buku -</option>
                    @foreach ($buku as $element)
                    @if ($element->buku != null)
                    <option value="{{ $element->mbdt_isbn }}">{{ $element->buku->mb_kode }} / {{ $element->mbdt_isbn }}
                      / {{ $element->buku->mb_name }}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <table class="table table-bordered drop">
              <tr>
                <th>Kode</th>
                <th>Buku</th>
                <th>ISBN</th>
                <th>Aksi</th>
              </tr>
              @foreach ($data->peminjaman_dt as $element)
              <tr class="total_pinjam remove_{{ $element->tpjdt_isbn }}">
                <th>{{ $element->buku_dt->buku->mb_kode }}</th>
                <th>{{ $element->buku_dt->buku->mb_name }}</th>
                <th>{{ $element->buku_dt->mbdt_isbn }}</th>
                <th>
                  <input type="hidden" name="isbn[]" value="{{ $element->buku_dt->mbdt_isbn }}">
                  <button type="button" class="btn btn-sm btn-danger"
                    onclick="removed('{{ $element->buku_dt->mbdt_isbn }}')"><i class="fas fa-trash"></i></button>
                </th>
              </tr>
              @endforeach
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
    var buku = $('.pilih_buku').val();
    if (peminjam == '- Pilih Peminjam -' || peminjam == null || peminjam == undefined) {
      Swal.fire({
        title: 'Peminjam kosong.',
        icon: 'warning',
        confirmButtonText: 'Ok'
      })
      return false;
    }
    if (buku == '' || buku == null || buku == undefined) {
      Swal.fire({
        title: 'buku belum dipilih.',
        icon: 'warning',
        confirmButtonText: 'Ok'
      })
      return false;
    } 
    $.ajax({
      url:'{{ route('transaksi_peminjaman_update') }}',
      data:$('.form-save').serialize(),
      type:'get',      
      success:function(data){
        if (data.status == 'sukses') {
          Swal.fire({
            title: 'Data Sudah Diupdate.',
            icon: 'success',
            confirmButtonText: 'Ok'
          }).then(function(result){
            location.href = '{{ route('transaksi_peminjaman_index') }}';  
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
  function buku(argument) {
    var isbn = $('.pilih_buku').val();
      $.ajax({
      url:'{{ route('transaksi_peminjaman_get_data_buku') }}',
      data:{isbn:isbn},
      type:'get',      
      success:function(data){
        if ($('.total_pinjam').length == 5) {
          Swal.fire({
            title: 'Buku Yang dipinjam max 5.',
            icon: 'warning',
            confirmButtonText: 'Ok'
          })
        }else{
          $('.drop').append(
            '<tr class="total_pinjam remove_'+data.hasil.mbdt_isbn+'">'+
              '<th>'+data.hasil.buku.mb_kode+'</th>'+
              '<th>'+data.hasil.buku.mb_name+'</th>'+
              '<th>'+data.hasil.mbdt_isbn+'</th>'+
              '<th>'+
                '<input type="hidden" name="isbn[]" value="'+data.hasil.mbdt_isbn+'">'+
                '<button type="button" class="btn btn-sm btn-danger" onclick="removed(\''+data.hasil.mbdt_isbn+'\')" ><i class="fas fa-trash"></i></button>'+
              '</th>'+
            '</tr>'
          );
        }
        
      }
    });
  }

  function removed(argument) {
    Swal.fire({
      title: 'Yakin ingin menghapus data !?.',
      text: 'Data yang di ubah akan terhapus dan buku menjadi TERSEDIA',
      icon: 'error',
      confirmButtonText: 'Ok'
    }).then(function(result){
        $.ajax({
          url:'{{ route('transaksi_peminjaman_get_data_buku_remove') }}',
          data:{isbn:argument},
          type:'get',      
          success:function(data){
              $('.drop_peminjaman').empty();
              var option = [];
              $.each(data.hasil, function( index, value ) {
                if (data.hasil[index].buku != null) {
                  option[index] = '<option value="'+data.hasil[index].mbdt_isbn+'">'+data.hasil[index].mbdt_isbn+' / '+data.hasil[index].buku.mb_kode+' / '+data.hasil[index].buku.mb_name+'</option>';
                }
              });
              $('.drop_peminjaman').html(option).trigger('update');
              $('.remove_'+argument).remove();
          }
        });
    })
    
  }
</script>