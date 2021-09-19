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
                                    <th>Nama Lengkap</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Nomor Telpon</th>
                                    <th>Puskesmas</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($data_pasien_full) : ?>
                                    <?php foreach ($data_pasien_full as $k => $v) : ?>
                                        <tr>
                                            <td><?= $v['nama']; ?></td>
                                            <td><?= $v['alamat']; ?></td>
                                            <td><?= $v['tgl_lahir']; ?></td>
                                            <td><?= $v['no_telp']; ?></td>
                                            <td><?= $v['nama_puskesmas']; ?></td>
                                            <td>
                                                <?php
                                                if ($v['status'] == 1) {
                                                    echo '<span class="label label-danger">Positif Covid</span>';
                                                } else if ($v['status'] == 2) {
                                                    echo '<span class="label label-success">Negatif Covid</span>';
                                                } else if ($v['status'] == 3) {
                                                    echo '<span class="label label-primary">Sembuh</span>';
                                                } else if ($v['status'] == 4) {
                                                    echo '<span class="label label-warning">ODP</span>';
                                                } else if ($v['status'] == 5) {
                                                    echo '<span class="label label-danger">Meninggal</span>';
                                                }
                                                ?>
                                            </td>
                                            <?php if (in_array('updatePasien', $user_hak) || in_array('deletePasien', $user_hak) || in_array('viewPasien', $user_hak)) : ?>
                                                <td>
                                                    <?php if (in_array('viewPasien', $user_hak)) : ?>
                                                        <button type="button" class="btn btn-default btn-show-detail" data-nik="<?= $v['nik'] ?>"><i class="fa fa-eye"></i></button>
                                                    <?php endif; ?>
                                                    <?php if (in_array('updatePasien', $user_hak)) : ?>
                                                        <a href="<?= base_url('pasien/ubah/' . $v['nik']) ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                                    <?php endif; ?>
                                                    <?php if (in_array('deletePasien', $user_hak)) : ?>
                                                        <button type="button" class="btn btn-default btn-delete" data-nik="<?= $v['nik'] ?>" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>
                                                    <?php endif; ?>
                                                </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach ?>
                            <?php endif; ?>
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
                <table class="table table-bordered table-striped" id="detail">
                </table>
            </div>
        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php if (in_array('deletePasien', $user_hak)) : ?>
    <!-- remove brand modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Data Pasien?</h4>
                </div>

                <form role="form" action="<?php echo base_url('pasien/delete') ?>" method="post" id="removeForm">
                    <div class="modal-body">
                        <p>Yakin Data Dihapus?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php endif; ?>

<script type="text/javascript">
    $(document).ready(function() {
        var base_url = "<?php echo base_url(); ?>";

        $("#pasienMainNav").addClass('active');
        $("#managePasienSubNav").addClass('active');

        $('.btn-show-detail').on('click', function() {
            var nik = $(this).data('nik');

            $.ajax({
                url: base_url + 'pasien/fetchPasienDataLokasi/' + nik,
                type: "POST",
                data: {
                    nik,
                },
                dataType: "JSON",
                success: function(data) {
                    // console.log();
                    // console.log(data);
                    var datas = Object.values(data);
                    var html = "";
                    if (datas) {
                        $('.modal-title').text('Detail Pasien');
                        $('#show-detail').modal('show');
                        for (let i = 0; i < datas.length; i++) {
                            html += '<tr>' +
                                '<td>NIK</td>' +
                                '<td>: ' + datas[i]['nik'] + '</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td>Nama Lengkap</td>' +
                                '<td>: ' + datas[i]['nama'] + '</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td>Alamat</td>' +
                                '<td>: ' + datas[i]['alamat'] + '</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td>Tanggal Lahir</td>' +
                                '<td>: ' + datas[i]['tgl_lahir'] + '</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td>Status Kependudukan</td>' +
                                '<td>: ' + datas[i]['status_kependudukan'] + '</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td>Nomor Telpon</td>' +
                                '<td>: ' + datas[i]['no_telp'] + '</td>' +
                                '</tr>' +
                                '</tr>' +
                                '<tr>' +
                                '<td>Puskesmas</td>' +
                                '<td>: ' + datas[i]['nama_puskesmas'] + '</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td>Titik Koordinat Awal</td>' +
                                '<td>: ' + datas[i]['loc_begin'] + '</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td>Status :</td>' +
                                '<td>: ' + cekStatus(datas[i]['status']) +
                                '</td>' +
                                '</tr>';
                        }
                        $('#detail').html(html);
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Kesalahan!');
                }

            });

        });

        function cekStatus(stat) {
            if (stat == 1) {
                return '<span class="label label-danger">Positif Covid</span>'
            } else if (stat == 2) {
                return '<span class="label label-success">Negatif Covid</span>'
            } else if (stat == 3) {
                return '<span class="label label-primary">Sembuh</span>'
            } else if (stat == 4) {
                return '<span class="label label-warning">ODP</span>'
            } else if (stat == 5) {
                return '<span class="label label-danger">Meninggal</span>'
            }
        }

        $('.btn-delete').on('click', function() {
            var id = $(this).data('nik');

            if (id) {
                $("#removeForm").on('submit', function() {
                    var form = $(this);

                    // remove the text-danger
                    $(".text-danger").remove();

                    $.ajax({
                        url: form.attr('action'),
                        type: form.attr('method'),
                        data: {
                            pasien_id: id
                        },
                        dataType: 'json',
                        success: function(response) {

                            location.reload();
                            // hide the modal
                            $("#removeModal").modal('hide');
                        }
                    });

                    return false;
                });
            }
        })

    });
</script>