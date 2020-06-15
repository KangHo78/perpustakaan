@extends('layouts_backend._main') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Master User</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>

            <!-- Main content -->
            <div class="card card-info">

                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tables" class="table-bordered table-striped table" width="100%">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Previleges</td>
                                <td>Kode</td>
                                <td>Alamat</td>
                                <td>Telepon</td>
                                <td>Kode Registrasi</td>
                                <td>Email</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $element)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $element->name }}</td>
                                @if($element->previleges == '3')
                                <td>Mahasiswa</td>
                                @elseif($element->previleges == '2')
                                <td>Dosen</td>
                                @else
                                <td>Administrator</td>
                                @endif
                                <td>{{ $element->kode }}</td>
                                <td>{{ $element->address }}</td>
                                <td>{{ $element->tlp }}</td>
                                <td>{{ $element->registration_kode }}</td>
                                <td>{{ $element->email }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info btn-block"
                                        onclick="edit('{{ $element->id }}')"><i class="fas fa-pen"></i>
                                        Edit</button>
                                    <button class="btn btn-sm btn-danger btn-block"
                                        onclick="hapus('{{ $element->id }}')"><i class="fas fa-trash"></i>
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
    function edit(argument) {
        location.href = '{{ url('/') }}' + '/user_edit?&id=' + argument;
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
            location.href = '{{ url('/') }}' + '/user_hapus?&id=' + argument;
            }
        })        
    }
</script>