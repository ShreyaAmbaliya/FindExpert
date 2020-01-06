<!--      <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer> -->
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper    -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script type="text/javascript" src="<?php echo base_url('assets/worker/js/dataTables.bootstrap4.js'); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url('assets/worker/libs/popper.js/dist/umd/popper.min.js')?>"></script>
    <script src="<?php echo base_url('assets/worker/libs/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/worker/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/worker/extra-libs/sparkline/sparkline.js')?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('assets/worker/dist/js/waves.js')?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url('assets/worker/dist/js/sidebarmenu.js')?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url('assets/worker/dist/js/custom.min.js')?>"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="<?php echo base_url('assets/worker/libs/flot/excanvas.js')?>"></script>
    <script src="<?php echo base_url('assets/worker/libs/flot/jquery.flot.js')?>"></script>
    <script src="<?php echo base_url('assets/worker/libs/flot/jquery.flot.pie.js')?>"></script>
    <script src="<?php echo base_url('assets/worker/libs/flot/jquery.flot.time.js')?>"></script>
    <script src="<?php echo base_url('assets/worker/libs/flot/jquery.flot.stack.js')?>"></script>
    <script src="<?php echo base_url('assets/worker/libs/flot/jquery.flot.crosshair.js')?>"></script>
    <script src="<?php echo base_url('assets/worker/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')?>"></script>
    <script src="<?php echo base_url('assets/worker/dist/js/pages/chart/chart-page-init.js')?>"></script>
<script src="<?php echo base_url('assets/worker/libs/quill/dist/quill.min.js')?>"></script>

    <script src="<?php echo base_url('assets/worker/libs/select2/dist/js/select2.full.min.js')?>"></script>
    <script src="<?php echo base_url('assets/worker/libs/select2/dist/js/select2.min.js')?>"></script>
    <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

    </script>
    
    
    
</body>

</html>