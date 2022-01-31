TablaServicios();


function TablaServicios() {
    document.querySelector("#TablaServicios");
    var table = $("#TablaServicios").DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            'type': 'POST',
            "data": {
                'function': 'ListarServicios',
            },
            "url": "/usa_servicios/controllers/Servicios.php",

        },
        "columns": [

            { "data": "nombre" },
            { "data": "cobro_por_hora" },
            { "data": "estado" },
            { "data": "options" },
        ]
    });
    $('#TablaServicios > tbody').html(table);
}



function ValidarForm(nuevoservicio, tipo) {
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var exprNum = /^([0-9])*$/;
    var Validador = false;
    if (tipo == 1) {
        document.querySelectorAll("#nuevoservicio .form-control").forEach(e => {
            if (!e.value) {
                Validador = true;
            }
        });
    }

    if (Validador == false) {
        if (!exprNum.test(nuevoservicio.precioservicio)) {
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia!',
                text: 'El campo precio permite solo numeros',
            });
            return false;
        }
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

function GuardarServicio() {
    var nuevoservicio = {
        servicionombre: document.getElementsByName('servicionombre')[0].value,
        precioservicio: document.getElementsByName('precioservicio')[0].value
    }
    if (ValidarForm(nuevoservicio, 1)) {
        Swal.fire({
            title: 'Cargando',
        });
        Swal.showLoading();
        setTimeout(() => {
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'nuevoservicio',
                    'datos': JSON.stringify(nuevoservicio)
                },
                url: '/usa_servicios/controllers/Servicios.php',
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
                    $('#nuevoservicio')[0].reset();
                    $('#modal-add-servicio').modal('hide');
                } else {
                    Swal.fire({
                        title: 'Notificacion!',
                        position: 'center',
                        icon: 'error',
                        text: 'Ya Existe un servicio con esta Cedula y/o Correo',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            });
        }, 1000);

    }
}

function modalagregar() {
    $('#nuevoservicio')[0].reset();
    document.querySelector(".modal-title").innerHTML = "Nuevo Servicio";
    document.getElementById("botondeeditar").classList.replace("btn-success", "btn-primary");
    document.querySelector("#btnText").innerHTML = "AGREGAR SERVICIO";
    document.getElementById('botondeeditar').onclick = GuardarServicio;
    $('#modal-add-servicio').modal('show');
}

function selecionarservicio(idservicio) {
    document.querySelector(".modal-title").innerHTML = "ACTUALIZAR SERVICIO";
    document.getElementById("botondeeditar").classList.replace("btn-primary", "btn-success");
    document.querySelector("#btnText").innerHTML = "ACTUALIZAR";
    document.getElementById('botondeeditar').onclick = ActualizarServicio;
    $.ajax({
        method: 'POST',
        datatype: 'json',
        data: {
            'function': 'Obtenerservicio',
            'datos': idservicio
        },
        url: '/usa_servicios/controllers/Servicios.php',
    })
        .then(function (response) {
            var Data = JSON.parse(response);
            if (response != 'Error') {
                document.getElementsByName('servicionombre')[0].value = Data.data.nombre;
                document.getElementsByName('precioservicio')[0].value = Data.data.cobro_por_hora;
                document.getElementsByName('id_servicio')[0].value = Data.data.id_servicio;
                $('#modal-add-servicio').modal('show');

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

function ActualizarServicio() {
    var Updateservicio = {
        servicionombre: document.getElementsByName('servicionombre')[0].value,
        precioservicio: document.getElementsByName('precioservicio')[0].value,
        id_servicio: document.getElementsByName('id_servicio')[0].value
    }
    if (ValidarForm(Updateservicio, 2)) {
        Swal.fire({
            title: 'Cargando',
        });
        Swal.showLoading();
        setTimeout(() => {
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'Editarservicio',
                    'datos': JSON.stringify(Updateservicio)
                },
                url: '/usa_servicios/controllers/Servicios.php',
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
                    $('#modal-add-servicio').modal('hide');
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


function Deshabilitarservicio(id_servicio) {

    Swal.fire({
        title: 'Seleccionar El Estado',
        html: '<div class="form-group col-md-12">' +
            '<select class="form-control form-control-lg" name="actaulizarestado">' +
            '<option value="" readonly>Seleccionar</option>' +
            '<option value="A">ACTIVO</option>' +
            '<option value="I">INACTIVO</option>' +
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
                id_servicio: id_servicio,
            }
            console.log(EditarEstado);
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'Actualizarestado',
                    'datos': JSON.stringify(EditarEstado)
                },
                url: '/usa_servicios/controllers/Servicios.php',
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
