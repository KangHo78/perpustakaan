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
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  <div class="card">
            <div class="card-header">
              <h3 class="card-title">Latihan Crud</h3>
              
              <div style="float:right">
                <button class="btn btn-sm btn-primary" onclick="tambah()"><i class="fas fa-plus"></i> Tambah </button>
              </div>
            
            </div>

        


            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <td>no</td>
                  <td>nama</td>
                  <td>kelas</td>
                  <td>aksi</td>
                </tr>
                </thead>
                <tbody>
                  @foreach ($data as $index => $element)
                  <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $element->nama }}</td>
                    <td>{{ $element->kelas }}</td>
                    <td>
                      <button class="btn btn-sm btn-warning" onclick="edit('{{ $element->id }}')"><i class="fas fa-pencil-o"></i> Edit</button>
                      <button class="btn btn-sm btn-danger" onclick="hapus('{{ $element->id }}')"><i class="fas fa-trash"></i> Hapus</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    <!-- /.content -->
  </div>
@endsection


<script type="text/javascript">
  function tambah(argument) {
    location.href = '{{ route('latihan_crud_create') }}';
  }
  function edit(argument) {
    location.href = '{{ url('/') }}'+'/latihan_crud_edit?&id='+argument;
  }
  function hapus(argument) {
    location.href = '{{ url('/') }}'+'/latihan_crud_hapus?&id='+argument;
  }
</script>
