<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="col-md-12 content-center">
        <div class="card-plain">
            <form class="form" action="<?= route_to('login') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="header">
                    <div class="logo-container">
                        <img src="<?= base_url(); ?>/assets/images/logo.png" alt="">
                    </div>
                    <h5>Hello!</h5>
                    <span>Login to your account</span>
                </div>
                <div class="content">
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <!-- email -->
                    <?php if ($config->validFields === ['email']) : ?>
                        <div class="input-group input-lg">
                            <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>" autofocus>
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle ml-2"></i>
                            </span>
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <!-- username -->
                        <div class="input-group input-lg">
                            <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account ml-2"></i>
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </span>
                        </div>
                    <?php endif; ?>
                    <!-- password -->
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
                    <!-- Captcha -->
                    <div class="container_captcha">
                        <div name="captcha" class="g-recaptcha" data-sitekey="6LdIrNsgAAAAAFZqXsC_wkZMeswLdsJhN4_79SNx"></div>
                    </div>

                    <!-- AllowRemembering -->
                    <?php if ($config->allowRemembering) : ?>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                <?= lang('Auth.rememberMe') ?>
                            </label>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="footer text-center">
                    <!-- button login -->
                    <button type="submit" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light"><?= lang('Auth.loginAction') ?></button>

                    <!-- register -->
                    <?php if ($config->allowRegistration) : ?>
                        <h6 class="m-t-20"> <a class='link' href="<?= route_to('register') ?>"> <?= lang('Auth.needAnAccount') ?></a></h6>
                    <?php endif; ?>

                    <!-- forgot password -->
                    <!-- <h7 class="m-t-20"><a href="forgot-password.html" class="link">Forgot Password?</a></h7> -->
                    <?php if ($config->activeResetter) : ?>
                        <h7 class="m-t-20"> <a class='link' href="<?= route_to('forgot') ?>"> <?= lang('Auth.forgotYourPassword') ?></a></h7>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>