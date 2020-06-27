<!-- Javascript -->
<script src="{{ asset('js/front.js') }}"></script>
<script type="text/javascript">
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
  $(document).ready(function () {    
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