<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kelola
            <small>Users</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Tambah Users</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12 col-xs-12">

                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php elseif ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-error alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tambah User</h3>
                    </div>
                    <form role="form" action="<?= base_url('users/tambah') ?>" method="post">
                        <div class="box-body">

                            <div class="form-group <?= form_error('jabatan') ? 'has-error' : null ?>">
                                <label for="jabatan">Pilih Jabatan</label>
                                <select class="form-control" id="jabatan" name="jabatan">
                                    <option value="<?= set_value('jabatan') ?>">Pilih Jabatan</option>
                                    <?php foreach ($jabatan_data as $k => $v) : ?>
                                        <option value="<?php echo $v['id'] ?>"><?php echo $v['nama_level'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('jabatan'); ?>
                            </div>

                            <div class="form-group <?= form_error('puskesmas') ? 'has-error' : null ?>">
                                <label for="puskesmas">Pilih Puskesmas</label>
                                <select class="form-control" id="puskesmas" name="puskesmas">
                                    <option value="<?= set_value('puskesmas') ?>">Pilih puskesmas</option>
                                    <?php foreach ($puskesmas_data as $k => $v) : ?>
                                        <option value="<?php echo $v['id'] ?>"><?php echo $v['nama_puskesmas'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('puskesmas'); ?>
                            </div>

                            <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>" autocomplete="off">
                                <?= form_error('username'); ?>
                            </div>

                            <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= set_value('password') ?>" autocomplete="off">
                                <?= form_error('password'); ?>
                            </div>

                            <div class="form-group <?= form_error('cpassword') ? 'has-error' : null ?>">
                                <label for="cpassword">Konfirmasi password</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Konfirmasi Password" value="<?= set_value('cpassword') ?>" autocomplete="off">
                                <?= form_error('cpassword'); ?>
                            </div>

                            <div class="form-group  <?= form_error('email') ? 'has-error' : null ?>">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" autocomplete="off">
                                <?= form_error('email'); ?>
                            </div>

                            <div class="form-group <?= form_error('nama') ? 'has-error' : null ?>">
                                <label for="fname">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= set_value('nama') ?>" autocomplete="off">
                                <?= form_error('nama'); ?>
                            </div>

                            <div class="form-group">
                                <label for="phone">No HP</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="No Telp" autocomplete="off">
                            </div>

                            <div class="form-group <?= form_error('gender') ? 'has-error' : null ?>">
                                <label for="gender">Jenis Kelamin</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" id="male" value="1">
                                        Laki-laki
                                    </label>
                                    <label>
                                        <input type="radio" name="gender" id="female" value="2">
                                        Perempuan
                                    </label>
                                </div>
                                <?= form_error('gender'); ?>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" onclick="sendUser()" class="btn btn-primary">Tambah</button>
                            <a href="<?= base_url('users') ?>" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- col-md-12 -->
        </div>
        <!-- /.row -->


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script type="text/javascript">
    $(document).ready(function() {
        $("#groups").select2();

        $("#userMainNav").addClass('active');
        $("#createUserSubNav").addClass('active');

    });
</script>