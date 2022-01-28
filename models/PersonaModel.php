<?php 
	require_once "../libraries/conexion.php";
	class PersonaModel{
		private $conexion;
		function __construct(){
			$this->conexion = new Conexion();
			$this->conexion = $this->conexion->conect();
		}

		public function getPersonas(){
			$arrRegistros = array();
			$rs = $this->conexion->query("CALL select_personas()");

			while($obj = $rs->fetch_object()){
				array_push($arrRegistros,$obj);
			}
			return $arrRegistros;
		}

		public function insetPersona(string $nombre, string $apellido, int $telefono, string $email ){
			$sql = $this->conexion->query("CALL insert_persona('{$nombre}','{$apellido}','{$telefono}','{$email}')");
			$sql = $sql->fetch_object();
			return $sql;
		}

		public function gerPersona(int $idpersona){
			$sql = $this->conexion->query("CALL select_persona('{$idpersona}')");
			$sql = $sql->fetch_object();
			return $sql;
		}

		public function updatePersona(int $idpersona, string $nombre, string $apellido, int $telefono, string $email){
			$sql = $this->conexion->query("CALL update_persona('{$idpersona}','{$nombre}','{$apellido}','{$telefono}','{$email}')");
			$sql = $sql->fetch_object();
			return $sql;
		}

		public function delPersona(int $idpersona){
			$sql = $this->conexion->query("CALL delete_persona('{$idpersona}')");
			$sql = $sql->fetch_object();
			return $sql;
		}

		public function getPersonasBusqueda(string $busqueda){
			$arrRegistros = array();
			$sql = $this->conexion->query("CALL search_persona('{$busqueda}')");
			while($obj = $sql->fetch_object()){
				array_push($arrRegistros,$obj);
			}
			return $arrRegistros;
		}
	}

 ?>