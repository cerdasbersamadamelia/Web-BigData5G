<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Role Update Validation
                    <small class="text-muted"><?php echo date("l, d-M-Y"); ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('home/home'); ?>"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item active">Role Update Validation</li>
                </ul>
            </div>
        </div>
        <br>
        <!-- Session -->
        <?php if (session()->getFlashdata('accept')) : ?>
            <div class="alert alert-success" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-thumb-up"></i>
                    </div>
                    <?= session()->getFlashdata('accept'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close"></i>
                        </span>
                    </button>
                </div>
            </div>
        <?php elseif (session()->getFlashdata('reject')) : ?>
            <div class="alert alert-danger" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-block"></i>
                    </div>
                    <?= session()->getFlashdata('reject'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close"></i>
                        </span>
                    </button>
                </div>
            <?php endif; ?>
            </div>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                                <!-- Hover Rows -->
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="header">
                                            </div>
                                            <div class="body table-responsive">
                                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">User Image</th>
                                                            <th scope="col">Username</th>
                                                            <th scope="col">Request Role</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($users as $user) : ?>
                                                            <tr>
                                                                <th scope="row"><?= $i++; ?></th>
                                                                <td>
                                                                    <img style="width:40px;" class="rounded avatar" src="<?= base_url('/assets/images/user_image/' . $user['user_image']); ?>" alt="">
                                                                </td>
                                                                <td><?= $user["username"]; ?></td>
                                                                <td><?= $user["name"]; ?></td>
                                                                <!-- Role update activation button -->
                                                                <td>
                                                                    <form action="<?= base_url("admin/validation_role/" . $user["users_id"]); ?>" method="POST">
                                                                        <?= csrf_field(); ?>
                                                                        <?php
                                                                        if ($user["req_active"] == "1") {
                                                                            if ($user["group_id"] == "1" | $user["group_id"] == "2") {
                                                                                echo '<span class="badge badge-info">Validated</span>';
                                                                            } elseif ($user["group_id"] == "3") { ?>
                                                                                <button type="submit" name="group_id" value=<?= $user["req_group_id"]; ?> class="btn g-bg-cgreen btn-raised btn-primary waves-effect btn-round" data-type="success">Accept</button>
                                                                                <button type="submit" name="req_active" value="0" class="btn g-bg-blush2 btn-raised btn-primary waves-effect btn-round" data-type="confirm" onclick="return confirm('Are you sure want to reject role update?');">Reject</button>
                                                                            <?php } ?>
                                                                        <?php
                                                                        }
                                                                        if ($user["req_active"] == "0") {
                                                                            echo '<span class="badge badge-danger">Not Validated</span>';
                                                                        }
                                                                        ?>
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
            </div>
</section>
<?= $this->endSection(); ?>