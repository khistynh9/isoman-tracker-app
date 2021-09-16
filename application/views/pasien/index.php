<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kelola
            <small>Pasien</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Pasien</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-md-12 col-xs-12">

                <!-- validasi -->
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->flashdata('success');
                        ?>
                    </div>
                <?php elseif ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-error alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->flashdata('error');
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (in_array('createPasien', $user_hak)) : ?>
                    <a href="<?= base_url('pasien/tambah') ?>" class="btn btn-primary">Tambah Pasien</a>
                <?php endif; ?>
                <br /> <br />
                <!-- box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Kelola Pasien</h3>
                    </div>
                    <!-- isi tabel -->
                    <div class="box-body">
                        <table id="pasienTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Alamat Asal</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No HP</th>
                                    <th>Puskesmas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- end isi tabel -->
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
<div class="modal fade" tabindex="-1" role="dialog" id="show-detail">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Pasien</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Status Kependudukan</th>
                            <th>Nomor Telpon</th>
                            <th>Puskesmas</th>
                            <th>Lokasi Awal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="detail"></tbody>
                </table>
            </div>
        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    $(document).ready(function() {
        var manageTable;
        var base_url = "<?php echo base_url(); ?>";

        manageTable = $('#pasienTable').DataTable({
            'ajax': base_url + 'pasien/fetchPasienData',
            'order': []
        });

        $("#pasienMainNav").addClass('active');
        $("#managePasienSubNav").addClass('active');

        $('.btn-show-detail').on('click', function() {
            var nik = $(this).data('nik');
            $.ajax({
                type: 'post',
                data: {
                    nik,
                },
                url: base_url + 'pasien/fetchPasienDataLokasi',
                dataType: 'json',
                success: function(data) {
                    var html = "";
                    if (data) {
                        $('#show-detail').modal('show');
                        for (let i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + (i + 1) + '</td>' +
                                '<td>' + data[i]['nama'] + '</td>' +
                                '<td>' + data[i]['alamat'] + '</td>' +
                                '<td>' + data[i]['tgl_lahir'] + '</td>' +
                                '<td>' + data[i]['status_kependudukan'] + '</td>' +
                                '<td>' + data[i]['no_telp'] + '</td>' +
                                '<td>' + data[i]['nama_puskesmas'] + '</td>' +
                                '<td>' + data[i]['loc_begin'] + '</td>' +
                                '<td>' + data[i]['status'] + '</td>' +
                                '</tr>';
                        }
                        $('#detail').html(html);
                    }
                    console.log("masuk");
                    console.log(data);
                }
            });
        });
    });
</script>