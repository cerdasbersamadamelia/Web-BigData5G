<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Detail
                    <small class="text-muted"><?php echo date("l, d-M-Y"); ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('home/home'); ?>"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/index'); ?>"></i>Account Validation</a></li>
                    <li class="breadcrumb-item active">Detail</li>
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
        <?php elseif (session()->getFlashdata('role_update')) : ?>
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
        <?php endif; ?>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <!-- data user -->
            <div class="col-lg-4 col-md-12">
                <!-- card 1 -->
                <div class="card member-card">
                    <div class="header l-parpl">
                        <h4 class="m-t-10"><?= $user['username']; ?></h4>
                    </div>
                    <div class="member-img">
                        <a href="profile.html" class="">
                            <img src="<?= base_url('/assets/images/user_image/' . $user['user_image']); ?>" class="rounded-circle" alt="<?= $user['username']; ?>">
                        </a>
                    </div>
                    <!-- validation status -->
                    <div class="body">
                        <div class="col-12">
                            <?php
                            if ($user['active'] == '1')
                                if ($user['group_id'] == '1' | $user['group_id'] == '2' | $user['group_id'] == '3')
                                    echo '<p><span class="badge badge-info">Validated</span>';
                                elseif ($user['group_id'] == '4')
                                    echo '<p><span class="badge badge-default">Not Validated Yet</span>';
                            if ($user['active'] == '0')
                                echo '<p><span class="badge badge-danger">Not Validated</span>';
                            ?>
                        </div>
                        <hr>
                    </div>
                </div>
                <!-- card 2 -->
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#about"><i class="zmdi zmdi-check-all"></i> About</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#activity"> <i class="zmdi zmdi-run"></i> Activity</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane body active" id="about">
                            <small class="text-muted">Email address: </small>
                            <p><?= $user['email']; ?></p>
                            <hr>
                            <small class="text-muted">Fullname: </small>
                            <p><?= $user['fullname']; ?></p>
                            <hr>
                            <small class="text-muted">Role: </small>
                            <p><span class="badge badge-<?= ($user['name'] == 'admin') ? 'success' : 'warning'; ?>"><?= $user['name']; ?></span></p>
                            <hr>
                            <form action="/admin/<?= $user['users_id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <div class="col text-center">
                                    <button type="submit" class="btn bg-red btn-raised btn-primary waves-effect btn-round" onclick="return confirm('Are you sure want to delete <?= $user['username']; ?>?');">Delete User</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane body" id="activity">
                            <small class="text-muted">Status Active: </small>
                            <p><?= $user['active']; ?></p>
                            <hr>
                            <small class="text-muted">Create At: </small>
                            <p><?= $user['created_at']; ?></p>
                            <hr>
                            <small class="text-muted">Update At: </small>
                            <p><?= $user['updated_at']; ?></p>
                            <hr>
                            <small class="text-muted">Reset At: </small>
                            <p><?= $user['reset_at']; ?></p>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>

            <!-- update data user -->
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#users"><i class="zmdi zmdi-account"></i> Account</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#authgroupsusers"><i class="zmdi zmdi-shield-security"></i> Role</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#securitysettings"><i class="zmdi zmdi-settings"></i> Security</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <!-- Account -->
                    <div role="tabpanel" class="tab-pane active" id="users">
                        <!-- User Account -->
                        <div class="card">
                            <div class="header">
                                <h2><strong>Account</strong> Settings</h2>
                            </div>
                            <div class="body">
                                <form class="form-horizontal" action="<?= base_url('admin/update/' . $user['users_id']); ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="old_user_image" value="<?= $user['user_image']; ?>">
                                    <!-- Email -->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                            <label for="email">Email Address</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            <div class="form-group">
                                                <input type="text" name="email" value="<?= $user['email']; ?>" class="form-control" placeholder="Ex: example@example.com" readonly>
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
                                                <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control <?= ($validation->hasError('username') ? 'is-invalid' : ''); ?>" placeholder="Ex: damel">
                                                <div class="invalid-feedback">
                                                    <!-- ?= $validation->listErrors(); ?> -->
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
                                                <input type="text" name="fullname" value="<?= $user['fullname']; ?>" class="form-control" placeholder="Ex: Damelia">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- User image -->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                            <label for="user_image">User Image</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            <div class="form-group">
                                                <table class="col-lg-10 col-md-10 col-sm-8">
                                                    <tr>
                                                        <td>
                                                            <img src="<?= base_url('/assets/images/user_image/' . $user['user_image']); ?>" class="img-thumbnail img-preview" width="100">
                                                        </td>
                                                        <td>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input <?= ($validation->hasError('user_image') ? 'is-invalid' : ''); ?>" id="user_image" name="user_image" onchange="previewImg()">
                                                                <div class="invalid-feedback">
                                                                    <?= $validation->getError('user_image'); ?>
                                                                </div>
                                                                <label class="custom-file-label" for="user_image"><?= $user['user_image']; ?></label>
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
                                            <button type="submit" class="btn g-bg-blush2 btn-round waves-effect">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Role -->
                    <div role="tabpanel" class="tab-pane" id="authgroupsusers">
                        <div class="card">
                            <div class="header">
                                <h2><strong>Role</strong> Settings</h2>
                            </div>
                            <div class="body">
                                <form action="<?= base_url('admin/role_update/' . $user['users_id']); ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <div class="row clearfix">
                                        <div class="col-lg-5 col-md-6"> <b>Select a Role</b>
                                            <div class="input-group">
                                                <!-- <select class="form-control show-tick" name="group_id">
                                                    <option value="1">Admin</option>
                                                    <option value="2">Data Engineer</option>
                                                    <option value="2">Business User</option>
                                                </select> -->
                                                <select class="form-control show-tick" name="group_id">
                                                    <?php
                                                    if ($user['group_id'] == '1')
                                                        echo '<option value="1" selected="selected">Admin</option>',
                                                        '<option value="2">Data Engineer</option>',
                                                        '<option value="3">Business User</option>',
                                                        '<option value="4">Default</option>';
                                                    elseif ($user['group_id'] == '2')
                                                        echo '<option value="1">Admin</option>',
                                                        '<option value="2" selected="selected">Data Engineer</option>',
                                                        '<option value="3">Business User</option>',
                                                        '<option value="4">Default</option>';
                                                    elseif ($user['group_id'] == '3')
                                                        echo '<option value="1">Admin</option>',
                                                        '<option value="2">Data Engineer</option>',
                                                        '<option value="3" selected="selected">Business User</option>',
                                                        '<option value="4">Default</option>';
                                                    elseif ($user['group_id'] == '4')
                                                        echo '<option value="1">Admin</option>',
                                                        '<option value="2">Data Engineer</option>',
                                                        '<option value="3">Business User</option>',
                                                        '<option value="4" selected="selected">Default</option>';
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn bg-light-green btn-round" type="submit">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Security Setting -->
                    <div role="tabpanel" class="tab-pane" id="securitysettings">
                        <!-- User Password -->
                        <div class="card">
                            <div class="header">
                                <h2><strong>Security</strong> Settings</h2>
                            </div>
                            <div class="body">
                                <form action="<?= base_url('admin/update_password/' . $user['users_id']); ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="old_password" value="<?= $user['password_hash']; ?>">
                                    <!-- Current password -->
                                    <div class="form-group">
                                        <input name="current_password" type="text" class="form-control" placeholder="Current Password" value="<?= $user['password_hash']; ?>" disabled>
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
                                    <p><small>Default Password: <b>$bigData5G</b></small></p>
                                    <button class="btn l-turquoise btn-round">Save Changes</button>
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