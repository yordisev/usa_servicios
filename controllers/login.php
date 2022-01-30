<?php
session_start();
$postdata = file_get_contents("php://input");
$function = $_POST['function'];
$function();


function Login(){
    require_once('../models/loginModel.php');
    $json = json_decode($_POST['datos']);
    if($json->usuario != '' && $json->contrasena != ''){
        if(!strlen($json->contrasena) < 6){
            $response = LoginModel($json);
        }else{
            $response = 'La contraseña debe contener minimo 6 caracteres';
        }
    }else{
        $response = 'Debe diligenciar todos los campos';
    }

    // $response = array('status' => 'Exito', 'data' => $response);
    echo $response;
    // echo json_encode($response);
}

function Logout() {
    
}

?>