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