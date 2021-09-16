<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Isoman Tracker</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

      <?php if ($is_admin == true) : ?>
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>140</h3>

                <p>User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>53</h3>

                <p>Pasien Sembuh</p>
              </div>
              <div class="icon">
                <i class="ion ion-medkit"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>44</h3>

                <p>PAsien Isoman</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>65</h3>

                <p>Pasien Meninggal</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <div class="form-group">
              <label for="jabatan">Pilih Provinsi</label>
              <select class="form-control" id="wilayah" name="wilayah">
                <option value="">Pilih Wilayah</option>
                <option value="">Puncak Doger</option>
                <option value="">Cipecang</option>
                <option value="">Cukang Batu</option>
              </select>
              <label for="jabatan">Pilih Kota/Kabupaten</label>
              <select class="form-control" id="wilayah" name="wilayah">
                <option value="">Pilih Wilayah</option>
                <option value="">Puncak Doger</option>
                <option value="">Cipecang</option>
                <option value="">Cukang Batu</option>
              </select>
              <label for="jabatan">Pilih Kecamatan</label>
              <select class="form-control" id="wilayah" name="wilayah">
                <option value="">Pilih Wilayah</option>
                <option value="">Puncak Doger</option>
                <option value="">Cipecang</option>
                <option value="">Cukang Batu</option>
              </select>
            </div>
            <!-- Custom tabs (Charts with tabs)-->
            <div class="nav-tabs-custom">
              <!-- Tabs within a box -->
              <ul class="nav nav-tabs pull-right">
                <li class="pull-left header"><i class="fa fa-plus-square"></i> Grafik Kasus Covid-19</li>
              </ul>
              <div class="tab-content no-padding">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
              </div>
            </div>
        </div>
      <?php endif; ?>
    </section>
  </div>
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $("#dashboardMainMenu").addClass('active');
  });
</script>