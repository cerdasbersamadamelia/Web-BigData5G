<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Update Data IMEI
                    <small class="text-muted"><?php echo date("l, d-M-Y"); ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('home/home'); ?>"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('dataengineer/index'); ?>"></i>Data List</a></li>
                    <li class="breadcrumb-item active">Update Data IMEI</li>
                </ul>
            </div>
        </div>
        <br>
        <?php if (session()->getFlashdata('analysis_imei')) : ?>
            <div class="alert alert-success" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-thumb-up"></i>
                    </div>
                    <?= session()->getFlashdata('analysis_imei'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close"></i>
                        </span>
                    </button>
                </div>
            </div>
        <?php elseif (session()->getFlashdata('analysis_imei_fail')) : ?>
            <div class="alert alert-danger" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-block"></i>
                    </div>
                    <?= session()->getFlashdata('analysis_imei_fail'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close"></i>
                        </span>
                    </button>
                </div>
            </div>
        <?php elseif (session()->getFlashdata('update_imeithreshold')) : ?>
            <div class="alert alert-success" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-thumb-up"></i>
                    </div>
                    <?= session()->getFlashdata('update_imeithreshold'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close"></i>
                        </span>
                    </button>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="container-fluid">
        <!-- File Upload | Drag & Drop OR With Click & Choose -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Update</strong> with click & choose
                            <small>Update data IMEI is used to upload CSV file of a new summary IMEI that has been processed using Python before. This process will drop previous summary IMEI before inserting new values.</small>
                        </h2>
                    </div>
                    <div class="body">
                        <!-- Collapse -->
                        <div class="row clearfix">
                            <div class="col-md-12 col-lg-12 mb-3">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading" role="tab" id="heading">
                                            <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="true" aria-controls="collapse"> <i class="zmdi zmdi-alert-circle-o mr-3"></i>Terms and Conditions </a> </h4>
                                        </div>
                                        <div id="collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading">
                                            <div class="panel-body">
                                                <ol>
                                                    <li>CSV file should be analysis result, not raw data</li>
                                                    <li>The way to create CSV file of a new summary IMEI is <a href="<?= base_url('dataengineer/summaryimei'); ?>"> <b>here</b></a></li>
                                                    <li>Make sure your summary IMEI file is <code>CSV</code> with comma <code>(,)</code> separator</li>
                                                    <li>The max size of the file is <code>2 KB</code></li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- form update summary IMEIs-->
                        <form class="form-horizontal" action="<?= base_url('dataengineer/analysis_imei'); ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                    <label for="user_image">Update <strong>Summary IMEI</strong></label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" multiple class="custom-file-input <?= ($validation->hasError('file_imei') ? 'is-invalid' : ''); ?>" id="file_imei" name="file_imei" onchange="previewImg()">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('file_imei'); ?>
                                            </div>
                                            <label class="custom-file-label" for="file_imei">---Select File IMEI---</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="row clearfix">
                                <div class="col-sm-8 offset-sm-2">
                                    <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect l-turquoise">Start Update</button>
                                </div>
                            </div>
                            <br>
                        </form>
                        <?php foreach ($threshold as $data) : ?>
                            <!-- form update IMEI threshold-->
                            <form class="form-horizontal" action="<?= base_url('dataengineer/imeithreshold/' . $data['id']); ?>" method="POST">
                                <?= csrf_field(); ?>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                        <label for="user_image">Update <strong>IMEI Threshold</strong></label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="imeithreshold" value="<?= $data['imei_threshold']; ?>" class="form-control <?= ($validation->hasError('imeithreshold') ? 'is-invalid' : ''); ?>" placeholder="Ex: 0.07839770215109877">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('imeithreshold'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="row clearfix">
                                    <div class="col-sm-8 offset-sm-2">
                                        <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect g-bg-cgreen">Start Update</button>
                                    </div>
                                </div>
                                <br>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>