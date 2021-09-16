<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Konsultasi
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Konsultasi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-md-12 col-xs-12">
                <!-- box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">History Gejala Pasien</h3>
                    </div>
                    <!-- isi tabel -->
                    <div class="box-body">
                        <table id="pasienTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Pasien</th>
                                    <th>Gejala</th>
                                    <th>Tingkat Gejala</th>
                                    <th>Penyembuhan</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>khistynh</td>
                                    <td>Sakit</td>
                                    <td>Sedang</td>
                                    <td>Meminum Obat</td>
                                    <td><span class="badge bg-aqua">Dilakukan</span></td>
                                </tr>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#chatTable').DataTable({
            'order': [],
        });

        $("#konsultasiMainNav").addClass('active');
        $("#historiGejala").addClass('active');
    });
</script>