<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href=""><img src="<?= base_url(); ?>/assets/images/user_image/<?= user()->user_image; ?>" alt="User"></a></div>
                    <div class="detail">
                        <h4><?= user()->username; ?></h4>
                        <!-- <small>role</small> -->
                    </div>
                    <?php if (in_groups(['business user', 'data engineer', 'admin'])) : ?>
                        <a href="<?= base_url('coveragemap/cimeipayload'); ?>" title="Coverage Map based on IMEI and Payload"><i class="zmdi zmdi-pin"></i></a>
                        <a href="<?= base_url('recommendation/rimeipayload'); ?>" title="Recommendation based on IMEI and Payload"><i class="zmdi zmdi-equalizer"></i></a>
                    <?php endif; ?>
                    <a href="<?= base_url('profile/index'); ?>" title="My Profile"><i class="zmdi zmdi-account-box"></i></a>
                    <a href="<?= base_url('logout'); ?>" title="Sign out"><i class="zmdi zmdi-power"></i></a>
                </div>
            </li>


            <!-- <li class="header">INTRO</li>
            <li> <a href="?= base_url('home/home'); ?>"><i class="zmdi zmdi-home"></i><span>Home</span> </a>
            </li> -->

            <?php if (in_groups(['business user', 'data engineer', 'admin'])) : ?>
                <li class="header">ANALYSIS</li>
                <li <?php if ($title == 'Coverage Map: IMEI' || $title == 'Coverage Map: Payload' || $title == 'Coverage Map: IMEI & Payload') echo "class='active open'"; ?>>
                    <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-map"></i><span>Coverage Map</span></a>
                    <ul class="ml-menu">
                        <li <?php if ($title == 'Coverage Map: IMEI') echo "class='active'"; ?>><a href="<?= base_url('coveragemap/cimei'); ?>">Based on IMEI</a> </li>
                        <li <?php if ($title == 'Coverage Map: Payload') echo "class='active'"; ?>><a href="<?= base_url('coveragemap/cpayload'); ?>">Based on Payload</a></li>
                        <li <?php if ($title == 'Coverage Map: IMEI & Payload') echo "class='active'"; ?>><a href="<?= base_url('coveragemap/cimeipayload'); ?>">Based on IMEI & Payload</a></li>
                    </ul>
                </li>

                <li <?php if ($title == 'Recommendation: IMEI' || $title == 'Recommendation: Payload' || $title == 'Recommendation: IMEI & Payload') echo "class='active open'"; ?>>
                    <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-chart"></i><span>Recommendation</span></a>
                    <ul class="ml-menu">
                        <li <?php if ($title == 'Recommendation: IMEI') echo "class='active'"; ?>><a href="<?= base_url('recommendation/rimei'); ?>">Based on IMEI</a> </li>
                        <li <?php if ($title == 'Recommendation: Payload') echo "class='active'"; ?>><a href="<?= base_url('recommendation/rpayload'); ?>">Based on Payload</a></li>
                        <li <?php if ($title == 'Recommendation: IMEI & Payload') echo "class='active'"; ?>><a href="<?= base_url('recommendation/rimeipayload'); ?>">Based on IMEI & Payload</a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (in_groups('data engineer')) : ?>
                <li class="header">DATA MANAGEMENT</li>
                <li <?php if ($title == 'Data List' || $title == 'Update Data IMEI' || $title == 'Create Summary IMEI' || $title == 'Update Data Payload' || $title == 'Create Summary Payload') echo "class='active'"; ?>><a href="<?= base_url('dataengineer'); ?>"><i class="zmdi zmdi-assignment"></i><span>Data List</span></a></li>
            <?php endif; ?>

            <?php if (in_groups('admin')) : ?>
                <li class="header">USER MANAGEMENT</li>
                <li <?php if ($title == 'Account Validation' || $title == 'Role Update Validation' || $title == 'Form Create User' || $title == 'User Detail') echo "class='active open'"; ?>>
                    <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts-alt"></i><span>User List</span></a>
                    <ul class="ml-menu">
                        <li <?php if ($title == 'Account Validation' || $title == 'Form Create User' || $title == 'User Detail') echo "class='active'"; ?>><a href="<?= base_url('admin'); ?>">Account Validation</a></li>
                        <li <?php if ($title == 'Role Update Validation') echo "class='active'"; ?>><a href="<?= base_url('admin/role_update_validation'); ?>">Role Update Validation</a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (in_groups('business user')) : ?>
                <li class="header">MANAGE PROFILE</li>
                <li <?php if ($title == 'My Profile' || $title == 'Request to Role Update') echo "class='active open'"; ?>>
                    <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-box-mail"></i><span>Profile</span></a>
                    <ul class="ml-menu">
                        <li <?php if ($title == 'My Profile') echo "class='active'"; ?>><a href="<?= base_url('profile/index'); ?>">My Profile</a></li>
                        <li <?php if ($title == 'Request to Role Update') echo "class='active'"; ?>><a href="<?= base_url('profile/role_update'); ?>">Role Update</a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (in_groups(['data engineer', 'admin', 'default user'])) : ?>
                <li class="header">MANAGE PROFILE</li>
                <li <?php if ($title == 'My Profile') echo "class='active'"; ?>><a href="<?= base_url('profile/index'); ?>"><i class="zmdi zmdi-account-box-mail"></i><span>Profile</span></a></li>
            <?php endif; ?>

            <li class="header">EXTRA</li>
            <li <?php if ($title == 'About Us') echo "class='active'"; ?>><a href="<?= base_url('extra/aboutus'); ?>"><i class="zmdi zmdi-alert-circle"></i><span>About Us</span></a></li>
            <li <?php if ($title == 'Help') echo "class='active'"; ?>><a href="<?= base_url('extra/help'); ?>"><i class="zmdi zmdi-help-outline"></i><span>Help</span></a></li>
        </ul>
    </div>
</aside>