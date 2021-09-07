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
      <li><a href="#">Jabatan</a></li>
      <li class="active">Edit</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">


        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Edit Jabatan</h3>
          </div>
          <form role="form" action="#" method="post">
            <div class="box-body">



              <div class="form-group">
                <label for="group_name">Nama Jabatan</label>
                <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" value="#" autocomplete="off">
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
                      <td><input type="checkbox" name="permission[]" id="permission" value="createUser" ></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateUser" ></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewUser" ></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser" ></td>
                    </tr>
                    <tr>
                      <td>Jabatan</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createJabatan" ></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateJabatan" ></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewJabatan" ></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteJabatan" ></td>
                    </tr>
                    

                  </tbody>
                </table>

              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Ubah</button>
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
    $('#manageJabatanSubMenu').addClass('active');
  });
</script>