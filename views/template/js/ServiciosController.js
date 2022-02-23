// TablaServiciosaRealizarcliente();
// TablaServiciosaRealizar();
llamarservicios();

// function TablaServiciosaRealizarcliente() {
//     document.querySelector("#TablaServiciosaRealizarcliente");
    var table1 = $("#TablaServiciosaRealizarcliente").DataTable({
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
            "sLoadingRecords": "Sin Datos Por Favor Agregar",
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
        ajax: {
            'type': 'POST',
            "data": {
                'function': 'Listarid_servicio_del_cliente',
            },
            "url": "/usa_servicios/controllers/ServiciosaRealizar.php",

        },
        "columns": [

            { "data": "agregarservicios" },
            { "data": "cliente" },
            { "data": "clientenombre" },
            { "data": "fecha" },
            { "data": "estado" },
            { "data": "options" },
        ]
    });
//     $('#TablaServiciosaRealizarcliente > tbody').html(table);
// }


function llamarclientes() {
    $.ajax({
        method: "POST",
        datatype: "json",
        data: {
            function: "llamarclientes"
        },
        url: "/usa_servicios/controllers/ServiciosaRealizar.php",
    }).then(function (response) {
        var datos = JSON.parse(response);
        if (datos.status == true) {
            for (var i = 0; i < datos.data.length; i++) {
                document.getElementById("clienteservicio").innerHTML += "<option value='" + datos.data[i].numero_doc + "'>" + datos.data[i].cliente + "</option>";

            }
        }
    });
}

