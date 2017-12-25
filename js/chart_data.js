$(document).ready(function () {
    getChartData();

    function getChartData() {
        $.ajax({
            url: './php/show_chart.php',
            data: id,
            type: 'get',
            dataType: 'json',
            success: chart
        })
    }

    function chart(result) {
        var date = new Date();
        var income = [];
        income[0] = result[0]['income'];
        income[1] = result[2]['income'];
        income[2] = result[4]['income'];
        income[3] = result[6]['income'];
        var outcome = [];
        outcome[0] = result[1]['outcome'];
        outcome[1] = result[3]['outcome'];
        outcome[2] = result[5]['outcome'];
        outcome[3] = result[7]['outcome'];
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [monthNames[date.getMonth() - 3], monthNames[date.getMonth() - 2],
                    monthNames[date.getMonth() - 1], monthNames[date.getMonth()]
                ],
                datasets: [{
                    label: 'รายรับ',
                    data: income,
                    backgroundColor: [
                        'rgba(255, 255, 255, 0)',
                    ],
                    borderColor: [
                        'rgba(164,208,95,1)',
                    ],
                    borderWidth: 5
                }, {
                    label: 'รายจ่าย',
                    data: outcome,
                    backgroundColor: [
                        'rgba(255, 255, 255, 0)',
                    ],
                    borderColor: [
                        'rgba(241,100,108,1)',
                    ],
                    borderWidth: 5
                }],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontSize: 14,
                            fontColor: '#000',
                            fontFamily: 'Prompt'
                        },
                        gridLines: {
                            offsetGridLines: false
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontSize: 14,
                            fontColor: '#000',
                            fontFamily: 'Prompt'
                        },
                    }]
                },
                elements: {
                    line: {
                        tension: 0
                    }
                },
                legend: {
                    display: true,
                    labels: {
                        fontSize: 14,
                        fontColor: '#000',
                        fontFamily: 'Prompt'
                    }
                }
            }
        });
    }
});