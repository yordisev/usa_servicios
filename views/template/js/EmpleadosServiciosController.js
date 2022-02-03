misservicios();


function misservicios() {
    var table = $("#misservicios").DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla =(",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Sin Datos Por Favor Agregar Empleados",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": ">",
                "sPrevious": "<"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }

        },
        "ajax": {
            'type': 'POST',
            "data": {
                'function': 'ListarEmpleadosalservicio'
            },
            "url": "/usa_servicios/controllers/EmpleadosServicios.php",

        },
        "columns": [

            { "data": "options", "defaultContent": "<i>Not set</i>" },
            { "data": "empleado", "defaultContent": "<i>Not set</i>" },
            { "data": "fecha_inicio", "defaultContent": "<i>Not set</i>" },
            { "data": "hora_inicio", "defaultContent": "<i>Not set</i>" },
            { "data": "fecha_fin", "defaultContent": "<i>Not set</i>" },
            { "data": "hora_fin", "defaultContent": "<i>Not set</i>" },
            { "data": "fecha", "defaultContent": "<i>Not set</i>" },
            { "data": "estadoservi", "defaultContent": "<i>Not set</i>" },
            { "data": "datosdias", "defaultContent": "<i>Not set</i>" },
            { "data": "datoshoras", "defaultContent": "<i>Not set</i>" },

        ]
    });
}


function iniciarlabor(iddelservicioagregar) {
    Swal.fire({
        title: 'Iniciar Hora De Trabajo',
        text: 'Desea Iniciar Ahora?',
        icon: 'info',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            var hoy = new Date();
            datos = {
                numeroservicio: iddelservicioagregar,
                fecha: hoy.getFullYear() + '-' + (hoy.getMonth() + 1) + '-' + hoy.getDate(),
                hora: hoy.getHours() + ':' + hoy.getMinutes()
            }
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'inicarhorariotrabajo',
                    'datos': JSON.stringify(datos)
                },
                url: '/usa_servicios/controllers/EmpleadosServicios.php',
            }).then(function (response) {
                if (response == 'Exito') {
                    Swal.fire({
                        title: 'Notificacion!',
                        position: 'center',
                        icon: 'success',
                        text: 'Inicio Corectamente Su Horario',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        title: 'Notificacion!',
                        position: 'center',
                        icon: 'error',
                        text: 'Ocurrio un error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        }
    });

}


function terminarlabor(iddelservicioagregar) {
    Swal.fire({
        title: 'Terminar Hora De Trabajo',
        text: 'Desea Terminar Ahora?',
        icon: 'info',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            var hoy = new Date();
            datos = {
                numeroservicio: iddelservicioagregar,
                fecha: hoy.getFullYear() + '-' + (hoy.getMonth() + 1) + '-' + hoy.getDate(),
                hora: hoy.getHours() + ':' + hoy.getMinutes()
            }
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'terminarhorariotrabajo',
                    'datos': JSON.stringify(datos)
                },
                url: '/usa_servicios/controllers/EmpleadosServicios.php',
            }).then(function (response) {
                if (response == 'Exito') {
                    Swal.fire({
                        title: 'Notificacion!',
                        position: 'center',
                        icon: 'success',
                        text: 'Horario Terminado Exitosamente',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        title: 'Notificacion!',
                        position: 'center',
                        icon: 'error',
                        text: 'Ocurrio un error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        }
    });

}

// var day1 = new Date("2022-02-05"); 
// var day2 = new Date("2022-02-02");

// var difference= Math.abs(day2-day1);
// days = difference/(1000 * 3600 * 24)

// console.log(days)

var fecha1 = moment("2016-09-30 07:30:00", "YYYY-MM-DD HH:mm:ss");
var fecha2 = moment("2016-10-03 07:30:00", "YYYY-MM-DD HH:mm:ss");

var diff = fecha2.diff(fecha1, 'd'); // Diff in days
console.log(diff);

var diff = fecha2.diff(fecha1, 'h'); // Diff in hours
console.log(diff);

var diff = fecha2.diff(fecha1, 'm'); // Diff in hours
console.log(diff);


var hora1 = moment("07:30:00", "HH:mm:ss");
var hora2 = moment("07:25:00", "HH:mm:ss");

var diffhora = hora2.diff(hora1, 'm'); // Diff in hours
console.log(diffhora);

