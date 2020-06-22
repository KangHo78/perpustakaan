    @extends('layouts_backend._main') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Master Rak Buku</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item active">Rak Buku</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>

            <div class="card card-info">
                <div class="card-header">
                    <div class="float-right">
                        <button class="btn btn-sm btn-warning" onclick="tambah()"><i class="fas fa-plus"></i> Tambah
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <table id="tables" class="table-bordered table-striped table" width="100%">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kode</td>
                                <td>Nama</td>
                                <td>Lokasi</td>
                                <td>Modal</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $element)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $element->mrb_kode }}</td>
                                <td>{{ $element->mrb_name }}</td>
                                <td>{{ $element->mrb_lokasi_rak }}</td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{$element->mrb_id}}"> 
                                    Sub Rak</button>

                                    <div class="modal fade" id="exampleModal_{{$element->mrb_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Sub Rak Buku</h5>
                                                <div class="card-body">
                                                    <table id="tables" class="table-bordered table-striped table" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <td>No</td>
                                                        <td>Kode</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($element->rak_buku_dt as $index2 => $element2)
                                                    <tr>
                                                        <td>{{ $index2+1 }}</td>
                                                        <td>{{ $element2->mrbd_kode }}</td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                    </table>
                                                    </div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control kode" value="{{ $element->mrb_kode }}" name="kode">
                                                <input type="hidden" class="form-control id" value="{{ $element->mrb_id }}" name="id">
                                                <input type="text" class="form-control angka" name="angka">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="tambah_dt()">Tambah</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                <td>
                                    <button class="btn btn-sm btn-info btn-block"
                                        onclick="edit('{{ $element->mrb_id }}')"><i class="fas fa-pen"></i>
                                        Edit</button>
                                    <button class="btn btn-sm btn-danger btn-block"
                                        onclick="hapus('{{ $element->mrb_id }}')"><i class="fas fa-trash"></i>
                                        Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection

<script type="text/javascript">
    function tambah(argument) {
        location.href = '{{ route('rak_buku_create') }}';
    }

    function edit(argument) {
        location.href = '{{ url('/') }}' + '/rak_buku_edit?&id=' + argument;
    }

    function hapus(argument) {
        Swal.fire({
            title: 'Yakin Menghapus Data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                title: 'Data Berhasil Di Hapus',
                icon: 'success',
                showConfirmButton: false,
                }
            )
            location.href = '{{ url('/') }}' + '/rak_buku_hapus?&id=' + argument;
            }
        })
    }
    
    function tambah_dt (argument) {
    var kode  = $('.kode').val();
    var id    = $('.id').val();
    var angka = $('.angka').val();
    $.ajax({
      url:'{{ route('rak_buku_dt_save') }}',
      data:{id:id,angka:angka,kode:kode},
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