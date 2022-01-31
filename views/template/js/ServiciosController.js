TablaServiciosaRealizar();
llamarclientes();
llamarservicios();

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
            document.getElementById("clienteservicio").innerHTML += "<option value='"+datos.data[i].numero_doc+"'>"+datos.data[i].cliente+"</option>";
        
        }
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
            document.getElementById("servicionombre").innerHTML += "<option value='"+datos.data[i].id_servicio+"'>"+datos.data[i].nombre+"</option>";
        }
      }
    });
  }

function TablaServiciosaRealizar() {
    document.querySelector("#TablaServiciosaRealizar");
    var table = $("#TablaServiciosaRealizar").DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            'type': 'POST',
            "data": {
                'function': 'ListarServiciosarealizar',
            },
            "url": "/usa_servicios/controllers/ServiciosaRealizar.php",

        },
        "columns": [

            { "data": "agregarempleados" },
            { "data": "cliente" },
            { "data": "nombre" },
            { "data": "fecha_inicio" },
            { "data": "fecha_fin" },
            { "data": "total_a_pagar" },
            { "data": "fecha" },
            { "data": "estado_servico" },
            { "data": "options" },
        ]
    });
    $('#TablaServiciosaRealizar > tbody').html(table);
}


function ValidarForm(nuevoservicio, tipo) {
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var exprNum = /^([0-9])*$/;
    var Validador = false;
    if (tipo == 1) {
        document.querySelectorAll("#registratnuevoservicio .form-control").forEach(e => {
            if (!e.value) {
                Validador = true;
            }
        });
    }

    if (Validador == false) {
        if (!exprNum.test(nuevoservicio.numDoc)) {
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

function GuardarServiciorealizar() {
    var nuevoservicio = {
        clienteservicio: document.getElementsByName('clienteservicio')[0].value,
        servicionombre: document.getElementsByName('servicionombre')[0].value,
        fechainicio: document.getElementsByName('fechainicio')[0].value,
        horainicio: document.getElementsByName('horainicio')[0].value,
        fechafin: document.getElementsByName('fechafin')[0].value,
        horafin: document.getElementsByName('horafin')[0].value,
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
    $('#registratnuevoservicio')[0].reset();
    document.querySelector(".modal-title").innerHTML = "Registrar Nuevo Servicio";
    document.getElementById("botondeeditar").classList.replace("btn-success", "btn-primary");
    document.querySelector("#btnText").innerHTML = "REGISTRAR SERVICIO A REALIZAR";
    document.getElementById('botondeeditar').onclick = GuardarServiciorealizar;
    // document.getElementById("usuarioclasemd12").classList.replace("col-md-12", "col-md-6");
    // $("#passwordhide").show();
    // $("contrasena").removeAttr('disabled');
    $('#modal-add-nuevoservicio').modal('show');
}

function fntEditUsuario(idusuario) {
    document.querySelector(".modal-title").innerHTML = "ACTUALIZAR ESTE SERVICIO";
    document.getElementById("botondeeditar").classList.replace("btn-primary", "btn-success");
    // document.getElementById("usuarioclasemd12").classList.replace("col-md-6", "col-md-12");
    // $("#passwordhide").hide();
    // $("contrasena").attr('disabled', 'disabled');
    document.querySelector("#btnText").innerHTML = "ACTUALIZAR";
    document.getElementById('botondeeditar').onclick = ActualizarServiciorealizar;
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

function ActualizarServiciorealizar() {
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
                    $('#modal-add-nuevoservicio').modal('hide');
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

