console.log("Login");

function ValidarForm(User) {
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var Validador = false;
    document.querySelectorAll("#FormLogin .form-control").forEach(e => {
        if (!e.value) {
            Validador = true;
        }
    });
    if (Validador == false) {
        if (!expr.test(User.usuario)) {
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia!',
                text: 'La dirección de correo ' + User.usuario + ' es incorrecta.',
            });
            return false;
        }
        if (Object.values(User.contrasena).length < 6) {
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia!',
                text: 'La contraseña debe contener minimo 6 caracteres',
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

function Login() {
    FormLogin = {
        usuario: document.getElementsByName('email')[0].value,
        contrasena: document.getElementsByName('password')[0].value,
    }
    if (ValidarForm(FormLogin)) {
        Swal.fire({
            title: 'Cargando',
        });
        Swal.showLoading();
        setTimeout(() => {
            $.ajax({
                method: 'POST',
                datatype: 'json',
                data: {
                    'function': 'Login',
                    'datos': JSON.stringify(FormLogin)
                },
                url: '/usa_servicios/controllers/login.php',
            }).then(function(response) {
                // var datos = JSON.parse(response);
                if (response == 'Exito') {
                    Swal.fire({
                        title: 'Notificacion!',
                        position: 'center',
                        icon: 'success',
                        text: 'Login exitoso',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#FormLogin')[0].reset();
                    localStorage.setItem('usuario', response[1]);
                    location.href = 'http://localhost/usa_servicios/views/inicio';
                    // location.href = 'http://192.168.52.54/usa_servicios/views/inicio';

                } else {
                    Swal.fire({
                        title: 'Notificacion!',
                        position: 'center',
                        icon: 'error',
                        text: 'Usuario o Contraseña incorrecta',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        }, 800);
    }
}