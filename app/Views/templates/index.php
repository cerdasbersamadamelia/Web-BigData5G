<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title><?= $title; ?></title>
    <!-- Favicon-->
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/sweetalert/sweetalert.css" />

    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">

    <!-- Dropzone Css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/dropzone/dropzone.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/timeline.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/color_skins.css">

    <!-- Home Page-->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/custom_css/home.css">

    <!-- About Us Page-->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/custom_css/about_us.css">

    <!-- Bootstrap Select Css -->
    <link href="<?= base_url(); ?>/assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet">

    <!-- LeafletJS: CSS, JS, AJAX-->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/leaflet/leaflet.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="<?= base_url(); ?>/assets/plugins/leaflet/leaflet.ajax.js"></script>

    <!-- Magnific popup -->
    <link rel="stylesheet" href="<?= base_url();  ?>/assets/plugins/magnific-popup/dist/magnific-popup.css">

</head>

<body class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="<?= base_url(); ?>/assets/images/logo.png" width="48" height="48" alt="Compass"></div>
            <p>Please wait...</p>
        </div>
    </div>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <!-- Top Bar -->
    <?= $this->include('templates/topbar'); ?>

    <!-- Left Sidebar -->
    <?= $this->include('templates/leftsidebar'); ?>

    <!-- Right Sidebar -->
    <?= $this->include('templates/rightsidebar'); ?>

    <!-- Main Content -->
    <?= $this->renderSection('page-content'); ?>

    <!-- footer -->
    <?= $this->include('templates/footer'); ?>

    <!-- Jquery Core Js -->
    <script src="<?= base_url(); ?>/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="<?= base_url(); ?>/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?= base_url(); ?>/assets/bundles/datatablescripts.bundle.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="<?= base_url(); ?>/assets/plugins/dropzone/dropzone.js"></script>

    <script src="<?= base_url(); ?>/assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->

    <!-- Data Tables -->
    <script src="<?= base_url(); ?>/assets/js/pages/tables/jquery-datatable.js"></script>

    <!-- To preview user image file upload -->
    <script src="<?= base_url(); ?>/assets/plugins/custom_js/input.js"></script>

    <!-- Hide/Show Password using Eye icon -->
    <script src="<?= base_url(); ?>/assets/plugins/custom_js/eye.js"></script>

    <!-- Magnific popup -->
    <script src="<?= base_url();  ?>/assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url();  ?>/assets/plugins/magnific-popup/magnific.js"></script>
</body>

</html>