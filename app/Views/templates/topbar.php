<!-- Top Bar -->
<nav class="navbar">
    <div class="col-12">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a>
            <!-- <a class="navbar-brand" href="?= base_url('home/home'); ?>"><img src="?= base_url(); ?>/assets/images/logo.png" width="30" alt="Compass"><span class="m-l-10">BigData5G</span></a> -->
            <a class="navbar-brand" href="<?= base_url('home/home'); ?>"><img src="<?= base_url(); ?>/assets/images/about_us/logo_tsel.png" width="30" alt="Compass"><span class="m-l-10">BigData5G</span></a>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <!-- <p>Damelia</p> -->
            <li>
                <a href="javascript:void(0);" class="fullscreen hidden-sm-down" data-provide="fullscreen" data-close="true"><i class="zmdi zmdi-fullscreen"></i></a>
            </li>
            <li><a href="<?= base_url('logout'); ?>" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a></li>
            <li class=""><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        </ul>
    </div>
</nav>