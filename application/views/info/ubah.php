<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kelola
            <small>Informasi</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Informasi</li>
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

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah info</h3>
                    </div>
                    <!-- /.box-header -->
                    <form role="form" action="<?php base_url('info/ubah') ?>" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tampilan Foto info: </label>
                                        <img src="<?= base_url() . $info_data['gambar'] ?>" width="150" height="150" class="img-circle">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Gambar info</label>
                                        <div class="kv-avatar">
                                            <div class="file-loading">
                                                <input id="image" name="image" type="file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="judul">Judul informasi</label>
                                        <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" value="<?= $this->input->post('judul') ?: $info_data['judul'] ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="isi">Isi informasi</label>
                                        <textarea type="text" class="form-control text" id="isi" name="isi" placeholder="Enter isi" autocomplete="off">
                                        <?= $this->input->post('isi') ?: $info_data['isi'] ?>
                                    </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="1" <?php if ($info_data['status'] == 1) {
                                                                    echo 'selected="selected"';
                                                                } ?>>Draft</option>
                                            <option value="2" <?php if ($info_data['status'] == 2) {
                                                                    echo 'selected="selected"';
                                                                } ?>>Publish</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tgl">Tanggal</label>
                                        <input type="text" class="form-control" id="tgl" name="tgl" placeholder="tgl" value="<?= $this->input->post('tgl') ?: $info_data['date_time'] ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('info') ?>" class="btn btn-warning">Kembali</a>
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
        // $(".select2").select2();
        $("#beritaMainNav").addClass('active');
        $("#manageBeritaSubMenu").addClass('active');
        $(".text").wysihtml5();

        var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' +
            'onclick="alert(\'Call your custom code here.\')">' +
            '<i class="glyphicon glyphicon-tag"></i>' +
            '</button>';
        $("#image").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
            layoutTemplates: {
                main2: '{preview} ' + btnCust + ' {remove} {browse}'
            },
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    });
</script>