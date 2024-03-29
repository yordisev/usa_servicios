<?php
session_start();
$postdata = file_get_contents("php://input");
$function = $_POST['function'];
$function();


function Listarid_servicio_del_cliente(){
    require_once('../models/ServiciosarealizarModel.php');

		$arrservicios = lista_servicios_por_cliente();
		if(!empty($arrservicios)){
			for ($i=0; $i < count($arrservicios) ; $i++) { 
				   $btnView = "";
					$btnEdit = "";

					if($arrservicios[$i]["estado"] == "A")
					{
						$arrservicios[$i]["estado"] = '<span class="badge badge-primary">Activo</span>';
					}else{
						$arrservicios[$i]["estado"] = '<span class="badge badge-danger">Inactivo</span>';
					}

                    $btnView = '<a class="btn btn-success btn-sm" href="index_servicios.php?id_servicio_del_cliente='.$arrservicios[$i]['id_servicio_cliente'].'&cliente='.$arrservicios[$i]['cliente'].'" title="Agregar Empleado">Agregar Servicios</a>';
                    $btnEdit = '<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="editardatosservicio(' . $arrservicios[$i]['id_servicio_cliente'] . ')" title="Editar Empleado"><i class="ni ni-settings"></i></button>';
                    

                    $arrservicios[$i]["agregarservicios"] = '<div class="text-center">'.$btnView.'</div>';
                        $arrservicios[$i]["options"] = '<div class="text-center">'.$btnEdit.'</div>';
                    }

			$arrResponse["data"] = $arrservicios;		
		}
		echo json_encode($arrResponse);
		die();
}




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

function Obtenerdatodeservicio(){
    require_once('../models/ServiciosarealizarModel.php');
    $json = json_decode($_POST['datos']);
    $idservicio = intval($json);
    if($idservicio > 0){
            $arraData = selectservicio($json);
            if(empty($arraData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrResponse = array('status' => true, 'data' => $arraData);
            }
            echo json_encode($arrResponse);
        }
        die();
}

function ListarServiciosarealizar(){
    require_once('../models/ServiciosarealizarModel.php');
    $json = json_decode($_POST['datos']);
		$arrservicios = ListaServiciosRealizar($json);
		if(!empty($arrservicios)){
			for ($i=0; $i < count($arrservicios) ; $i++) { 
				   $btnView = "";
					$btnEdit = "";
					$btnAct = "";
					$empleados = "";

					if($arrservicios[$i]["estado_servicio"] == "A")
					{
						$arrservicios[$i]["estado_servicio"] = '<span class="badge badge-primary">Activo</span>';
					}else{
						$arrservicios[$i]["estado_servicio"] = '<span class="badge badge-danger">Inactivo</span>';
					}

                    $btnView = '<button class="btn btn-success btn-sm" onClick="asignarunempleado(' . $arrservicios[$i]['id_ser_rea'] . ')" title="Agregar Empleado">Agregar Empleados</button>';
                    $btnEdit = '<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="editardatosservicio(' . $arrservicios[$i]['id_ser_rea'] . ')" title="Editar Empleado"><i class="ni ni-settings"></i></button>';
                    $btnAct = '<button class="btn btn-info  btn-sm btnEditUsuario" onClick="Deshabilitarservicioterminado(' . $arrservicios[$i]['id_ser_rea'] . ')" title="Editar Empleado"><i class="ni ni-settings"></i></button>';
                    $empleados = '<button class="btn btn-danger  btn-sm btnEditUsuario" onClick="tablaempleadosasignados(' . $arrservicios[$i]['id_ser_rea'] . ')" title="Editar Empleado">Ver Empleados</button>';
						
				
				
                    $arrservicios[$i]["agregarempleados"] = '<div class="text-center">'.$btnView.'</div>';
                        $arrservicios[$i]["options"] = '<div class="text-center">'.$btnEdit.' '.$btnAct.'</div>';
                        $arrservicios[$i]["verempleados"] = '<div class="text-center">'.$empleados.'</div>';
                    }
			// $arrResponse['status'] = true;
			$arrResponse["data"] = $arrservicios;		
		}else{
            $arrResponse = [];
        }
		echo json_encode($arrResponse);
		die();
}


function realizarnuevoservico()
{
    require_once('../models/ServiciosarealizarModel.php');
    $json = json_decode($_POST['datos']);
    if($json->id_servico_cliente != '' && $json->clienteservicio != '' && $json->servicionombre != '' && $json->fechainicio != '' && $json->horainicio != ''){
        $response = Realizaresteservicio($json);
        echo $response;
    }else{
        echo $response;
    }

    
}

function Editaservicio()
{
    require_once('../models/ServiciosarealizarModel.php');
    $json = json_decode($_POST['datos']);
    if($json->clienteservicio != '' && $json->servicionombre != '' && $json->fechainicio != '' && $json->horainicio != ''){
        $response = ActualizarServicio($json);
        echo $response;
    }else{
        echo $response;
    }
}


function Actualizarestado()
{
    require_once('../models/ServiciosarealizarModel.php');
    $json = json_decode($_POST['datos']);
    if($json->id_servicioterminado != '' && $json->actaulizarestado != '' ){
        $response = EstadoServicio($json);
        echo $response;
    }else{
        echo $response;
    }
}


function Agregarclienteaservicios()
{
    require_once('../models/ServiciosarealizarModel.php');
    $json = json_decode($_POST['datos']);
    if($json->clienteservicio != ''){
        $response = Agregarclienteaserviciosnuevo($json);
        echo $response;
    }else{
        echo $response;
    }

    
}