<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="javascript:void(0)" class="brand-link">
    <i class="fa fa-book ml-4 mr-2"></i>
    <span class="brand-text font-weight-light text-monospace">Dryas Library</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('storage/user/'.Auth::user()->photo) }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ route('profile_index') }}" class="d-block">Hy {{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('welcome') }}" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Homepage
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        @if(Auth::user()->previleges == '3')
        <li class="nav-header">TRANSAKSI</li>
        <li class="nav-item">
          <a href="{{ route('transaksi_peminjaman_index') }}" class="nav-link">
            <i class="nav-icon fas fa-book-reader"></i>
            <p>Peminjaman</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="https://adminlte.io/docs/3.0" class="nav-link">
            <i class="nav-icon fas fa-arrow-alt-circle-left"></i>
            <p>Pengembalian</p>
          </a>
        </li>
        @else
        <li class="nav-header">MASTER</li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>
              User
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('user_index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('previleges_index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Hak Akses</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/mailbox/read-mail.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Jurusan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/mailbox/read-mail.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Fakultas</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Buku
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('buku_index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Buku</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kategori_index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pengarang_index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengarang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('penerbit_index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Penerbit</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('rak_buku_index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Rak buku</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">TRANSAKSI</li>
        <li class="nav-item">
          <a href="{{ route('transaksi_peminjaman_index') }}" class="nav-link">
            <i class="nav-icon fas fa-book-reader"></i>
            <p>Peminjaman</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('transaksi_pengembalian_index') }}" class="nav-link">
            <i class="nav-icon fas fa-arrow-alt-circle-left"></i>
            <p>Pengembalian</p>
          </a>
        </li>
        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>