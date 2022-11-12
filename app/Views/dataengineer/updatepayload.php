<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Update Data Payload
                    <small class="text-muted"><?php echo date("l, d-M-Y"); ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('home/home'); ?>"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('dataengineer/index'); ?>"></i>Data List</a></li>
                    <li class="breadcrumb-item active">Update Data Payload</li>
                </ul>
            </div>
        </div>
        <br>
        <?php if (session()->getFlashdata('analysis_payload')) : ?>
            <div class="alert alert-success" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-thumb-up"></i>
                    </div>
                    <?= session()->getFlashdata('analysis_payload'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close"></i>
                        </span>
                    </button>
                </div>
            </div>
        <?php elseif (session()->getFlashdata('analysis_payload_fail')) : ?>
            <div class="alert alert-danger" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-block"></i>
                    </div>
                    <?= session()->getFlashdata('analysis_payload_fail'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close"></i>
                        </span>
                    </button>
                </div>
            </div>
        <?php elseif (session()->getFlashdata('update_payloadthreshold')) : ?>
            <div class="alert alert-success" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-thumb-up"></i>
                    </div>
                    <?= session()->getFlashdata('update_payloadthreshold'); ?>
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
                            <!-- <small>Update data payload is used to analyzes the raw data of payload into a new summary payload using <b>Python</b>. This process will drop previous summary payload before inserting new values.</small> -->
                            <small>Update data payload is used to upload CSV file of a new summary payload that has been processed using <b>Python</b> before. This process will drop previous summary payload before inserting new values.</small>
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
                                                    <li>The way to create CSV file of a new summary payload is <a href="<?= base_url('dataengineer/summarypayload'); ?>"> <b>here</b></a></li>
                                                    <li>Make sure your summary payload file is <code>CSV</code> with comma <code>(,)</code> separator</li>
                                                    <li>The max size of the file is <code>2 KB</code></li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- form -->
                        <form class="form-horizontal" action="<?= base_url('dataengineer/analysis_payload'); ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                    <label for="user_image">Update <strong>Summary Payload</strong></label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input <?= ($validation->hasError('file_payload') ? 'is-invalid' : ''); ?>" id="file_payload" name="file_payload" onchange="previewImg()">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('file_payload'); ?>
                                            </div>
                                            <label class="custom-file-label" for="file_payload">---Select File Payload---</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="row clearfix">
                                <div class="col-sm-8 offset-sm-2">
                                    <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect l-salmon">Start Update</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <!-- form update payload threshold-->
                        <?php foreach ($threshold as $data) : ?>
                            <form class="form-horizontal" action="<?= base_url('dataengineer/payloadthreshold/' . $data['id']); ?>" method="POST">
                                <?= csrf_field(); ?>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                        <label for="user_image">Update <strong>Payload Threshold</strong></label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="payloadthreshold" value="<?= $data['payload_threshold']; ?>" class="form-control <?= ($validation->hasError('payloadthreshold') ? 'is-invalid' : ''); ?>" placeholder="Ex: 0.07839770215109877">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('payloadthreshold'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="row clearfix">
                                    <div class="col-sm-8 offset-sm-2">
                                        <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect bg-teal">Start Update</button>
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