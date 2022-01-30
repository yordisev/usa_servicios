<?php
session_start();
$postdata = file_get_contents("php://input");
$function = $_POST['function'];
$function();


function EditarCliente1(){
    require_once('../models/ClientesModel.php');
    $json = json_decode($_POST['datos']);
    $idcliente = intval($json);
    if($idcliente > 0){
            $arraData = selectCliente($json);
            if(empty($arraData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrResponse = array('status' => true, 'data' => $arraData);
            }
            echo json_encode($arrResponse);
        }
        die();
}

function ListarClientes(){
    require_once('../models/ClientesModel.php');

    // $arrResponse = array('status' => false, 'data' => "");
		$arrCliente = ListaCliente();
		if(!empty($arrCliente)){
			for ($i=0; $i < count($arrCliente) ; $i++) { 
				   $btnView = "";
					$btnEdit = "";

					if($arrCliente[$i]["estado"] == "A")
					{
						$arrCliente[$i]["estado"] = '<span class="badge badge-primary">Activo</span>';
					}else{
						$arrCliente[$i]["estado"] = '<span class="badge badge-danger">Inactivo</span>';
					}

                    $btnView = '<button class="editarcliente btn btn-success btn-sm" onClick="Deshabilitarcliente(' . $arrCliente[$i]['id_cliente'] . ')" title="Deshabilitar Cliente"><i class="ni ni-ui-04"></i></button>';
                    $btnEdit = '<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="editardatoscliente(' . $arrCliente[$i]['id_cliente'] . ')" title="Editar Cliente"><i class="ni ni-settings"></i></button>';
						
				
				
                        $arrCliente[$i]["options"] = '<div class="text-center">'.$btnView.' '.$btnEdit.'</div>';
                    }
			// $arrResponse['status'] = true;
			$arrResponse["data"] = $arrCliente;		
		}
		echo json_encode($arrResponse);
		die();
}


function RegistrarCliente()
{
    require_once('../models/ClientesModel.php');
    $json = json_decode($_POST['datos']);
    if($json->tipo_doc != '' && $json->numero_doc != '' && $json->p_nombre != '' && $json->p_apellido != '' && $json->telefono != '' && $json->direccion != ''
    && $json->referido != '' && $json->cedula_ref != '' && $json->telefono_ref != '' ){
        $response = RegistroCliente($json);
        echo $response;
    }else{
        echo $response;
    }

    
}

function EditarCliente()
{
    require_once('../models/ClientesModel.php');
    $json = json_decode($_POST['datos']);
    if($json->tipo_doc != '' && $json->numero_doc != '' && $json->p_nombre != '' && $json->p_apellido != '' && $json->telefono != '' && $json->direccion != ''
    && $json->referido != '' && $json->cedula_ref != '' && $json->telefono_ref != '' ){
        $response = ActualizarCliente($json);
        echo $response;
    }else{
        echo $response;
    }
}


function Actualizarestado()
{
    require_once('../models/ClientesModel.php');
    $json = json_decode($_POST['datos']);
    if($json->idcliente != '' && $json->actaulizarestado != '' ){
        $response = EstadoCliente($json);
        echo $response;
    }else{
        echo $response;
    }
}

function ConsultaCliente(){
    require_once('../models/ClientesModel.php');
    $json = json_decode($_POST['datos']);
    if($json->tipoDoc != '' && $json->numDoc != '' ){
        $response = ConsultaClient($json);
    }else{
        $response = 'Debe diligenciar todos los campos';
    }
    echo $response;
}