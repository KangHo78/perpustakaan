@extends('layouts_backend._main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card-body">
        @if (Session::has('status'))
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Alert!</h5>
            {{ Session::get('status') }}
        </div>
        @endif
        <div class="container-fluid">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset('storage/user/'.Auth::user()->photo) }}" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                    <p class="text-muted text-center">
                        @if(Auth::user()->previleges == '3')
                        Mahasiswa
                        @elseif(Auth::user()->previleges == '2')
                        Dosen
                        @else
                        Staff Perpustakaan
                        @endif</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Status</b> <a class="float-right">
                                @if(Auth::user()->previleges == '3')
                                Aktif
                                @elseif(Auth::user()->previleges == '2')
                                Aktif
                                @else
                                Administrator
                                @endif
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Kode</b> <a class="float-right">{{ Auth::user()->kode }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Username</b> <a class="float-right">{{ Auth::user()->username }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>NBI</b> <a class="float-right">{{ Auth::user()->registration_kode }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ Auth::user()->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Alamat</b> <a class="float-right">{{ Auth::user()->address }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Telepon</b> <a class="float-right">{{ Auth::user()->tlp }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Valid</b> <a
                                class="float-right">{{ date("d-M-Y", strtotime(Auth::user()->updated_at)) }}</a>
                        </li>
                    </ul>
                    <button onclick="edit('{{ Auth::user()->id }}')" class="btn btn-primary btn-block"><b>Edit
                            Data</b></button>
                    <a href="{{ route('profile_print') }}" class="btn btn-primary btn-block"><b>Print
                            Kartu
                            Anggota</b></a>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
</div>
@endsection

<script type="text/javascript">
    function edit(argument) {
        location.href = '{{ url('/') }}' + '/profile_edit?&id=' + argument;
    }
</script>