<?php
/*
 *   Crafted On Tue Nov 08 2022
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
$login_access_level = mysqli_real_escape_string($mysqli, $_SESSION['login_rank']);

if ($login_access_level == 'Adopter') { ?>
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
            <a href="adopter_dashboard" class="navbar-brand">
                <img src="../public/img/logo.png" alt="iPet" class="brand-image">
                <span class="brand-text font-weight-light">iPet</span>
            </a>
            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <li class="nav-item">
                    <a href="adopter_dashboard" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="adopter_pets" class="nav-link">Pets</a>
                </li>
                <li class="nav-item">
                    <a href="adopter_adoptions" class="nav-link">Adoptions</a>
                </li>
                <li class="nav-item">
                    <a href="adopter_payments" class="nav-link">Payments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" href="#logout_modal">
                        <i class="fas fa-user-tag"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Logout Modal -->
    <div class="modal fade" id="logout_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="logout">
                    <div class="modal-body text-center text-danger">
                        <img src="../public/img/logo.png" style="width: 40%;">
                        <h4>Terminate Session?</h4>
                        <br>
                        <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                        <input type="submit" value="Yes, Logout" class="text-center btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->
<?php } else { ?>
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
            <a href="owner_dashboard" class="navbar-brand">
                <img src="../public/img/logo.png" alt="iPet" class="brand-image">
                <span class="brand-text font-weight-light">iPet</span>
            </a>
            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <li class="nav-item">
                    <a href="owner_dashboard" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="owner_pets" class="nav-link">Pets</a>
                </li>
                <li class="nav-item">
                    <a href="owner_adoptions" class="nav-link">Adoptions</a>
                </li>
                <li class="nav-item">
                    <a href="owner_payments" class="nav-link">Payments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" href="#logout_modal">
                        <i class="fas fa-user-tag"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Logout Modal -->
    <div class="modal fade" id="logout_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="logout">
                    <div class="modal-body text-center text-danger">
                        <img src="../public/img/logo.png" style="width: 40%;">
                        <h4>Terminate Session?</h4>
                        <br>
                        <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                        <input type="submit" value="Yes, Logout" class="text-center btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->
<?php } ?>