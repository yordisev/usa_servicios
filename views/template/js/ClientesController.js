if (document.querySelector("#tablalistadoclientes")) {
    ListadoClientes();
}

function ListadoClientes() {
    var table = $("#tablalistadoclientes").DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            'type': 'POST',
            "data": {
                'function': 'ListarClientes',
            },
            "url": "/usa_servicios/controllers/Clientes.php",

        },
        "columns": [

            { "data": "id_cliente" },
            { "data": "numero_doc" },
            { "data": "p_nombre" },
            { "data": "p_apellido" },
            { "data": "telefono" },
            { "data": "referido" },
            { "data": "cedula_ref" },
            { "data": "estado" },
            { "data": "options" },
        ]
    });

}


function ValidarForm(Cliente) {

    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var exprNum = /^([0-9])*$/;
    var Validador = false;
    document.querySelectorAll("#registrar_cliente .form-control").forEach(e => {
        if (!e.value) {
            Validador = true;
        }
    });
    if (Validador == false) {
        var validarnumeros = [Cliente.numero_doc, Cliente.telefono, Cliente.cedula_ref, Cliente.telefono_ref];
        for (let i = 0; i < 4; i++) {
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

function GuardarCliente() {
    var Cliente = {
        tipo_doc: document.getElementsByName('tipo_doc')[0].value,
        numero_doc: document.getElementsByName('numero_doc')[0].value,
        p_nombre: document.getElementsByName('p_nombre')[0].value,
        s_nombre: document.getElementsByName('s_nombre')[0].value,
        p_apellido: document.getElementsByName('p_apellido')[0].value,
        s_apellido: document.getElementsByName('s_apellido')[0].value,
        telefono: document.getElementsByName('telefono')[0].value,
        direccion: document.getElementsByName('direccion')[0].value,
        referido: document.getElementsByName('referido')[0].value,
        cedula_ref: document.getElementsByName('cedula_ref')[0].value,
        telefono_ref: document.getElementsByName('telefono_ref')[0].value,
    }
    console.log(Cliente);
    if (ValidarForm(Cliente)) {
        Swal.showLoading();
        setTimeout(() => {
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'RegistrarCliente',
                    'datos': JSON.stringify(Cliente)
                },
                url: '/usa_servicios/controllers/Clientes.php',
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
                    $('.registrar_cliente')[0].reset();
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


function ValidarFormulario(EditarCliente) {
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var exprNum = /^([0-9])*$/;
    var Validador = false;
    document.querySelectorAll(".Editar_cliente .form-control").forEach(e => {
        if (!e.value) {
            Validador = true;
        }
    });
    if (Validador == false) {
        var validarnumeros = [EditarCliente.numero_doc, EditarCliente.telefono, EditarCliente.cedula_ref, EditarCliente.telefono_ref];

        for (let i = 0; i < 4; i++) {
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

function ActualizarCliente() {
    var EditarCliente = {
        tipo_doc: document.getElementsByName('tipo_doc')[0].value,
        numero_doc: document.getElementsByName('numero_doc')[0].value,
        p_nombre: document.getElementsByName('p_nombre')[0].value,
        s_nombre: document.getElementsByName('s_nombre')[0].value,
        p_apellido: document.getElementsByName('p_apellido')[0].value,
        s_apellido: document.getElementsByName('s_apellido')[0].value,
        telefono: document.getElementsByName('telefono')[0].value,
        direccion: document.getElementsByName('direccion')[0].value,
        referido: document.getElementsByName('referido')[0].value,
        cedula_ref: document.getElementsByName('cedula_ref')[0].value,
        telefono_ref: document.getElementsByName('telefono_ref')[0].value,
    }
    if (ValidarFormulario(EditarCliente)) {
        Swal.showLoading();
        setTimeout(() => {
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'EditarCliente',
                    'datos': JSON.stringify(EditarCliente)
                },
                url: '/usa_servicios/controllers/Clientes.php',
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
                    $('#modal-add-clientes').modal('hide');
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


function editardatoscliente(idcliente) {
    document.querySelector(".modal-title").innerHTML = "Actualizar Usuario";
    document.getElementById("botondeeditar").classList.replace("btn-primary", "btn-success");
    document.querySelector("#btnText").innerHTML = "ACTUALIZAR";
    document.getElementById('botondeeditar').onclick = ActualizarCliente;

    $.ajax({
        method: 'POST',
        datatype: 'json',
        data: {
            'function': 'EditarCliente1',
            'datos': JSON.stringify(idcliente)
        },
        url: '/usa_servicios/controllers/Clientes.php',
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
            document.getElementsByName('referido')[0].value = datos.data.referido;
            document.getElementsByName('cedula_ref')[0].value = datos.data.cedula_ref;
            document.getElementsByName('telefono_ref')[0].value = datos.data.cedula_ref;
        }
        // jQuery.noConflict();
        $('#modal-add-clientes').modal('show');

    });

}

function modalagregar() {
    // $('.botondeeditar').hide();
    // $('.botondeguardar').show();
    $('#registrar_cliente')[0].reset();
    document.querySelector(".modal-title").innerHTML = "Agregar Usuario";
    document.getElementById("botondeeditar").classList.replace("btn-success", "btn-primary");
    document.querySelector("#btnText").innerHTML = "GUARDAR";
    document.getElementById('botondeeditar').onclick = GuardarCliente;
    // jQuery.noConflict();
    $('#modal-add-clientes').modal('show');

}

function Deshabilitarcliente(idcliente) {

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
                idcliente: idcliente,
            }
            console.log(EditarEstado);
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'Actualizarestado',
                    'datos': JSON.stringify(EditarEstado)
                },
                url: '/usa_servicios/controllers/Clientes.php',
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