<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Create Summary Payload
                    <small class="text-muted"><?php echo date("l, d-M-Y"); ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('home/home'); ?>"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('dataengineer/index'); ?>"></i>Data List</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('dataengineer/updatepayload'); ?>"></i>Update Data Payload</a></li>
                    <li class="breadcrumb-item active">Create Summary Payload</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <ul class="cbp_tmtimeline">
                    <li>
                        <time class="cbp_tmtime" datetime="2017-11-04T18:30"><span class="hidden"></span> <span></span></time>
                        <div class="cbp_tmicon"><i class="zmdi zmdi-account"></i></div>
                        <div class="cbp_tmlabel empty"> <span>This page will show you how to create summary payload from raw data using Pyhton.</span> </div>
                    </li>
                    <li>
                        <time class="cbp_tmtime" datetime="2017-11-04T03:45"><span>Prepare the software</span> <span>Pyhton,<br>Jupyter Notebook</span></time>
                        <div class="cbp_tmicon bg-info"><i class="zmdi zmdi-language-python"></i></div>
                        <div class="cbp_tmlabel">
                            <h2><a href="javascript:void(0);">Step 1: </a><span>Prepare the software</span></h2>
                            <p>The software required for the analysis process are <strong>Python</strong> as a programming language and <strong>Jupyter Notebook</strong> as a text editor.</p>
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-6">
                                    <div class="card project_widget">
                                        <div class="pw_img">
                                            <a href="https://www.python.org/downloads/" target="_blank">
                                                <img class="img-responsive" src="<?= base_url(); ?>/assets/images/summary_payload/python_logo.jpg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6">
                                    <div class="card project_widget">
                                        <div class="pw_img">
                                            <a href="https://jupyter.org/install" target="_blank">
                                                <img class="img-responsive" src="<?= base_url(); ?>/assets/images/summary_payload/jupyter_logo.jpg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <time class="cbp_tmtime" datetime="2017-11-03T13:22"><span>Download the script</span> <span>Python</span></time>
                        <div class="cbp_tmicon bg-green"> <i class="zmdi zmdi-download"></i></div>
                        <div class="cbp_tmlabel">
                            <h2><a href="javascript:void(0);">Step 2: </a><span>Download the script</span></h2>
                            <p>Download the python script <strong><a href="<?= base_url('dataengineer/download_script_payload'); ?>"><b>here</b></a></strong> and open it with Jupyter Notebook.</p>
                            <div class="row">
                                <div class="col-lg-8 col-md-6 col-6 mb-4">
                                    <div class="card project_widget">
                                        <div class="pw_img">
                                            <a href="<?= base_url(); ?>/assets/images/summary_payload/step2.jpg" class="image-popup">
                                                <img class="img-responsive" src="<?= base_url(); ?>/assets/images/summary_payload/step2.jpg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <time class="cbp_tmtime" datetime="2017-11-03T13:22"><span>Executing a script</span> <span>Python</span></time>
                        <div class="cbp_tmicon bg-blush"><i class="zmdi zmdi-code"></i></div>
                        <div class="cbp_tmlabel">
                            <h2><a href="javascript:void(0);">Step 3: </a><span>Executing a script</span></h2>
                            <p>This step will run the python script to create summary payload from raw data. There are 2 ways to run it:</p>
                            <p>1. You can run the script step-by-step (one cell a time) by pressing <strong>Shift + Enter</strong></p>
                            <p>2. You can run the whole script in a single step by clicking on the menu <strong>Cell → Run All</strong> <code>(Recommended)</code></p>
                            <div class="row">
                                <div class="col-lg-8 col-md-6 col-6">
                                    <div class="card project_widget">
                                        <div class="pw_img">
                                            <a href="<?= base_url(); ?>/assets/images/summary_payload/step3.jpg" class="image-popup">
                                                <img class="img-responsive" src="<?= base_url(); ?>/assets/images/summary_payload/step3.jpg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <time class="cbp_tmtime" datetime="2017-11-03T13:22"><span>The result</span> <span>CSV,<br>Payload Threshold</span></time>
                        <div class="cbp_tmicon bg-orange"><i class="zmdi zmdi-equalizer"></i></div>
                        <div class="cbp_tmlabel">
                            <h2><a href="javascript:void(0);">Step 4: </a><span>The result</span></h2>
                            <p>After you execute the script, you will get 2 results:</p>
                            <p>1. CSV file of summary payload</p>
                            <p>2. payload Threshold</p>
                            <p>You can upload the <strong>CSV file of summary payload</strong> and <strong>payload threshold</strong> on <a href="<?= base_url('dataengineer/updatepayload'); ?>"><b>this page</b></a>.</p>
                            <div class="row">
                                <div class="col-lg-8 col-md-6 col-6 mb-4">
                                    <div class="card project_widget">
                                        <div class="pw_img">
                                            <a href="<?= base_url(); ?>/assets/images/summary_payload/step4a.jpg" class="image-popup">
                                                <img class="img-responsive" src="<?= base_url(); ?>/assets/images/summary_payload/step4a.jpg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 col-6 mb-4">
                                    <div class="card project_widget">
                                        <div class="pw_img">
                                            <a href="<?= base_url(); ?>/assets/images/summary_payload/step4b.jpg" class="image-popup">
                                                <img class="img-responsive" src="<?= base_url(); ?>/assets/images/summary_payload/step4b.jpg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>