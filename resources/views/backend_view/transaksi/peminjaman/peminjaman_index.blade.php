@extends('layouts_backend._main') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Master Peminjaman</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">Transaksi</li>
                        <li class="breadcrumb-item active">Peminjaman</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>

            <div class="card card-info">
                @if (Auth::user()->previleges == '1')
                <div class="card-header">
                    <div class="float-right">
                        <button class="btn btn-sm btn-warning" onclick="tambah()"><i class="fas fa-plus"></i> Tambah
                        </button>
                    </div>
                </div>
                @endif

                <div class="card-body">
                    <table id="tables" class="table-bordered table-striped table" width="100%">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kode</td>
                                <td>Peminjam</td>
                                <td>Pustakawan</td>
                                <td>Tanggal</td>
                                <td>Buku</td>
                                @if (Auth::user()->previleges == '1')
                                <td>Aksi</td>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $element)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $element->tpj_kode }}</td>
                                <td>{{ $element->peminjaman_anggota->name }}</td>
                                <td>{{ $element->peminjaman_staff->name }}</td>
                                <td>
                                    <table>
                                        <tr>
                                            <th>Tgl Pinjam</th>
                                            <td>{{ date('d-M-Y',strtotime($element->tpj_date_pinjam)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tgl Kembali</th>
                                            <td>{{ date('d-M-Y',strtotime($element->tpj_date_kembali)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tgl Tempo</th>
                                            <td>{{ date('d-M-Y',strtotime($element->tpj_date_tempo)) }}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <th>Buku</th>
                                            <th>ISBN</th>
                                        </tr>
                                        @foreach ($element->peminjaman_dt as $element1)
                                        <tr>
                                            <td>{{ $element1->buku_dt->buku->mb_name }}</td>
                                            <td>{{ $element1->tpjdt_isbn }}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                                @if (Auth::user()->previleges == '1')
                                <td>
                                    <button class="btn btn-sm btn-info btn-block"
                                        onclick="edit('{{ $element->tpj_id }}')"><i class="fas fa-pen"></i>
                                        Edit</button>
                                    <button class="btn btn-sm btn-danger btn-block"
                                        onclick="hapus('{{ $element->tpj_id }}')"><i class="fas fa-trash"></i>
                                        Hapus</button>
                                </td>
                                @endif
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
        location.href = '{{ route('transaksi_peminjaman_create') }}';
    }

    function edit(argument) {
        location.href = '{{ url('/') }}' + '/transaksi_peminjaman_edit?&id=' + argument;
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
            location.href = '{{ url('/') }}' + '/transaksi_peminjaman_hapus?&id=' + argument;
            }
        })
    }
</script>