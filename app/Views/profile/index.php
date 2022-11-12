<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Profile
                    <small class="text-muted"><?php echo date("l, d-M-Y"); ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('home/home'); ?>"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ul>
            </div>
        </div>
        <br>
        <!-- Session -->
        <?php if (session()->getFlashdata('update_profile')) : ?>
            <div class="alert alert-success" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-thumb-up"></i>
                    </div>
                    <?= session()->getFlashdata('update_profile'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close"></i>
                        </span>
                    </button>
                </div>
            </div>
        <?php elseif (session()->getFlashdata('update_password')) : ?>
            <div class="alert alert-success" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-thumb-up"></i>
                    </div>
                    <?= session()->getFlashdata('update_password'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close"></i>
                        </span>
                    </button>
                </div>
            </div>
        <?php elseif (session()->getFlashdata('currpass=newpass')) : ?>
            <div class="alert alert-danger" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-block"></i>
                    </div>
                    <?= session()->getFlashdata('currpass=newpass'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close"></i>
                        </span>
                    </button>
                </div>
            </div>
        <?php elseif (session()->getFlashdata('wrong_curr_pass')) : ?>
            <div class="alert alert-danger" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-block"></i>
                    </div>
                    <?= session()->getFlashdata('wrong_curr_pass'); ?>
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
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card member-card">
                    <div class="header l-cyan">
                        <h4 class="m-t-10"><?= user()->username; ?></h4>
                    </div>
                    <div class="member-img">
                        <a href="" class="">
                            <img src="<?= base_url('/assets/images/user_image/' . user()->user_image); ?>" class="img-fluid rounded-start" alt="<?= user()->username; ?>">
                    </div>
                    <div class="body">
                        <hr>
                        <div class="tab-content">
                            <div class="tab-pane body active" id="">
                                <small class="text-muted">Fullname: </small>
                                <p><?= user()->fullname; ?></p>
                                <hr>
                                <small class="text-muted">Email address: </small>
                                <p><?= user()->email; ?></p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#editprofile"><i class="zmdi zmdi-account"></i> Edit Profile</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#changepassword"><i class="zmdi zmdi-shield-security"></i> Change Password</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <!-- editprofile -->
                    <div role="tabpanel" class="tab-pane active" id="editprofile">
                        <!-- User Account -->
                        <div class="card">
                            <div class="header">
                                <h2><strong>Edit</strong> Profile</h2>
                            </div>
                            <div class="body">
                                <form class="form-horizontal" form action="<?= base_url('/profile/update/' . user()->id); ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="old_user_image" value="<?= user()->user_image; ?>">
                                    <!-- Email -->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                            <label for="email">Email Address</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            <div class="form-group">
                                                <input type="text" name="email" value="<?= user()->email; ?>" class="form-control email" placeholder="Ex: example@example.com" readonly>
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
                                                <input type="text" name="username" value="<?= user()->username; ?>" class="form-control <?= ($validation->hasError('username') ? 'is-invalid' : ''); ?>" placeholder="Ex: damel">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('username'); ?>
                                                </div>
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
                                                <input type="text" name="fullname" value="<?= user()->fullname; ?>" class="form-control" placeholder="Ex: Damelia">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Profile image -->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                            <label for="user_image">Profile Image</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            <div class="form-group">
                                                <table class="col-lg-10 col-md-10 col-sm-8">
                                                    <tr>
                                                        <td>
                                                            <img src="<?= base_url(); ?>/assets/images/user_image/<?= user()->user_image; ?>" class="img-thumbnail img-preview" width="100">
                                                        </td>
                                                        <td>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input <?= ($validation->hasError('user_image') ? 'is-invalid' : ''); ?>" id="user_image" name="user_image" onchange="previewImg()">
                                                                <div class="invalid-feedback">
                                                                    <?= $validation->getError('user_image'); ?>
                                                                </div>
                                                                <label class="custom-file-label" for="user_image"><?= user()->user_image; ?></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <div class="row clearfix">
                                        <div class="col-sm-8 offset-sm-2">
                                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect g-bg-soundcloud">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- changepassword -->
                    <div role="tabpanel" class="tab-pane body" id="changepassword">
                        <div class="card">
                            <div class="header">
                                <h2><strong>Change</strong> Password</h2>
                            </div>
                            <div class="body">
                                <form action="<?= base_url('profile/update_password/' . user()->id); ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="old_password" value="<?= user()->password_hash; ?>">
                                    <!-- Current password -->
                                    <div class="input-group">
                                        <input id="id_CurrentPassword" name="current_password" type="password" class="form-control <?= ($validation->hasError('current_password') ? 'is-invalid' : ''); ?>" placeholder="Current Password" value="<?= old('current_password') ?>">
                                        <span class="input-group-addon">
                                            <i class="zmdi zmdi-eye-off ml-2" id="toggleCurrentPassword"></i>
                                        </span>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('current_password'); ?>
                                        </div>
                                    </div>
                                    <!-- New password -->
                                    <div class="input-group">
                                        <input id="id_NewPassword" name="new_password" type="password" class="form-control <?= ($validation->hasError('new_password') ? 'is-invalid' : ''); ?>" placeholder="New Password" value="<?= old('new_password') ?>">
                                        <span class="input-group-addon">
                                            <i class="zmdi zmdi-eye-off ml-2" id="toggleNewPassword"></i>
                                        </span>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('new_password'); ?>
                                        </div>
                                    </div>
                                    <!-- Repeat password -->
                                    <div class="input-group">
                                        <input id="id_RepeatPassword" name="repeat_password" type="password" class="form-control <?= ($validation->hasError('repeat_password') ? 'is-invalid' : ''); ?>" placeholder="Repeat New Password" value="<?= old('repeat_password') ?>">
                                        <span class="input-group-addon">
                                            <i class="zmdi zmdi-eye-off ml-2" id="toggleRepeatPassword"></i>
                                        </span>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('repeat_password'); ?>
                                        </div>
                                    </div>
                                    <button class="btn btn-info btn-round g-bg-blue">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>