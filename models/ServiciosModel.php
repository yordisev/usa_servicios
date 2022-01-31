<?php


function selectServicio($json){
    require_once('../config/config.php');
$query = mysqli_query($mysqli, "SELECT id_servicio,nombre, cobro_por_hora FROM servicios WHERE id_servicio = $json");
$datos = $query->fetch_assoc();
return $datos;

    }


function ListaServicios(){
require_once('../config/config.php');
$query = mysqli_query($mysqli,"SELECT * 
from servicios s");
$datos = array();
while ($row = $query->fetch_assoc()) {
  $datos[]= $row;
}
return $datos;
}

function ServicioNuevo($json)
{
    require_once('../config/config.php');
    $query = $mysqli->prepare("INSERT INTO servicios (nombre, cobro_por_hora, estado) VALUES (?,?,'A')");
    $query->bind_param("ss", $json->servicionombre,$json->precioservicio);
    $query->execute();
    $id_registro = $query->insert_id;
    if ($id_registro > 0) {
        $msg = 'Exito';
    } else {
        $msg = 'Error';
    }
    return $msg;
}

function ActualizarServicio($json)
{
    require_once('../config/config.php');
    $ejecutar = $mysqli->prepare("UPDATE  servicios  SET nombre = ?, cobro_por_hora = ? WHERE id_servicio = ?");
    $ejecutar->bind_param("sss", $json->servicionombre,$json->precioservicio,$json->id_servicio);
 $ejecutar->execute();
if ($ejecutar->affected_rows){
    $respuesta = "Exito";
}else {
    $respuesta = "Error";
}

return $respuesta;
}


function EstadoServicio($json)
{
    require_once('../config/config.php');
    $ejecutar = $mysqli->prepare("UPDATE  servicios  SET estado = ? WHERE id_servicio = ?");
    $ejecutar->bind_param("ss", $json->actaulizarestado,$json->id_servicio);
 $ejecutar->execute();
if ($ejecutar->affected_rows){
    $respuesta = "Exito";
}else {
    $respuesta = "Error";
}

return $respuesta;
}