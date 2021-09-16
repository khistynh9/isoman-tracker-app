<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kelola
            <small>Pasien</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Tambah Pasien</li>
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
                        <h3 class="box-title">Tambah Pasien</h3>
                    </div>
                    <form role="form" action="<?= base_url('pasien/tambah') ?>" method="post">
                        <div class="box-body">
                            <div class="form-group <?= form_error('nik') ? 'has-error' : null ?>">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan NIK" value="<?= set_value('nik') ?>" maxlength="16" autocomplete="off">
                                <?= form_error('nik'); ?>
                            </div>
                            <div class="form-group <?= form_error('nama') ? 'has-error' : null ?>">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" value="<?= set_value('nama') ?>" autocomplete="off">
                                <?= form_error('nama'); ?>
                            </div>
                            <div class="form-group <?= form_error('asal') ? 'has-error' : null ?>">
                                <label for="asal">Alamat Asal</label>
                                <input type="text" class="form-control" id="asal" name="asal" placeholder="Masukan Asal Alamat" value="<?= set_value('asal') ?>" autocomplete="off">
                                <?= form_error('asal'); ?>
                            </div>
                            <div class="form-group <?= form_error('gender') ? 'has-error' : null ?>">
                                <label for="gender">Jenis Kelamin</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" id="male" value="L">
                                        Laki-laki
                                    </label>
                                    <label>
                                        <input type="radio" name="gender" id="female" value="P">
                                        Perempuan
                                    </label>
                                </div>
                                <?= form_error('gender'); ?>
                            </div>
                            <div class="form-group <?= form_error('tgl_lahir') ? 'has-error' : null ?>">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="tgl_lahir" name="tgl_lahir">
                                </div>
                                <?= form_error('tgl_lahir'); ?>
                            </div>

                            <div class="form-group <?= form_error('jml_kontak_erat') ? 'has-error' : null ?>">
                                <label for="jml_kontak_erat">Jumlah Kontak Erat</label>
                                <input type="text" class="form-control" id="jml_kontak_erat" name="jml_kontak_erat" placeholder="Jumlah Kontak Erat" value="<?= set_value('jml_kontak_erat') ?>" autocomplete="off">
                                <?= form_error('jml_kontak_erat'); ?>
                            </div>
                            <div class="form-group <?= form_error('no_telp') ? 'has-error' : null ?>">
                                <label for="no_telp">No HP</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Nomor HP" value="<?= set_value('no_telp') ?>" autocomplete="off">
                                <?= form_error('no_telp'); ?>
                            </div>
                            <div class="form-group <?= form_error('kependudukan') ? 'has-error' : null ?>">
                                <label for="kependudukan">Status Kependudukan</label>
                                <select class="form-control select" id="kependudukan" name="kependudukan">
                                    <option value="1">Tetap</option>
                                    <option value="2">Pendatang</option>
                                </select>
                                <?= form_error('kependudukan'); ?>
                            </div>
                            <div class="form-group <?= form_error('stat_kondisi') ? 'has-error' : null ?>">
                                <label for="stat_kondisi">Status Kondisi</label>
                                <select class="form-control select" id="stat_kondisi" name="stat_kondisi">
                                    <option value="1">Positif</option>
                                    <option value="2">Negatif</option>
                                    <option value="3">Sembuh</option>
                                    <option value="4">ODP</option>
                                    <option value="5">Meninggal</option>
                                </select>
                                <?= form_error('stat_kondisi'); ?>
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

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="<?= base_url('pasien') ?>" class="btn btn-warning">Kembali</a>
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
        $("#createPasienSubNav").addClass('active');

    });
</script>