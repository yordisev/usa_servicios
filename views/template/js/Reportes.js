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
                        position: 'center', // top, center, bottom
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
                    fontSize: '20px',
                    colors: ["#FFFFFF"]
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



function reportesempleadosver(){
    reportesempleados();
    $('#reportesempleadosver').show();
    $('#ReporteServiciosver').hide();
    $('#fechasseleccionarservicios').hide();
}

reportesempleadosver();

function ReporteServiciosver(){
    $('#reportesempleadosver').hide();
    $('#ReporteServiciosver').show();
    $('#fechasseleccionarservicios').show();
}

function ReporteServicios() {
    var fechas = {
        fecha_ini: document.getElementsByName('fecha_ini')[0].value,
        fecha_fin: document.getElementsByName('fecha_fin')[0].value
    }
    $.ajax({
        method: "POST",
        datatype: "json",
        data: {
            'function': 'reportesservicios',
            'datos': JSON.stringify(fechas)
        },
        url: "/usa_servicios/controllers/Reportes.php",
    }).then(function (response) {
        var datos = JSON.parse(response);
        var nombres = [];
        var nservicios = [];

        let totaldatos = datos.data;
        for (const datost of totaldatos) {
            nombres.push(datost.nombre);
            nservicios.push(datost.servicios);
        }

        var options = {
            series: [{
                name: 'Total el mes',
                data: nservicios
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
                        position: 'center', // top, center, bottom
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
                    fontSize: '20px',
                    colors: ["#FFFFFF"]
                }
            },

            xaxis: {
                categories: nombres,
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
                text: 'Total Servicios Requeridos',
                floating: true,
                offsetY: 330,
                align: 'center',
                style: {
                    color: '#11cdef'
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#chart1"), options);
        chart.render();
    });
}

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


// var options = {
//     series: [{
//         name: 'PRODUCT A',
//         data: [44, 55, 41, 67, 22, 43]
//     }, {
//         name: 'PRODUCT B',
//         data: [13, 23, 20, 8, 13, 27]
//     }, {
//         name: 'PRODUCT C',
//         data: [11, 17, 15, 15, 21, 14]
//     }, {
//         name: 'PRODUCT D',
//         data: [21, 7, 25, 13, 22, 8]
//     }],
//     chart: {
//         type: 'bar',
//         height: 350,
//         stacked: true,
//         toolbar: {
//             show: true
//         },
//         zoom: {
//             enabled: true
//         }
//     },
//     responsive: [{
//         breakpoint: 480,
//         options: {
//             legend: {
//                 position: 'bottom',
//                 offsetX: -10,
//                 offsetY: 0
//             }
//         }
//     }],
//     plotOptions: {
//         bar: {
//             horizontal: false,
//             borderRadius: 10
//         },
//     },
//     xaxis: {
//         type: 'datetime',
//         categories: ['01/01/2011 GMT', '01/02/2011 GMT', '01/03/2011 GMT', '01/04/2011 GMT',
//             '01/05/2011 GMT', '01/06/2011 GMT'
//         ],
//     },
//     legend: {
//         position: 'right',
//         offsetY: 40
//     },
//     fill: {
//         opacity: 1
//     }
// };

// var chart = new ApexCharts(document.querySelector("#chart"), options);
// chart.render();




// var options = {
//     series: [44, 55, 13, 43, 22],
//     chart: {
//         width: 380,
//         type: 'pie',
//     },
//     labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
//     responsive: [{
//         breakpoint: 480,
//         options: {
//             chart: {
//                 width: 200
//             },
//             legend: {
//                 position: 'bottom'
//             }
//         }
//     }]
// };

// var chart = new ApexCharts(document.querySelector("#chart"), options);
// chart.render();