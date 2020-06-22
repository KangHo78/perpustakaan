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
                <input type="hidden" readonly="" value="{{ $data->tpg_id }}" class="form-control id" name="id">
                
                <div class="form-group">
                  <label>Kode</label>
                  <input readonly="" value="{{ $data->tpg_kode }}" name="kode" type="text" class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Tgl Kembali</label>
                  <input type="text" readonly="" value="{{ date('d-F-Y',strtotime($data->tpg_date_kembali)) }}" class="form-control datepicker" name="tgl_kembali">
                </div>
                
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6" style="pointer-events: none">
                <div class="form-group">
                  <label>kode Peminjaman</label>
                  <select class="form-control pilih_peminjaman" readonly name="kode_pinjam" onchange="peminjaman()">
                    <option>- Pilih Kode Peminjaman -</option>
                    @foreach ($peminjaman as $element)
                        <option value="{{ $element->tpj_id }}"  @if ($data->tpg_peminjaman == $element->tpj_id) selected="" @endif>{{ $element->tpj_kode }} / {{ $element->peminjaman_anggota->name }}</option>
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
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <p style="display: none" class="show_tgl">Buku telah dipinjam pada tanggal <b class="tgl_pinjam"></b> dan di kembalikan sebelum tanggal <b class="tgl_kembalis"></b> atau selambat-lambatnya pada tanggal <b class="tgl_tempo"></b></p>
                  <input type="hidden" readonly="" class="form-control tgl_pinjam" name="tgl_pinjam">
                  <input type="hidden" readonly="" class="form-control tgl_tempo" name="tgl_tempo">
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/locale/af.min.js"></script>
<script type="text/javascript">
  
  $(document).ready(function(){
    peminjaman();
  });
  function save(argument) {     
    $.ajax({
      url:'{{ route('transaksi_pengembalian_update') }}',
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
        }
      }

    });

  }
  function peminjaman(argument) {
      var id_peminjaman = $('.pilih_peminjaman').val();
      $('.drop').empty();
      $('.peminjam').val('');
      $('.show_tgl').css('display','none');

      $.ajax({
      url:'{{ route('transaksi_pengembalian_get_data_pengembalian') }}',
      data:{id_peminjaman:id_peminjaman},
      type:'get',      
      success:function(data){
          
            $('.show_tgl').css('display','block');
            $('.peminjam').val(data.hasil.pengembalian_anggota.name);
            $('.peminjam_id').val(data.hasil.pengembalian_anggota.id);

            $('.tgl_pinjam').val(data.hasil.tpj_date_pinjam);
            $('.tgl_tempo').val(data.hasil.tpj_date_tempo);

            $('.tgl_pinjam').text(moment(data.hasil.tpj_date_pinjam).format('DD MMMM YYYY'));
            $('.tgl_tempo').text(moment(data.hasil.tpj_date_tempo).format('DD MMMM YYYY'));
            $('.tgl_kembalis').text(moment(data.hasil.tpj_date_kembali).format('DD MMMM YYYY'));
            $.each(data.hasil.pengembalian_dt, function( index, value ) {
              $('.drop').append(
                '<tr>'+
                  '<th>'+value.buku_dt.buku.mb_kode+'</th>'+
                  '<th>'+value.buku_dt.buku.mb_name+'</th>'+
                  '<th>'+value.buku_dt.mbdt_isbn+'</th>'+
                  '<th>'+
                    '<b>'+value.buku_dt.mbdt_kondisi+'</b>'+
                    '<input type="hidden" class="form-control isbn" value="'+value.buku_dt.mbdt_isbn+'" name="isbn[]">'+
                  '</th>'+
                '</tr>'
              );
            });
          
          
        
        
      }
    });
  }

  
</script>