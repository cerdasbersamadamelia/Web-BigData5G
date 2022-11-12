<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Help
                    <small class="text-muted"><?php echo date("l, d-M-Y"); ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('home/home'); ?>"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item active">Help</li>
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
                        <div class="row clearfix">
                            <div class="col-md-12 col-lg-12">
                                <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                    <!-- Where did the data come from?-->
                                    <div class="panel panel-primary">
                                        <div class="panel-heading" role="tab" id="headingOne_1">
                                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="false" aria-controls="collapseOne_1"> #1 Where did the data come from?</a> </h4>
                                        </div>
                                        <div id="collapseOne_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne_1">
                                            <div class="panel-body">
                                                <h4>Where did the data come from?</h4>
                                                The data on the website comes from the results of the analysis using <strong>Python</strong>. The data consists of 2 parts, namely <strong>IMEI</strong> data and <strong>payload</strong> data. IMEI will determine the type of mobile phone of 4g subscribers that already supports the 5g network, while the payload will determine the amount of data usage by customers in each kecamatan in Depok. The data has a very large size or can be called <strong>big data</strong>, that's why the data is analyzed using Python.

                                                <h4>System visualization</h4>
                                                The following visualization can help you understand the flow of data processing on the website.
                                                <div class="card project_widget col-lg-7 mt-3 rounded mx-auto d-block">
                                                    <div class="pw_img">
                                                        <a href="<?= base_url(); ?>/assets/images/help/visualisasi.png" class="image-popup">
                                                            <img class="img-responsive" src="<?= base_url(); ?>/assets/images/help/visualisasi.png">
                                                        </a>
                                                    </div>
                                                </div>
                                                <ol>
                                                    <li>The system process begins by analyzing IMEI data and payload data using the Python to implement the program created to determine the recommended kecamatan for the development of 5G coverage in Depok.</li>
                                                    <li>The results of data analysis will be saved to the MySQL database as a data visualization that is displayed to the website as the final result.</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- What is IMEI -->
                                    <div class="panel panel-primary">
                                        <div class="panel-heading" role="tab" id="headingTwo_1">
                                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseTwo_1" aria-expanded="false" aria-controls="collapseTwo_1"> #2 What is IMEI?</a> </h4>
                                        </div>
                                        <div id="collapseTwo_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1">
                                            <div class="panel-body">
                                                <!-- What is IMEI? -->
                                                <h4>What is IMEI?</h4>
                                                The <strong>International Mobile Equipment Identity</strong> (IMEI) number is a unique number to identify GSM, WCDMA, and iDEN mobile phones, as well as some satellite phones. Mostly phone have one IMEI number, but in dual SIM phones are two. The IMEI is only used for identifying the device and has no permanent or semi-permanent relation to the subscriber. The number is used by the GSM network to identify valid devices and therefore can be used for stopping a stolen phone from accessing the network in that country.
                                                <h4>What devices need an IMEI?</h4>
                                                <div class="card project_widget col-lg-8 mt-3 rounded mx-auto d-block">
                                                    <div class="pw_img">
                                                        <a href="<?= base_url(); ?>/assets/images/help/imei1.jpg" class="image-popup">
                                                            <img class="img-responsive" src="<?= base_url(); ?>/assets/images/help/imei1.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- Check IMEI Number -->
                                                <h4>Check IMEI Number</h4>
                                                The IMEI number can be found on the silver sticker on the back of your phone, under the battery pack, or on the box your phone came in. You can also display the IMEI number on the screen of your mobile phone or smartphone by entering <code>*#06#</code> into the keypad.
                                                <div class="text-center mt-3">
                                                    <div class="card project_widget col-lg-3">
                                                        <div class="pw_img">
                                                            <a href="<?= base_url(); ?>/assets/images/help/imei2.jpg" class="image-popup">
                                                                <img class="img-responsive" src="<?= base_url(); ?>/assets/images/help/imei2.jpg">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="card project_widget col-lg-2 ">
                                                        <div class="pw_img">
                                                            <a href="<?= base_url(); ?>/assets/images/help/imei3.jpg" class="image-popup">
                                                                <img class="img-responsive" src="<?= base_url(); ?>/assets/images/help/imei3.jpg">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="card project_widget col-lg-3 ">
                                                        <div class="pw_img">
                                                            <a href="<?= base_url(); ?>/assets/images/help/imei4.jpg" class="image-popup">
                                                                <img class="img-responsive" src="<?= base_url(); ?>/assets/images/help/imei4.jpg">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="card project_widget col-lg-3 ">
                                                        <div class="pw_img">
                                                            <a href="<?= base_url(); ?>/assets/images/help/imei5.jpg" class="image-popup">
                                                                <img class="img-responsive" src="<?= base_url(); ?>/assets/images/help/imei5.jpg">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- The Structure of an IMEI Number -->
                                                <h4>The Structure of an IMEI Number</h4> IMEI numbers either come in a 17 digit or 15 digit sequences of numbers. The IMEI format currently utilized is <code>AA-BBBBBB-CCCCCC-D</code>:
                                                <ul>
                                                    <li><code>AA</code>: These two digits are for the Reporting Body Identifier, indicating the GSMA approved group that allocated the TAC (Type Allocation Code)</li>
                                                    <li><code>BBBBBB</code>: The remainder of the TAC (FAC)</li>
                                                    <li><code>CCCCCC</code>: Serial sequence of the Model (SNR)</li>
                                                    <li><code>D</code>: Luhn check digit of the entire model or 0 (This is an algorithm that validates the ID number) (CD)</li>
                                                </ul>
                                                <div class="card project_widget col-lg-8 mt-3 rounded mx-auto d-block">
                                                    <div class="pw_img">
                                                        <a href="<?= base_url(); ?>/assets/images/help/imei6.jpg" class="image-popup">
                                                            <img class="img-responsive" src="<?= base_url(); ?>/assets/images/help/imei6.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- What is payload -->
                                    <div class="panel panel-primary">
                                        <div class="panel-heading" role="tab" id="headingThree_1">
                                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseThree_1" aria-expanded="false" aria-controls="collapseThree_1"> #3 What is Payload?</a> </h4>
                                        </div>
                                        <div id="collapseThree_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
                                            <div class="panel-body">
                                                When data is sent over the Internet, each unit transmitted includes both header information and the actual data being sent. The header identifies the source and destination of the packet, while the actual data is referred to as the <strong>payload</strong>. Because header information, or overhead data, is only used in the transmission process, it is stripped from the packet when it reaches its destination. Therefore, the payload is the only data received by the destination system, in this case telecommunication network and usually in bytes (KB, MB, GB, etc).
                                            </div>
                                        </div>
                                    </div>
                                    <!-- How to read the Coverage Map -->
                                    <div class="panel panel-primary">
                                        <div class="panel-heading" role="tab" id="headingFour_1">
                                            <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseFour_1" aria-expanded="true" aria-controls="collapseFour_1"> #4 How to read the Coverage Map?</a> </h4>
                                        </div>
                                        <div id="collapseFour_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour_1">
                                            <div class="panel-body">
                                                <div class="">
                                                    <div class="card project_widget">
                                                        <div class="pw_img">
                                                            <a href="<?= base_url(); ?>/assets/images/help/coverage_map.jpg" class="image-popup">
                                                                <img class="img-responsive" src="<?= base_url(); ?>/assets/images/help/coverage_map.jpg">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- How to read the Recommendation (Bar Chart) -->
                                    <div class="panel panel-primary">
                                        <div class="panel-heading" role="tab" id="headingFive_1">
                                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseFive_1" aria-expanded="false" aria-controls="collapseFive_1"> #5 How to read the Recommendation (<code>Bar Chart</code>)?</a> </h4>
                                        </div>
                                        <div id="collapseFive_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive_1">
                                            <div class="panel-body">
                                                <div class="">
                                                    <div class="card project_widget">
                                                        <div class="pw_img">
                                                            <a href="<?= base_url(); ?>/assets/images/help/bar_chart.jpg" class="image-popup">
                                                                <img class="img-responsive" src="<?= base_url(); ?>/assets/images/help/bar_chart.jpg">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- How to read the Recommendation (Scatter Plot) -->
                                    <div class="panel panel-primary">
                                        <div class="panel-heading" role="tab" id="headingSix_1">
                                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseSix_1" aria-expanded="false" aria-controls="collapseSix_1"> #6 How to read the Recommendation (<code>Scatter Plot</code>)?</a> </h4>
                                        </div>
                                        <div id="collapseSix_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix_1">
                                            <div class="panel-body">
                                                <div class="">
                                                    <div class="card project_widget">
                                                        <div class="pw_img">
                                                            <a href="<?= base_url(); ?>/assets/images/help/scatter_plot.jpg" class="image-popup">
                                                                <img class="img-responsive" src="<?= base_url(); ?>/assets/images/help/scatter_plot.jpg">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- How do I get more information -->
                                    <div class="panel panel-primary">
                                        <div class="panel-heading" role="tab" id="headingSeven_1">
                                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseSeven_1" aria-expanded="false" aria-controls="collapseSeven_1"> #7 How do I get more information?</a> </h4>
                                        </div>
                                        <div id="collapseSeven_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven_1">
                                            <div class="panel-body">
                                                For more information, please contact <strong>Damelia</strong> at <a href="<?= base_url('extra/aboutus'); ?>">web.bigdata5g@gmail.com</a>
                                                <br>Thank you 🙏❤️
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>