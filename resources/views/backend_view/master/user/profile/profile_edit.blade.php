@extends('layouts_backend._main') @section('content')
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
                        <li class="breadcrumb-item">Profile</li>
                        <li class="breadcrumb-item active">Edit User</li>
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
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> Alert!</h5>
                Ukuran upload foto minimal 2MB, lebih baik gunakan ukuran persegi.
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Edit User</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    <form class="form-save">
                        @csrf
                        <div class="form-group">
                            <label>Photo</label>
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input" accept="image/*">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" value="{{ $data->name }}" name="name">
                            <input type="text" hidden class="form-control" name="id" value="{{ $data->id }}">
                        </div>
                        @if(Auth::user()->previleges != '1')
                        <div class="form-group fakultas-form">
                            <label>Fakultas</label>
                            <select name="fakultas" class="form-control fakultas">
                                <option>- Pilih Fakultas -</option>
                                @foreach ($fakultas as $fakultass )
                                <option value="{{ $fakultass->mf_id }}">{{ $fakultass->mf_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="jurusan">
                            <label>Jurusan</label>
                            <select name="jurusan" class="form-control jurusan">
                                <option>- Pilih Jurusan -</option>
                                @foreach ($jurusan as $jurusans )
                                <option value="{{ $jurusans->mj_id }}">{{ $jurusans->mj_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{ $data->email }}" name="email">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" value="{{ $data->address }}" name="address">
                        </div>
                        <div class="form-group">
                            <label>Telephone</label>
                            <input type="text" class="form-control"
                                data-inputmask="&quot;mask&quot;: &quot;(+62) 999-9999-9999&quot;" name="tlp"
                                value="{{ $data->tlp }}">
                        </div>
                        <div class="form-group">
                            <label>NBI</label>
                            <input type="text" class="form-control"
                                data-inputmask="&quot;mask&quot;: &quot;9999999999&quot;" name="reg"
                                value="{{ $data->registration_kode }}">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" value="{{ $data->username }}" name="username">
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="button" class="btn btn-primary" onclick="save()"><i class="fas fa-save"></i>
                        Save</button>
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
    var form   = $('.form-save');
    formdata = new FormData(form[0]);
    var fakultas = $('.fakultas').val();
    var jurusan = $('.jurusan').val();
    if (fakultas == '- Pilih Fakultas -') {
      Swal.fire({
        title: 'Error',
        text: 'Fakultas tidak boleh dikosongkan.',
        icon: 'error',
        confirmButtonText: 'Ok'
          })
      return false;
    }else if (jurusan == '- Pilih Jurusan -') {
      Swal.fire({
        title: 'Error',
        text: 'Jurusan tidak boleh dikosongkan.',
        icon: 'error',
        confirmButtonText: 'Ok'
          })
      return false;
    }    
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        url:'{{ route('profile_update') }}',
        data:formdata ? formdata : form.serialize(),
        type:'post',
        processData: false,
        contentType: false,
        error:function(data){
        if(data.status == 422){
            Swal.fire({
              title: 'Error',
              text: 'Pastikan data tidak kosong dan foto memiliki ukuran minimal 2MB.',
              icon: 'error',
              confirmButtonText: 'Ok'
            })
          }
        },  
        success:function(data){
          if (data.status == 'sukses') {
            Swal.fire({
              title: 'Data sudah disimpan.',
              icon: 'success',
              confirmButtonText: 'Ok'
            }).then(function(result){
              location.href = '{{ route('profile_index') }}';
               })
          }
        }        
      });
    }
</script>