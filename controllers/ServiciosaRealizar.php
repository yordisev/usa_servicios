<?php
session_start();
$postdata = file_get_contents("php://input");
$function = $_POST['function'];
$function();


function llamarclientes(){
    require_once('../models/ServiciosarealizarModel.php');
                $arraData = llamartodoslosclientes();
                if(empty($arraData)){
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
                }else{
                    $arrResponse = array('status' => true, 'data' => $arraData);
                }
                echo json_encode($arrResponse);
         
            die();
}

function llamarservicios(){
    require_once('../models/ServiciosarealizarModel.php');
                $arraData = llamartodoslosservicios();
                if(empty($arraData)){
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
                }else{
                    $arrResponse = array('status' => true, 'data' => $arraData);
                }
                echo json_encode($arrResponse);
         
            die();
}

// function EditarEmpleado1(){
//     require_once('../models/EmpleadosModel.php');
//     $json = json_decode($_POST['datos']);
//     $idempleado = intval($json);
//     if($idempleado > 0){
//             $arraData = selectEmpleado($json);
//             if(empty($arraData)){
//                 $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
//             }else{
//                 $arrResponse = array('status' => true, 'data' => $arraData);
//             }
//             echo json_encode($arrResponse);
//         }
//         die();
// }

function ListarServiciosarealizar(){
    require_once('../models/ServiciosarealizarModel.php');

		$arrservicios = ListaServiciosRealizar();
		if(!empty($arrservicios)){
			for ($i=0; $i < count($arrservicios) ; $i++) { 
				   $btnView = "";
					$btnEdit = "";

					if($arrservicios[$i]["estado_servico"] == "A")
					{
						$arrservicios[$i]["estado_servico"] = '<span class="badge badge-primary">Activo</span>';
					}else{
						$arrservicios[$i]["estado_servico"] = '<span class="badge badge-danger">Inactivo</span>';
					}

                    $btnView = '<button class="editarcliente btn btn-success btn-sm" onClick="Deshabilitarempleado(' . $arrservicios[$i]['id_ser_rea'] . ')" title="Deshabilitar Empleado">Agregar Empleados</button>';
                    $btnEdit = '<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="editardatosempleado(' . $arrservicios[$i]['id_ser_rea'] . ')" title="Editar Empleado"><i class="ni ni-settings"></i></button>';
						
				
				
                    $arrservicios[$i]["agregarempleados"] = '<div class="text-center">'.$btnView.'</div>';
                        $arrservicios[$i]["options"] = '<div class="text-center">'.$btnEdit.'</div>';
                    }
			// $arrResponse['status'] = true;
			$arrResponse["data"] = $arrservicios;		
		}
		echo json_encode($arrResponse);
		die();
}


function realizarnuevoservico()
{
    require_once('../models/ServiciosarealizarModel.php');
    $json = json_decode($_POST['datos']);
    if($json->clienteservicio != '' && $json->servicionombre != '' && $json->fechainicio != '' && $json->horainicio != ''){
        $response = Realizaresteservicio($json);
        echo $response;
    }else{
        echo $response;
    }

    
}

// function Editarempleado()
// {
//     require_once('../models/EmpleadosModel.php');
//     $json = json_decode($_POST['datos']);
//     if($json->tipo_doc != '' && $json->numero_doc != '' && $json->p_nombre != '' && $json->p_apellido != '' && $json->telefono != '' && $json->direccion != ''){
//         $response = ActualizarEmpleado($json);
//         echo $response;
//     }else{
//         echo $response;
//     }
// }


