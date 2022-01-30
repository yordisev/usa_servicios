<?php
session_start();
$postdata = file_get_contents("php://input");
$function = $_POST['function'];
$function();


function ListarUsuarios()
{
    require_once('../models/UsuariosModel.php');

    $arrUsuario = ListaUsuarios();
    if (!empty($arrUsuario)) {
        for ($i = 0; $i < count($arrUsuario); $i++) {
            $btnView = "";
            $btnEdit = "";

            if ($arrUsuario[$i]["estado"] == "A") {
                $arrUsuario[$i]["estado"] = '<span class="badge badge-primary">Activo</span>';
            } else {
                $arrUsuario[$i]["estado"] = '<span class="badge badge-danger">Inactivo</span>';
            }
            $btnView = '<button class="btn btn-primary  btn-sm btnBloqueaUsuario" onClick="fntBloquearUsuario(' . $arrUsuario[$i]['id_admin'] . ')" title="Bloquear Usuario"><i class="fa fa-lock"></i></button>';
            $btnEdit = '<button class="btn btn-success  btn-sm btnEditUsuario"    onClick="fntEditUsuario(' . $arrUsuario[$i]['id_admin'] . ')"     title="Editar usuario"><i class="fa fa-plus"></i></button>';
            if ($arrUsuario[$i]["nivel"] == '1') {
                $arrUsuario[$i]["nivel"] = '<span class="badge badge-primary">Admin</span>';
            } else {
                $arrUsuario[$i]["nivel"] = '<span class="badge badge-primary">User</span>';
            }


            $arrUsuario[$i]["options"] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . '</div>';
        }
        $arrResponse["data"] = $arrUsuario;
    }else{
        $arrResponse = [];
    }
    echo json_encode($arrResponse);
    die();
}

function RegistroUsuario()
{
    require_once('../models/UsuariosModel.php');
    $json = json_decode($_POST['datos']);
    if ($json->tipoDoc != '' && $json->numDoc != '' && $json->nombres != '' && $json->apellidos != '' && $json->usuario != '' && $json->contrasena != '') {
        $opciones = array(
            'cost' => 12
        );
        $pass = password_hash($json->contrasena, PASSWORD_BCRYPT, $opciones);
        $json->contrasena = $pass;
        $doc = (int)$json->numDoc;
        $json->numDoc = $doc;
        $response = RegistroUsuarios($json);
    } else {
        $response = 'Debe diligenciar todos los campos';
    }
    echo $response;
}

function ObtenerUsuario()
{
    require_once('../models/UsuariosModel.php');
    $id = json_decode($_POST['datos']);
    $arrUsuario = ObtenerUsu($id);
    echo $arrUsuario;
}

function EditarUsuario()
{
    require_once('../models/UsuariosModel.php');
    $json = json_decode($_POST['datos']);
    if ($json->tipoDoc != '' && $json->numDoc != '' && $json->nombres != '' && $json->apellidos != '') {
        $doc = (int)$json->numDoc;
        $json->numDoc = $doc;
        $response = EditaUsuario($json);
    } else {
        $response = 'Debe diligenciar todos los campos';
    }
    echo $response;
}

function BloquearUsuario()
{
    require_once('../models/UsuariosModel.php');
    $id = $_POST['datos'];
    echo $response = BloqueaUsuario($id);
}
