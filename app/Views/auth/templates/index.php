<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>Login</title>
    <!-- Favicon-->
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <!-- Bootstrap Select Css -->
    <link href="<?= base_url(); ?>/assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet">
    <!-- Custom Css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/authentication.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/color_skins.css">
    <!-- captcha -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/custom_css/captcha.css">
    </link>
</head>

<body class="theme-cyan authentication sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
        <div class="container">
            <div class="navbar-translate n_logo">
                <a class="navbar-brand" href="https://www.pnj.ac.id/" title="" target="_blank">JAKARTA STATE POLYTECHNIC</a>
                <a class="navbar-brand" href="https://www.telkomsel.com/" title="" target="_blank">TELKOMSEL</a>
                <button class="navbar-toggler" type="button">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Search Result</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary btn-round g-bg-soundcloud" href="<?= route_to('login') ?>">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary btn-round bg-orange" href="<?= route_to('register') ?>">REGISTER</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="page-header">
        <div class="page-header-image" style="background-image:url(<?= base_url(); ?>/assets/images/login.jpg)"></div>

        <?= $this->renderSection('content'); ?>

        <footer class="footer">
            <div class="container">
                <!-- <nav>
                    <ul>
                        <li><a href="">Contact Us</a></li>
                        <li><a href="">About Us</a></li>
                        <li><a href="">FAQ</a></li>
                    </ul>
                </nav> -->
                <div class="copyright">
                    <p class="text-right">Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="https://www.youtube.com/c/CERDASBersamadamelia" target="_blank" style="color: white;">Damelia</a>. All Rights Reserved. ️
                    </p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?= base_url(); ?>/assets/bundles/libscripts.bundle.js"></script>
    <script src="<?= base_url(); ?>/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <!-- Hide/Show Password using Eye icon -->
    <script src="<?= base_url(); ?>/assets/plugins/custom_js/eye.js"></script>

    <!-- Captcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="<?= base_url(); ?>/assets/plugins/custom_js/captcha.js"></script>

    <!-- Website -->
    <script>
        $(".navbar-toggler").on('click', function() {
            $("html").toggleClass("nav-open");
        });
        //=============================================================================
        $('.form-control').on("focus", function() {
            $(this).parent('.input-group').addClass("input-group-focus");
        }).on("blur", function() {
            $(this).parent(".input-group").removeClass("input-group-focus");
        });
    </script>

</body>

</html>