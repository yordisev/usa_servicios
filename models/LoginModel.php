<?php

function LoginModel($json)
{
    // echo json_encode($json);
    try {

        require_once('../config/config.php');

        $query = $mysqli->prepare("SELECT u.usuario, u.password, u.tipo_doc, u.numero_doc, u.nombres, u.apellidos, u.nivel, u.estado FROM usuarios u WHERE u.usuario = ?");
        $query->bind_param("s", $json->usuario);
        $query->execute();

        $query->bind_result($usuario, $password, $tipoDoc, $numDoc, $nombres, $apellidos, $nivel, $estado);
        if ($query->affected_rows) {
            $existe = $query->fetch();
            if ($existe) {
                if (password_verify($json->contrasena, $password)) {
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['nombre'] = $nombres." ".$apellidos;
                    $_SESSION['nivel'] = $nivel;
                    $_SESSION['tipo_doc'] = $tipoDoc;
                    $_SESSION['numero_doc'] = $numDoc;
                    $_SESSION['estado'] = $estado;
                    // $response = array('status' => 'Exito', 'data' => $nivel);
                    $response = 'Exito';
                }
            } else {
                $response = "Error";
            }
        }
        $query->close();
    } catch (Exception $e) {
        echo " Error " . $e->getMessage();
    }
    
    return $response;
}
