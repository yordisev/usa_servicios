<?php
session_start();
$postdata = file_get_contents("php://input");
$function = $_POST['function'];
$function();


function ListarEmpleadosalservicio(){
    require_once('../models/EmpleadosServiciosModel.php');
		$arrservi = selectServicioempleado();
		if(!empty($arrservi)){
			for ($i=0; $i < count($arrservi) ; $i++) { 
				   $btnView = "";
					$btnEdit = "";
                    $horainicio = new DateTime($arrservi[$i]['hora_inicio']);
                    $horafin = new DateTime($arrservi[$i]['hora_fin']);
                    $totalhoras = $horainicio->diff($horafin);

                    $fechainicio = new DateTime($arrservi[$i]['fecha_inicio']);
                    $fechafin = new DateTime($arrservi[$i]['fecha_fin']);
                    $totaldias = $fechainicio->diff($fechafin);

					if($arrservi[$i]["estadoservi"] == "A")
					{
						$arrservi[$i]["estadoservi"] = '<span class="badge badge-primary">Activo</span>';
					}else if ($arrservi[$i]["estadoservi"] == "T"){
						$arrservi[$i]["estadoservi"] = '<span class="badge badge-success">Termino</span>';
					}else {
                        $arrservi[$i]["estadoservi"] = '<span class="badge badge-danger">Inactivo</span>';
                    }

                    $btnView = '<button class="editarcliente btn btn-success btn-sm" onClick="iniciarlabor(' . $arrservi[$i]['id_servicioarealizar'] . ')" title="Iniciar hora Labor"><i class="ni ni-bell-55"></i></button>';
                    $btnEdit = '<button class="btn btn-danger  btn-sm" onClick="terminarlabor(' . $arrservi[$i]['id_servicioarealizar'] . ')" title="Terminar Hora Labor"><i class="ni ni-bell-55"></i></button>';
						
                        $arrservi[$i]["options"] = '<div class="text-center">'.$btnView.' '.$btnEdit.'</div>';

                        $arrservi[$i]["datosdias"] = '<div class="text-center">'.$totaldias->days.'</div>';
                        $arrservi[$i]["datoshoras"] = '<div class="text-center">'.$totalhoras->format('Total: %H horas %i minutos').PHP_EOL.'</div>';

                    }
			// $arrResponse['status'] = true;
			$arrResponse["data"] = $arrservi;		
		}else{
            $arrResponse = [];
        }
		echo json_encode($arrResponse);
		die();
}




function inicarhorariotrabajo()
{
    require_once('../models/EmpleadosServiciosModel.php');
    $json = json_decode($_POST['datos']);
    if($json->numeroservicio != '' && $json->fecha != '' && $json->hora != ''){
        $response = iniciartrabajo($json);
        echo $response;
    }else{
        echo $response;
    }
}

function terminarhorariotrabajo()
{
    require_once('../models/EmpleadosServiciosModel.php');
    $json = json_decode($_POST['datos']);
    if($json->numeroservicio != '' && $json->fecha != '' && $json->hora != ''){
        $response = terminartrabajo($json);
        echo $response;
    }else{
        echo $response;
    }
}