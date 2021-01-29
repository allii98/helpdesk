<div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Presentasi Kerusakkan berdasarkan Nama Users</strong></h2>

                </div>
                <div class="body">
                    <canvas id="myBarChart3" class="chartjs_graph chartjs-render-monitor" width="373" height="186"
                        style="display: block; width: 373px; height: 186px;"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<?php

$Tuser = "";
$Juser = null;
foreach ($user as $data) {
    $sub    = $data->nama;
    $Tuser  .= "'$sub'" . ", ";
    $jum    = $data->user_total;
    $Juser  .= "$jum" . ", ";
}
?>

<script>
var ctx = document.getElementById("myBarChart3").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?= $Tuser; ?>],
        datasets: [{
            label: 'Total ticket',
            data: [<?= $Juser; ?>],
            backgroundColor: 'rgba(74,0,255,0.7)',
            borderColor: 'rgba(74,0,255,0.7)',
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