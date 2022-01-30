ListadoUsuarios();

function ListadoUsuarios() {
    document.querySelector("#TablaUsuarios");
    var table = $("#TablaUsuarios").DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            'type': 'POST',
            "data": {
                'function': 'ListarUsuarios',
            },
            "url": "/usa_servicios/controllers/Usuarios.php",

        },
        "columns": [

            { "data": "id_admin" },
            { "data": "tipo_doc" },
            { "data": "numero_doc" },
            { "data": "nombres" },
            { "data": "apellidos" },
            { "data": "usuario" },
            { "data": "nivel" },
            { "data": "estado" },
            { "data": "options" },
        ]
    });
    $('#TablaUsuarios > tbody').html(table);
}


function ValidarForm(User, tipo) {
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var exprNum = /^([0-9])*$/;
    var Validador = false;
    if (tipo == 1) {
        document.querySelectorAll("#registrar_usuario .form-control").forEach(e => {
            if (!e.value) {
                Validador = true;
            }
        });
    }

    if (Validador == false) {
        if (!expr.test(User.usuario)) {
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia!',
                text: 'La dirección de correo ' + User.usuario + ' es incorrecta.',
            });
            return false;
        }
        if (!exprNum.test(User.numDoc)) {
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia!',
                text: 'El campo numero de documento permite solo numeros',
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

function GuardarUsuario() {
    var User = {
        tipoDoc: document.getElementsByName('tipoDoc')[0].value,
        numDoc: document.getElementsByName('numDoc')[0].value,
        nombres: document.getElementsByName('nombres')[0].value,
        apellidos: document.getElementsByName('apellidos')[0].value,
        usuario: document.getElementsByName('usuario')[0].value,
        contrasena: document.getElementsByName('contrasena')[0].value,
    }
    if (ValidarForm(User, 1)) {
        Swal.fire({
            title: 'Cargando',
        });
        Swal.showLoading();
        setTimeout(() => {
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'RegistroUsuario',
                    'datos': JSON.stringify(User)
                },
                url: '/usa_servicios/controllers/Usuarios.php',
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
                    $('#registrar_usuario')[0].reset();
                    jQuery.noConflict();
                    $('.bd-example-modal-lg').modal('hide');
                    ListadoUsuarios();
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
        }, 1000);

    }
}

function modalagregar() {
    $('#registrar_usuario')[0].reset();
    document.querySelector(".modal-title").innerHTML = "Agregar Usuario";
    document.getElementById("botondeeditar").classList.replace("btn-success", "btn-primary");
    document.querySelector("#btnText").innerHTML = "GUARDAR";
    document.getElementById('botondeeditar').onclick = GuardarUsuario;
    document.getElementById("usuarioclasemd12").classList.replace("col-md-12", "col-md-6");
    $("#passwordhide").show();
    $("contrasena").removeAttr('disabled');
    $('#modal-add-usuario').modal('show');
}

function fntEditUsuario(idusuario) {
    document.querySelector(".modal-title").innerHTML = "Actualizar Usuario";
    document.getElementById("botondeeditar").classList.replace("btn-primary", "btn-success");
    document.getElementById("usuarioclasemd12").classList.replace("col-md-6", "col-md-12");
    $("#passwordhide").hide();
    $("contrasena").attr('disabled', 'disabled');
    document.querySelector("#btnText").innerHTML = "ACTUALIZAR";
    document.getElementById('botondeeditar').onclick = ActualizarUsuario;
    $.ajax({
        method: 'POST',
        datatype: 'json',
        data: {
            'function': 'ObtenerUsuario',
            'datos': idusuario
        },
        url: '/usa_servicios/controllers/Usuarios.php',
    })
        .then(function (response) {
            var Data = JSON.parse(response);
            if (response != 'Error') {
                document.getElementsByName('tipoDoc')[0].value = Data[0].tipo_doc;
                document.getElementsByName('numDoc')[0].value = Data[0].numero_doc;
                document.getElementsByName('nombres')[0].value = Data[0].nombres;
                document.getElementsByName('apellidos')[0].value = Data[0].apellidos;
                document.getElementsByName('usuario')[0].value = Data[0].usuario;
                $('#modal-add-usuario').modal('show');

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

function ActualizarUsuario() {
    var User = {
        tipoDoc: document.getElementsByName('tipoDoc')[0].value,
        numDoc: document.getElementsByName('numDoc')[0].value,
        nombres: document.getElementsByName('nombres')[0].value,
        apellidos: document.getElementsByName('apellidos')[0].value,
        usuario: document.getElementsByName('usuario')[0].value,
        contrasena: document.getElementsByName('contrasena')[0].value,
    }
    if (ValidarForm(User, 2)) {
        Swal.fire({
            title: 'Cargando',
        });
        Swal.showLoading();
        setTimeout(() => {
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'EditarUsuario',
                    'datos': JSON.stringify(User)
                },
                url: '/usa_servicios/controllers/Usuarios.php',
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
                    $('#modal-add-usuario').modal('hide');
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

function fntBloquearUsuario(id) {
    Swal.fire({
        title: 'Estas seguro?',
        text: "Deseas bloquear este usuario!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Bloquearlo!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.showLoading();
            setTimeout(() => {
                $.ajax({
                    method: 'POST',
                    datatype: 'json',
                    data: {
                        'function': 'BloquearUsuario',
                        'datos': id
                    },
                    url: '/usa_servicios/controllers/Usuarios.php',
                }).then(function (response) {
                    if (response == 'Exito') {
                        Swal.fire(
                            'Bloqueado!',
                            'Usuario ha sido bloqueado.',
                            'success'
                        );
                        ListadoUsuarios();
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
    })
}