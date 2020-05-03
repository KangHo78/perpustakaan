<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard Dryas Library</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{ asset('assets/img/favicon.ico') }}" rel="shortcut icon" />
  @include('layouts_backend._css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    @include('layouts_backend._nav')
    @include('layouts_backend._sidebar')

    @yield('content')

    <footer class="main-footer">
      <strong>Copyright &copy; 2020 <a href="http://adminlte.io">DRYAS</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
      </div>
    </footer>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>
  @include('layouts_backend._script')
</body>

</html>