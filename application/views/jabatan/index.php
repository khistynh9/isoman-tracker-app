<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola
      <small>Jabatan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Jabatan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
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

        <?php //if (in_array('createGroup', $user_hak)) : 
        ?>
        <a href="<?= base_url('jabatan/tambah') ?>" class="btn btn-primary">Tambah Jabatan</a>
        <br /> <br />
        <?php //endif; 
        ?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Kelola Jabatan</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="groupTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama Jabatan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($jabatan_data) : ?>
                  <?php foreach ($jabatan_data as $k => $v) : ?>
                    <tr>
                      <td><?php echo $v['nama_level']; ?></td>

                      <?php //if (in_array('updateJabatan', $user_hak) || in_array('deleteJabatan', $user_hak)) : 
                      ?>
                      <td>
                        <?php //if (in_array('updateJabatan', $user_hak)) : 
                        ?>
                        <a href="<?php echo base_url('jabatan/ubah/' . $v['id']) ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                        <?php //endif; 
                        ?>
                        <?php //if (in_array('deleteJabatan', $user_hak)) : 
                        ?>
                        <button type="button" class="btn btn-default" onclick="removeFunc(<?= $v['id'] ?>)" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>
                        <?php //endif; 
                        ?>
                      </td>
                      <?php //endif; 
                      ?>
                    </tr>
                  <?php endforeach ?>
                <?php endif; ?>
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

<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus Jabatan</h4>
      </div>

      <form role="form" action="<?= base_url('jabatan/delete') ?>" method="post" id="removeForm">
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

<script type="text/javascript">
  $(document).ready(function() {
    $('#groupTable').DataTable({
      'order': []
    });
    $('#jabatanMainNav').addClass('active');
    $('#manageJabatanSubMenu').addClass('active');
  });
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
            jabatan_id: id
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
  }
</script>