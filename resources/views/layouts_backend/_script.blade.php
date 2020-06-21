<!-- Javascript -->
<script src="{{ asset('js/back.js') }}"></script>
{{-- <script type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<link rel="stylesheet" type="text/css"
  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"> --}}
<script type="text/javascript">
  $(document).ready(function () {    
  bsCustomFileInput.init();
  $("#tables").DataTable({
      "responsive": true,
      "autoWidth": true,
    });            
    $('.select2').select2();
  
  });
  // $('.datepicker').datepicker({
  // 	format: 'dd-MM-yyyy',
  // 	autoclose: true,
  // 	todayHighlight:true,
  // });

</script>