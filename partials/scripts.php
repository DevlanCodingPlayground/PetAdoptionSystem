<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/js/adminlte.js"></script>
<!-- Toastr -->
<script src="../public/plugins/toastr/toastr.min.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="../public/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../public/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../public/plugins/raphael/raphael.min.js"></script>
<script src="../public/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../public/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../public/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../public/js/pages/dashboard2.js"></script>
<!-- Init  Alerts -->
<?php if (isset($success)) { ?>
    <!-- Pop Success Alert -->
    <script>
        toastr.success('<?php echo $success; ?>')
    </script>

<?php }
if (isset($err)) { ?>
    <script>
        toastr.error('<?php echo $err; ?>')
    </script>
<?php }
if (isset($info)) { ?>
    <script>
        toastr.warning('<?php echo $info; ?>')
    </script>
<?php }
?>