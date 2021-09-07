<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kelola
            <small>pasien</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">pasien</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tambah Pasien</h3>
                    </div>
                    <form role="form" action="<?php base_url('pasien/tambah') ?>" method="post">
                        <div class="box-body">
                            <!-- <div class="form-group">
                                <label for="jabatan">Pilih Jabatan</label>
                                <select class="form-control" id="jabatan" name="jabatan">
                                    <option value="">Pilih Jabatan</option>
                                    <option value="">jabatan 1</option>
                                </select>
                            </div> -->
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= set_value('nama') ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?= set_value('password') ?>" autocomplete="off">
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