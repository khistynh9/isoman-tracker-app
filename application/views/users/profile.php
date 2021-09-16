<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small>Profile</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12 col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Profile </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-condensed table-hovered">
                            <tr>
                                <th>Username</th>
                                <td><?php echo $users_data['username']; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $users_data['email']; ?></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td><?php echo $users_data['nama']; ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?php echo ($users_data['jenis_kel'] == 1) ? 'Laki-laki' : 'Jenis Kelamin'; ?></td>
                            </tr>
                            <tr>
                                <th>No HP</th>
                                <td><?php echo $users_data['no_hp']; ?></td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                <td><span class="badge bg-aqua"><?php echo $user_datas['nama_level'] . " " . $puskesmas = $user_datas['id'] == 1 ? " " : $user_datas['nama_puskesmas']; ?></span></td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
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
        $("#profileMainNav").addClass('active');
    });
</script>