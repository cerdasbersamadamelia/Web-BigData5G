<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="col-md-12 content-center">
        <div class="card-plain">
            <form class="form" action="<?= route_to('reset-password') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="header">
                    <div class="logo-container">
                        <img src="<?= base_url(); ?>/assets/images/logo.png" alt="">
                    </div>
                    <h5><?= lang('Auth.resetYourPassword') ?></h5>
                    <small><?= lang('Auth.enterCodeEmailPassword') ?></small>
                </div>
                <div class="content">
                    <!-- token -->
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <div class="input-group input-lg">
                        <input type="text" class="form-control <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>" name="token" placeholder="<?= lang('Auth.token') ?>" value="<?= old('token', $token ?? '') ?>">
                        <span class="input-group-addon">
                            <i class="zmdi zmdi-code ml-2"></i>
                            <div class="invalid-feedback">
                                <?= session('errors.token') ?>
                            </div>
                        </span>
                    </div>
                    <!-- email -->
                    <div class="input-group input-lg">
                        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                        <span class="input-group-addon">
                            <i class="zmdi zmdi-email ml-2"></i>
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </span>
                    </div>
                    <!-- new password -->
                    <div class="input-group input-lg">
                        <input type="password" name="password" id="id_NewPassword" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                        <span class="input-group-addon">
                            <i class="zmdi zmdi-eye-off mr-2" id="toggleNewPassword"></i>
                            <i class="zmdi zmdi-lock ml-2"></i>
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </span>
                    </div>
                    <!-- repeat password -->
                    <div class="input-group input-lg">
                        <input type="password" name="pass_confirm" id="id_RepeatPassword" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>">
                        <span class="input-group-addon">
                            <i class="zmdi zmdi-eye-off mr-2" id="toggleRepeatPassword"></i>
                            <i class="zmdi zmdi-lock ml-2"></i>
                            <div class="invalid-feedback">
                                <?= session('errors.pass_confirm') ?>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="footer text-center">
                    <!-- button reset password -->
                    <button type="submit" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light"><?= lang('Auth.resetPassword') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>