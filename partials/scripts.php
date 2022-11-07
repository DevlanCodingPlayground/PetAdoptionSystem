<!-- jQuery -->
<script src="../public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/js/adminlte.js"></script>
<!-- Noty -->
<script src="../public/plugins/noty/noty.js"></script>
<!-- Mo Js -->
<script src="https://cdn.jsdelivr.net/npm/@mojs/core"></script>
<!-- Select2 -->
<script src="../public/plugins/select2/js/select2.full.min.js"></script>

<!-- Load Data Tables Plug Ins -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

<!-- Boxlight -->
<script type="text/javascript" src="../public/plugins/boxlight/jquery.blImageCenter.js"></script>
<!-- Load scripts -->
<?php include('alerts.php'); ?>
<!-- Init  Alerts -->
<script>
    // Prevent Double Resubmission
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    /* Invoke Boxlight */
    $('.pet_image').centerImage();
    /* Init Tool Tip Js */
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    /* Init Data Tables */
    $(document).ready(function() {
        $('.table').DataTable();
    });

    /* Initialize Select2 Elements */
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    /* Show File Name */
    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });

    /* Reports Data Table */
    $(document).ready(function() {
        $('.report_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });
    });

    /* Print Contents Inside Div Tag */
    function printContent(el) {
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
    }

    /* Only Add Active To Active Class */
    jQuery(function($) {
        var path = window.location.href;
        $('ul a').each(function() {
            if (this.href === path) {
                $(this).addClass('active');
            }
        });
    });

    /* Filter Products */
    function FilterFunction() {
        let input = document.getElementById('Pet_Search').value
        input = input.toLowerCase();
        let x = document.getElementsByClassName('Pet_details');
        /* Perform Magic Here */
        for (i = 0; i < x.length; i++) {
            if (!x[i].innerHTML.toLowerCase().includes(input)) {
                x[i].style.display = "none";
            } else if (!x[i].innerHTML.toLowerCase().includes(input)) {
                x[i].style.display = "none";
            } else {
                x[i].style.display = "";
            }
        }
    }
</script>