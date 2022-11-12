<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Data List
                    <small class="text-muted"><?php echo date("l, d-M-Y"); ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('home/home'); ?>"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item active">Data List</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- IMEI -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <!-- <h4>User List</h4> -->

                        <!-- Hover Rows -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong>Data List</strong> Summary IMEI </h2>
                                        <ul class="header-dropdown">
                                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="<?= base_url('dataengineer/updateimei'); ?>">Update Data</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body table-responsive">
                                        <a href="<?= base_url('dataengineer/updateimei'); ?>" class="btn btn-round btn bg-blue-grey waves-effect">Update Data</a>
                                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Kecamatan</th>
                                                    <th scope="col">User Support 5G</th>
                                                    <th scope="col">Percentage (%)</th>
                                                    <th scope="col">Recommended ?</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($summaryimei as $data) : ?>
                                                    <tr>
                                                        <!-- <th scope="row">1</th> -->
                                                        <td><?= $data['no_imei']; ?></td>
                                                        <td><?= $data['time']; ?></td>
                                                        <td><?= $data['kecamatan_imei']; ?></td>
                                                        <td><?= $data['user_support_5G']; ?></td>
                                                        <td><?= $data['percentage_percent']; ?></td>
                                                        <td><?= $data['recommended_imei']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Hover Rows -->

                    </div>
                </div>
            </div>
        </div>

        <!-- Payload -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <!-- <h4>User List</h4> -->

                        <!-- Hover Rows -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong>Data List</strong> Summary Payload </h2>
                                        <ul class="header-dropdown">
                                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="<?= base_url('dataengineer/updatepayload'); ?>">Update Data</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body table-responsive">
                                        <a href="<?= base_url('dataengineer/updatepayload'); ?>" class="btn btn-round btn bg-blue-grey waves-effect">Update Data</a>
                                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Kecamatan</th>
                                                    <th scope="col">Payload (MByte)</th>
                                                    <th scope="col">Recommended ?</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($summarypayload as $data) : ?>
                                                    <tr>
                                                        <td><?= $data['no_payload']; ?></td>
                                                        <td><?= $data['time']; ?></td>
                                                        <td><?= $data['kecamatan_payload']; ?></td>
                                                        <td><?= $data['payload_MB']; ?></td>
                                                        <td><?= $data['recommended_payload']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Hover Rows -->

                    </div>
                </div>
            </div>
        </div>

        <!-- GeojSON -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <!-- Hover Rows -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong>Data List</strong> GeoJSON </h2>
                                    </div>
                                    <div class="body table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Kecamatan</th>
                                                    <th scope="col">GeoJSON Name</th>
                                                    <th scope="col">Download GeoJSON</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($geojson as $data) : ?>
                                                    <tr>
                                                        <!-- <th scope="row">1</th> -->
                                                        <td><?= $i++; ?></td>
                                                        <td><?= $data['kecamatan']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('/assets/plugins/leaflet/geojson/' . $data['geojson']); ?>" target="_blank">
                                                                <?= $data['geojson']; ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form action="<?= base_url('dataengineer/download_geojson/' . $data['geojson']); ?>" method="POST">
                                                                <?= csrf_field(); ?>
                                                                <input name='download_geojson' type="hidden" value="<?= $data['geojson']; ?>">
                                                                <button type="submit" class="btn btn-default btn-icon btn-simple btn-icon-mini btn-round hidden-sm-down l-slategray">
                                                                    <i class="zmdi zmdi-archive"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Hover Rows -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Threshold -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <!-- Hover Rows -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong>Data List</strong> IMEI and Payload Threshold </h2>
                                    </div>
                                    <div class="body table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">IMEI Threshold_Depok (%)</th>
                                                    <th scope="col">Payload Threshold_Depok (MB)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($threshold as $data) : ?>
                                                    <tr>
                                                        <!-- <th scope="row">1</th> -->
                                                        <td><?= $data['imei_threshold']; ?></td>
                                                        <td><?= $data['payload_threshold']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Hover Rows -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?= $this->endSection(); ?>