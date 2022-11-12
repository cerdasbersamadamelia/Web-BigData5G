<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Account Validation
                    <small class="text-muted"><?php echo date("l, d-M-Y"); ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('home/home'); ?>"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item active">Account Validation</li>
                </ul>
            </div>
        </div>
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
                                        <!-- Message after create user -->
                                        <?= view('Myth\Auth\Views\_message_block') ?>
                                        <!-- Message after update data -->
                                        <?php if (session()->getFlashdata('register')) : ?>
                                            <div class="alert alert-success" role="alert">
                                                <div class="container">
                                                    <div class="alert-icon">
                                                        <i class="zmdi zmdi-thumb-up"></i>
                                                    </div>
                                                    <?= session()->getFlashdata('register'); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">
                                                            <i class="zmdi zmdi-close"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php elseif (session()->getFlashdata('delete')) : ?>
                                            <div class="alert alert-success" role="alert">
                                                <div class="container">
                                                    <div class="alert-icon">
                                                        <i class="zmdi zmdi-thumb-up"></i>
                                                    </div>
                                                    <?= session()->getFlashdata('delete'); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">
                                                            <i class="zmdi zmdi-close"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- Message after validate data -->
                                        <?php elseif (session()->getFlashdata('accept')) : ?>
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
                                            </div>
                                        <?php endif; ?>
                                        <div class="button-demo js-modal-buttons">
                                            <a href="<?= base_url('admin/create'); ?>" class="btn btn-raised btn-info btn-simple btn-round">Create User</a>
                                        </div>
                                    </div>
                                    <div class="body table-responsive">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">User Image</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Role</th>
                                                    <th scope="col">Validation</th>
                                                    <th scope="col">More Info</th>
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
                                                        <td><?= $user['username']; ?></td>
                                                        <td><?= $user['email']; ?></td>
                                                        <td><?= $user['name']; ?></td>

                                                        <!-- User activation button -->
                                                        <td>
                                                            <form action="<?= base_url('admin/validation/' . $user['users_id']); ?>" method="POST">
                                                                <?= csrf_field(); ?>
                                                                <?php
                                                                if ($user['active'] == '1')
                                                                    if ($user['group_id'] == '1' | $user['group_id'] == '2' | $user['group_id'] == '3')
                                                                        echo '<span class="badge badge-info">Validated</span>';
                                                                    elseif ($user['group_id'] == '4')
                                                                        echo '<button type="submit" name="group_id" value="3" class="btn bg-light-green btn-raised btn-primary waves-effect btn-round" data-type="success">Accept</button>',
                                                                        '<button type="submit" name="active" value="0" class="btn bg-red btn-raised btn-primary waves-effect btn-round" data-type="confirm" onclick="return confirm(\'Are you sure want to reject user?\');">Reject</button>';
                                                                if ($user['active'] == '0')
                                                                    echo '<span class="badge badge-danger">Not Validated</span>';
                                                                ?>
                                                            </form>
                                                        </td>

                                                        <!-- Detail button -->
                                                        <td>
                                                            <a href="<?= base_url('admin/' . $user['users_id']); ?>" class="btn btn-info btn-round">Detail</a>
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