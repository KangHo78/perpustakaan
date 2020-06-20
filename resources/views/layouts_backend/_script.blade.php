<!-- Javascript -->
<script src="{{ asset('js/back.js') }}"></script>
<!-- jQuery -->
<script src="{{ asset('assets_backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets_backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets_backend/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets_backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets_backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<!-- FastClick -->
<script src="{{ asset('assets_backend/plugins/fastclick/fastclick.js') }}"></script>
<!-- Custom File Input -->
<script src="{{ asset('assets_backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets_backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- PDF Make -->
<script src="{{ asset('assets_backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets_backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('assets_backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets_backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets_backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets_backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets_backend/dist/js/adminlte.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('assets_backend/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<!-- Input Mask-->
<script src="{{ asset('assets_backend/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('assets_backend/plugins/inputmask/bindings/inputmask.binding.js') }}"></script>
<!-- Custom File Input-->
<script src="{{ asset('assets_backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script type="text/javascript">
  $(document).ready(function () {    
  bsCustomFileInput.init();
  $("#tables").DataTable({
      "responsive": true,
      "autoWidth": true,
    });            
    $('.select2').select2();
  
  });
  $('.datepicker').datepicker({
  	format: 'dd-MM-yyyy',
  	autoclose: true,
  	todayHighlight:true,
  });

</script>