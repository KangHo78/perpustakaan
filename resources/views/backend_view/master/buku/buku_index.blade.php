@extends('layouts_backend._main') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Master Buku</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item active">Buku</li>
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
                                <td>Kategori</td>
                                <td>Penerbit</td>
                                <td>Pengarang</td>
                                <td>Dibuat Oleh</td>
                                <td>Dibuat Di</td>
                                <td>Name</td>
                                <td>Desc</td>
                                <td>Pinjam</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $element)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $element->mb_kode }}</td>
                                <td>{{ $element->kategori->mk_name }}</td>
                                <td>{{ $element->penerbit->mpn_name }}</td>
                                <td>{{ $element->pengarang->mpg_name }}</td>
                                <td>{{ $element->mb_created_by }}</td>
                                <td>{{ $element->mb_created_at }}</td>
                                <td>{{ $element->mb_name }}</td>
                                <td>{{ $element->mb_desc }}</td>
                                <td>{{ $element->mb_pinjam }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info" onclick="edit('{{ $element->mb_id }}')"><i
                                            class="fas fa-pen"></i> Edit</button>
                                    <button class="btn btn-sm btn-danger" onclick="hapus('{{ $element->mb_id }}')"><i
                                            class="fas fa-trash"></i> Hapus</button>
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
        location.href = '{{ route('buku_create') }}';
    }

    function edit(argument) {
        location.href = '{{ url('/') }}' + '/buku_edit?&id=' + argument;
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
            location.href = '{{ url('/') }}' + '/buku_hapus?&id=' + argument;
            }
        })
    }
</script>