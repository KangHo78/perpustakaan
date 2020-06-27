@extends('layouts_backend._main')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"></div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active">Create Buku</li>
          </ol>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
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
          <form class="form-save"  enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Kode</label>
                  <input type="hidden" name="id" value="{{ $data->mb_id }}">
                  <input type="hidden" name="gambar_old" value="{{ $data->mb_image }}">
                  <input type="text" value="{{ $data->mb_kode }}" readonly="" class="form-control" name="kode" readonly="">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control">
                    @foreach ($kategoris as $kategori )
                          <option value="{{ $kategori->mk_id }}" 
                          @if ($kategori->mk_id == $data->mb_kategori)
                            selected="" 
                          @endif>{{ $kategori->mk_name }}</option>
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
                
                      <option value="{{ $penerbit->mpn_id }}"
                          @if ($penerbit->mpn_id == $data->mb_penerbit)
                            selected="" 
                          @endif>{{ $penerbit->mpn_name }}</option>
                @endforeach
              
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Pengarang</label>
                    <select name="pengarang" class="form-control">
                @foreach ($pengarangs as $pengarang )
                
                      <option value="{{ $pengarang->mpg_id }}"
                        @if ($pengarang->mpg_id == $data->mb_pengarang)
                            selected="" 
                          @endif
                      >{{ $pengarang->mpg_name }}</option>
                @endforeach
              
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ $data->mb_name }}">
              </div>
                
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Desc</label>
                    <textarea class="form-control" name="desc" rows="4">{{ $data->mb_desc }}</textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Pinjam </label>
                    <select name="pinjam" class="form-control">
                      <option @if ($data->mb_pinjam == 'YA')
                            selected="" 
                          @endif>YA</option>
                      <option @if ($data->mb_pinjam == 'TIDAK')
                            selected="" 
                          @endif>TIDAK</option>
                    </select>
                    <br>
                      <input type="file" name="gambar" class="form-control" id="file">
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <button type="button" class="btn btn-sm btn-warning" onclick="add_item()"><i class="fas fa-plus"></i>Tambah ISBN</button>
                  </div>
                  <br>
                    <table class="table  table-bordered table-stripped">
                      <tr>
                        <th>Isbn</th>
                        <th>Rak</th>
                        <th>status</th>
                        <th>Kondisi</th>
                        <th>Aksi</th>
                      </tr>
                      <tbody class="drop">
                        @foreach ($data->buku_dt as $index => $element)
                        <tr class="remove_exist_{{ $index }}">
                          <th>
                            <input class="form-control"  @if($element->mbdt_status == 'TERPINJAM') style="pointer-events: none" readonly="" @endif value="{{ $element->mbdt_isbn }}" name="isbn[]">
                            </th>
                            <th>
                              <select name="kode_rak_dt[]" class="form-control" @if($element->mbdt_status == 'TERPINJAM') readonly="" @endif>
                                 @foreach ($rak_bukus as $rak_buku )
                                    <option value="{{ $rak_buku->mrbd_kode }}"
                                      @if ($rak_buku->mrbd_kode == $element->mbdt_rak_buku_dt)
                                      selected="" 
                                      @endif
                                    >{{ $rak_buku->mrbd_kode }}</option>
                                  @endforeach
                              </select>
                            </th>
                            <th>
                              <select  name="status[]" class="form-control" 
                              @if($element->mbdt_status == 'TERPINJAM')
                                    style="pointer-events: none" readonly
                                  @endif>
                                <option @if($element->mbdt_status == 'TERSEDIA')
                                    selected="" 
                                  @endif>TERSEDIA</option>
                                        <option @if($element->mbdt_status == 'TERPINJAM')
                                    selected="" 
                                  @endif>TERPINJAM</option>
                              </select>
                            </th>
                            <th>
                              <select name="kondisi[]" class="form-control" @if($element->mbdt_status == 'TERPINJAM') style="pointer-events: none" readonly="" @endif>
                                <option @if($element->mbdt_kondisi == 'BAIK') selected="" @endif>BAIK</option>
                                <option @if($element->mbdt_kondisi == 'RUSAK') selected="" @endif>RUSAK</option>
                                <option @if($element->mbdt_kondisi == 'HILANG') selected="" @endif>HILANG</option>
                              </select>
                            </th>
                            <th>
                              @if($element->mbdt_status == 'TERSEDIA')
                              <button type="button" class="btn btn-sm btn-danger" onclick="remove_tr_exist('{{ $index }}')">
                                <i class="fas fa-trash"></i>
                              </button>
                              @else
                              <span class="btn btn-sm btn-warning">Terpinjam</span>
                              @endif
                            </th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="button" class="btn btn-primary" onclick="save()">
                      <i class="fas fa-save"></i> Save
                    </button>
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
    var form = $('.form-save');
    formdata = new FormData(form[0]);

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

    $.ajax({
      url:'{{ route('buku_update') }}',
      data:formdata ? formdata : form.serialize(),
      type:'post',      
      processData: false,
      contentType: false,
      success:function(data){
        if (data.status == 'sukses') {
          Swal.fire({
            title: 'Data Sudah Disimpan.',
            icon: 'success',
            confirmButtonText: 'Ok'
          }).then(function(result){
            location.href = '{{ route('buku_index') }}';
             })
        }else{
          Swal.fire({
            title: 'Gambar Melebihi 2mb.',
            icon: 'warning',
            confirmButtonText: 'Ok'
          })
          return false;
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
        '<th><button type="button" class="btn btn-sm btn-danger" onclick="remove_tr(\''+(remove+1)+'\')"><i class="fas fa-trash"></i></button></th>'+
      '</tr>'
    );
  }
  function remove_tr (argument) {
    console.log(argument);
    $('.remove_'+argument).remove();
  }
  function remove_tr_exist (argument) {
    console.log(argument);
    $('.remove_exist_'+argument).remove();
  } 
</script>