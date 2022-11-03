<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>iPet - Pet Adoption System</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Noty -->
    <link rel="stylesheet" href="../public/plugins/noty/noty.css">
    <link rel="stylesheet" href="../public/plugins/noty/themes/bootstrap-v4.css">
    <link rel="stylesheet" href="../public/plugins/noty/themes/light.css">
    <link rel="stylesheet" href="../public/plugins/noty/themes/metroui.css">
    <link rel="stylesheet" href="../public/plugins/noty/themes/mint.css">
    <link rel="stylesheet" href="../public/plugins/noty/themes/nest.css">
    <link rel="stylesheet" href="../public/plugins/noty/themes/relax.css">
    <link rel="stylesheet" href="../public/plugins/noty/themes/semanticui.css">
    <link rel="stylesheet" href="../public/plugins/noty/themes/sunset.css">
    <!-- Data Table CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" />
    <!-- Select2 -->
    <link rel="stylesheet" href="../public/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <?php
    /* Alert Sesion Via Alerts */
    if (isset($_SESSION['success'])) {
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>
</head>