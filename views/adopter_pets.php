<?php
/*
 *   Crafted On Mon Nov 07 2022
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
require_once('../config/checklogin.php');
require_once('../config/config.php');
require_once('../config/codeGen.php');
require_once('../helpers/pet.php');
require_once('../partials/head.php');
?>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require_once('../partials/adopters_header.php'); ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"> Pets</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Pets</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="container-fluid">
                        <div class="d-flex justify-content-center">
                            <form class="form-inline">
                                <input type="text" class="form-control mb-4 mr-sm-2" placeholder="Search Pet" id="Pet_Search" onkeyup="FilterFunction()">
                            </form>
                        </div>

                        <!-- Info boxes -->
                        <div class="row">
                            <?php
                            $per_page_record = 12;
                            if (isset($_GET["page"])) {
                                $page  = $_GET["page"];
                            } else {
                                $page = 1;
                            }
                            $start_from = ($page - 1) * $per_page_record;

                            $ret = "SELECT * FROM pet p 
                            INNER JOIN pet_owner po ON p.pet_owner_id = po.pet_owner_id
                            ORDER BY p.pet_adoption_status DESC
                            LIMIT $start_from, $per_page_record";
                            $stmt = $mysqli->prepare($ret);
                            $stmt->execute(); //ok
                            $res = $stmt->get_result();
                            while ($pet = $res->fetch_object()) {
                            ?>
                                <div class="col-3 Pet_details">
                                    <div class="card">
                                        <?php if ($pet->pet_adoption_status == 'Available') { ?>
                                            <div class="ribbon-wrapper ribbon-lg">
                                                <div class="ribbon bg-success">
                                                    Available
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="ribbon-wrapper ribbon-lg">
                                                <div class="ribbon bg-danger">
                                                    Adopted
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="card-img-top">
                                            <img src="../public/img/pets/<?php echo $pet->pet_image; ?>" class="card-img-top pet_image" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Type: <?php echo $pet->pet_type; ?> </h5><br>
                                            <h5 class="card-title">Breed: <?php echo $pet->pet_breed; ?></h5><br>
                                            <h5 class="card-title">Age: <?php echo $pet->pet_age; ?></h5><br>
                                            <h5 class="card-title">Health Status: <?php echo $pet->pet_health_status; ?></h5>

                                            <p class="card-text">
                                                <?php echo limit_text($pet->pet_description, 4); ?>
                                            </p>
                                        </div>
                                        <?php if ($pet->pet_adoption_status != 'Adopted') { ?>
                                            <div class="card-footer">
                                                <div class="text-center">
                                                    <a data-toggle="modal" href="#adopt_<?php echo $pet->pet_id; ?>" class="badge badge-success"><i class="fas fa-hand-holding-heart"></i> Adopt</a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- adopt modal -->
                                <div class="modal fade fixed-right" id="adopt_<?php echo $pet->pet_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog  modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header align-items-center">
                                                <div class="text-bold">
                                                    <h6 class="text-bold">Adopt this Pet</h6>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex justify-content-between">
                                                    <h5>
                                                        <b>Owner Name: </b> <?php echo $pet->pet_owner_name; ?> <br>
                                                        <b>Contacts: </b><?php echo $pet->pet_owner_contacts; ?>
                                                    </h5>
                                                    <h5>
                                                        <b>Email: </b> <?php echo $pet->pet_owner_email; ?><br>
                                                        <b> Address: </b> <?php echo $pet->pet_owner_address; ?> <br>
                                                    </h5>
                                                </div>
                                                <hr>
                                                <form method="post" enctype="multipart/form-data" role="form">
                                                    <div class="row">
                                                        <div class="form-group col-md-8" style="display: none;">
                                                            <label for="">Select Pet Adopter</label>
                                                            <select type="text" required name="pet_adoption_pet_adopter_id" class="form-control select2bs4">
                                                                <?php
                                                                $adopter_ret = "SELECT * FROM login l
                                                                INNER JOIN pet_adopter pa ON pa.pet_adopter_login_id  = l.login_id
                                                                WHERE l.login_id = '{$_SESSION['login_id']}'";
                                                                $adopter_stmt = $mysqli->prepare($adopter_ret);
                                                                $adopter_stmt->execute(); //ok
                                                                $adopter_res = $adopter_stmt->get_result();
                                                                while ($adopter = $adopter_res->fetch_object()) {
                                                                ?>
                                                                    <option value="<?php echo $adopter->pet_adopter_id; ?>"><?php echo $adopter->pet_adopter_email; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <input type="hidden" name="pet_adoption_pet_id" value="<?php echo $pet->pet_id; ?>">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="">Adoption Date</label>
                                                            <input readonly type="date" value="<?php echo date('Y-m-d') ?>" required name="pet_adoption_date" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="text-right">
                                                        <button type="submit" name="adopt_pet" class="btn btn-warning">Adopt Pet </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal -->
                            <?php } ?>

                        </div>
                        <div class="d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php
                                    $query = "SELECT COUNT(*) FROM pet";
                                    $rs_result = mysqli_query($mysqli, $query);
                                    $row = mysqli_fetch_row($rs_result);
                                    $total_records = $row[0];

                                    $total_pages = ceil($total_records / $per_page_record);
                                    $pagLink = "";

                                    if ($page >= 2) {
                                        echo "<li class='page-item'><a class='page-link' href='adopter_pets?page=" . ($page - 1) . "'>Previous</a></li>";
                                    }

                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        if ($i == $page) {
                                            $pagLink .= "<li class='page-item active'><a class = 'active page-link' href='adopter_pets?page=" . $i . "'>" . $i . " </a></li>";
                                        } else {
                                            $pagLink .= "<li class='page-item'><a class='page-link' href='adopter_pets?page=" . $i . "'>" . $i . " </a></li>";
                                        }
                                    };
                                    echo $pagLink;

                                    if ($page < $total_pages) {
                                        echo "<li class='page-item'><a class='page-link'  href='adopter_pets?page=" . ($page + 1) . "'>  Next </a></li>";
                                    }

                                    ?>

                                </ul>
                            </nav>
                        </div>
                    </div><!-- /.container-fluid -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
    <?php require_once('../partials/adopters_footer.php'); ?>
    <?php require_once('../partials/scripts.php'); ?>
</body>

</html>