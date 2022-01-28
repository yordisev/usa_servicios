<?php 
	
	require_once "../models/PersonaModel.php";
	$option = $_REQUEST['op'];
	$objPersona = new PersonaModel();

	if($option == "listregistros"){
		$arrResponse = array('status' => false, 'data' => "");
		$arrPersona = $objPersona->getPersonas();
		if(!empty($arrPersona)){
			for ($i=0; $i < count($arrPersona) ; $i++) { 
				$idpersona = $arrPersona[$i]->idpersona;
				$options = '<a href="'.BASE_URL.'views/persona/editar-persona.php?p='.$idpersona.'" class="btn btn-outline-primary btn-sm" title="Editar registro"> <i class="fas fa-user-edit"></i> </a>
		      	<button class="btn btn-outline-danger btn-sm" title="Eliminar registro" onclick="fntDelPersona('.$idpersona.')" ><i class="fas fa-trash-alt"></i></button>';
		      	$arrPersona[$i]->options = $options;
			}
			$arrResponse['status'] = true;
			$arrResponse['data'] = $arrPersona;		
		}
		echo json_encode($arrResponse);
		die();

	}

	if($option == "registro"){
		if($_POST){
			if(empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmail']) ){
				$arrResponse = array('status' => false, 'msg' => 'Error de datos');
			}else{
				$strNombre = ucwords(trim($_POST['txtNombre']));
				$strApellido = ucwords(trim($_POST['txtApellido']));
				$intTlefono = trim($_POST['txtTelefono']);
				$strEmail = strtolower(trim($_POST['txtEmail']));
				$arrPersona = $objPersona->insetPersona($strNombre,$strApellido,$intTlefono,$strEmail);
				if($arrPersona->id > 0){
					$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al guarcdar o correo ya existe');
				}
			}
			echo json_encode($arrResponse);
		}
		die();

	}

	if($option == "verregistro"){
		if($_POST){
			$idpersona = intval($_POST['idpersona']);
			$arrPersona = $objPersona->gerPersona($idpersona);
			if(empty($arrPersona)){
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
			}else{
				$arrResponse = array('status' => true, 'msg' => 'Datos encontrados', 'data' => $arrPersona);
			}
			echo json_encode($arrResponse);
		}

		die();
	}

	if($option == "actualizar"){
		if($_POST){
			if(empty($_POST['txtId']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmail']) ){
				$arrResponse = array('status' => false, 'msg' => 'Error de datos');
			}else{
				$intId = intval($_POST['txtId']);
				$strNombre = ucwords(trim($_POST['txtNombre']));
				$strApellido = ucwords(trim($_POST['txtApellido']));
				$intTlefono = trim($_POST['txtTelefono']);
				$strEmail = strtolower(trim($_POST['txtEmail']));
				$arrPersona = $objPersona->updatePersona($intId,$strNombre,$strApellido,$intTlefono,$strEmail);
				if($arrPersona->idp > 0){
					$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al actualizar o correo ya existe');
				}
			}
			echo json_encode($arrResponse);
		}
		die();
	}

	if($option == "eliminar"){
		if($_POST){
			if(empty($_POST['idpersona'])){
				$arrResponse = array('status' => false, 'msg' => 'Error de datos');
			}else{
				$idPersona = intval($_POST['idpersona']);
				$arrInfo = $objPersona->delPersona($idPersona);
				if($arrInfo->id){
					$arrResponse = array('status' => true, 'msg' => 'Registro eliminado');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar');
				}
			}
			echo json_encode($arrResponse);
		}
	}

	if($option == "buscar"){
		if($_POST){
			if(empty($_POST['txtBuscar'])){
				$arrResponse = array('status' => false, 'msg' => 'Error de datos');
			}else{
				$strBuscar = trim($_POST['txtBuscar']);
				$arrResponse = array('status' => false, 'found' => 0, 'data' => '');
				$arrInfo = $objPersona->getPersonasBusqueda($strBuscar);
				if(!empty($arrInfo)){
					$arrResponse = array('status' => true, 'found' => count($arrInfo), 'data' => $arrInfo);		
				}
			}
			echo json_encode($arrResponse);
		}
		die();
	}

	die();

 ?>