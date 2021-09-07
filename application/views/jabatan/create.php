<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola
      <small>Jabatan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Jabatan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        
      

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Tambah Jabatan</h3>
          </div>
          <form role="form" action="#" method="post">
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
                      <th></th>
                      <th>Create</th>
                      <th>Update</th>
                      <th>View</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Users</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createUser"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateUser"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewUser"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser"></td>
                    </tr>
                    <tr>
                      <td>Jabatan</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createJabatan"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateJabatan"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewJabatan"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteJabatan"></td>
                    </tr>
                    <tr>
                      <td>LSP</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createLSP"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateLSP"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewLSP"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteLSP"></td>
                    </tr>
                    <tr>
                      <td>Skema</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createSkema"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateSkema"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewSkema"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteSkema"></td>
                    </tr>
                    <tr>
                      <td>Asesor</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createAsesor"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateAsesor"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewAsesor"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteAsesor"></td>
                    </tr>
                    <tr>
                      <td>Berita</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createBerita"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateBerita"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewBerita"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteBerita"></td>
                    </tr>
                    <tr>
                      <td>Kontak</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createKontak"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateKontak"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewKontak"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteKontak"></td>
                    </tr>
                    <tr>
                      <td>Setting</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createSetting"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateSetting"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewSetting"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteSetting"></td>
                    </tr>
                    <tr>
                      <td>Perusahaan</td>
                      <td> - </td>
                      <td>-</td>
                      <td>-</td>
                      <td> - </td>
                    </tr>
                    <tr>
                      <td>Profil</td>
                      <td> - </td>
                      <td> - </td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewProfil"></td>
                      <td> - </td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="#" class="btn btn-warning">Kembali</a>
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