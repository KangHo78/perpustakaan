<!-- Javascript -->
<script src="{{ asset('js/back.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function () {    
  bsCustomFileInput.init();
  $('.select2').select2();
  $("#tables").DataTable({
      "responsive": true,
      "autoWidth": true,
    });                
  $('.datepicker').datepicker({
  	format: 'dd-MM-yyyy',
  	autoclose: true,
    todayHighlight:true,
    orientation: 'bottom',
  });
  });
</script>