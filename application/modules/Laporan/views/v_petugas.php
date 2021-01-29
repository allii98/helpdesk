<div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Presentasi Kerusakkan berdasarkan Nama Petugas</strong></h2>

                </div>
                <div class="body">
                    <canvas id="myBarChart4" class="chartjs_graph chartjs-render-monitor" width="373" height="186"
                        style="display: block; width: 373px; height: 186px;"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<?php

$Tptugas = "";
$Jptugas = null;
foreach ($petugas as $data) {
    $sub    = $data->nama;
    $Tptugas  .= "'$sub'" . ", ";
    $jum    = $data->user_total;
    $Jptugas  .= "$jum" . ", ";
}
?>

<script>
var ctx = document.getElementById("myBarChart4").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?= $Tptugas; ?>],
        datasets: [{
            label: 'Total ticket',
            data: [<?= $Jptugas; ?>],
            backgroundColor: 'rgba(255,18,18,0.7)',
            borderColor: 'rgba(255,18,18,0.7)',
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
</script>