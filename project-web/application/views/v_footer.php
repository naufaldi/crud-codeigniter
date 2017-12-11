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
<script src="<?php  echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')?>"></script>
<script src="<?php  echo base_url('assets/js/plugins/chosen/chosen.jquery.js')?>"></script>
<script src="<?php  echo base_url('assets/js/plugins/dataTables/datatables.min.js')?>"></script>

   <!-- Data picker -->
<script src="<?php  echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.js')?>"></script>

<!-- Date range picker -->
<script src="<?php  echo base_url('assets/js/plugins/daterangepicker/daterangepicker.js')?>"></script>
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
        $('.chosen-select').chosen({width: "100%"});
        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });


    });

</script>

</body>

</html>
