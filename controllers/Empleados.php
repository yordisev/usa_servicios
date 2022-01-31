<?php
session_start();
$postdata = file_get_contents("php://input");
$function = $_POST['function'];
$function();


function EditarEmpleado1(){
    require_once('../models/EmpleadosModel.php');
    $json = json_decode($_POST['datos']);
    $idempleado = intval($json);
    if($idempleado > 0){
            $arraData = selectEmpleado($json);
            if(empty($arraData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrResponse = array('status' => true, 'data' => $arraData);
            }
            echo json_encode($arrResponse);
        }
        die();
}

function ListarEmpleados(){
    require_once('../models/EmpleadosModel.php');

    // $arrResponse = array('status' => false, 'data' => "");
		$arrempleado = ListaEmpleados();
		if(!empty($arrempleado)){
			for ($i=0; $i < count($arrempleado) ; $i++) { 
				   $btnView = "";
					$btnEdit = "";

					if($arrempleado[$i]["estado"] == "A")
					{
						$arrempleado[$i]["estado"] = '<span class="badge badge-primary">Activo</span>';
					}else{
						$arrempleado[$i]["estado"] = '<span class="badge badge-danger">Inactivo</span>';
					}

                    $btnView = '<button class="editarcliente btn btn-success btn-sm" onClick="Deshabilitarempleado(' . $arrempleado[$i]['id_empleado'] . ')" title="Deshabilitar Empleado"><i class="ni ni-ui-04"></i></button>';
                    $btnEdit = '<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="editardatosempleado(' . $arrempleado[$i]['id_empleado'] . ')" title="Editar Empleado"><i class="ni ni-settings"></i></button>';
						
				
				
                        $arrempleado[$i]["options"] = '<div class="text-center">'.$btnView.' '.$btnEdit.'</div>';
                    }
			// $arrResponse['status'] = true;
			$arrResponse["data"] = $arrempleado;		
		}
		echo json_encode($arrResponse);
		die();
}


function RegistrarEmpleado()
{
    require_once('../models/EmpleadosModel.php');
    $json = json_decode($_POST['datos']);
    if($json->tipo_doc != '' && $json->numero_doc != '' && $json->p_nombre != '' && $json->p_apellido != '' && $json->telefono != '' && $json->direccion != ''){
        $response = RegistroEmpleados($json);
        echo $response;
    }else{
        echo $response;
    }

    
}

function Editarempleado()
{
    require_once('../models/EmpleadosModel.php');
    $json = json_decode($_POST['datos']);
    if($json->tipo_doc != '' && $json->numero_doc != '' && $json->p_nombre != '' && $json->p_apellido != '' && $json->telefono != '' && $json->direccion != ''){
        $response = ActualizarEmpleado($json);
        echo $response;
    }else{
        echo $response;
    }
}


function Actualizarestado()
{
    require_once('../models/EmpleadosModel.php');
    $json = json_decode($_POST['datos']);
    if($json->idempleado != '' && $json->actaulizarestado != '' ){
        $response = EstadoEmpleado($json);
        echo $response;
    }else{
        echo $response;
    }
}

// function ConsultaCliente(){
//     require_once('../models/EmpleadosModel.php');
//     $json = json_decode($_POST['datos']);
//     if($json->tipoDoc != '' && $json->numDoc != '' ){
//         $response = ConsultaClient($json);
//     }else{
//         $response = 'Debe diligenciar todos los campos';
//     }
//     echo $response;
// }