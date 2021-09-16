<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lokasi
            <small>Monitoring Pasien Isoman</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Monitoring</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-md-12 col-xs-12">
                <!-- box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Lokasi Pasien Isoman</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <button onclick="ubahdata('3454354354354353')">ubah</button>
                            <div class="col-md-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="box">
                                                <div class="box-header">
                                                    <h3 class="box-title">Pasien Isoman</h3>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <table id="manageTable" class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>NIK</th>
                                                                <th>Nama</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>

                                                    </table>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-7">
                                        <div id="map"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end isi tabel -->
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
<script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<link rel="stylesheet" href="<?= base_url('assets/js/leaflet-search-master/src/leaflet-search.css') ?>" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script src="<?= base_url('assets/js/leaflet-search-master/src/leaflet-search.js') ?>"></script>
<!-- <script src="<?php //base_url('assets/js/leaflet-routing-machine/dist/leaflet-routing-machine.js') 
                    ?>"></script> -->
<script src="<?= base_url('assets/js/leaflet-geometryutil-master/src/leaflet.geometryutil.js') ?>"></script>

<!-- firebase -->
<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>

<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>

<script>
    var firebaseConfig = {
        piKey: "AIzaSyCr3IQ8HnSA15wvMSG2N5B-sJEhQ8JC0hM",
        authDomain: "pertama-5fa3b.firebaseapp.com",
        projectId: "pertama-5fa3b",
        storageBucket: "pertama-5fa3b.appspot.com",
        messagingSenderId: "532635605413",
        appId: "1:532635605413:web:c1587dacda146a61ed704c"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    const db = firebase.database();

    let puskesmas_id = "<?= $this->session->userdata('puskesmas_id'); ?>";
    var pasienRef = db.ref('lokasi').orderByChild('puskesmas_id').equalTo(puskesmas_id);
</script>
<script type="text/javascript">
    var manageTable;
    var base_url = "<?= base_url(); ?>";
    $(document).ready(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        manageTable = $('#manageTable').DataTable({
            'ajax': base_url + 'monitoring/fetchPasienData',
            'order': []
        });

        $("#monitorMainNav").addClass('active');
        $("#lokasiMonitorSubNav").addClass('active');
    });

    // var firstLatLng, firstPoint, secondLatLng, secondPoint, distance, length, polyline;

    var map = L.map('map').setView([-7.339146794104617, 108.24049641018526], 12);

    var LayerKita = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
    });
    map.addLayer(LayerKita);


    var markersLayer = new L.LayerGroup(); //layer contain searched elements

    map.addLayer(markersLayer);

    var controlSearch = new L.Control.Search({
        position: 'topleft',
        layer: markersLayer,
        initial: false,
        marker: false
    });


    var data = [];
    // var obj = [];
    pasienRef.on('value', snapshot => {
        // data.push(5, 4);
        snapshot.forEach((child) => {
            let loc1 = JSON.parse(child.val().loc_begin);
            let loc2 = JSON.parse(child.val().loc_end);

            var obj = {
                "type": "Feature",
                "properties": {
                    "nik": child.val().nik,
                    "nama": child.val().nama,
                    "status": child.val().status,
                    "lok_awal": loc1,
                    "lok_akhir": loc2
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": loc2
                }
            }

            data.push(obj);
        });
        runningAfterGetData(data);
    });

    // var bbTeam;
    function runningAfterGetData(datasParam) {

        var bbTeam = L.geoJSON(datasParam, {
            onEachFeature: forEachFeature,
            pointToLayer: function(feature, latlng) {
                return L.circle(latlng, {
                    radius: 100,
                    color: getColor(feature.properties.status),
                    weight: 10

                }).bindTooltip(feature.properties.nama);

            }
        });
        //bbTeam.addData(datasParam);
        markersLayer.addLayer(bbTeam);
        // console.group(`ini bbTeam`);
        // console.log(bbTeam);
        // console.groupEnd();
    }

    // map.addControl(controlSearch);
    // markersLayer.addLayer(bbTeam);
    // console.group(`ini databbTeam`);
    // console.log(bbTeam);
    // console.groupEnd();

    //set warna status
    function getColor(status) {
        return status == '1' ? 'blue' : status == '2' ? 'red' : white;
    }

    function editDanger(nik, status) {
        var nik_paisen = nik;
        var status_pas = status;
        // $.ajax({
        //     type: 'ajax',
        //     method: 'post',
        //     url: base_url + 'monitoring/ubahStat/' + nik_paisen,
        //     data: {
        //         nik: nik_paisen
        //     },
        //     async: false,
        //     dataType: 'JSON',
        //     success: function(data) {
        //         $('input[name=kode_barang]').val(data.kode_barang);
        //         $('input[name=nama_produk]').val(data.nama_produk);
        //     },
        //     error: function() {
        //         alert('Could not edit data.');
        //     }
        // });

    }

    function getDistance(origin, destination, status, nik) {
        // return distance in meters
        // console.group(`origin`);
        // console.log(origin);
        // console.groupEnd();
        var lon1 = toRadian(origin[0]),
            lat1 = toRadian(origin[1]),
            lon2 = toRadian(destination[0]),
            lat2 = toRadian(destination[1]),
            stat = status,
            nik_pas = nik;

        var deltaLat = lat2 - lat1;
        var deltaLon = lon2 - lon1;

        var a = Math.pow(Math.sin(deltaLat / 2), 2) + Math.cos(lat1) * Math.cos(lat2) * Math.pow(Math.sin(deltaLon / 2), 2);
        var c = 2 * Math.asin(Math.sqrt(a));
        var EARTH_RADIUS = 6371;
        var radius = c * EARTH_RADIUS * 1000; //in meters
        if (radius > 100) {
            var danger = 2;
            db.ref("lokasi").orderByChild("nik").equalTo(nik_pas).once("value", function(snapshot) {
                snapshot.forEach(function(user) {
                    user.ref.child("status").set(danger);
                });
            })
            editDanger(nik_pas, danger);
            return danger;
        } else if (radius <= 100) {
            var aman = 1;
            if (stat == 2) {
                db.ref("lokasi").orderByChild("nik").equalTo(nik_pas).once("value", function(snapshot) {
                    snapshot.forEach(function(user) {
                        user.ref.child("status").set(aman);
                    });
                })
                return aman;
            } else {
                return aman;
            }

        }
    }

    function toRadian(degree) {
        return degree * Math.PI / 180;
    }

    // //popup data pasien
    function forEachFeature(feature, layer) {
        var awal = feature.properties.lok_awal;
        var akhir = feature.properties.lok_akhir;
        var nik = feature.properties.nik;
        var status = feature.properties.status;
        var distance = getDistance(awal, akhir, status, nik);
        // console.group(`cek aman`);
        // console.log(distance);
        // console.groupEnd();

        var popupContent = "<p>Pasien <p>" +
            "Nama: " + feature.properties.nama +
            "</br> NIK: " + feature.properties.nik + "</br>" +
            'Status: ' + distance;

        if (feature.properties && feature.properties.popupContent) {
            popupContent += feature.properties.popupContent;
        }
        // L.marker(akhir).addTo(map);

        layer.bindPopup(popupContent);
    };

    // var bbTeam2 = L.geoJSON(datas, {
    //     onEachFeature: forEachFeature,
    //     pointToLayer: function(feature, latlng) {
    //         return L.circle(latlng, {
    //             radius: 100,
    //             opacity: .5,
    //             color: getColor(feature.properties.status)

    //         }).bindTooltip(feature.properties.nama);

    //     }
    // }).addTo(map);
    // console.group(`ini databbTeam2`);
    // console.log(bbTeam2);
    // console.groupEnd();
    // var markersLayer = new L.LayerGroup(); //layer contain searched elements

    // map.addLayer(markersLayer);

    // var controlSearch = new L.Control.Search({
    //     position: 'topleft',
    //     layer: markersLayer,
    //     initial: false,
    //     marker: false
    // });

    // map.addControl(controlSearch);
    // markersLayer.addLayer(bbTeam);
    // console.log(bbTeam);
</script>