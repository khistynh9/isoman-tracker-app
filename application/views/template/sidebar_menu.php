<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <li id="dashboardMainMenu">
                <a href="<?= base_url('dashboard') ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <?php if ($user_hak) : ?>
                <!-- Puskesmas -->
                <?php if (in_array('createPuskesmas', $user_hak) || in_array('updatePuskesmas', $user_hak) || in_array('viewPuskesmas', $user_hak) || in_array('deletePuskesmas', $user_hak)) : ?>
                    <li id="puskesmasMainNav"><a href="<?= base_url('puskesmas') ?>"><i class="fa fa-hospital-o"></i> <span>Puskesmas</span></a></li>
                <?php endif; ?>

                <!-- Jabatan -->
                <?php if (in_array('createJabatan', $user_hak) || in_array('updateJabatan', $user_hak) || in_array('viewJabatan', $user_hak) || in_array('deleteJabatan', $user_hak)) : ?>
                    <li class="treeview" id="jabatanMainNav">
                        <a href="#">
                            <i class="fa fa-table"></i>
                            <span>Jabatan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <?php if (in_array('createJabatan', $user_hak)) : ?>
                                <li id="createJabatanSubMenu"><a href="<?= base_url('jabatan/tambah') ?>"><i class="fa fa-circle-o"></i> Tambah Jabatan</a></li>
                            <?php endif; ?>
                            <?php if (in_array('updateJabatan', $user_hak) || in_array('viewJabatan', $user_hak) || in_array('deleteJabatan', $user_hak)) : ?>
                                <li id="manageJabatanSubMenu"><a href="<?= base_url('jabatan') ?>"><i class="fa fa-circle-o"></i> Kelola Jabatan</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- USers -->
                <?php if (in_array('createUser', $user_hak) || in_array('updateUser', $user_hak) || in_array('viewUser', $user_hak) || in_array('deleteUser', $user_hak)) : ?>
                    <li class="treeview" id="userMainNav">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Users</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <?php if (in_array('createUser', $user_hak)) : ?>
                                <li id="createUserSubNav"><a href="<?= base_url('users/tambah') ?>"><i class="fa fa-circle-o"></i> Tambah User</a></li>
                            <?php endif; ?>
                            <?php if (in_array('updateUser', $user_hak) || in_array('viewUser', $user_hak) || in_array('deleteUser', $user_hak)) : ?>
                                <li id="manageUserSubNav"><a href="<?= base_url('users') ?>"><i class="fa fa-circle-o"></i> Kelola Users</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <!--pasien -->
                <?php if (in_array('createPasien', $user_hak) || in_array('updatePasien', $user_hak) || in_array('viewPasien', $user_hak) || in_array('deletePasien', $user_hak)) : ?>
                    <li class="treeview" id="pasienMainNav">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>Pasien</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <?php if (in_array('createPasien', $user_hak)) : ?>
                                <li id="createPasienSubNav"><a href="<?= base_url('pasien/tambah') ?>"><i class="fa fa-circle-o"></i> Tambah Pasien</a></li>
                                <li id="createPasienLokSubNav"><a href="<?= base_url('pasien/tambah_lokasi') ?>"><i class="fa fa-circle-o"></i> Tambah Lokasi Pasien</a></li>
                            <?php endif; ?>
                            <?php if (in_array('updatePasien', $user_hak) || in_array('viewPasien', $user_hak) || in_array('deletePasien', $user_hak)) : ?>
                                <li id="managePasienSubNav"><a href="<?= base_url('pasien/') ?>"><i class="fa fa-circle-o"></i> Kelola Pasien</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <!--info -->
                <?php if (in_array('createPasien', $user_hak) || in_array('updatePasien', $user_hak) || in_array('viewPasien', $user_hak) || in_array('deletePasien', $user_hak)) : ?>
                    <li class="treeview" id="infoMainNav">
                        <a href="#">
                            <i class="fa fa-newspaper-o"></i>
                            <span>Informasi</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <?php if (in_array('createPasien', $user_hak)) : ?>
                                <li id="createInfoSubNav"><a href="<?= base_url('Info/tambah') ?>"><i class="fa fa-circle-o"></i> Tambah Informasi</a></li>
                            <?php endif; ?>
                            <?php if (in_array('updatePasien', $user_hak) || in_array('viewPasien', $user_hak) || in_array('deletePasien', $user_hak)) : ?>
                                <li id="manageInfoSubNav"><a href="<?= base_url('Info/') ?>"><i class="fa fa-circle-o"></i> Kelola Informasi</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- konsultasi -->
                <?php if (in_array('createKonsul', $user_hak) || in_array('updateKonsul', $user_hak) || in_array('viewKonsul', $user_hak) || in_array('deleteKonsul', $user_hak)) : ?>
                    <li class="treeview" id="konsultasiMainNav">
                        <a href="#">
                            <i class="fa fa-comments-o"></i>
                            <span>Konsultasi</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <!-- <li id="kelolaGejala"><a href="<?php //base_url('konsultasi') 
                                                                ?>"><i class="fa fa-circle-o"></i> Kelola Gejala Pasien</a></li> -->
                            <li id="liveChat"><a href="<?= base_url('konsultasi/chat') ?>"><i class="fa fa-circle-o"></i> Chat Pasien</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- motitoring -->
                <?php if (in_array('viewMonitor', $user_hak)) : ?>
                    <li class="treeview" id="monitorMainNav">
                        <a href="#">
                            <i class="fa fa-map-o"></i>
                            <span>Monitoring</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li id="manageMonitorSubNav"><a href="<?= base_url('monitoring') ?>"><i class="fa fa-circle-o"></i> Kelola Monitoring</a></li>
                            <li id="lokasiMonitorSubNav"><a href="<?= base_url('monitoring/lokasi') ?>"><i class="fa fa-circle-o"></i> Monitoring Posisi</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if (in_array('viewMonitor', $user_hak)) : ?>
                    <!-- Profil user -->
                    <li id="profileMainNav"><a href="<?= base_url('users/profile') ?>"><i class="fa fa-files-o"></i> <span>Profile</span></a></li>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>