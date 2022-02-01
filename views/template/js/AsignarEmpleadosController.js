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
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
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

            { "data": "options" },
            { "data": "empleado" },
            { "data": "fecha_inicio" },
            { "data": "hora_inicio" },
            { "data": "fecha_fin" },
            { "data": "hora_fin" },
            { "data": "fecha" },
            { "data": "estadoservi" },
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