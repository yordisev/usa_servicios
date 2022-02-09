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
					}else if ($arrservi[$i]["estadoservi"] == "T"){
						$arrservi[$i]["estadoservi"] = '<span class="badge badge-success">Termino</span>';
					}else {
                        $arrservi[$i]["estadoservi"] = '<span class="badge badge-danger">Inactivo</span>';
                    }

                    $btnView = '<button class="editarcliente btn btn-success btn-sm" onClick="SeleccionarEmpleAsignado(' . $arrservi[$i]['id_servicioarealizar'] . ')" title="Actualizar tiempo Empleado"><i class="ni ni-ui-04"></i></button>';
                    $btnEdit = '<button class="btn btn-primary  btn-sm" onClick="Estadosdeltrabajador(' . $arrservi[$i]['id_servicioarealizar'] . ')" title="Editar Empleado"><i class="ni ni-settings"></i></button>';
						
				
				
                        $arrservi[$i]["options"] = '<div class="text-center">'.$btnView.' '.$btnEdit.'</div>';
                    }
                    $arrResponse = array('status' => true, 'data' => $arrservi);
			// $arrResponse["data"] = $arrservi;		
		}else{
            $arrResponse = [];
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


function SeleccionarEditatiempoempleado(){
    require_once('../models/EmpleadosAsignadosModel.php');
    $json = json_decode($_POST['datos']);
    $id_servicio_empleado = intval($json);
    if($id_servicio_empleado > 0){
            $arraData = Select_Tiempo_Empleado($json);
            if(empty($arraData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrResponse = array('status' => true, 'data' => $arraData);
            }
            echo json_encode($arrResponse);
        }
        die();
}

function ActualizaTiempoEmpleado()
{
    require_once('../models/EmpleadosAsignadosModel.php');
    $json = json_decode($_POST['datos']);
    if($json->id_tiempo_ser_emple != '' && $json->Empleado_fecha_inicio != '' && $json->Empleado_hora_inicio != ''){
        $response = ActualizarTiempodedeesteempleado($json);
        echo $response;
    }else{
        echo $response;
    }
}
function Actualizarestadoempleado()
{
    require_once('../models/EmpleadosAsignadosModel.php');
    $json = json_decode($_POST['datos']);
    if($json->idactualizarpago != ''){
        $response = Actualizarestadodeesteempleado($json);
        echo $response;
    }else{
        echo $response;
    }
}