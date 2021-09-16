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
      <li class="active">Tambah Jabatan</li>
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
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Tambah Jabatan</h3>
          </div>
          <form role="form" action="<?= base_url('jabatan/tambah') ?>" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="group_name">Nama Jabatan</label>
                <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Masukan Nama Jabatan" autocomplete="off">
              </div>

              <div class="form-group">
                <label for="permission">Hak Akses</label>
                <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th>Menu</th>
                      <th>Create</th>
                      <th>Update</th>
                      <th>View</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Puskesmas</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createPuskesmas"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updatePuskesmas"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewPuskesmas"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deletePuskesmas"></td>
                    </tr>
                    <tr>
                      <td>Jabatan</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createJabatan"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateJabatan"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewJabatan"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteJabatan"></td>
                    </tr>
                    <tr>
                      <td>Users</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createUser"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateUser"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewUser"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser"></td>
                    </tr>
                    <tr>
                      <td>Pasien</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createPasien"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updatePasien"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewPasien"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deletePasien"></td>
                    </tr>
                    <tr>
                      <td>Konsultasi</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createKonsul"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateKonsul"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewKonsul"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteKonsul"></td>
                    </tr>
                    <tr>
                      <td>Kelola Gejala Pasien</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createGejala"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateGejala"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewGejala"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteGejala"></td>
                    </tr>
                    <tr>
                      <td>Monitoring</td>
                      <td> - </td>
                      <td> - </td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewMonitor"></td>
                      <td> - </td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('jabatan') ?>" class="btn btn-warning">Kembali</a>
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
    $('#jabatanMainNav').addClass('active');
    $('#createJabatanSubMenu').addClass('active');
  });
</script>