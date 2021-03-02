<!-- jQuery -->
<script src="resources/vendor/jquery/jquery.min.js"></script>
<script src="resources/js/valida.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="resources/js/jquery-3.3.1.min.js"></script>
<script src="resources/js/popper.min.js"></script>
<script src="resources/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="resources/plugins/sweetAlert2/sweetalert2.all.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="resources/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="resources/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="resources/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="resources/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="resources/dist/js/sb-admin-2.js"></script>


<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        
        scrollY:        '70vh',
        scrollCollapse: false,
        paging:         false
    });
});

/*$(document).ready(function() {
    $('#example').DataTable( {
        scrollY:        '70vh',
        scrollCollapse: false,
        paging:         false
    } );
} );*/
</script>

<script>
  //con opción de TYPE  //tipos de popups: error, success, warning, info, question
$("#btn2").click(function(){
    /*Swal.fire({
        //error
        type: 'error',
        title: 'Error',
        text: '¡Algo salió mal!',        
    });*/
    Swal.fire({        
        type: 'success',
        title: 'Éxito',
        text: '¡Perfecto!',        
    });
});
  </script>

</body>

</html>