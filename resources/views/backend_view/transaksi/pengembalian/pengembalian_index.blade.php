@extends('layouts_backend._main') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Master pengembalian</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item active">pengembalian</li>
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
                                <td>kode</td>
                                <td>User</td>
                                <td>tgl Kembali</td>
                                <td>Buku</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $element)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>
                                    <table>
                                        <tr>
                                            <th>Kode PG</th>
                                            <td>{{ $element->tpg_kode }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kode PJ</th>
                                            <td>{{ $element->peminjaman->tpj_kode }}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <th>Peminjam</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $element->pengembalian_anggota->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Staff</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $element->pengembalian_staff->name }}</td>
                                        </tr>
                                    </table></td>
                                <td>
                                    {{ date('d-M-Y',strtotime($element->tpg_date_kembali)) }}
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <th>Buku</th>
                                            <th>Isbn</th>
                                            <th>Kondisi</th>
                                        </tr>
                                        @foreach ($element->pengembalian_dt as $element1)
                                        <tr>
                                            <td>{{ $element1->buku_dt->buku->mb_name }}</td>
                                            <td>{{ $element1->tpgdt_isbn }}</td>
                                            <td>{{ $element1->tpgdt_kondisi }}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info" onclick="edit('{{ $element->tpg_id }}')"><i
                                            class="fas fa-pen"></i> Edit</button>
                                    <button class="btn btn-sm btn-danger" onclick="hapus('{{ $element->tpg_id }}')"><i
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
        location.href = '{{ route('transaksi_pengembalian_create') }}';
    }

    function edit(argument) {
        location.href = '{{ url('/') }}' + '/transaksi_pengembalian_edit?&id=' + argument;
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
            location.href = '{{ url('/') }}' + '/kategori_hapus?&id=' + argument;
            }
        })
    }
</script>