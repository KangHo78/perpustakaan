<!-- Javascript -->
<script src="{{ asset('js/front.js') }}"></script>
<script type="text/javascript">
  $('.image-link').magnificPopup({
      type: 'image',
      preloader: true,
      fixedBgPos: true,
      fixedContentPos: true,
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