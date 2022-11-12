<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="col-md-12 content-center">
        <div class="card-plain">
            <form action="<?= route_to('register') ?>" method="post" class="form">
                <?= csrf_field() ?>
                <div class="header">
                    <div class="logo-container">
                        <img src="<?= base_url(); ?>/assets/images/logo.png" alt="">
                    </div>
                    <h5>Hello!</h5>
                    <span>Welcome to Registration</span>
                </div>
                <div class="content">
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <!-- email -->
                    <div class="input-group">
                        <input type="text" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" autofocus>
                        <span class="input-group-addon">
                            <i class="zmdi zmdi-email ml-2"></i>
                        </span>
                    </div>
                    <!-- username -->
                    <div class="input-group">
                        <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                        <span class="input-group-addon">
                            <i class="zmdi zmdi-account-circle ml-2"></i>
                        </span>
                    </div>
                    <!-- full name -->
                    <div class="input-group">
                        <input type="text" class="form-control" name="fullname" placeholder="Full Name" value="<?= old('fullname') ? old('fullname') : '' ?>">
                        <span class="input-group-addon">
                            <i class="zmdi zmdi-account-circle ml-2"></i>
                        </span>
                    </div>
                    <!-- Password -->
                    <div class="input-group">
                        <input type="password" id="id_NewPassword" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                        <span class="input-group-addon">
                            <i class="zmdi zmdi-eye-off mr-2" id="toggleNewPassword"></i>
                            <i class="zmdi zmdi-lock ml-2"></i>
                        </span>
                    </div>
                    <!-- Password confirm -->
                    <div class="input-group">
                        <input type="password" id="id_RepeatPassword" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                        <span class="input-group-addon">
                            <i class="zmdi zmdi-eye-off mr-2" id="toggleRepeatPassword"></i>
                            <i class="zmdi zmdi-lock ml-2"></i>
                        </span>
                    </div>
                    <!-- Captcha -->
                    <div class="container_captcha">
                        <div name="captcha" class="g-recaptcha" data-sitekey="6LdIrNsgAAAAAFZqXsC_wkZMeswLdsJhN4_79SNx"></div>
                    </div>

                </div>
                <div class="footer text-center">
                    <button type="submit" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light"><?= lang('Auth.register') ?></button>
                    <h6 class="m-t-20"> <a class='link' href="<?= route_to('login') ?>"><?= lang('Auth.alreadyRegistered') ?> <?= lang('Auth.signIn') ?></a></h6>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>