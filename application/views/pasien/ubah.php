<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kelola
            <small>Pasien</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Kelola Pasien</li>
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
                        <h3 class="box-title">Ubah Pasien</h3>
                    </div>
                    <form role="form" action="<?php base_url('pasien/ubah') ?>" method="post">
                        <div class="box-body">

                            <?php echo validation_errors(); ?>

                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" placeholder="nik" value="<?php echo $pasien_data['nik'] ?>" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="<?php echo $pasien_data['nama'] ?>" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat Asal</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="<?php echo $pasien_data['alamat'] ?>" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" id="male" value="L" <?php if ($pasien_data['jenis_kel'] == "L") {
                                                                                                    echo "checked";
                                                                                                } ?>>
                                        Laki-laki
                                    </label>
                                    <label>
                                        <input type="radio" name="gender" id="female" value="P" <?php if ($pasien_data['jenis_kel'] == "P") {
                                                                                                    echo "checked";
                                                                                                } ?>>
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="tgl_lahir" value="<?php echo $pasien_data['tgl_lahir'] ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="jml_kontak_erat">Jumlah Kontak Erat</label>
                                <input type="text" class="form-control" id="jml_kontak_erat" name="jml_kontak_erat" placeholder="jml_kontak_erat" value="<?php echo $pasien_data['jml_kontak_erat'] ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No HP</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="no_telp" value="<?php echo $pasien_data['no_telp'] ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?php echo $pasien_data['username'] ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $pasien_data['password'] ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="kependudukan">kependudukan</label>
                                <select class="form-control" id="kependudukan" name="kependudukan">
                                    <option value="">Pilih kependudukan</option>
                                    <option value="1" <?php if ($pasien_data['status_kependudukan'] == 1) {
                                                            echo 'selected';
                                                        } ?>>Tetap</option>
                                    <option value="2" <?php if ($pasien_data['status_kependudukan'] == 2) {
                                                            echo 'selected';
                                                        } ?>>Pendatang</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stat_kondisi">Status Kondisi</label>
                                <select class="form-control" id="stat_kondisi" name="stat_kondisi">
                                    <option value="">Pilih Status Kondisi</option>
                                    <option value="1" <?php if ($pasien_data['status_kondisi'] == 1) {
                                                            echo 'selected';
                                                        } ?>>Positif</option>
                                    <option value="2" <?php if ($pasien_data['status_kondisi'] == 2) {
                                                            echo 'selected';
                                                        } ?>>Negatif</option>
                                    <option value="3" <?php if ($pasien_data['status_kondisi'] == 3) {
                                                            echo 'selected';
                                                        } ?>>Sembuh</option>
                                    <option value="4" <?php if ($pasien_data['status_kondisi'] == 4) {
                                                            echo 'selected';
                                                        } ?>>ODP</option>
                                    <option value="5" <?php if ($pasien_data['status_kondisi'] == 5) {
                                                            echo 'selected';
                                                        } ?>>Meninggal</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="puskesmas">Puskesmas</label>
                                <select class="form-control" id="puskesmas" name="puskesmas">
                                    <option value="">Pilih Puskesmas</option>
                                    <?php foreach ($puskesmas_data as $k => $v) : ?>
                                        <option value="<?php echo $v['id'] ?>" <?php if ($pasien_data['puskesmas_id'] == $v['id']) {
                                                                                    echo "selected='selected'";
                                                                                } ?>><?php echo $v['nama_puskesmas'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="loc_begin">Titik Koordinat</label>
                                <input type="loc_begin" class="form-control" id="loc_begin" name="loc_begin" placeholder="loc_begin" value="<?php echo $pasien_data['loc_begin'] ?>" autocomplete="off">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <a href="<?= base_url('pasien') ?>" class="btn btn-warning">Keluar</a>
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

        $("#pasienMainNav").addClass('active');
        $("#ubahpasienubNav").addClass('active');

    });
</script>