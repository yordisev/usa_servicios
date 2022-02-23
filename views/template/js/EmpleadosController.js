// if (document.querySelector("#tablalistadoempleados")) {
//     ListadoEmpleados();
// }

// function ListadoEmpleados() {
    var table = $("#tablalistadoempleados").DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            'type': 'POST',
            "data": {
                'function': 'ListarEmpleados',
            },
            "url": "/usa_servicios/controllers/Empleados.php",

        },
        "columns": [

            { "data": "id_empleado" },
            { "data": "numero_doc" },
            { "data": "p_nombre" },
            { "data": "p_apellido" },
            { "data": "telefono" },
            { "data": "estado" },
            { "data": "options" },
        ]
    });

// }


function ValidarForm(Empleado) {

    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var exprNum = /^([0-9])*$/;
    var Validador = false;
    document.querySelectorAll("#registrar_empleados .form-control").forEach(e => {
        if (!e.value) {
            Validador = true;
        }
    });
    if (Validador == false) {
        var validarnumeros = [Empleado.numero_doc, Empleado.telefono];
        for (let i = 0; i < validarnumeros; i++) {
            if (!exprNum.test(validarnumeros[i])) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Advertencia!',
                    text: 'El campo numero de documento permite solo numeros',
                });
                return false;
            }
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

function GuardarEmpleado() {
    var Empleado = {
        tipo_doc: document.getElementsByName('tipo_doc')[0].value,
        numero_doc: document.getElementsByName('numero_doc')[0].value,
        p_nombre: document.getElementsByName('p_nombre')[0].value,
        s_nombre: document.getElementsByName('s_nombre')[0].value,
        p_apellido: document.getElementsByName('p_apellido')[0].value,
        s_apellido: document.getElementsByName('s_apellido')[0].value,
        telefono: document.getElementsByName('telefono')[0].value,
        direccion: document.getElementsByName('direccion')[0].value,
    }
    if (ValidarForm(Empleado)) {
        Swal.showLoading();
        setTimeout(() => {
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'RegistrarEmpleado',
                    'datos': JSON.stringify(Empleado)
                },
                url: '/usa_servicios/controllers/Empleados.php',
            }).then(function(response) {
                if (response == 'Exito') {
                    Swal.fire({
                        title: 'Notificacion!',
                        position: 'center',
                        icon: 'success',
                        text: 'Registro guardado exitosamente',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('.registrar_empleados')[0].reset();
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
        }, 1000);

    }
}


function ValidarFormulario(Editarempleado) {
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var exprNum = /^([0-9])*$/;
    var Validador = false;
    document.querySelectorAll(".Editar_cliente .form-control").forEach(e => {
        if (!e.value) {
            Validador = true;
        }
    });
    if (Validador == false) {
        var validarnumeros = [Editarempleado.numero_doc, Editarempleado.telefono];

        for (let i = 0; i < validarnumeros; i++) {
            if (!exprNum.test(validarnumeros[i])) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Advertencia!',
                    text: 'El campo numero de documento permite solo numeros',
                });
                return false;
            }
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

function ActualizarEmpleado() {
    var Editarempleado = {
        tipo_doc: document.getElementsByName('tipo_doc')[0].value,
        numero_doc: document.getElementsByName('numero_doc')[0].value,
        p_nombre: document.getElementsByName('p_nombre')[0].value,
        s_nombre: document.getElementsByName('s_nombre')[0].value,
        p_apellido: document.getElementsByName('p_apellido')[0].value,
        s_apellido: document.getElementsByName('s_apellido')[0].value,
        telefono: document.getElementsByName('telefono')[0].value,
        direccion: document.getElementsByName('direccion')[0].value,
    }
    if (ValidarFormulario(Editarempleado)) {
        Swal.showLoading();
        setTimeout(() => {
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'Editarempleado',
                    'datos': JSON.stringify(Editarempleado)
                },
                url: '/usa_servicios/controllers/Empleados.php',
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
                    $('#modal-add-empleados').modal('hide');
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
        }, 1000);

    }
}


function editardatosempleado(idempleado) {
    document.querySelector(".modal-title").innerHTML = "Actualizar Empleado";
    document.getElementById("botondeeditar").classList.replace("btn-primary", "btn-success");
    document.querySelector("#btnText").innerHTML = "ACTUALIZAR";
    document.getElementById('botondeeditar').onclick = ActualizarEmpleado;

    $.ajax({
        method: 'POST',
        datatype: 'json',
        data: {
            'function': 'EditarEmpleado1',
            'datos': JSON.stringify(idempleado)
        },
        url: '/usa_servicios/controllers/Empleados.php',
    }).then(function(response) {
        var datos = JSON.parse(response);
        if (datos.status == true) {
            document.getElementsByName('tipo_doc')[0].value = datos.data.tipo_doc;
            document.getElementsByName('numero_doc')[0].value = datos.data.numero_doc;
            document.getElementsByName('p_nombre')[0].value = datos.data.p_nombre;
            document.getElementsByName('s_nombre')[0].value = datos.data.s_nombre;
            document.getElementsByName('p_apellido')[0].value = datos.data.p_apellido;
            document.getElementsByName('s_apellido')[0].value = datos.data.s_apellido;
            document.getElementsByName('telefono')[0].value = datos.data.telefono;
            document.getElementsByName('direccion')[0].value = datos.data.direccion;
        }
        $('#modal-add-empleados').modal('show');

    });

}

function modalagregar() {
    $('#registrar_empleados')[0].reset();
    document.querySelector(".modal-title").innerHTML = "Agregar Empleado";
    document.getElementById("botondeeditar").classList.replace("btn-success", "btn-primary");
    document.querySelector("#btnText").innerHTML = "GUARDAR";
    document.getElementById('botondeeditar').onclick = GuardarEmpleado;
    $('#modal-add-empleados').modal('show');

}

function Deshabilitarempleado(idempleado) {

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
                idempleado: idempleado,
            }
            console.log(EditarEstado);
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'Actualizarestado',
                    'datos': JSON.stringify(EditarEstado)
                },
                url: '/usa_servicios/controllers/Empleados.php',
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