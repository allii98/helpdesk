<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <ul class="row profile_state list-unstyled">
                    <li class="col-lg-3 col-md-3 col-6">
                        <div class="body">
                            <i class="zmdi zmdi-collection-text"></i>
                            <h4><?= $jml_tiket ?></h4>
                            <span>All Ticket</span>
                        </div>
                    </li>
                    <li class="col-lg-3 col-md-3 col-6">
                        <div class="body">
                            <i class="zmdi zmdi-ticket-star"></i>
                            <h4><?= $jlm_new ?></h4>
                            <span>New Ticket</span>
                        </div>
                    </li>
                    <li class="col-lg-3 col-md-3 col-6">
                        <div class="body">
                            <i class="zmdi zmdi-time"></i>
                            <h4><?= $proses ?></h4>
                            <span>On Process</span>
                        </div>
                    </li>
                    <li class="col-lg-3 col-md-3 col-6">
                        <div class="body">
                            <i class="zmdi zmdi-thumb-up col-blue"></i>
                            <h4><?= $done ?></h4>
                            <span>Done</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- berdasarkan kategori -->
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Kerusakkan berdasarkan category Assets</strong></h2>

                </div>
                <div class="body">
                    <canvas id="myBarChart" class="chartjs_graph chartjs-render-monitor" width="373" height="186"
                        style="display: block; width: 373px; height: 186px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Kerusakkan berdasarkan category non Assets</strong></h2>

                </div>
                <div class="body">
                    <canvas id="myBarChart3" class="chartjs_graph chartjs-render-monitor" width="373" height="186"
                        style="display: block; width: 373px; height: 186px;"></canvas>
                </div>
            </div>
        </div>

        <!-- berdasarkan nama user -->
        <div class="col-md-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Kerusakan berdasarkan Petugas</strong></h2>

                </div>
                <div class="body">
                    <canvas id="myBarChart2" class="chartjs_graph chartjs-render-monitor" width="373" height="186"
                        style="display: block; width: 373px; height: 186px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Kerusakan berdasarkan nama users</strong></h2>

                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table id="example"
                            class="table table-bordered table-striped table-hover js-basic-example dataTable ">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Total Tiket</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                if (isset($user)) {
                                    foreach ($user as $data) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data->nama ?></td>
                                    <td><?= $data->user_total ?> Tiket</td>
                                </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
$Tsub     = "";
$Jsub     = null;
foreach ($jml_kat as $data) {
    $sub    = $data->category;
    $Tsub  .= "'$sub'" . ", ";
    $jum    = $data->total;
    $Jsub  .= "$jum" . ", ";
}
$Tnon     = "";
$Jnon     = null;
foreach ($jml_kat_non as $data) {
    $sub    = $data->nama_kategori;
    $Tnon  .= "'$sub'" . ", ";
    $jum    = $data->total;
    $Jnon  .= "$jum" . ", ";
}

$Tptugas = "";
$Jptugas = null;
foreach ($petugas as $data) {
    $sub    = $data->nama_petugas;
    $Tptugas  .= "'$sub'" . ", ";
    $jum    = $data->petugas_total;
    $Jptugas  .= "$jum" . ", ";
}
?>

<script>
var Bar = document.getElementById("myBarChart");
var chart = new Chart(Bar, {
    type: 'horizontalBar',
    data: {
        labels: [<?= $Tsub; ?>],
        datasets: [{
            label: 'Total Ticket',
            backgroundColor: "#FC8500",
            hoverBackgroundColor: "#FC8500",
            borderColor: "#4e73df",
            data: [<?php echo $Jsub; ?>]
        }]
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
            displayColors: false
        },
        layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
        },
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero: true,
                },
                maxBarThickness: 25,
            }],
            yAxes: [{
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                maxBarThickness: 25
            }]
        },
        legend: {
            display: false
        }
    }
});
var Bar = document.getElementById("myBarChart3");
var chart = new Chart(Bar, {
    type: 'horizontalBar',
    data: {
        labels: [<?= $Tnon; ?>],
        datasets: [{
            label: 'Total Ticket',
            backgroundColor: "#04fc00",
            hoverBackgroundColor: "#04fc00",
            borderColor: "#4e73df",
            data: [<?php echo $Jnon; ?>]
        }]
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
            displayColors: false
        },
        layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
        },
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero: true,
                },
                maxBarThickness: 25,
            }],
            yAxes: [{
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                maxBarThickness: 25
            }]
        },
        legend: {
            display: false
        }
    }
});

var ctx = document.getElementById("myBarChart2").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?= $Tptugas; ?>],
        datasets: [{
            label: 'Total ticket',
            data: [<?= $Jptugas; ?>],
            backgroundColor: 'rgba(0, 0, 255)',
            borderColor: 'rgba(0, 0, 255)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

$(document).ready(function() {
    $('#example').DataTable({
        "lengthMenu": [
            [4, 5, 10],
            [4, 5, 10]
        ]
    });
});
</script>