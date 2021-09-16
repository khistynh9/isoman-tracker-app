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
      <li><a href="<?= base_url('jabatan') ?>">Jabatan</a></li>
      <li class="active">Ubah Jabatan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

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
            <h3 class="box-title">Ubah Jabatan</h3>
          </div>
          <form role="form" action="<?php base_url('jabatan/ubah') ?>" method="post">
            <div class="box-body">

              <?= validation_errors(); ?>

              <div class="form-group">
                <label for="group_name">Nama Jabatan</label>
                <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" value="<?= $jabatan_data['nama_level']; ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="permission">Hak Akses</label>

                <?php $serialize_permission = unserialize($jabatan_data['hak_akses']); ?>

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
                      <td><input type="checkbox" name="permission[]" id="permission" value="createPuskesmas" <?php if ($serialize_permission) {
                                                                                                                if (in_array('createPuskesmas', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updatePuskesmas" <?php
                                                                                                              if ($serialize_permission) {
                                                                                                                if (in_array('updatePuskesmas', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              }
                                                                                                              ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewPuskesmas" <?php
                                                                                                            if ($serialize_permission) {
                                                                                                              if (in_array('viewPuskesmas', $serialize_permission)) {
                                                                                                                echo "checked";
                                                                                                              }
                                                                                                            }
                                                                                                            ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deletePuskesmas" <?php
                                                                                                              if ($serialize_permission) {
                                                                                                                if (in_array('deletePuskesmas', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              }
                                                                                                              ?>></td>
                    </tr>
                    <tr>
                      <td>Jabatan</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createJabatan" <?php
                                                                                                            if ($serialize_permission) {
                                                                                                              if (in_array('createJabatan', $serialize_permission)) {
                                                                                                                echo "checked";
                                                                                                              }
                                                                                                            }
                                                                                                            ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateJabatan" <?php
                                                                                                            if ($serialize_permission) {
                                                                                                              if (in_array('updateJabatan', $serialize_permission)) {
                                                                                                                echo "checked";
                                                                                                              }
                                                                                                            }
                                                                                                            ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewJabatan" <?php
                                                                                                          if ($serialize_permission) {
                                                                                                            if (in_array('viewJabatan', $serialize_permission)) {
                                                                                                              echo "checked";
                                                                                                            }
                                                                                                          }
                                                                                                          ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteJabatan" <?php
                                                                                                            if ($serialize_permission) {
                                                                                                              if (in_array('deleteJabatan', $serialize_permission)) {
                                                                                                                echo "checked";
                                                                                                              }
                                                                                                            }
                                                                                                            ?>></td>
                    </tr>
                    <tr>
                      <td>Users</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createUser" <?php if ($serialize_permission) {
                                                                                                          if (in_array('createUser', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateUser" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('updateUser', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewUser" <?php
                                                                                                      if ($serialize_permission) {
                                                                                                        if (in_array('viewUser', $serialize_permission)) {
                                                                                                          echo "checked";
                                                                                                        }
                                                                                                      }
                                                                                                      ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('deleteUser', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                    </tr>
                    <tr>
                      <td>Pasien</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createPasien" <?php
                                                                                                          if ($serialize_permission) {
                                                                                                            if (in_array('createPasien', $serialize_permission)) {
                                                                                                              echo "checked";
                                                                                                            }
                                                                                                          }
                                                                                                          ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updatePasien" <?php
                                                                                                          if ($serialize_permission) {
                                                                                                            if (in_array('updatePasien', $serialize_permission)) {
                                                                                                              echo "checked";
                                                                                                            }
                                                                                                          }
                                                                                                          ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewPasien" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('viewPasien', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deletePasien" <?php
                                                                                                          if ($serialize_permission) {
                                                                                                            if (in_array('deletePasien', $serialize_permission)) {
                                                                                                              echo "checked";
                                                                                                            }
                                                                                                          }
                                                                                                          ?>></td>
                    </tr>
                    <tr>
                      <td>Konsul</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createKonsul" <?php
                                                                                                          if ($serialize_permission) {
                                                                                                            if (in_array('createKonsul', $serialize_permission)) {
                                                                                                              echo "checked";
                                                                                                            }
                                                                                                          }
                                                                                                          ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateKonsul" <?php
                                                                                                          if ($serialize_permission) {
                                                                                                            if (in_array('updateKonsul', $serialize_permission)) {
                                                                                                              echo "checked";
                                                                                                            }
                                                                                                          }
                                                                                                          ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewKonsul" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('viewKonsul', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteKonsul" <?php
                                                                                                          if ($serialize_permission) {
                                                                                                            if (in_array('deleteKonsul', $serialize_permission)) {
                                                                                                              echo "checked";
                                                                                                            }
                                                                                                          }
                                                                                                          ?>></td>
                    </tr>
                    <tr>
                      <td>Kelola Gejala Pasien</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createGejala" <?php
                                                                                                          if ($serialize_permission) {
                                                                                                            if (in_array('createGejala', $serialize_permission)) {
                                                                                                              echo "checked";
                                                                                                            }
                                                                                                          }
                                                                                                          ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateGejala" <?php
                                                                                                          if ($serialize_permission) {
                                                                                                            if (in_array('updateGejala', $serialize_permission)) {
                                                                                                              echo "checked";
                                                                                                            }
                                                                                                          }
                                                                                                          ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewGejala" <?php
                                                                                                        if ($serialize_permission) {
                                                                                                          if (in_array('viewGejala', $serialize_permission)) {
                                                                                                            echo "checked";
                                                                                                          }
                                                                                                        }
                                                                                                        ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteGejala" <?php
                                                                                                          if ($serialize_permission) {
                                                                                                            if (in_array('deleteGejala', $serialize_permission)) {
                                                                                                              echo "checked";
                                                                                                            }
                                                                                                          }
                                                                                                          ?>></td>
                    </tr>
                    <tr>
                      <td>Monitoring</td>
                      <td> - </td>
                      <td> - </td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewMonitor" <?php
                                                                                                          if ($serialize_permission) {
                                                                                                            if (in_array('viewMonitor', $serialize_permission)) {
                                                                                                              echo "checked";
                                                                                                            }
                                                                                                          }
                                                                                                          ?>></td>
                      <td> - </td>
                    </tr>

                  </tbody>
                </table>

              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Ubah</button>
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
    $('#manageJabatanSubMenu').addClass('active');
  });
</script>