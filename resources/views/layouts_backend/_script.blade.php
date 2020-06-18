<!-- Javascript -->
<script src="{{ asset('js/back.js') }}"></script>
<!-- page script -->
<script type="text/javascript">
  $(document).ready(function () {    
  bsCustomFileInput.init();
  $("#tables").DataTable({
      "responsive": true,
      "autoWidth": true,
    });            
            });
</script>