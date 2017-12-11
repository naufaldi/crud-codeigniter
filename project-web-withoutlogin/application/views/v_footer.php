<div class="footer">
            
            <div>
                <strong>Copyright</strong> Batavia Hack Town &copy; 2014-2017
            </div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="<?php  echo base_url('assets/js/jquery-3.1.1.min.js')?>"></script>
    <script src="<?php  echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php  echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js')?>"></script>
    <script src="<?php  echo base_url('assets/"js/plugins/slimscroll/jquery.slimscroll.min.js')?>"></script>

    <script src="<?php  echo base_url('assets/js/plugins/dataTables/datatables.min.js')?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php  echo base_url('assets/js/inspinia.js')?>"></script>
    <script src="<?php  echo base_url('assets/js/plugins/pace/pace.min.js')?>"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
            
                ]

            });

        });

    </script>

</body>

</html>
