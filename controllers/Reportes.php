<?php
session_start();
$postdata = file_get_contents("php://input");
$function = $_POST['function'];
$function();


function reportesempleados(){
    require_once('../models/ReportesModel.php');
                $arraData = llamarreporteEmpleados();
                if(empty($arraData)){
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
                }else{
                    $arrResponse = array('status' => true, 'data' => $arraData);
                }
                echo json_encode($arrResponse);
         
            die();
}


function reportesservicios(){
    $json = json_decode($_POST['datos']);
    require_once('../models/ReportesModel.php');
                $arraData = llamarreporteServicios($json);
                if(empty($arraData)){
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
                }else{
                    $arrResponse = array('status' => true, 'data' => $arraData);
                }
                echo json_encode($arrResponse);
         
            die();
}