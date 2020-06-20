<!-- Javascript -->
<script src="{{ asset('js/back.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function () {    
  bsCustomFileInput.init();
  $("#tables").DataTable({
      "responsive": true,
      "autoWidth": true,
    });            
    $('.select2').select2();
  
  });
</script>