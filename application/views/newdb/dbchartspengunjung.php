<script>
    chartColor = "#FFFFFF";
    ctx = document.getElementById('chartHours').getContext("2d");

    myChart = new Chart(ctx, {
        type: 'line',

        data: {
            // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
            labels: [
                <?php foreach ($dataKunjungan as $dk) :
                    echo '"' . $dk['date'] . '",';
                endforeach;
                ?>
            ],
            datasets: [{
                borderColor: "#6bd098",
                backgroundColor: "#6bd098",
                pointRadius: 0,
                pointHoverRadius: 0,
                borderWidth: 3,
                // data: [300, 310, 316, 322, 330, 326, 333, 345, 338, 354]
                data: [
                    <?php foreach ($dataKunjungan as $dk) :
                        echo $dk['kunjungan'] . ',';
                    endforeach;
                    ?>
                ],
            }]
        },
        options: {
            legend: {
                display: false
            },

            tooltips: {
                enabled: false
            },

            scales: {
                yAxes: [{

                    ticks: {
                        fontColor: "#9f9f9f",
                        beginAtZero: false,
                        maxTicksLimit: 5,
                        //padding: 20
                    },
                    gridLines: {
                        drawBorder: false,
                        zeroLineColor: "#ccc",
                        color: 'rgba(255,255,255,0.05)'
                    }

                }],

                xAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: 'rgba(255,255,255,0.1)',
                        zeroLineColor: "transparent",
                        display: false,
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "#9f9f9f"
                    }
                }]
            },
        }
    });
</script>