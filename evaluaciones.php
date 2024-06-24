<?php
include("auth.php");
include("cabecera.php");
include("conexion.php");
$cod = $_SESSION["usuario"];
$sql = "SELECT a.*, n.* FROM alumno a, nota n WHERE a.codalumno = n.codalumno AND a.codalumno = '$cod'";
$f = mysqli_query($cn, $sql);
$r = mysqli_fetch_assoc($f);

$notas = [
    ['x' => 'Nota 1', 'y' => $r['nota1']],
    ['x' => 'Nota 2', 'y' => $r['nota2']],
    ['x' => 'Nota 3', 'y' => $r['nota3']]
];
$promedio = ($r['nota1']+$r['nota2']+$r['nota3'])/3;
?>
<main class="container mx-auto mt-4 space-y-4 flex flex-col items-center">
    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div>
                        <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Visualizacion De Notas</h5>
                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Vamos a por esa vacante!</p>
                    </div>
                </div>
                <div>
                    <span class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                        Cpu 2024
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-2">
                <dl class="flex items-center">
                    <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal me-1">Promedio Ponderado:</dt>
                    <dd class="text-gray-900 text-sm dark:text-white font-semibold"><?php echo $promedio;?></dd>
                </dl>
                <!-- <dl class="flex items-center justify-end">
                    <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal me-1">Conversion rate:</dt>
                    <dd class="text-gray-900 text-sm dark:text-white font-semibold">1.2%</dd>
                </dl> -->
            </div>

            <div id="column-chart"></div>

        </div>
    </div>
</main>
<script>
    const notas = <?php echo json_encode($notas); ?>;
    const options = {
        colors: ["#1A56DB", "#FDBA8C"],
        series: [{
            name: "Nota",
            color: "#1A56DB",
            data: notas,
        } ],
        chart: {
            type: "bar",
            height: "320px",
            fontFamily: "Inter, sans-serif",
            toolbar: {
                show: false,
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "70%",
                borderRadiusApplication: "end",
                borderRadius: 8,
            },
        },
        tooltip: {
            shared: true,
            intersect: false,
            style: {
                fontFamily: "Inter, sans-serif",
            },
        },
        states: {
            hover: {
                filter: {
                    type: "darken",
                    value: 1,
                },
            },
        },
        stroke: {
            show: true,
            width: 0,
            colors: ["transparent"],
        },
        grid: {
            show: false,
            strokeDashArray: 4,
            padding: {
                left: 2,
                right: 2,
                top: -14
            },
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
        },
        xaxis: {
            floating: false,
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                }
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            show: false,
        },
        fill: {
            opacity: 1,
        },
    }

    if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("column-chart"), options);
        chart.render();
    }
</script>