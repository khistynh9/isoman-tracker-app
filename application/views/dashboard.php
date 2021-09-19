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

      <?php //if ($is_admin == true) : 
      ?>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $data3 = !$data_pasien3 ? 0 : $data_pasien3[0]['jml_status']; ?></h3>

              <p>Pasien Sembuh</p>
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
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $data1 = !$data_pasien1 ? 0 : $data_pasien1[0]['jml_status']; ?></h3>

              <p>Pasien Positif</p>
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
              <h3><?= $data4 = !$data_pasien4 ? 0 : $data_pasien4[0]['jml_status']; ?></h3>

              <p>Pasien ODP</p>
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
              <h3><?= $data5 = !$data_pasien5 ? 0 : $data_pasien[0]['jml_status']; ?></h3>

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
        <div class="col-md-12">
          <div class="form-group">
            <label for="jabatan">Pilih Puskesmas</label>
            <select class="form-control" id="wilayah" name="wilayah">
              <option value="">Puskesmas Manonjaya</option>
              <option value="">Puncak Doger</option>
              <option value="">Cipecang</option>
              <option value="">Cukang Batu</option>
            </select>
          </div>
        </div>
        <!-- Custom tabs (Charts with tabs)-->
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Pasien Isoman</h3>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="lineChart" style="height: 250px; width: 510px;" width="510" height="250"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <?php //endif; 
      ?>
  </div>
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $("#dashboardMainMenu").addClass('active');

    var report_data1 = <?php echo '[' . implode(',', $order_data1) . ']'; ?>;
    var report_data2 = <?php echo '[' . implode(',', $order_data2) . ']'; ?>;
    var report_data3 = <?php echo '[' . implode(',', $order_data3) . ']'; ?>;
    var report_data4 = <?php echo '[' . implode(',', $order_data4) . ']'; ?>;
    var report_data5 = <?php echo '[' . implode(',', $order_data5) . ']'; ?>;

    var areaChartData = {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
      datasets: [{
          label: 'Positif',
          fillColor: 'rgb(255,0,0)',
          strokeColor: 'rgb(221,75,51)',
          pointColor: 'rgb(221,75,51)',
          pointStrokeColor: '#DD4B39',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgb(221,75,51)',
          data: report_data1
        },
        {
          label: 'Negatif',
          fillColor: 'rgb(0, 166, 90)',
          strokeColor: 'rgb(0, 166, 90)',
          pointColor: '#00A65A',
          pointStrokeColor: 'rgb(0, 166, 90)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgb(0, 166, 90)',
          data: report_data2
        },
        {
          label: 'Sembuh',
          fillColor: 'rgba(60,141,188,0.9)',
          strokeColor: 'rgba(60,141,188,0.8)',
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: report_data3
        },
        {
          label: 'ODP',
          fillColor: 'rgb(243,156,18)',
          strokeColor: 'rgb(243,156,18)',
          pointColor: '#F39C12',
          pointStrokeColor: 'rgb(243,156,18)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgb(243,156,18)',
          data: report_data4
        },
        {
          label: 'Meninggal',
          fillColor: 'rgb(188,64,49)',
          strokeColor: 'rgb(188,64,49)',
          pointColor: '#BC4031',
          pointStrokeColor: 'rgb(188,64,49)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgb(188,64,49)',
          data: report_data5
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    }


    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChart = new Chart(lineChartCanvas)
    var lineChartOptions = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(areaChartData, lineChartOptions)


  });
</script>