<?php
session_start();
$postdata = file_get_contents("php://input");
$function = $_POST['function'];
$function();


function llamarempleados(){
    require_once('../models/EmpleadosAsignadosModel.php');
                $arraData = llamartodoslosempleados();
                if(empty($arraData)){
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
                }else{
                    $arrResponse = array('status' => true, 'data' => $arraData);
                }
                echo json_encode($arrResponse);
         
            die();
}

function EditarEmpleado1(){
    require_once('../models/EmpleadosAsignadosModel.php');
    $json = json_decode($_POST['datos']);
    $id_servicio = intval($json);
    if($id_servicio > 0){
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

function ListarEmpleadosalservicio(){
    require_once('../models/EmpleadosAsignadosModel.php');

    $json = json_decode($_POST['datos']);
		$arrservi = selectServicioempleado($json);
		if(!empty($arrservi)){
			for ($i=0; $i < count($arrservi) ; $i++) { 
				   $btnView = "";
					$btnEdit = "";

					if($arrservi[$i]["estadoservi"] == "A")
					{
						$arrservi[$i]["estadoservi"] = '<span class="badge badge-primary">Activo</span>';
					}else{
						$arrservi[$i]["estadoservi"] = '<span class="badge badge-danger">Inactivo</span>';
					}

                    $btnView = '<button class="editarcliente btn btn-success btn-sm" onClick="Deshabilitarempleado(' . $arrservi[$i]['id_servicioarealizar'] . ')" title="Deshabilitar Empleado"><i class="ni ni-ui-04"></i></button>';
                    $btnEdit = '<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="editardatosempleado(' . $arrservi[$i]['id_servicioarealizar'] . ')" title="Editar Empleado"><i class="ni ni-settings"></i></button>';
						
				
				
                        $arrservi[$i]["options"] = '<div class="text-center">'.$btnView.' '.$btnEdit.'</div>';
                    }
			// $arrResponse['status'] = true;
			$arrResponse["data"] = $arrservi;		
		}
		echo json_encode($arrResponse);
		die();
}



function Editarempleado()
{
    require_once('../models/EmpleadosAsignadosModel.php');
    $json = json_decode($_POST['datos']);
    if($json->tipo_doc != '' && $json->numero_doc != '' && $json->p_nombre != '' && $json->p_apellido != '' && $json->telefono != '' && $json->direccion != ''){
        $response = ActualizarEmpleado($json);
        echo $response;
    }else{
        echo $response;
    }
}


function Actualizarestadoagregarempleado()
{
    require_once('../models/EmpleadosAsignadosModel.php');
    $json = json_decode($_POST['datos']);
    if($json->seleccionarempleado != '' && $json->iddelservicioagregar != '' ){
        $response = Asignaresteempleadoalservicio($json);
        echo $response;
    }else{
        echo $response;
    }
}

