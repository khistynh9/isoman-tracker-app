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
            <!-- Jabatan -->
            <li class="treeview" id="jabatanMainNav">
                <a href="#">
                    <i class="fa fa-table"></i>
                    <span>Jabatan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="createJabatanSubMenu"><a href="<?= base_url('jabatan/create') ?>"><i class="fa fa-circle-o"></i> Tambah Jabatan</a></li>
                    <li id="manageJabatanSubMenu"><a href="<?= base_url('jabatan') ?>"><i class="fa fa-circle-o"></i> Kelola Jabatan</a></li>
                </ul>
            </li>
            <!-- USers -->
            <li class="treeview" id="userMainNav">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="createUserSubNav"><a href="<?= base_url('users/tambah') ?>"><i class="fa fa-circle-o"></i> Tambah User</a></li>
                    <li id="manageUserSubNav"><a href="<?= base_url('users') ?>"><i class="fa fa-circle-o"></i> Kelola Users</a></li>
                </ul>
            </li>
            <!--pasien -->
            <li class="treeview" id="pasienMainNav">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Pasien</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="createPasienSubNav"><a href="<?= base_url('pasien/tambah') ?>"><i class="fa fa-circle-o"></i> Tambah Pasien</a></li>

                    <li id="createUserLokSubNav"><a href="<?= base_url('users/tambah_lokasi') ?>"><i class="fa fa-circle-o"></i> Tambah Lokasi Pasien</a></li>
                    <li id="managePasienSubNav"><a href="<?= base_url('pasien') ?>"><i class="fa fa-circle-o"></i> Kelola Pasien</a></li>
                </ul>
            </li>
            <!-- konsultasi -->
            <li class="treeview" id="konsultasiMainNav">
                <a href="#">
                    <i class="fa fa-tasks"></i>
                    <span>Konsultasi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="kelolaGejala"><a href="<?= base_url('konsultasi') ?>"><i class="fa fa-circle-o"></i> Kelola Gejala Pasien</a></li>
                    <li id="liveChat"><a href="<?= base_url('konsultasi/chat') ?>"><i class="fa fa-circle-o"></i> Chat Pasien</a></li>
                    <li id="historiGejala"><a href="<?= base_url('konsultasi') ?>"><i class="fa fa-circle-o"></i> Riwayat Gejala Pasien</a></li>
                </ul>
            </li>
            <!-- motitoring -->
            <li class="treeview" id="monitorMainNav">
                <a href="#">
                    <i class="fa fa-file"></i>
                    <span>Monitoring</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="manageMonitorSubNav"><a href="<?= base_url('monitor') ?>"><i class="fa fa-circle-o"></i> Kelola Monitoring</a></li>
                    <li id="lokasiMonitorSubNav"><a href="<?= base_url('monitor/lokasi') ?>"><i class="fa fa-circle-o"></i> Monitoring Posisi</a></li>
                </ul>
            </li>

            <li id="profileMainNav"><a href="<?= base_url('users/profile/') ?>"><i class="fa fa-files-o"></i> <span>Profile</span></a></li>
            <li><a href="<?= base_url('login/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>