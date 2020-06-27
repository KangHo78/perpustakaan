<!-- Javascript -->
<script src="{{ asset('js/front.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function () {    
    $('.image-link').magnificPopup({
      type: 'image'
    });
    $("#tables").DataTable({
        "responsive": true,
        "autoWidth": true,
        "paging":   true,
        "pagingType": "numbers",
        "lengthChange": false,
        "pageLength": 25,
        "ordering": false,
        "info":     false,
      });       
    });
</script>