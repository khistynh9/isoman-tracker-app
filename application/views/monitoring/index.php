<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kelola
            <small>Monitoring Pasien Isoman</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Monitoring</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-md-12 col-xs-12">
                <!-- message query -->
                <?php if ($this->session->flashdata('success')) : ?>
                    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
                    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>

                    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
                    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>

                    <script>
                        var firebaseConfig = {
                            piKey: "AIzaSyCr3IQ8HnSA15wvMSG2N5B-sJEhQ8JC0hM",
                            authDomain: "pertama-5fa3b.firebaseapp.com",
                            projectId: "pertama-5fa3b",
                            storageBucket: "pertama-5fa3b.appspot.com",
                            messagingSenderId: "532635605413",
                            appId: "1:532635605413:web:c1587dacda146a61ed704c"
                        };

                        // Initialize Firebase
                        firebase.initializeApp(firebaseConfig);
                        const db = firebase.database();

                        var pasienRef = db.ref('lokasi');

                        var nik, nama, loc_begin, loc_end, status, puskesmas_id;
                        nik = "<?= $this->session->userdata('nik'); ?>";
                        nama = "<?= $this->session->userdata('nama'); ?>";
                        loc_begin = "[<?= $this->session->userdata('loc_begin'); ?>]";
                        loc_end = "[<?= $this->session->userdata('loc_end'); ?>]";
                        status = "<?= $this->session->userdata('status'); ?>";
                        puskesmas_id = "<?= $this->session->userdata('puskesmas_id'); ?>";
                        //console.log(pasien_data);
                        //send data user
                        pasienRef.on('child_added', pasienAdd);
                        pasienRef.push({
                            nik: nik,
                            nama: nama,
                            loc_begin: loc_begin,
                            loc_end: loc_end,
                            puskesmas_id: puskesmas_id,
                            status: status
                        })

                        function pasienAdd() {
                            console.log('berhasil');
                        }
                    </script>
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

                <!-- box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Info Pasien Isoman</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-12 col-xs-12">
                                <table id="userTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>No HP</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($pasien_data) : ?>
                                            <?php foreach ($pasien_data as $k => $v) : ?>
                                                <tr>
                                                    <td><?php echo $v['nik']; ?></td>
                                                    <td><?php echo $v['nama']; ?></td>
                                                    <td><?php echo $v['alamat']; ?></td>
                                                    <td><?php echo $v['no_telp']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url('monitor/lokasi/') ?>" class="btn btn-default"><i class="fa fa-map-marker"></i></a>
                                                        <a href="<?= base_url('konsultasi/chat/') . $v['nik'] ?>" class="btn btn-default"><i class="fa fa fa-comments-o"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php endif; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>

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
        $('#userTable').DataTable({
            'order': [],
        });

        //Initialize Select2 Elements
        $('.select2').select2()

        $("#monitorMainNav").addClass('active');
        $("#manageMonitorSubNav").addClass('active');
    });
</script>