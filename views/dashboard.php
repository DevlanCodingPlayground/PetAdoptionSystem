<?php
/*
 *   Crafted On Sun Oct 02 2022
 *
 * 
 *   www.devlan.co.ke
 *   hello@devlan.co.ke
 *
 *
 *   The Devlan Solutions LTD End User License Agreement
 *   Copyright (c) 2022 Devlan Solutions LTD
 *
 *
 *   1. GRANT OF LICENSE 
 *   Devlan Solutions LTD hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 *   install and activate this system on two separated computers solely for your personal and non-commercial use,
 *   unless you have purchased a commercial license from Devlan Solutions LTD. Sharing this Software with other individuals, 
 *   or allowing other individuals to view the contents of this Software, is in violation of this license.
 *   You may not make the Software available on a network, or in any way provide the Software to multiple users
 *   unless you have first purchased at least a multi-user license from Devlan Solutions LTD.
 *
 *   2. COPYRIGHT 
 *   The Software is owned by Devlan Solutions LTD and protected by copyright law and international copyright treaties. 
 *   You may not remove or conceal any proprietary notices, labels or marks from the Software.
 *
 *
 *   3. RESTRICTIONS ON USE
 *   You may not, and you may not permit others to
 *   (a) reverse engineer, decompile, decode, decrypt, disassemble, or in any way derive source code from, the Software;
 *   (b) modify, distribute, or create derivative works of the Software;
 *   (c) copy (other than one back-up copy), distribute, publicly display, transmit, sell, rent, lease or 
 *   otherwise exploit the Software. 
 *
 *
 *   4. TERM
 *   This License is effective until terminated. 
 *   You may terminate it at any time by destroying the Software, together with all copies thereof.
 *   This License will also terminate if you fail to comply with any term or condition of this Agreement.
 *   Upon such termination, you agree to destroy the Software, together with all copies thereof.
 *
 *
 *   5. NO OTHER WARRANTIES. 
 *   DEVLAN SOLUTIONS LTD  DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 *   DEVLAN SOLUTIONS LTD SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
 *   EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, 
 *   FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT OF THIRD PARTY RIGHTS. 
 *   SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES OR LIMITATIONS
 *   ON HOW LONG AN IMPLIED WARRANTY MAY LAST, OR THE EXCLUSION OR LIMITATION OF 
 *   INCIDENTAL OR CONSEQUENTIAL DAMAGES,
 *   SO THE ABOVE LIMITATIONS OR EXCLUSIONS MAY NOT APPLY TO YOU. 
 *   THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS AND YOU MAY ALSO 
 *   HAVE OTHER RIGHTS WHICH VARY FROM JURISDICTION TO JURISDICTION.
 *
 *
 *   6. SEVERABILITY
 *   In the event of invalidity of any provision of this license, the parties agree that such invalidity shall not
 *   affect the validity of the remaining portions of this license.
 *
 *
 *   7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL DEVLAN SOLUTIONS LTD OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 *   CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 *   USE OF THE SOFTWARE, EVEN IF DEVLAN SOLUTIONS LTD HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 *   IN NO EVENT WILL DEVLAN SOLUTIONS LTD  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 *   TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
 *
 */
