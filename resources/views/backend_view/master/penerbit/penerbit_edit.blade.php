@extends('layouts_backend._main')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">penerbit Create</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Form</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
           
                <form class="form-save">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{ $data->mpn_name }}" name="name"  placeholder="Enter ...">
                        <input type="hidden" class="form-control" value="{{ $data->mpn_id }}" name="id"  placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Kode</label>
                        <input type="text" class="form-control" value="{{ $data->mpn_kode }}" name="kode"  placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" value="{{ $data->mpn_alamat }}" name="alamat"  placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tlp</label>
                        <input type="text" class="form-control" value="{{ $data->mpn_tlp }}" name="tlp"  placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-sm btn-info float-sm-right" type="button" onclick="save()"> 
                    <i class="fas fa-save"></i> Save 
                 </button>
                </form>
            </div>
          </div>
  </div>
@endsection

<script type="text/javascript">
  function save(argument) {
      
    $.ajax({
      url:'{{ route('penerbit_update') }}',
      data:$('.form-save').serialize(),
      type:'get',
      success:function(data){
        if (data.status == 'sukses') {
          alert('data sudah disimpan.')
          location.href = '{{ route('penerbit_index') }}';
        }
      }

    });

  }
</script>