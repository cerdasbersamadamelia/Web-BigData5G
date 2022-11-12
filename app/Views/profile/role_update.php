<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Request to Role Update
                    <small class="text-muted"><?php echo date("l, d-M-Y"); ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('home/home'); ?>"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item active">Role Update</li>
                </ul>
            </div>
        </div>
        <br>
        <!-- Session -->
        <?php if (session()->getFlashdata('role_update')) : ?>
            <div class="alert alert-success" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-thumb-up"></i>
                    </div>
                    <?= session()->getFlashdata('role_update'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close"></i>
                        </span>
                    </button>
                </div>
            </div>
        <?php elseif (session()->getFlashdata('role_update_fail')) : ?>
            <div class="alert alert-danger" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-block"></i>
                    </div>
                    <?= session()->getFlashdata('role_update_fail'); ?>
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
                    <div class="col-lg-4 col-md-12">
                        <div class="card weather2">
                            <div class="city-selected body l-khaki">
                                <div class="row">
                                    <div class="info col-7">
                                        <form action="<?= base_url('/profile/insert_role_update'); ?>" method="POST">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" value=<?= user()->id; ?> name="req_user_id">
                                            <div class="night mb-3 text-black">Select the Role</div>
                                            <div class="input-group">
                                                <select class="form-control show-tick" name="req_group_id">
                                                    <option value="1">Admin</option>
                                                    <option value="2">Data Engineer</option>
                                                </select>
                                            </div>
                                            <button class="btn btn-primary btn-round l-salmon" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $update_to = '-';
                            $status = '-';
                            foreach ($users as $user) {
                                // To give information about Role Update status
                                if ($user["users_id"] == user()->id) {
                                    $update_to = $user["name"];
                                    // Still process
                                    if ($user["req_active"] == 1) {
                                        $status = '<span class="badge badge-info">process</span>';
                                        // Reject by Admin
                                    } elseif ($user["req_active"] == 0) {
                                        $status = '<span class="badge badge-danger">rejected</span>';
                                    }
                                }
                            }
                            ?>
                            <table class="table table-striped m-b-0">
                                <tbody>
                                    <tr>
                                        <td>Update to</td>
                                        <td class="font-medium"><?php echo $update_to; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td class="font-medium"><?php echo $status; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
</section>
<?= $this->endSection(); ?>