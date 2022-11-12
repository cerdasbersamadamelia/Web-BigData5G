<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Home
                    <small class="text-muted"><?php echo date("l, d-M-Y"); ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('home/home'); ?>"><i class="zmdi zmdi-home"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <!-- content -->
                        <div class="body_h">
                            <section class="section_h">
                                <h2 id="text"><span>It's time for develop</span><br>5G Network</h2>
                                <img src="<?= base_url(); ?>/assets/images/home/mountain.png" id="mountain" alt="">
                                <img src="<?= base_url(); ?>/assets/images/home/bird1.png" id="bird1" alt="">
                                <img src="<?= base_url(); ?>/assets/images/home/bird2.png" id="bird2" alt="">
                                <img src="<?= base_url(); ?>/assets/images/home/tower.png" id="tower" alt="">
                                <!-- <a href="https://www.telkomsel.com/5G" target="_blank" id="btn_h">Explore</a> -->
                                <div class="video-button">
                                    <a id="btn_h" class=" popup-video" href="https://www.youtube.com/watch?v=WmarWnlxVcw">
                                        <i class="zmdi zmdi-play-circle"></i>
                                    </a>
                                </div>
                                <img src="<?= base_url(); ?>/assets/images/home/rocks.png" id="rocks" alt="">
                                <img src="<?= base_url(); ?>/assets/images/home/water.png" id="water" alt="">
                            </section>
                            <div class="context_h">
                                <!-- p1 -->
                                <h2>5G Network</h2>
                                <div class="typography-line ">
                                    <blockquote>
                                        <p class="blockquote">
                                            "The era of the industrial revolution 4.0 is marked by the role of technology taking over most of the economic activities. The latest 5G technology is meant to satisfy the massive rise of connectivity and data in today's modern society, notably the Internet of Things (IoT), that connect billions of devices and systems over the Internet, as well as future innovation technologies. 5G is complete to face the Industrial Revolution 4.0 and form the basis of intelligence, a 'human-critical' network that combines big data, connection density and instant communication with low latency network and massive connectivity."
                                            <br>
                                            <br>
                                            <small>
                                                <a href="https://ieeexplore.ieee.org/document/9656497" target="_blank" class="text-white">- Wulandari et al., 2021</a>
                                            </small>
                                        </p>
                                    </blockquote>
                                </div>

                                <div class="row clearfix align-items-center">
                                    <!-- Slide image -->
                                    <div class="col-lg-6 col-md-12">
                                        <div class="body">
                                            <div id="demo2" class="carousel slide" data-ride="carousel">
                                                <!-- Indicators -->
                                                <ul class="carousel-indicators">
                                                    <li data-target="#demo2" data-slide-to="0" class="active"></li>
                                                    <li data-target="#demo2" data-slide-to="1" class=""></li>
                                                    <li data-target="#demo2" data-slide-to="2" class=""></li>
                                                    <li data-target="#demo2" data-slide-to="3" class=""></li>
                                                    <li data-target="#demo2" data-slide-to="4" class=""></li>
                                                    <li data-target="#demo2" data-slide-to="5" class=""></li>
                                                    <li data-target="#demo2" data-slide-to="6" class=""></li>
                                                    <li data-target="#demo2" data-slide-to="7" class=""></li>
                                                    <li data-target="#demo2" data-slide-to="8" class=""></li>
                                                    <li data-target="#demo2" data-slide-to="9" class=""></li>
                                                    <li data-target="#demo2" data-slide-to="10" class=""></li>
                                                    <li data-target="#demo2" data-slide-to="11" class=""></li>
                                                    <li data-target="#demo2" data-slide-to="12" class=""></li>
                                                </ul>

                                                <!-- Wrapper for slides -->
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="<?= base_url(); ?>/assets/images/home/5g_1.jpg" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="<?= base_url(); ?>/assets/images/home/5g_2.jpg" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="<?= base_url(); ?>/assets/images/home/5g_3.jpg" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="<?= base_url(); ?>/assets/images/home/5g_4.jpg" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="<?= base_url(); ?>/assets/images/home/5g_5.jpg" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="<?= base_url(); ?>/assets/images/home/5g_6.jpg" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="<?= base_url(); ?>/assets/images/home/5g_7.jpg" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="<?= base_url(); ?>/assets/images/home/5g_8.jpg" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="<?= base_url(); ?>/assets/images/home/5g_9.jpg" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="<?= base_url(); ?>/assets/images/home/5g_10.jpg" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="<?= base_url(); ?>/assets/images/home/5g_11.jpg" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="<?= base_url(); ?>/assets/images/home/5g_12.jpg" class="img-fluid" alt="">
                                                    </div>
                                                </div>

                                                <!-- Controls -->
                                                <!-- Left and right controls -->
                                                <a class="carousel-control-prev" href="#demo2" data-slide="prev">
                                                    <span class="carousel-control-prev-icon"></span>
                                                </a>
                                                <a class="carousel-control-next" href="#demo2" data-slide="next">
                                                    <span class="carousel-control-next-icon"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- text -->
                                    <div class="col-lg-6 col-md-12">
                                        <p>Indonesia currently has implemented various telecommunications technologies, one of which is 5G technology that will surpass previous technologies. The process of developing 5G coverage needs to be done so that this technology can be spread and enjoyed by all Indonesian people. The rapid growth of big data can be utilized in the telecommunications sector to predict the development of 5G coverage. Big data can combine information from multiple sources to create knowledge and make better predictions.</p>
                                    </div>
                                </div>

                                <!-- p2 -->
                                <h2>What is this website for?</h2>
                                <p>
                                    This BigData5G website is presented to help operator for developing 5G network coverage in their region. The website works by providing data visualizations of the best kecamatan recommendations for the development of 5G network coverage, by looking at the distribution of 4G customers in Depok who have used the type of phone that supports 5G based on the <strong>IMEI</strong> number and also looking at the distribution of <strong>payload</strong> usage in each kecamatan in Depok. This Website implements a multi user login system, which consists of 4 types of user: admin, data engineer, business user, and default user.
                                </p>
                                <div class="row clearfix">
                                    <div class="col-sm-12 col-md-6 col-lg-3">
                                        <div class="card social_widget2">
                                            <div class="body data text-center">
                                                <ul class="list-unstyled m-b-0">
                                                    <li class="m-b-30">
                                                        <span><?= $users[0]['description']; ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="name facebook">
                                                <p>Features:</p>
                                                <p>◦ Coverage Map<br>◦ Recommendations<br>◦ User list<br>◦ Profile<br>◦ Help <br>◦ About Us</p>
                                                <h5><span>- Admin</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-3">
                                        <div class="card social_widget2">
                                            <div class="body data text-center">
                                                <ul class="list-unstyled m-b-0">
                                                    <li class="m-b-30">
                                                        <span><?= $users[1]['description']; ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="name dribbble">
                                                <p>Features:</p>
                                                <p>◦ Coverage Map<br>◦ Recommendations<br>◦ Data list<br>◦ Profile<br>◦ Help <br>◦ About Us</p>
                                                <h5><span>- Data Engineer</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-3">
                                        <div class="card social_widget2">
                                            <div class="body data text-center">
                                                <ul class="list-unstyled m-b-0">
                                                    <li class="m-b-30">
                                                        <span><?= $users[2]['description']; ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="name twitter">
                                                <p>Features:</p>
                                                <p>◦ Coverage Map<br>◦ Recommendations<br>◦ Profile<br>◦ Help <br>◦ About Us</p>
                                                <h5><span>- Business User</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-3">
                                        <div class="card social_widget2">
                                            <div class="body data text-center">
                                                <ul class="list-unstyled m-b-0">
                                                    <li class="m-b-30">
                                                        <span><?= $users[3]['description']; ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="name youtube">
                                                <p>Features:</p>
                                                <p>◦ Profile<br>◦ Help <br>◦ About Us</p>
                                                <h5><span>- Default User</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                let text = document.getElementById('text');
                                let bird1 = document.getElementById('bird1');
                                let bird2 = document.getElementById('bird2');
                                // let btn = document.getElementById('btn');
                                let mountain = document.getElementById('mountain');
                                let tower = document.getElementById('tower');
                                let rocks = document.getElementById('rocks');
                                let water = document.getElementById('water');
                                let header = document.getElementById('header');

                                window.addEventListener('scroll', function() {
                                    let value = window.scrollY;
                                    text.style.top = 65 + value * -0.5 + '%';
                                    bird1.style.top = value * -1.5 + 'px';
                                    bird1.style.left = value * 2 + 'px';
                                    bird2.style.top = value * -1.5 + 'px';
                                    bird2.style.left = value * -5 + 'px';
                                    // btn.style.marginTop = value * 1.5 + 'px';
                                    rocks.style.top = value * -0.12 + 'px';
                                    tower.style.top = value * 0.25 + 'px';
                                    mountain.style.top = value * 0.6 + 'px';
                                    header.style.top = value * 0.8 + 'px';
                                })
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>