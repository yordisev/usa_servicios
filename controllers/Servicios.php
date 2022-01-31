<?php
session_start();
$postdata = file_get_contents("php://input");
$function = $_POST['function'];
$function();


function Obtenerservicio(){
    require_once('../models/ServiciosModel.php');
    $json = json_decode($_POST['datos']);
    $id_servicio = intval($json);
    if($id_servicio > 0){
            $arraData = selectServicio($json);
            if(empty($arraData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrResponse = array('status' => true, 'data' => $arraData);
            }
            echo json_encode($arrResponse);
        }
        die();
}

function ListarServicios(){
    require_once('../models/ServiciosModel.php');

		$arrservicios = ListaServicios();
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

                    $btnView = '<button class="editarcliente btn btn-success btn-sm" onClick="Deshabilitarservicio(' . $arrservicios[$i]['id_servicio'] . ')" title="Deshabilitar Servicio"><i class="ni ni-settings"></i></button>';
                    $btnEdit = '<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="selecionarservicio(' . $arrservicios[$i]['id_servicio'] . ')" title="Editar Servicio"><i class="ni ni-settings"></i></button>';
						
				
				
                        $arrservicios[$i]["options"] = '<div class="text-center">'.$btnView.' '.$btnEdit.'</div>';
                    }
			// $arrResponse['status'] = true;
			$arrResponse["data"] = $arrservicios;		
		}
		echo json_encode($arrResponse);
		die();
}


function nuevoservicio()
{
    require_once('../models/ServiciosModel.php');
    $json = json_decode($_POST['datos']);
    if($json->servicionombre != '' && $json->precioservicio != ''){
        $response = ServicioNuevo($json);
        echo $response;
    }else{
        echo $response;
    }

    
}

function Editarservicio()
{
    require_once('../models/ServiciosModel.php');
    $json = json_decode($_POST['datos']);
    if($json->servicionombre != '' && $json->precioservicio != '' && $json->id_servicio != ''){
        $response = ActualizarServicio($json);
        echo $response;
    }else{
        echo $response;
    }
}


function Actualizarestado()
{
    require_once('../models/ServiciosModel.php');
    $json = json_decode($_POST['datos']);
    if($json->id_servicio != '' && $json->actaulizarestado != '' ){
        $response = EstadoServicio($json);
        echo $response;
    }else{
        echo $response;
    }
}

