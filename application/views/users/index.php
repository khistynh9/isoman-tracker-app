<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kelola
            <small>Users</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Users</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-md-12 col-xs-12">
                <a href="<?php echo base_url('users/tambah') ?>" class="btn btn-primary">Tambah User</a>
                <br /> <br />
                <!-- box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Kelola Users</h3>
                    </div>
                    <!-- isi tabel -->
                    <div class="box-body">
                        <table id="userTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>No HP</th>
                                    <th>Jabatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>khistynh</td>
                                    <td>khistynh@gmail</td>
                                    <td>khisty cantik</td>
                                    <td>458748375</td>
                                    <td>Tenaga Kesehatan</td>
                                    <td>
                                        <a href="<?= base_url('users/edit/') ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>
                                    </td>
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
        $('#userTable').DataTable({
            'order': [],
        });

        $("#userMainNav").addClass('active');
        $("#manageUserSubNav").addClass('active');
    });
</script>