<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Coverage Map Based on IMEI
                    <small class="text-muted"><?php echo date("l, d-M-Y"); ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('home/home'); ?>"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item active">Coverage Map</li>
                    <li class="breadcrumb-item active">IMEI</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Leaflet Connect to Database -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Average Percentage of <strong>User Support 5G</strong> per Kecamatan</h2>
                    </div>
                    <div class="body">
                        <!-- map -->
                        <div id="mapid" style="height: 450px;"></div>
                    </div>
                    <script>
                        // Setting base map
                        var mymap = L.map('mapid').setView([-6.3896909, 106.8197387], 12);
                        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                            maxZoom: 18,
                            id: 'mapbox/streets-v11',
                            tileSize: 512,
                            zoomOffset: -1,
                            accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
                        }).addTo(mymap);

                        // custom basemap leaflet
                        var baselayers = {
                            "Stamen_Watercolor": L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
                                attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                                subdomains: 'abcd',
                                minZoom: 1,
                                maxZoom: 16,
                                ext: 'jpg'
                            }),
                            "OpenStreetMap_HOT": L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
                            }),
                            "Esri_WorldImagery": L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                                attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
                            }),
                            "Esri_NatGeoWorldMap": L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}', {
                                attribution: 'Tiles &copy; Esri &mdash; National Geographic, Esri, DeLorme, NAVTEQ, UNEP-WCMC, USGS, NASA, ESA, METI, NRCAN, GEBCO, NOAA, iPC',
                                maxZoom: 16
                            }),
                            "OpenStreetMap_Mapnik": L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                            }),
                            "Stamen_Toner": L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}{r}.{ext}', {
                                attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                                subdomains: 'abcd',
                                minZoom: 0,
                                maxZoom: 20,
                                ext: 'png'
                            }),
                            "Stamen_Terrain": L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/terrain/{z}/{x}/{y}{r}.{ext}', {
                                attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                                subdomains: 'abcd',
                                minZoom: 0,
                                maxZoom: 18,
                                ext: 'png'
                            }),
                        };
                        var overlays = {};
                        L.control.layers(baselayers, overlays).addTo(mymap);
                        // baseLayers["Stamen_Watercolor"].addTo(mymap);

                        <?php
                        foreach ($cimei as $data) {
                        ?>
                            // Variable for getColor function
                            var recom = [<?php echo json_encode($data['recommended_imei']); ?>];
                            // Set color based on condition
                            function getColor() {
                                for (i = 0; i < recom.length; i++) {
                                    if (recom[i] == "Yes") {
                                        return {
                                            color: "Blue",
                                        }
                                    } else if (recom[i] == "No") {
                                        return {
                                            color: "Gray",
                                        }
                                    }
                                }
                            };

                            // AJAX for show geojson
                            var jsonTest = new L.GeoJSON.AJAX(["<?= base_url(); ?>/assets/plugins/leaflet/geojson/<?= $data['geojson'] ?>"], {
                                onEachFeature: function popUp(f, l) {
                                    var out = [];
                                    var out2 = [];
                                    out.push("Kecamatan: " + "<b><?= $data['kecamatan'] ?></b>");
                                    out.push("IMEI: " + "<?= round($data['percentage_percent'], 4) ?>" + " %");
                                    out.push("Recommended: " + "<?= $data['recommended_imei'] ?>");
                                    out2.push("<b><?= $data['kecamatan'] ?></b>");

                                    // Information popup
                                    l.bindPopup(out.join("<br />"));
                                    l.on('mousemove', function(event) {
                                        this.openPopup();
                                    });
                                    l.on('mouseout', function(event) {
                                        this.closePopup();
                                    });

                                    // Label
                                    l.bindTooltip(out2.join("<br />"), {
                                        permanent: true,
                                        direction: "center",
                                        className: "no-background",
                                    });
                                },
                                style: getColor(),
                            }).addTo(mymap);
                        <?php } ?>

                        // legend for color description
                        var legend = L.control({
                            position: "bottomright"
                        });

                        const time = <?php echo json_encode($data['time']); ?>;
                        legend.onAdd = function(mymap) {
                            var div = L.DomUtil.create("div", "legend");
                            div.innerHTML += "<h4>Recommended</h4>";
                            div.innerHTML += '<i style="background: Blue"></i><span>Yes</span><br>';
                            div.innerHTML += '<i style="background: Gray"></i><span>No</span><br>';
                            div.innerHTML += '<i class="zmdi zmdi-time"></i><span>' + time + ' <code>(YYYYMM)</code></span><br>';
                            return div;
                        };
                        legend.addTo(mymap);
                    </script>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?= $this->endSection(); ?>