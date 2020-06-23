<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard Dryas Library</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Icon -->
  <link href="{{ asset('assets/favicon.ico') }}" rel="shortcut icon" type='image/x-icon' />
  <link href='{{ asset('assets/favicon-32x32.png') }}' rel='icon' sizes='32x32' />
  <link href='{{ asset('assets/android-icon-192x192.png') }}' rel='icon' sizes='192x192' />
  <link href='{{ asset('assets/apple-icon-180x180.png') }}' rel='apple-touch-icon' sizes='180x180' />
  <meta content='{{ asset('assets/apple-icon-114x114.png') }}' name='msapplication-TileImage' />
  @include('layouts_backend._css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    @include('layouts_backend._nav')
    @include('layouts_backend._sidebar')
    @yield('content')
    <footer class="main-footer">
      <strong>Copyright &copy; 2020 <a href="javascript:void(0)">DRYAS</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
      </div>
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>
  @include('layouts_backend._script')
  @yield('script')
</body>

</html>