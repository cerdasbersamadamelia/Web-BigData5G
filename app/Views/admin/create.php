<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Create User
                    <small class="text-muted"><?php echo date("l, d-M-Y"); ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('home/home'); ?>"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/index'); ?>"></i>Account Validation</a></li>
                    <li class="breadcrumb-item active">Create User</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Register </strong>New User</h2>
                    </div>
                    <div class="body">
                        <!-- <h2 class="card-inside-title">Basic Examples</h2> -->
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form class="form-horizontal" action="<?= base_url('admin/register'); ?>" method="post" class="form">
                                    <?= csrf_field() ?>
                                    <!-- Email -->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                            <label for="email">Email Address</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Username -->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                            <label for="username">Username</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fullname -->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                            <label for="fullname">Fullname</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="fullname" placeholder="Full Name" value="<?= old('fullname') ? old('fullname') : '' ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Password -->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            <div class="input-group">
                                                <input id="id_NewPassword" type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off" value="$bigData5G">
                                                <span class="input-group-addon">
                                                    <i class="zmdi zmdi-eye-off ml-2" id="toggleNewPassword"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Password confirm -->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                            <label for="password_confirm">Password Confirm</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            <div class="input-group">
                                                <input id="id_RepeatPassword" type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off" value="$bigData5G">
                                                <span class="input-group-addon">
                                                    <i class="zmdi zmdi-eye-off ml-2" id="toggleRepeatPassword"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <div class="row clearfix">
                                        <div class="col-sm-8 offset-sm-2">
                                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect"><?= lang('Auth.register') ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Input -->
    </div>
</section>
<?= $this->endSection(); ?>