function modalagregarclienteservicio() {
    llamarclientes();
    Swal.fire({
        title: 'Seleccione Cliente',
        html: '<div class="form-group col-md-12">' +
            '<select class="form-control form-control-lg" name="clienteservicio" id="clienteservicio">' +
            '<option value="" readonly>Seleccionar Clientes</option>' +
            '</select>' +
            '</div>',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            var EditarEstado = {
                clienteservicio: document.getElementsByName('clienteservicio')[0].value,
            }
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'Agregarclienteaservicios',
                    'datos': JSON.stringify(EditarEstado)
                },
                url: '/usa_servicios/controllers/ServiciosaRealizar.php',
            }).then(function(response) {
                if (response == 'Exito') {
                    Swal.fire({
                        title: 'Notificacion!',
                        position: 'center',
                        icon: 'success',
                        text: 'Nuevo Servicio para cliente Agregado exitosamente',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    table1.ajax.reload();
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

function llamarservicios() {
    $.ajax({
        method: "POST",
        datatype: "json",
        data: {
            function: "llamarservicios"
        },
        url: "/usa_servicios/controllers/ServiciosaRealizar.php",
    }).then(function (response) {
        var datos = JSON.parse(response);
        console.log(datos);
        if (datos.status == true) {
            for (var i = 0; i < datos.data.length; i++) {
                document.getElementById("servicionombre").innerHTML += "<option value='" + datos.data[i].id_servicio + "'>" + datos.data[i].nombre + "</option>";
            }
        }
    });
}

// function TablaServiciosaRealizar() {
    var arrdatos = {
        id_servicio_a_realizar_del_cliente: $("#id_servicio_a_realizar_del_cliente").html(),
    };
    // document.querySelector("#TablaServiciosaRealizar");
    var table = $("#TablaServiciosaRealizar").DataTable({
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
            "sLoadingRecords": "Sin Datos Por Favor Agregar",
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
        ajax: {
            'type': 'POST',
            "data": {
                'function': 'ListarServiciosarealizar',
                datos: JSON.stringify(arrdatos),
            },
            "url": "/usa_servicios/controllers/ServiciosaRealizar.php",

        },
        "columns": [

            { "data": "agregarempleados" },
            { "data": "verempleados" },
            { "data": "nombre" },
            { "data": "fecha_inicio" },
            { "data": "fecha_fin" },
            { "data": "total_a_pagar" },
            { "data": "fecha" },
            { "data": "estado_servicio" },
            { "data": "options" },
        ]
    });
//     $('#TablaServiciosaRealizar > tbody').html(table);
// }



function GuardarServiciorealizar() {
    var nuevoservicio = {
        id_servico_cliente: document.getElementsByName('id_servico_cliente')[0].value,
        clienteservicio: document.getElementsByName('clienteservicio')[0].value,
        servicionombre: document.getElementsByName('servicionombre')[0].value,
        fechainicio: document.getElementsByName('fechainicio')[0].value,
        horainicio: document.getElementsByName('horainicio')[0].value,
        fechafin: document.getElementsByName('fechafin')[0].value,
        horafin: document.getElementsByName('horafin')[0].value,
    }
  
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'realizarnuevoservico',
                    'datos': JSON.stringify(nuevoservicio)
                },
                url: '/usa_servicios/controllers/ServiciosaRealizar.php',
            }).then(function (response) {
                if (response == 'Exito') {
                    Swal.fire({
                        title: 'Notificacion!',
                        position: 'center',
                        icon: 'success',
                        text: 'Registro guardado exitosamente',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#registratnuevoservicio')[0].reset();
                    $('#modal-add-nuevoservicio').modal('hide');
                    table.ajax.reload();
                } else {
                    Swal.fire({
                        title: 'Notificacion!',
                        position: 'center',
                        icon: 'error',
                        text: 'Ya Existe un usuario con esta Cedula y/o Correo',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            });
      
}

function modalagregar() {
    $('#registratnuevoservicio')[0].reset();
    document.querySelector(".modal-title").innerHTML = "Registrar Nuevo Servicio";
    document.getElementById("botondeeditar").classList.replace("btn-success", "btn-primary");
    document.querySelector("#btnText").innerHTML = "REGISTRAR SERVICIO A REALIZAR";
    document.getElementById('botondeeditar').onclick = GuardarServiciorealizar;
    $('#modal-add-nuevoservicio').modal('show');
}

function editardatosservicio(id_servicio) {
    document.querySelector(".modal-title").innerHTML = "ACTUALIZAR ESTE SERVICIO";
    document.getElementById("botondeeditar").classList.replace("btn-primary", "btn-success");
    document.querySelector("#btnText").innerHTML = "ACTUALIZAR";
    document.getElementById('botondeeditar').onclick = ActualizarServiciorealizar;
    $.ajax({
        method: 'POST',
        datatype: 'json',
        data: {
            'function': 'Obtenerdatodeservicio',
            'datos': id_servicio
        },
        url: '/usa_servicios/controllers/ServiciosaRealizar.php',
    })
        .then(function (response) {
            var Data = JSON.parse(response);
            console.log(Data);
            if (response != 'Error') {
                document.getElementsByName('clienteservicio')[0].value = Data.data.numero_doc;
                document.getElementsByName('servicionombre')[0].value = Data.data.id_servicio;
                document.getElementsByName('fechainicio')[0].value = Data.data.fecha_inicio;
                document.getElementsByName('horainicio')[0].value = Data.data.hora_inicio;
                document.getElementsByName('fechafin')[0].value = Data.data.fecha_fin;
                document.getElementsByName('horafin')[0].value = Data.data.hora_fin;
                document.getElementsByName('idservicorealizar')[0].value = Data.data.id_ser_rea;
                $('#modal-add-nuevoservicio').modal('show');

            } else {
                Swal.fire({
                    title: 'Notificacion!',
                    position: 'center',
                    icon: 'error',
                    text: 'No hay datos para mostrar',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        });
}


function ValidarForm(Actualizarservicio, tipo) {
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var exprNum = /^([0-9])*$/;
    var Validador = false;
    if (tipo == 2) {
        document.querySelectorAll("#registratnuevoservicio .form-control").forEach(e => {
            if (!e.value) {
                Validador = true;
            }
        });
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Debe diligenciar todos los campos!',
        });
        return false;
    }
    return true;
}

function ActualizarServiciorealizar() {
    var Actualizarservicio = {
        clienteservicio: document.getElementsByName('clienteservicio')[0].value,
        servicionombre: document.getElementsByName('servicionombre')[0].value,
        fechainicio: document.getElementsByName('fechainicio')[0].value,
        horainicio: document.getElementsByName('horainicio')[0].value,
        fechafin: document.getElementsByName('fechafin')[0].value,
        horafin: document.getElementsByName('horafin')[0].value,
        idservicorealizar: document.getElementsByName('idservicorealizar')[0].value,
    }
    if (ValidarForm(Actualizarservicio, 2)) {
        Swal.fire({
            title: 'Cargando',
        });
        Swal.showLoading();
        setTimeout(() => {
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'Editaservicio',
                    'datos': JSON.stringify(Actualizarservicio)
                },
                url: '/usa_servicios/controllers/ServiciosaRealizar.php',
            }).then(function (response) {
                if (response == 'Exito') {
                    Swal.fire({
                        title: 'Notificacion!',
                        position: 'center',
                        icon: 'success',
                        text: 'Registro actualizado exitosamente',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#modal-add-nuevoservicio').modal('hide');
                    table.ajax.reload();
                } else {
                    Swal.fire({
                        title: 'Notificacion!',
                        position: 'center',
                        icon: 'error',
                        text: 'No se realizaron cambios',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            });
        }, 1000);
    }
}


function Deshabilitarservicioterminado(id_servicioterminado) {

    Swal.fire({
        title: 'Trabajo esta Terminado?',
        html: '<div class="form-group col-md-12">' +
            '<select class="form-control form-control-lg" name="actaulizarestado">' +
            '<option value="" readonly>Seleccionar</option>' +
            '<option value="A">SI</option>' +
            '<option value="T">NO</option>' +
            '</select>' +
            '</div>',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            var EditarEstado = {
                actaulizarestado: document.getElementsByName('actaulizarestado')[0].value,
                id_servicioterminado: id_servicioterminado,
            }
            console.log(EditarEstado);
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'Actualizarestado',
                    'datos': JSON.stringify(EditarEstado)
                },
                url: '/usa_servicios/controllers/ServiciosaRealizar.php',
            }).then(function(response) {
                if (response == 'Exito') {
                    Swal.fire({
                        title: 'Notificacion!',
                        position: 'center',
                        icon: 'success',
                        text: 'Registro Modificado exitosamente',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    table.ajax.reload();
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

