<?php 
	
	const BASE_URL = "http://localhost/usa_servicios/";
	// const BASE_URL = "http://192.168.52.54/usa_servicios/";
	const DB_HOST = "localhost";
	const DB_NAME = "servicios_db";
	const DB_USER = "root";
	const DB_PASSWORD = "";
	const DB_CHARSET = "utf8";

	$mysqli = new mysqli("localhost", "root", "", "servicios_db");
	if ($mysqli->connect_errno) {
		printf("Falló la conexión: %s\n", $mysqli->connect_error);
		exit();
	} else {
		return $mysqli;
	}

 ?>