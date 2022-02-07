function reportesempleados() {
    $.ajax({
        method: "POST",
        datatype: "json",
        data: {
            function: "reportesempleados"
        },
        url: "/usa_servicios/controllers/Reportes.php",
    }).then(function (response) {
        var datos = JSON.parse(response);
        var empleados = [];
        var trabajos = [];

        let totaldatos = datos.data;
        for (const datost of totaldatos) {
            empleados.push(datost.empleado);
            trabajos.push(datost.total_trabajo);
        }

        var options = {
            series: [{
                name: 'Total el mes',
                data: trabajos
            }],
            chart: {
                height: 350,
                type: 'bar',
                width: 950
            },
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                }
            },
            dataLabels: {
                enabled: true,
                // formatter: function(val) {
                //     return val + "%";
                // },
                offsetY: -20,
                style: {
                    fontSize: '12px',
                    colors: ["#304758"]
                }
            },

            xaxis: {
                categories: empleados,
                position: 'top',
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    fill: {
                        type: 'gradient',
                        gradient: {
                            colorFrom: '#D8E3F0',
                            colorTo: '#BED1E6',
                            stops: [0, 100],
                            opacityFrom: 0.4,
                            opacityTo: 0.5,
                        }
                    }
                },
                tooltip: {
                    enabled: true,
                }
            },
            yaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: false,
                    // formatter: function(val) {
                    //     return val + "%";
                    // }
                }

            },
            title: {
                text: 'Total Trabajos por Empleado',
                floating: true,
                offsetY: 330,
                align: 'center',
                style: {
                    color: '#444'
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
}

reportesempleados();

// var options = {
//     series: [{
//         name: 'Net Profit',
//         data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
//     }, {
//         name: 'Revenue',
//         data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
//     }, {
//         name: 'Free Cash Flow',
//         data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
//     }],
//     chart: {
//         type: 'bar',
//         height: 350
//     },
//     plotOptions: {
//         bar: {
//             horizontal: false,
//             columnWidth: '55%',
//             endingShape: 'rounded'
//         },
//     },
//     dataLabels: {
//         enabled: true
//     },
//     stroke: {
//         show: true,
//         width: 2,
//         colors: ['transparent']
//     },
//     xaxis: {
//         categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
//     },
//     yaxis: {
//         title: {
//             text: '$ (thousands)'
//         }
//     },
//     fill: {
//         opacity: 1
//     },
//     tooltip: {
//         y: {
//             formatter: function(val) {
//                 return "$ " + val + " thousands"
//             }
//         }
//     }
// };

// var chart = new ApexCharts(document.querySelector("#chart"), options);
// chart.render();



