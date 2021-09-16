<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kelola
            <small>Users</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Users</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <!-- message query -->
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
                        <h3 class="box-title">Tambah Lokasi User</h3>
                    </div>
                    <form role="form" action="<?= base_url('pasien/tambah_lokasi') ?>" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group <?= form_error('nik') ? 'has-error' : null ?>">
                                        <label for="nik">Pilih NIK</label>
                                        <select class="form-control select" id="nik" name="nik">
                                            <?php foreach ($pasien_data as $k => $v) : ?>
                                                <option value="<?= $v['nik'] ?>"><?= $v['nik'] . " - " . $v['nama'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <?= form_error('nik'); ?>
                                    </div>
                                    <div class="form-group <?= form_error('lokasi') ? 'has-error' : null ?>">
                                        <label for="lokasi">Koordinat Lokasi</label>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="lokasi" value="<?= set_value('lokasi') ?>" autocomplete="off">
                                        <?= form_error('lokasi'); ?>
                                    </div>
                                    <div class="form-group <?= form_error('provinsi') ? 'has-error' : null ?>">
                                        <label for="provinsi">Pilih Provinsi</label>
                                        <select class="form-control select" id="provinsi" name="provinsi">
                                            <option>Pilih provinsi</option>
                                        </select>
                                        <input type="hidden" class="form-control" id="provinsi_val" name="provinsi_val">
                                        <?= form_error('provinsi'); ?>
                                    </div>
                                    <div class="form-group <?= form_error('kotkab') ? 'has-error' : null ?>">
                                        <label for="kotkab">Pilih Kota/Kabupaten</label>
                                        <select class="form-control select" id="kotkab" name="kotkab">
                                            <option value="">Pilih kotkab</option>
                                        </select>
                                        <input type="hidden" class="form-control" id="kotkab_val" name="kotkab_val">
                                        <?= form_error('kotkab'); ?>
                                    </div>
                                    <div class="form-group <?= form_error('kec') ? 'has-error' : null ?>">
                                        <label for="kec">Pilih Kecamatan</label>
                                        <select class="form-control select" id="kec" name="kec">
                                            <option value="">Pilih kec</option>
                                        </select>
                                        <input type="hidden" class="form-control" id="kec_val" name="kec_val">
                                        <?= form_error('kec'); ?>
                                    </div>
                                    <div class="form-group <?= form_error('keldes') ? 'has-error' : null ?>">
                                        <label for="keldes">Pilih Kelurahan/Desa</label>
                                        <select class="form-control select" id="keldes" name="keldes">
                                            <option value="">Pilih keldes</option>
                                        </select>
                                        <input type="hidden" class="form-control" id="keldes_val" name="keldes_val">
                                        <?= form_error('keldes'); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div id="map"></div>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="<?= base_url('pasien') ?>" class="btn btn-warning">Kembali</a>
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

<!-- leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".select").select2();

        $("#pasienMainNav").addClass('active');
        $("#createPasienLokSubNav").addClass('active');
        var map = L.map('map').setView([-7.360317046683616, 108.20661637171222], 16);

        var LayerKita = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map);
        //map.addLayer(LayerKita);


        var marker;

        function onMapClick(e) {
            var lokasi = e.latlng.lng + ", " + e.latlng.lat;
            if (!marker) {
                marker = L.marker(e.latlng).addTo(map);
            } else {
                marker.setLatLng(e.latlng);
            }
            document.getElementById('lokasi').value = lokasi; //value pada form latitde, longitude akan berganti secara otomatis
        }
        map.on('click', onMapClick);

        let endpoint = "http://dev.farizdotid.com/api/daerahindonesia/";
        //get data provinsi
        $.ajax({
            url: endpoint + 'provinsi',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var html = "";
                if (data) {
                    for (let i = 0; i < data.provinsi.length; i++) {
                        html += '<option value="' + data.provinsi[i].id + '">' +
                            data.provinsi[i].nama +
                            '</option>';
                    }
                }
                $("#provinsi").html(html);
                $("#provinsi").change(function() {
                    let prov = $("#provinsi :selected").text();
                    $("#provinsi_val").val(prov);
                    getAjaxKota();
                });
                // console.log(data.provinsi[0]);
            }
        });



        //get data kot kab
        function getAjaxKota() {
            var id_prov = $("#provinsi").val();
            $.ajax({
                url: endpoint + 'kota?id_provinsi=' + id_prov,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var html = "";
                    if (data) {
                        for (let i = 0; i < data.kota_kabupaten.length; i++) {
                            html += '<option value="' + data.kota_kabupaten[i].id + '">' +
                                data.kota_kabupaten[i].nama +
                                '</option>';
                        }
                    }
                    $("#kotkab").html(html);
                    $("#kotkab").change(function() {
                        let kotkab = $("#kotkab :selected").text();
                        $("#kotkab_val").val(kotkab);
                        getAjaxKec();
                    });
                }
            });
        }

        //get data kec
        function getAjaxKec() {
            var id_kotkab = $("#kotkab").val();
            $.ajax({
                url: endpoint + 'kecamatan?id_kota=' + id_kotkab,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var html = "";
                    if (data) {
                        for (let i = 0; i < data.kecamatan.length; i++) {
                            html += '<option value="' + data.kecamatan[i].id + '">' +
                                data.kecamatan[i].nama +
                                '</option>';
                        }
                    }
                    $("#kec").html(html);
                    $("#kec").change(function() {
                        let kec = $("#kec :selected").text();
                        $("#kec_val").val(kec);
                        getAjaxKeldes();
                    });
                }
            });
        }

        //get data kel des
        function getAjaxKeldes() {
            var id_kec = $("#kec").val();
            $.ajax({
                url: endpoint + 'kelurahan?id_kecamatan=' + id_kec,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var html = "";
                    if (data) {
                        for (let i = 0; i < data.kelurahan.length; i++) {
                            html += '<option value="' + data.kelurahan[i].id + '">' +
                                data.kelurahan[i].nama +
                                '</option>';
                        }
                    }
                    $("#keldes").html(html);
                    $("#keldes").change(function() {
                        let keldes = $("#keldes :selected").text();
                        $("#keldes_val").val(keldes);
                    });
                }
            });
        }



    });
</script>