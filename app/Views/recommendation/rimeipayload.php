<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<?php
// Join table summary_imei and summary_payload
foreach ($rimeipayload as $data) {
    $imei[] = $data['no_imei'];
    $payload[] = $data['no_payload'];
    $kecamatan[] = $data['kecamatan_imei'];
    $imei_recom[] = $data['recommended_imei'];
    $payload_recom[] = $data['recommended_payload'];
    $imei_value[] = round($data['percentage_percent'], 4);
    $payload_value[] = round($data['payload_MB'], 3);
}
?>

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Recommendation Based on IMEI & Payload
                    <small class="text-muted"><?php echo date("l, d-M-Y"); ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('home/home'); ?>"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item active">Recommendation</li>
                    <li class="breadcrumb-item active">IMEI & Payload</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- chart js -->
    <div class="container-fluid">
        <div class="row clearfix">

            <!-- Make scatter chart with chart js -->
            <div class="col-lg-9 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Final</strong> Recommendation Result</h2>
                    </div>

                    <div class="body" style="padding: 1%;">
                        <!-- Looping for scatter plot datasets -->
                        <?php
                        foreach ($imei as $indx => $value) {
                            $chartdata[] = array("x" => $imei[$indx], "y" => $payload[$indx], "kec" => $kecamatan[$indx], "imei" => $imei_recom[$indx], "payload" => $payload_recom[$indx], "imei_value" => $imei_value[$indx], "payload_value" => $payload_value[$indx]);
                        }
                        ?>

                        <!-- Make scatter plot -->
                        <canvas id="myChart"></canvas>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/1.4.0/chartjs-plugin-annotation.min.js" integrity="sha512-HrwQrg8S/xLPE6Qwe7XOghA/FOxX+tuVF4TxbvS73/zKJSs/b1gVl/P4MsdfTFWYFYg/ISVNYIINcg35Xvr6QQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                        <script>
                            // imei threshold 
                            const imei = <?php echo json_encode($imei_recom); ?>;
                            const imei_yes = imei.filter(value => value == "Yes");
                            const imei_threshold = imei_yes.length;

                            // payload threshold
                            const payload = <?php echo json_encode($payload_recom); ?>;
                            const payload_yes = payload.filter(value => value == "Yes");
                            const payload_threshold = payload_yes.length;

                            // Set color based on recommendation result
                            const irecom = <?php echo json_encode($imei_recom); ?>;
                            const precom = <?php echo json_encode($payload_recom); ?>;
                            const bgcolor = [];
                            const bdcolor = [];
                            for (i = 0; i < irecom.length; i++) {
                                if (irecom[i] == "Yes" && precom[i] == "Yes") {
                                    bgcolor.push('rgba(54, 162, 235, 1)')
                                    bdcolor.push('Blue')
                                } else {
                                    bgcolor.push('rgb(220,220,220)')
                                    bdcolor.push('Gray')
                                }
                            }
                            // Setup Block
                            const data = {
                                datasets: [{
                                    data: <?php echo json_encode($chartdata); ?>,
                                    label: '',
                                    backgroundColor: bgcolor,
                                    borderColor: bdcolor,
                                    pointRadius: function(context) {
                                        var width = context.chart.width;
                                        var size = Math.round(width / 75);
                                        return size
                                    },
                                    hoverRadius: function(context) {
                                        var width = context.chart.width;
                                        var size = Math.round(width / 50);
                                        return size
                                    },
                                }],
                                // data for legend
                                recommendation: ["Yes", "No", "IMEI", "Payload", "IMEI & Payload"],
                                bgcolor2: ["rgba(54, 162, 235, 1)", "rgb(220,220,220)", "rgba(153, 255, 102, 0.1)", "rgba(54, 162, 235, 0.1)", "rgba(227,247,238,255)"],
                                bdcolor2: ["Blue", "Gray", "rgba(190,195,195,255)", "rgba(190,195,195,255)", "rgba(190,195,195,255)"]
                            };

                            // Config Block
                            const config = {
                                type: 'scatter',
                                data: data,
                                options: {
                                    scales: {
                                        y: {
                                            ticks: {
                                                font: function(context) {
                                                    var width = context.chart.width;
                                                    var size = Math.round(width / 70);
                                                    return {
                                                        size: size,
                                                    };
                                                }
                                            },
                                            title: {
                                                display: true,
                                                text: ['Most Recommended by Payload', '(Based on Rank)', '←'],
                                                // text: '← Most Recommended by Payload',
                                                font: function(context) {
                                                    var width = context.chart.width;
                                                    var size = Math.round(width / 50);
                                                    return {
                                                        size: size,
                                                        family: 'Bahnschrift'
                                                    };
                                                }
                                            },
                                            min: 0,
                                            max: 11,
                                            ticks: {
                                                // forces step size to be 1 units
                                                stepSize: 1
                                            }
                                        },
                                        x: {
                                            ticks: {
                                                font: function(context) {
                                                    var width = context.chart.width;
                                                    var size = Math.round(width / 70);
                                                    return {
                                                        size: size,
                                                    };
                                                }
                                            },
                                            type: 'linear',
                                            position: 'bottom',
                                            title: {
                                                display: true,
                                                text: ['←', 'Most Recommended by IMEI (Based on Rank)'],
                                                font: function(context) {
                                                    var width = context.chart.width;
                                                    var size = Math.round(width / 50);
                                                    return {
                                                        size: size,
                                                        family: 'Bahnschrift'
                                                    };
                                                }
                                            },
                                            min: 0,
                                            max: 11,
                                            ticks: {
                                                // forces step size to be 1 units
                                                stepSize: 1
                                            }
                                        }
                                    },
                                    plugins: {
                                        // Note for x labels
                                        legend: {
                                            position: 'right',
                                            labels: {
                                                pointStyle: 'circle',
                                                // usePointStyle: true,
                                                usePointStyle: false,
                                                font: function(context) {
                                                    var width = context.chart.width;
                                                    var size = Math.round(width / 68);
                                                    return {
                                                        weight: 'normal',
                                                        size: size,
                                                    };
                                                },
                                                generateLabels: (chart) => {
                                                    console.log(chart)
                                                    return chart.data.recommendation.map(
                                                        (label, index) => ({
                                                            text: label,
                                                            strokeStyle: chart.data.bdcolor2[index],
                                                            fillStyle: chart.data.bgcolor2[index],
                                                        })
                                                    )
                                                }
                                            }
                                        },
                                        // Title bar chart
                                        title: {
                                            display: true,
                                            text: 'IMEI and Payload',
                                            color: "black",
                                            font: function(context) {
                                                var width = context.chart.width;
                                                var size = Math.round(width / 25);
                                                return {
                                                    weight: 'bold',
                                                    size: size,
                                                    family: 'Impact'
                                                };
                                            },
                                        },
                                        // tooltip
                                        tooltip: {
                                            enabled: true,
                                            displayColors: false,
                                            callbacks: {
                                                label: (content) => {
                                                    console.log(content.raw)
                                                    const arrayLines = [`Kecamatan: ${content.raw.kec}`, `IMEI: ${content.raw.x} → ${content.raw.imei}`, `Payload: ${content.raw.y} → ${content.raw.payload}`, `IMEI: ${content.raw.imei_value} %`, `Payload: ${content.raw.payload_value} MB`];
                                                    return arrayLines;
                                                }
                                            },
                                            backgroundColor: "white",
                                            bodyColor: "black",
                                            borderColor: "black",
                                            borderWidth: 0.5,
                                            bodyFont: function(context) {
                                                var width = context.chart.width;
                                                var size = Math.round(width / 70);
                                                return {
                                                    size: size,
                                                };
                                            },
                                        },
                                        // Box for count of kecamatan capable 5g
                                        autocolors: false,
                                        annotation: {
                                            annotations: {
                                                // imei
                                                box1: {
                                                    type: 'box',
                                                    xMax: imei_threshold,
                                                    xMin: 0,
                                                    // backgroundColor: 'rgba(75, 192, 192, 0.1)',
                                                    backgroundColor: 'rgba(153, 255, 102, 0.1)',
                                                    borderWidth: 0.1,
                                                    drawTime: 'beforeDatasetsDraw',
                                                },
                                                // payload
                                                box2: {
                                                    type: 'box',
                                                    yMax: 0,
                                                    yMin: payload_threshold,
                                                    // backgroundColor: 'rgba(54, 162, 235, 0.1)',
                                                    backgroundColor: 'rgba(54, 162, 235, 0.1)',
                                                    borderWidth: 0.1,
                                                    drawTime: 'beforeDatasetsDraw',
                                                }
                                            }
                                        }
                                    }
                                }
                            };

                            // Render Block
                            const myChart = new Chart(
                                document.getElementById('myChart'),
                                config
                            );

                            function bgcolors() {
                                const bgColor = myChart.data.datasets[0].backgroundColor;

                                if ($imei_recom[$indx] == "Yes" && $payload_recom[$indx] == "Yes") {
                                    bgColor.push('blue');
                                } else {
                                    bgColor.push('gray');
                                }
                                myChart.update();
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>
<?= $this->endSection(); ?>