<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="col-md-12 content-center">
        <div class="card-plain">
            <form class="form" action="<?= route_to('forgot') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="header">
                    <div class="logo-container">
                        <img src="<?= base_url(); ?>/assets/images/logo.png" alt="">
                    </div>
                    <h5>Forgot Password?</h5>
                    <span>Enter your e-mail address below to reset your password.</span>
                </div>
                <div class="content">
                    <div class="input-group input-lg">
                        <?= view('Myth\Auth\Views\_message_block') ?>
                        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                        <span class="input-group-addon">
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                            <i class="zmdi zmdi-email ml-2"></i>
                        </span>
                    </div>
                </div>
                <div class="footer text-center">
                    <!-- button login -->
                    <button type="submit" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light"><?= lang('Auth.sendInstructions') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>