<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?php
// Payload
foreach ($rpayload as $data) {
    $time[] = $data['time'];
    $kecamatan[] = $data['kecamatan_payload'];
    $payload[] = $data['payload_MB'];
    $payload_recom[] = $data['recommended_payload'];
}

// Threshold
foreach ($threshold as $data) {
    $payload2 = round($data['payload_threshold'], 3);
}
?>

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Recommendation Based on Payload
                    <small class="text-muted"><?php echo date("l, d-M-Y"); ?></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('home/home'); ?>"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item active"> Recommendation</li>
                    <li class="breadcrumb-item active"> Payload</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">

            <!-- Make bar chart with chart js -->
            <div class="col-lg-9 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Average <strong>Payload</strong> Usage per Kecamatan</h2>
                    </div>
                    <div class="body" style="padding: 1%;">

                        <!-- Make bar Chart -->
                        <canvas id="myChart"></canvas>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/1.4.0/chartjs-plugin-annotation.min.js" integrity="sha512-HrwQrg8S/xLPE6Qwe7XOghA/FOxX+tuVF4TxbvS73/zKJSs/b1gVl/P4MsdfTFWYFYg/ISVNYIINcg35Xvr6QQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                        <script>
                            // color based on recommendation
                            const recom = <?php echo json_encode($payload_recom); ?>;
                            const bgcolor = [];
                            const bdcolor = [];
                            for (i = 0; i < recom.length; i++) {
                                if (recom[i] == "Yes") {
                                    bgcolor.push('rgba(54, 162, 235, 0.2)')
                                    bdcolor.push('rgba(54, 162, 235, 1)')
                                } else {
                                    bgcolor.push('rgb(239,239,241)')
                                    bdcolor.push('Gray')
                                }
                            }

                            // Setup Block
                            const data = {
                                // data in sumbu x
                                labels: <?php echo json_encode($kecamatan); ?>,
                                datasets: [{
                                    label: "",

                                    // data in sumbu y
                                    data: <?php echo json_encode($payload); ?>,
                                    backgroundColor: bgcolor,
                                    borderColor: bdcolor,
                                    borderWidth: 1,
                                }],

                                // data for legend
                                recommendation: ["Yes", "No"],
                                bgcolor2: ["rgba(54, 162, 235, 0.2)", "rgb(239,239,241)"],
                                bdcolor2: ["rgba(54, 162, 235, 1)", "Gray"]
                            };

                            // Config Block
                            const config = {
                                type: 'bar',
                                // the "data" take variable upside
                                data,

                                options: {
                                    // horizontal bar chart
                                    indexAxis: 'y',

                                    // x and y label title
                                    scales: {
                                        // y label title
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
                                                text: 'Kecamatan',
                                                font: function(context) {
                                                    var width = context.chart.width;
                                                    var size = Math.round(width / 50);
                                                    return {
                                                        size: size,
                                                        family: 'Bahnschrift'
                                                    };
                                                }
                                            }
                                        },
                                        // x label title
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
                                            title: {
                                                display: true,
                                                text: 'Payload (MB)',
                                                font: function(context) {
                                                    var width = context.chart.width;
                                                    var size = Math.round(width / 50);
                                                    return {
                                                        size: size,
                                                        family: 'Bahnschrift'
                                                    };
                                                }
                                            }
                                        }
                                    },
                                    plugins: {
                                        // Note for x labels
                                        legend: {
                                            position: 'right',
                                            labels: {
                                                font: function(context) {
                                                    var width = context.chart.width;
                                                    var size = Math.round(width / 70);
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
                                            text: 'Payload',
                                            color: "black",
                                            font: function(context) {
                                                var width = context.chart.width;
                                                var size = Math.round(width / 30);
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
                                                title: function(item, everything) {
                                                    return;
                                                },
                                                label: function(item, everything) {
                                                    // console.log(item);
                                                    // console.log(everything);
                                                    // uncommand the code above, then:
                                                    // look the console of the website by right click -> inspect

                                                    const arrayLines = [`"Kecamatan ${item.label} has ${item.formattedValue} MB of average payload usage"`];
                                                    return arrayLines;
                                                }
                                            },
                                            backgroundColor: "white",
                                            bodyColor: "black",
                                            borderColor: "black",
                                            borderWidth: 0.5,
                                            boxWidth: 40,
                                            bodyFont: function(context) {
                                                var width = context.chart.width;
                                                var size = Math.round(width / 70);
                                                return {
                                                    size: size,
                                                };
                                            },
                                        },
                                        // Line for threshold of mean user capable 5g
                                        autocolors: false,
                                        annotation: {
                                            annotations: {
                                                line1: {
                                                    type: "line",
                                                    xMin: <?php echo json_encode($payload2); ?>,
                                                    xMax: <?php echo json_encode($payload2); ?>,
                                                    borderColor: 'rgba(255, 99, 132, 0.7)',
                                                    borderWidth: 3,
                                                    label: {
                                                        content: ['Average of payload usage', 'is <?php echo json_encode($payload2); ?> MB'],
                                                        // https://githubhot.com/repo/chartjs/chartjs-plugin-annotation/issues/589
                                                        enabled: (ctx) => ctx.hovered,
                                                        position: "center",
                                                        backgroundColor: "rgba(255, 99, 132, 0.9)",
                                                        borderWidth: 0.3,
                                                        drawTime: 'afterDatasetsDraw',
                                                        color: "white",
                                                        font: function(context) {
                                                            var width = context.chart.width;
                                                            var size = Math.round(width / 70);
                                                            return {
                                                                weight: 'normal',
                                                                size: size,
                                                            };
                                                        },
                                                    },
                                                    enter(context) {
                                                        context.hovered = true;
                                                        context.chart.update();
                                                    },
                                                    leave(context) {
                                                        context.hovered = false;
                                                        context.chart.update();
                                                    },
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
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>