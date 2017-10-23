        <script src="../assets/plugins/jQuery/jquery-3.1.1.min.js"></script>
        <!-- <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
        <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
        <script src="../assets/plugins/fastclick/fastclick.js"></script>
         --><!-- AdminLTE App -->
        <script src="../assets/dist/js/adminlte.js"></script>
        <!-- Sparkline -->
        <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <!-- <script src="../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> -->
        <!-- <script src="../assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>
        <script src="../assets/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#tabel-data').DataTable();
            });
        </script>
        <script type="text/javascript">
            $('#myform').submit(function(){
                return false;
            });
                $('#insert').click(function(){
                $.post( 
                $('#myform').attr('action'),
                $('#myform :input').serializeArray(),
                function(result){
                $('#result').html(result);
                }
                );
            });
        </script>
