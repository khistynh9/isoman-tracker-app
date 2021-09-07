<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile
            <small>Users</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Users</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Ubah Profile</h3>
                    </div>
                    <div class="box-body">
                        <table id="userProfile" class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>Khisty NH</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>Tasikmalaya</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
        $('#userProfile').DataTable({
            'order': [],
        });

        $("#userMainNav").addClass('active');
        $("#profileMainNav").addClass('active');
    });
</script>