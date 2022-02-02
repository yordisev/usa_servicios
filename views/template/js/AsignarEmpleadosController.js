tablaempleadosasignados();


function llamarempleados() {
    $.ajax({
        method: "POST",
        datatype: "json",
        data: {
            function: "llamarempleados"
        },
        url: "/usa_servicios/controllers/EmpleadosAsignados.php",
    }).then(function (response) {
        var datos = JSON.parse(response);
        if (datos.status == true) {
            for (var i = 0; i < datos.data.length; i++) {
                document.getElementById("seleccionarempleado").innerHTML += "<option value='" + datos.data[i].numero_doc + "'>" + datos.data[i].empleado + "</option>";

            }
        }
    });
}

function tablaempleadosasignados() {
    var arrdatos = {
        id_servicio_a_realizar: $("#id_servicio_a_realizar").html(),
    };
    var table = $("#tablaempleadosasignados").DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
                "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Sin Datos Por Favor Agregar Empleados",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     ">",
                                "sPrevious": "<"
                            },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
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
                'function': 'ListarEmpleadosalservicio',
                datos: JSON.stringify(arrdatos),
            },
            "url": "/usa_servicios/controllers/EmpleadosAsignados.php",

        },
        "columns": [

            { "data": "options" ,"defaultContent": "<i>Not set</i>"},
            { "data": "empleado" ,"defaultContent": "<i>Not set</i>"},
            { "data": "fecha_inicio" ,"defaultContent": "<i>Not set</i>"},
            { "data": "hora_inicio" ,"defaultContent": "<i>Not set</i>"},
            { "data": "fecha_fin" ,"defaultContent": "<i>Not set</i>"},
            { "data": "hora_fin" ,"defaultContent": "<i>Not set</i>"},
            { "data": "fecha" ,"defaultContent": "<i>Not set</i>"},
            { "data": "estadoservi","defaultContent": "<i>Not set</i>" },
            
        ]
    });
}


function asignarunempleado(iddelservicioagregar) {
    llamarempleados();
    Swal.fire({
        title: 'Seleccione Empleado',
        html: '<div class="form-group col-md-12">' +
            '<select class="form-control form-control-lg" name="seleccionarempleado" id="seleccionarempleado">' +
            '<option value="" readonly>Seleccionar Empleado</option>' +
            '</select>' +
            '</div>',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            var EditarEstado = {
                seleccionarempleado: document.getElementsByName('seleccionarempleado')[0].value,
                iddelservicioagregar: iddelservicioagregar,
            }
            console.log(EditarEstado);
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'Actualizarestadoagregarempleado',
                    'datos': JSON.stringify(EditarEstado)
                },
                url: '/usa_servicios/controllers/EmpleadosAsignados.php',
            }).then(function(response) {
                if (response == 'Exito') {
                    Swal.fire({
                        title: 'Notificacion!',
                        position: 'center',
                        icon: 'success',
                        text: 'Empleado Agregado exitosamente',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
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

function SeleccionarEmpleAsignado(iddelservicioempleado) {
    $.ajax({
        method: 'POST',
        datatype: 'json',
        data: {
            'function': 'SeleccionarEditatiempoempleado',
            'datos': JSON.stringify(iddelservicioempleado)
        },
        url: '/usa_servicios/controllers/EmpleadosAsignados.php',
    }).then(function(response) {
        var datos = JSON.parse(response);
        if (datos.status == true) {
            document.getElementsByName('Empleado_fecha_inicio')[0].value = datos.data.fecha_inicio;
            document.getElementsByName('Empleado_hora_inicio')[0].value = datos.data.hora_inicio;
            document.getElementsByName('Empleado_fecha_fin')[0].value = datos.data.fecha_fin;
            document.getElementsByName('Empleado_hora_fin')[0].value = datos.data.hora_fin;
            document.getElementsByName('id_tiempo_ser_emple')[0].value = datos.data.id_servicioarealizar;
        }
        $('#modal-add-actualizarempleasignado').modal('show');

    });

}


function ActualizarEmpleAsignado() {
    var EditarTiempo= {
        Empleado_fecha_inicio: document.getElementsByName('Empleado_fecha_inicio')[0].value,
        Empleado_hora_inicio: document.getElementsByName('Empleado_hora_inicio')[0].value,
        Empleado_fecha_fin: document.getElementsByName('Empleado_fecha_fin')[0].value,
        Empleado_hora_fin: document.getElementsByName('Empleado_hora_fin')[0].value,
        id_tiempo_ser_emple: document.getElementsByName('id_tiempo_ser_emple')[0].value
    }
 
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'ActualizaTiempoEmpleado',
                    'datos': JSON.stringify(EditarTiempo)
                },
                url: '/usa_servicios/controllers/EmpleadosAsignados.php',
            }).then(function(response) {
                if (response == 'Exito') {
                    Swal.fire({
                        title: 'Notificacion!',
                        position: 'center',
                        icon: 'success',
                        text: 'Tiempo Modificado exitosamente',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#modal-add-actualizarempleasignado').modal('hide');
                    
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


function Estadosdeltrabajador(idactualizarpago) {
    llamarempleados();
    Swal.fire({
        title: 'Seleccione Estado Empleado',
        html: '<div class="form-group col-md-12">' +
            '<select class="form-control form-control-lg" name="selecactualizapago" id="selecactualizapago">' +
            '<option value="" readonly>Seleccionar Estado</option>' +
            '<option value="T" readonly>Termino el Trabjo</option>' +
            '<option value="D" readonly>Quitar Este Trabajador</option>' +
            '</select>' +
            '</div>',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            var EditarEstado = {
                seleccionarestadoempleado: document.getElementsByName('selecactualizapago')[0].value,
                idactualizarpago: idactualizarpago,
            }
            console.log(EditarEstado);
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'Actualizarestadoempleado',
                    'datos': JSON.stringify(EditarEstado)
                },
                url: '/usa_servicios/controllers/EmpleadosAsignados.php',
            }).then(function(response) {
                if (response == 'Exito') {
                    Swal.fire({
                        title: 'Notificacion!',
                        position: 'center',
                        icon: 'success',
                        text: 'Registro Modificado exitosamente',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
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