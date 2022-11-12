<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>About Us
                    <small class="text-muted"><?php echo date("l, d-M-Y"); ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('home/home'); ?>"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item active">About Us</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">

            <!-- Left side -->
            <div class="col-lg-7 col-md-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#damelia">Damelia</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pnj">Jakarta State Polytechnic</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#telkomsel">Telkomsel</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <!-- My Image -->
                    <div role="tabpanel" class="tab-pane active" id="damelia">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12">
                                <div class="card project_widget">
                                    <div class="header">
                                        <h2><strong>Damelia</strong><small class="text-muted">Web Developer</small></h2>
                                    </div>
                                    <div class="body">
                                        <div class="body_au">
                                            <!-- The card -->
                                            <div class="card_au">
                                                <div class="circle_au" style="--clr:linear-gradient(135deg,#d41e31,#491f8f)">
                                                    <img src="<?= base_url(); ?>/assets/images/about_us/word_damelia.png" style="--wdh:250px" class="logo">
                                                </div>
                                                <div class="content_au">
                                                    <h2>Damelia</h2>
                                                    <p>Hello guys, I'm the developer of this website, nice to meet you.. I'm currently in the 8th semester, studying Broadband Multimedia in Jakarta State Polytechnic. I like data and code, of course.. It's so fun ;)</p>
                                                    <a href="https://www.youtube.com/c/CERDASBersamadamelia" target="_blank">Find Me!</a>
                                                </div>
                                                <img src="<?= base_url(); ?>/assets/images/about_us/damelia.png" class="theimage2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- PNJ -->
                    <div role="tabpanel" class="tab-pane" id="pnj">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12">
                                <div class="card project_widget">
                                    <div class="header">
                                        <h2><strong>Jakarta State Polytechnic</strong><small class="text-muted">Our Campus</small></h2>
                                    </div>
                                    <div class="body">
                                        <div class="body_au">
                                            <!-- The card -->
                                            <div class="card_au">
                                                <div class="circle_au" style="--clr:linear-gradient(135deg,#30D5C8,#7f5cfe)">
                                                    <img src="<?= base_url(); ?>/assets/images/about_us/logo_pnj.png" style="--wdh:180px" class="logo">
                                                </div>
                                                <div class="content_au">
                                                    <h2>PNJ</h2>
                                                    <p>Jakarta State Polytechnic, abbreviated as PNJ. It is located in the north part of Depok, West Java. Vision: Becoming a Top Polytechnic with International Standard to Support National Competitiveness.</p>
                                                    <a href="https://www.pnj.ac.id/" target="_blank">Explore</a>
                                                </div>
                                                <img src="<?= base_url(); ?>/assets/images/about_us/gedung_pnj.jpg" class="theimage">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Telkomsel -->
                    <div role="tabpanel" class="tab-pane" id="telkomsel">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12">
                                <div class="card project_widget">
                                    <div class="header">
                                        <h2><strong>Telkomsel</strong><small class="text-muted">Operator Seluler</small></h2>
                                    </div>
                                    <div class="body">
                                        <div class="body_au">
                                            <div class="card_au">
                                                <div class="circle_au" style="--clr:linear-gradient(135deg,#FFC107,#FF9800)">
                                                    <img src="<?= base_url(); ?>/assets/images/about_us/logo_tsel.png" style="--wdh:150px" class="logo">
                                                </div>
                                                <div class="content_au">
                                                    <h2>Telkomsel</h2>
                                                    <p>Telkomsel is an Indonesian wireless network provider founded in 1995 and is the largest cellular telecommunication carrier in the country with 169.5 million customer base as of 2020.</p>
                                                    <a href="https://www.telkomsel.com/" target="_blank">Explore</a>
                                                </div>
                                                <img src="<?= base_url(); ?>/assets/images/about_us/gedung_tsel.jpg" class="theimage">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right side -->
            <div class="col-lg-5 col-md-12">
                <div class="card">
                    <div class="body">
                        <!-- Content -->
                        <!-- Quotes -->
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <div class="card">
                                    <div class="carousel slide twitter-feed" data-ride="carousel">
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item text-center active">
                                                <div class="col-12">
                                                    <p><i class="zmdi zmdi-quote"></i>This BigData5G website is presented to help operator for developing 5G network coverage.</p>
                                                </div>
                                            </div>
                                            <div class="carousel-item text-center">
                                                <div class="col-12">
                                                    <p><i class="zmdi zmdi-quote"></i>The website works by providing data visualizations of the best kecamatan recommendations.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="card">
                                    <div class="carousel slide facebook-feed" data-ride="carousel">
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item text-center active">
                                                <div class="col-12">
                                                    <p><i class="zmdi zmdi-quote"></i>Thank you to everyone who has supported me, encouraged me, and believed in me.</p>
                                                </div>
                                            </div>
                                            <div class="carousel-item text-center">
                                                <div class="col-12">
                                                    <p><i class="zmdi zmdi-quote"></i>May your kindness return to you in the same beautiful way it was offered. <br>- <a href="https://www.youtube.com/c/CERDASBersamadamelia" target="_blank" style="color:white;">Damelia</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Social media -->
                        <div class="row clearfix social-widget">
                            <div class="col-lg-4 col-md-4 col-6">
                                <a href="https://www.youtube.com/c/CERDASBersamadamelia" target="_blank">
                                    <div class="card info-box-2 hover-zoom-effect google-widget">
                                        <div class="icon "><i class="zmdi zmdi-youtube"></i></div>
                                        <div class="content">
                                            <div class="number">Subcribe</div>
                                            <div class="text">CERDAS Bersama Damelia</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-6">
                                <a href="https://www.linkedin.com/in/damelia-panggabean-51b4651a9" target="_blank">
                                    <div class="card info-box-2 hover-zoom-effect linkedin-widget">
                                        <div class="icon"><i class="zmdi zmdi-linkedin"></i></div>
                                        <div class="content">
                                            <div class="number">Connect</div>
                                            <div class="text">Damelia Panggabean</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-6">
                                <a href="https://instagram.com/lia.damel?igshid=YmMyMTA2M2Y=" target="_blank">
                                    <div class="card info-box-2 hover-zoom-effect instagram-widget">
                                        <div class="icon"><i class="zmdi zmdi-instagram"></i></div>
                                        <div class="content">
                                            <div class="number">Follow</div>
                                            <div class="text">lia.damel</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-6">
                                <div class="card info-box-2 hover-zoom-effect linkedin-widget">
                                    <div class="icon"><i class="zmdi zmdi-email"></i></div>
                                    <div class="content">
                                        <div class="number">Send</div>
                                        <div class="text">web.bigdata5g@gmail.com</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-6">
                                <a href="https://github.com/cerdasbersamadamelia" target="_blank">
                                    <div class="card info-box-2 hover-zoom-effect facebook-widget">
                                        <div class="icon"><i class="zmdi zmdi-github-alt"></i></div>
                                        <div class="content">
                                            <div class="number">Visit</div>
                                            <div class="text">cerdasbersamadamelia</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-6">
                                <a href="https://cerdasbersamadamelia.blogspot.com/" target="_blank">
                                    <div class="card info-box-2 hover-zoom-effect instagram-widget">
                                        <div class="icon"><i class="zmdi zmdi-blogger"></i></div>
                                        <div class="content">
                                            <div class="number">Visit</div>
                                            <div class="text">CERDAS Bersama Damelia</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection(); ?>