session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
require_once('../functions/admin_analytics.php');
require_once('../partials/head.php');
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require_once('../partials/navbar.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php require_once('../partials/sidebar.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $pet_owners; ?></h3>

                                    <p>Pet Owners</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="pet_owners" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $pet_adopters; ?></h3>
                                    <p>Pet Adopters</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-tag"></i>
                                </div>
                                <a href="pet_adopters" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $pets; ?></h3>
                                    <p>Registered Pets</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-cat"></i>
                                </div>
                                <a href="pets" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo $pet_adoptions; ?></h3>
                                    <p>Successful Adoptions</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-paw"></i>
                                </div>
                                <a href="adoptions" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $available_pets; ?></h3>
                                    <p>Available Pets</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dog"></i>
                                </div>
                                <a href="pets" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>Ksh <?php echo number_format($payment_amount); ?></h3>
                                    <p>Payments</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>
                                <a href="payments" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Donut Chart</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            <script>
                $(function() {
                    /* ChartJS
                     * -------
                     * Here we will create a few charts using ChartJS
                     */

                    //--------------
                    //- AREA CHART -
                    //--------------

                    // Get context with jQuery - using jQuery's .get() method.
                    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

                    var areaChartData = {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                        datasets: [{
                                label: 'Digital Goods',
                                backgroundColor: 'rgba(60,141,188,0.9)',
                                borderColor: 'rgba(60,141,188,0.8)',
                                pointRadius: false,
                                pointColor: '#3b8bba',
                                pointStrokeColor: 'rgba(60,141,188,1)',
                                pointHighlightFill: '#fff',
                                pointHighlightStroke: 'rgba(60,141,188,1)',
                                data: [28, 48, 40, 19, 86, 27, 90]
                            },
                            {
                                label: 'Electronics',
                                backgroundColor: 'rgba(210, 214, 222, 1)',
                                borderColor: 'rgba(210, 214, 222, 1)',
                                pointRadius: false,
                                pointColor: 'rgba(210, 214, 222, 1)',
                                pointStrokeColor: '#c1c7d1',
                                pointHighlightFill: '#fff',
                                pointHighlightStroke: 'rgba(220,220,220,1)',
                                data: [65, 59, 80, 81, 56, 55, 40]
                            },
                        ]
                    }

                    var areaChartOptions = {
                        maintainAspectRatio: false,
                        responsive: true,
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    display: false,
                                }
                            }],
                            yAxes: [{
                                gridLines: {
                                    display: false,
                                }
                            }]
                        }
                    }

                    // This will get the first returned node in the jQuery collection.
                    var areaChart = new Chart(areaChartCanvas, {
                        type: 'line',
                        data: areaChartData,
                        options: areaChartOptions
                    })

                    //-------------
                    //- LINE CHART -
                    //--------------
                    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
                    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
                    var lineChartData = jQuery.extend(true, {}, areaChartData)
                    lineChartData.datasets[0].fill = false;
                    lineChartData.datasets[1].fill = false;
                    lineChartOptions.datasetFill = false

                    var lineChart = new Chart(lineChartCanvas, {
                        type: 'line',
                        data: lineChartData,
                        options: lineChartOptions
                    })

                    //-------------
                    //- DONUT CHART -
                    //-------------
                    // Get context with jQuery - using jQuery's .get() method.
                    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
                    var donutData = {
                        labels: [
                            'Chrome',
                            'IE',
                            'FireFox',
                            'Safari',
                            'Opera',
                            'Navigator',
                        ],
                        datasets: [{
                            data: [700, 500, 400, 600, 300, 100],
                            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                        }]
                    }
                    var donutOptions = {
                        maintainAspectRatio: false,
                        responsive: true,
                    }
                    //Create pie or douhnut chart
                    // You can switch between pie and douhnut using the method below.
                    var donutChart = new Chart(donutChartCanvas, {
                        type: 'doughnut',
                        data: donutData,
                        options: donutOptions
                    })

                    //-------------
                    //- PIE CHART -
                    //-------------
                    // Get context with jQuery - using jQuery's .get() method.
                    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
                    var pieData = donutData;
                    var pieOptions = {
                        maintainAspectRatio: false,
                        responsive: true,
                    }
                    //Create pie or douhnut chart
                    // You can switch between pie and douhnut using the method below.
                    var pieChart = new Chart(pieChartCanvas, {
                        type: 'pie',
                        data: pieData,
                        options: pieOptions
                    })

                    //-------------
                    //- BAR CHART -
                    //-------------
                    var barChartCanvas = $('#barChart').get(0).getContext('2d')
                    var barChartData = jQuery.extend(true, {}, areaChartData)
                    var temp0 = areaChartData.datasets[0]
                    var temp1 = areaChartData.datasets[1]
                    barChartData.datasets[0] = temp1
                    barChartData.datasets[1] = temp0

                    var barChartOptions = {
                        responsive: true,
                        maintainAspectRatio: false,
                        datasetFill: false
                    }

                    var barChart = new Chart(barChartCanvas, {
                        type: 'bar',
                        data: barChartData,
                        options: barChartOptions
                    })

                    //---------------------
                    //- STACKED BAR CHART -
                    //---------------------
                    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
                    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

                    var stackedBarChartOptions = {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            xAxes: [{
                                stacked: true,
                            }],
                            yAxes: [{
                                stacked: true
                            }]
                        }
                    }

                    var stackedBarChart = new Chart(stackedBarChartCanvas, {
                        type: 'bar',
                        data: stackedBarChartData,
                        options: stackedBarChartOptions
                    })
                })
            </script>
        </div>
        <!-- /.content-wrapper -->
        <?php require_once('../partials/footer.php'); ?>

    </div>
    <!-- ./wrapper -->

    <?php require_once('../partials/scripts.php'); ?>
</body>

</html>