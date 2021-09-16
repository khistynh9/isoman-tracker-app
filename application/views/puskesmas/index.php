<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kelola
            <small>Puskesmas</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Puskesmas</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12 col-xs-12">

                <div id="messages"></div>

                <?php //if (in_array('createBerita', $user_hak)) : 
                ?>
                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah Puskesmas</button>
                <br /> <br />

                <?php //endif; 
                ?>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Kelola Puskesmas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="manageTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <!-- <th>No</th> -->
                                    <th>Nama Puskesmas</th>
                                    <th>Kecamatan</th>
                                    <?php //if (in_array('updateBerita', $user_hak) || in_array('deleteBerita', $user_hak)) : 
                                    ?>
                                    <th>Aksi</th>
                                    <?php //endif; 
                                    ?>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
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

<?php //if (in_array('createBerita', $user_hak)) : 
?>
<!-- create brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Puskesmas</h4>
            </div>
            <form role="form" action="<?= base_url('puskesmas/tambah') ?>" method="post" id="createForm">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Puskesmas</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Puskesmas" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat" autocomplete="off">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php //endif; 
?>

<?php //if (in_array('updateBerita', $user_hak)) : 
?>
<!-- edit brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Puskesmas</h4>
            </div>

            <form role="form" action="<?= base_url('puskesmas/ubah') ?>" method="post" id="updateForm">

                <div class="modal-body">
                    <div id="messages"></div>

                    <div class="form-group">
                        <label for="edit_nama">Nama Puskesmas</label>
                        <input type="text" class="form-control" id="edit_nama" name="edit_nama" placeholder="Masukan Nama Puskesmas" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="alamat">alamatamatan</label>
                        <input type="text" class="form-control" id="edit_alamat" name="edit_alamat" placeholder="Masukan Nama Alamat" autocomplete="off">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>

            </form>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php //endif; 
?>

<?php //if (in_array('deleteBerita', $user_hak)) : 
?>
<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Puskesmas</h4>
            </div>

            <form role="form" action="<?= base_url('puskesmas/hapus') ?>" method="post" id="removeForm">
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
<?php //endif; 
?>



<script type="text/javascript">
    var manageTable;
    var base_url = "<?= base_url(); ?>";


    $(document).ready(function() {
        $('#puskesmasMainNav').addClass('active');
        // initialize the datatable 
        manageTable = $('#manageTable').DataTable({
            'ajax': base_url + 'puskesmas/fetchPuskesmasData',
            'order': []
        });

        // submit the create from 
        $("#createForm").unbind('submit').on('submit', function() {
            var form = $(this);

            // remove the text-danger
            $(".text-danger").remove();

            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(), // /converting the form data into array and sending it to server
                dataType: 'json',
                success: function(response) {

                    manageTable.ajax.reload(null, false);

                    if (response.success === true) {
                        $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>' + response.messages +
                            '</div>');

                        // hide the modal
                        $("#addModal").modal('hide');

                        // reset the form
                        $("#createForm")[0].reset();
                        $("#createForm .form-group").removeClass('has-error').removeClass('has-success');
                    } else {
                        if (response.messages instanceof Object) {
                            $.each(response.messages, function(index, value) {
                                var id = $("#" + index);

                                id.closest('.form-group')
                                    .removeClass('has-error')
                                    .removeClass('has-success')
                                    .addClass(value.length > 0 ? 'has-error' : 'has-success');

                                id.after(value);
                            });
                        } else {
                            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>' + response.messages +
                                '</div>');
                        }
                    }
                }
            });

            return false;
        });

    });

    // edit function
    function editFunc(id) {
        $.ajax({
            url: base_url + 'puskesmas/fetchPuskesmasDataById/' + id,
            type: 'post',
            dataType: 'json',
            success: function(response) {

                $("#edit_nama").val(response.nama_puskesmas);
                $("#edit_alamat").val(response.alamat);

                // submit the edit from 
                $("#updateForm").unbind('submit').bind('submit', function() {
                    var form = $(this);

                    // remove the text-danger
                    $(".text-danger").remove();

                    $.ajax({
                        url: form.attr('action') + '/' + id,
                        type: form.attr('method'),
                        data: form.serialize(), // /converting the form data into array and sending it to server
                        dataType: 'json',
                        success: function(response) {

                            manageTable.ajax.reload(null, false);

                            if (response.success === true) {
                                $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                    '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>' + response.messages +
                                    '</div>');

                                // hide the modal
                                $("#editModal").modal('hide');
                                // reset the form 
                                $("#updateForm .form-group").removeClass('has-error').removeClass('has-success');

                            } else {

                                if (response.messages instanceof Object) {
                                    $.each(response.messages, function(index, value) {
                                        var id = $("#" + index);

                                        id.closest('.form-group')
                                            .removeClass('has-error')
                                            .removeClass('has-success')
                                            .addClass(value.length > 0 ? 'has-error' : 'has-success');

                                        id.after(value);

                                    });
                                } else {
                                    $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                        '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>' + response.messages +
                                        '</div>');
                                }
                            }
                        }
                    });

                    return false;
                });

            }
        });
    }

    // remove functions 
    function removeFunc(id) {
        if (id) {
            $("#removeForm").on('submit', function() {

                var form = $(this);

                // remove the text-danger
                $(".text-danger").remove();

                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: {
                        puskesmas_id: id
                    },
                    dataType: 'json',
                    success: function(response) {

                        manageTable.ajax.reload(null, false);
                        // hide the modal
                        $("#removeModal").modal('hide');

                        if (response.success === true) {
                            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>' + response.messages +
                                '</div>');



                        } else {

                            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>' + response.messages +
                                '</div>');
                        }
                    }
                });

                return false;
            });
        }
    }
</script>