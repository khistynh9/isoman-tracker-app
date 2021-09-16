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
            <li class="active">Ubah Users</li>
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
                        <h3 class="box-title">Edit User</h3>
                    </div>
                    <form role="form" action="<?php base_url('users/ubah') ?>" method="post">
                        <div class="box-body">

                            <?php echo validation_errors(); ?>

                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <select class="form-control" id="jabatan" name="jabatan">
                                    <option value="">Pilih Jabatan</option>
                                    <?php foreach ($jabatan_data as $k => $v) : ?>
                                        <option value="<?php echo $v['id'] ?>" <?php if ($user_group['id'] == $v['id']) {
                                                                                    echo 'selected';
                                                                                } ?>><?php echo $v['nama_level'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="puskesmas">puskesmas</label>
                                <select class="form-control" id="puskesmas" name="puskesmas">
                                    <option value="">Pilih Puskesmas</option>
                                    <?php foreach ($puskesmas_data as $k => $v) : ?>
                                        <option value="<?php echo $v['id'] ?>" <?php if ($user_data['puskesmas_id'] == $v['id']) {
                                                                                    echo "selected='selected'";
                                                                                } ?>><?php echo $v['nama_puskesmas'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $user_data['username'] ?>" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user_data['email'] ?>" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Last name" value="<?php echo $user_data['nama'] ?>" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="phone">No HP</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo $user_data['no_hp'] ?>" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" id="male" value="1" <?php if ($user_data['jenis_kel'] == 1) {
                                                                                                    echo "checked";
                                                                                                } ?>>
                                        Laki-laki
                                    </label>
                                    <label>
                                        <input type="radio" name="gender" id="female" value="2" <?php if ($user_data['jenis_kel'] == 2) {
                                                                                                    echo "checked";
                                                                                                } ?>>
                                        Perempuan
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="alert alert-info alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    Kosongkan Password jika tidak ingin diubah.
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="cpassword">Confirm password</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <a href="<?= base_url('users') ?>" class="btn btn-warning">Keluar</a>
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
        $("#manageUserSubNav").addClass('active');
    });
</script>