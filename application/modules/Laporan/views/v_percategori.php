<div class="container-fluid">
    <!-- Basic Examples -->

    <div class="row clearfix" id="reportPage">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Presentasi Kerusakkan
                            berdasarkan
                            category Assets</strong> </h2>
                </div>
                <div class="body">

                    <canvas id="myBarChart" class="chartjs_graph chartjs-render-monitor" width="373" height="186"
                        style="display: block; width: 373px; height: 186px;"></canvas>


                </div>

            </div>
        </div>
    </div>


</div>

<!-- <button class="btn btn-primary"
                            id="downloadPdf">Pdf</button>&nbsp;&nbsp;&nbsp; -->

<div class="container-fluid" id="reportPage2">

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Presentasi Kerusakkan
                            berdasarkan
                            category Non Assets</strong></h2>

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
$Tsub     = "";
$Jsub     = null;
foreach ($jml_kat as $data) {
    $sub    = $data->category;
    $Tsub  .= "'$sub'" . ", ";
    $juml    = $data->total;
    $Jsub  .= "$juml" . ", ";
}
$Tnon     = "";
$Jnon     = null;
foreach ($jml_kat_non as $data) {
    $sub    = $data->nama_kategori;
    $Tnon  .= "'$sub'" . ", ";
    $jum    = $data->total;
    $Jnon  .= "$jum" . ", ";
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
        title: {
            display: true,
            text: 'Berdasarkan Assets'
        },
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
        title: {
            display: true,
            text: 'Berdasarkan Non Assets'
        },
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


$('#downloadPdf').click(function(event) {
    // get size of report page
    var reportPageHeight = $('#reportPage').innerHeight();
    var reportPageWidth = $('#reportPage').innerWidth();

    // create a new canvas object that we will populate with all other canvas objects
    var pdfCanvas = $('<canvas />').attr({
        id: "canvaspdf",
        width: reportPageWidth,
        height: reportPageHeight
    });

    // keep track canvas position
    var pdfctx = $(pdfCanvas)[0].getContext('2d');
    var pdfctxX = 0;
    var pdfctxY = 0;
    var buffer = 100;

    // for each chart.js chart
    $("canvas").each(function(index) {
        // get the chart height/width
        var canvasHeight = $(this).innerHeight();
        var canvasWidth = $(this).innerWidth();

        // draw the chart into the new canvas
        pdfctx.drawImage($(this)[0], pdfctxX, pdfctxY, canvasWidth, canvasHeight);
        pdfctxX += canvasWidth + buffer;

        // our report page is in a grid pattern so replicate that in the new canvas
        if (index % 2 === 1) {
            pdfctxX = 0;
            pdfctxY += canvasHeight + buffer;
        }
    });

    // create new pdf and add our new canvas as an image
    var pdf = new jsPDF('l', 'pt', [reportPageWidth, reportPageHeight]);
    pdf.addImage($(pdfCanvas)[0], 'PNG', 0, 0);

    // download the pdf
    pdf.save('Grafik_Assets.pdf');
});

$('#downloadPdf2').click(function(event) {
    // get size of report page
    var reportPageHeight = $('#reportPage2').innerHeight();
    var reportPageWidth = $('#reportPage2').innerWidth();

    // create a new canvas object that we will populate with all other canvas objects
    var pdfCanvas = $('<canvas />').attr({
        id: "canvaspdf2",
        width: reportPageWidth,
        height: reportPageHeight
    });

    // keep track canvas position
    var pdfctx = $(pdfCanvas)[0].getContext('2d');
    var pdfctxX = 0;
    var pdfctxY = 0;
    var buffer = 100;

    // for each chart.js chart
    $("canvas").each(function(index) {
        // get the chart height/width
        var canvasHeight = $(this).innerHeight();
        var canvasWidth = $(this).innerWidth();

        // draw the chart into the new canvas
        pdfctx.drawImage($(this)[0], pdfctxX, pdfctxY, canvasWidth, canvasHeight);
        pdfctxX += canvasWidth + buffer;

        // our report page is in a grid pattern so replicate that in the new canvas
        if (index % 2 === 1) {
            pdfctxX = 0;
            pdfctxY += canvasHeight + buffer;
        }
    });

    // create new pdf and add our new canvas as an image
    var pdf = new jsPDF('l', 'pt', [reportPageWidth, reportPageHeight]);
    pdf.addImage($(pdfCanvas)[0], 'PNG', 0, 0);

    // download the pdf
    pdf.save('Grafik_NonAssets.pdf');
});
</script>