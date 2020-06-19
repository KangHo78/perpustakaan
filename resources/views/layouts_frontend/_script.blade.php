<!-- Javascript -->
<script src="{{ asset('js/front.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {    
    $("#tables").DataTable({
        "responsive": true,
        "autoWidth": true,
        "paging":   true,
        "pagingType": "numbers",
        "lengthChange": false,
        "pageLength": 10,
        "ordering": false,
        "info":     false,
      });            
    });
</script>