<?php


function llamartodoslosempleados(){
    require_once('../config/config.php');
    $query = mysqli_query($mysqli,"SELECT e.numero_doc, CONCAT(e.p_nombre,' ',e.s_nombre, ' ',e.p_apellido,' ',e.s_apellido) AS empleado,
    e.estado
    FROM empleados e
    WHERE e.estado='A'");
    $datos = array();
    while ($row = $query->fetch_assoc()) {
      $datos[]= $row;
    }
    return $datos;
    }

function selectEmpleado($json){
    require_once('../config/config.php');
$query = mysqli_query($mysqli, "SELECT id_empleado, tipo_doc, numero_doc, p_nombre, s_nombre, p_apellido,
s_apellido, telefono, direccion FROM empleados WHERE id_empleado = $json");
$datos = $query->fetch_assoc();
return $datos;

    }


function selectServicioempleado($json){
   
require_once('../config/config.php');
$query = mysqli_query($mysqli,"SELECT s.id_servicioarealizar, s.id_servicio, CONCAT(e.p_nombre,' ',e.s_nombre, ' ',e.p_apellido,' ',e.s_apellido) AS empleado,
s.fecha_inicio,s.hora_inicio,s.fecha_fin,s.hora_fin,s.fecha,s.estadoservi
FROM servicios_a_realizar_trabajadore s
INNER JOIN servicios_a_realizar se ON s.id_servicio=se.id_ser_rea
INNER JOIN empleados e ON s.trabajador=e.numero_doc
WHERE s.id_servicio= '$json->id_servicio_a_realizar'");
$datos = array();
while ($row = $query->fetch_assoc()) {
  $datos[]= $row;
}
return $datos;
}

function RegistroEmpleados($json)
{
    require_once('../config/config.php');
    $query = $mysqli->prepare("INSERT INTO empleados (tipo_doc, numero_doc, p_nombre, s_nombre, p_apellido, s_apellido,
    telefono,direccion,fecha_registro) VALUES (?,?,?,?,?,?,?,?,NOW())");
    $query->bind_param("ssssssss", $json->tipo_doc,$json->numero_doc,$json->p_nombre,$json->s_nombre,$json->p_apellido,$json->s_apellido,
    $json->telefono,$json->direccion);
    $query->execute();
    $id_registro = $query->insert_id;
    if ($id_registro > 0) {
        $msg = 'Exito';
    } else {
        $msg = 'Error';
    }
    return $msg;
}

function ActualizarEmpleado($json)
{
    require_once('../config/config.php');
    $ejecutar = $mysqli->prepare("UPDATE  empleados  SET tipo_doc = ?, p_nombre = ?, s_nombre =?, p_apellido=?, s_apellido=?, telefono=?,
    direccion = ? WHERE numero_doc = ?");
    $ejecutar->bind_param("ssssssss", $json->tipo_doc,$json->p_nombre,$json->s_nombre,$json->p_apellido,$json->s_apellido,
    $json->telefono,$json->direccion,$json->numero_doc);
 $ejecutar->execute();
if ($ejecutar->affected_rows){
    $respuesta = "Exito";
}else {
    $respuesta = "Error";
}

return $respuesta;
}

function Asignaresteempleadoalservicio($json)
{
    require_once('../config/config.php');
    $ejecutar = $mysqli->prepare("INSERT INTO servicios_a_realizar_trabajadore (id_servicio, trabajador, fecha) VALUES (?,?,NOW())");
    $ejecutar->bind_param("ss", $json->iddelservicioagregar,$json->seleccionarempleado);
 $ejecutar->execute();
if ($ejecutar->affected_rows){
    $respuesta = "Exito";
}else {
    $respuesta = "Error";
}

return $respuesta;
}


function Select_Tiempo_Empleado($json){
    require_once('../config/config.php');
$query = mysqli_query($mysqli, "SELECT s.id_servicioarealizar, s.trabajador,s.fecha_inicio,s.hora_inicio,s.fecha_fin,s.hora_fin
FROM servicios_a_realizar_trabajadore s WHERE s.id_servicioarealizar = $json");
$datos = $query->fetch_assoc();
return $datos;

    }

    function ActualizarTiempodedeesteempleado($json)
{
    require_once('../config/config.php');
    $ejecutar = $mysqli->prepare("UPDATE  servicios_a_realizar_trabajadore  SET fecha_inicio = ?, hora_inicio = ?, fecha_fin =?, hora_fin=? WHERE id_servicioarealizar = ?");
    $ejecutar->bind_param("sssss", $json->Empleado_fecha_inicio,$json->Empleado_hora_inicio,$json->Empleado_fecha_fin,$json->Empleado_hora_fin,$json->id_tiempo_ser_emple);
 $ejecutar->execute();
if ($ejecutar->affected_rows){
    $respuesta = "Exito";
}else {
    $respuesta = "Error";
}

return $respuesta;
}
    function Actualizarestadodeesteempleado($json)
{
    require_once('../config/config.php');
    $ejecutar = $mysqli->prepare("UPDATE  servicios_a_realizar_trabajadore  SET estadoservi = ?, estadoemple = 'Termino' WHERE id_servicioarealizar = ?");
    $ejecutar->bind_param("ss", $json->seleccionarestadoempleado,$json->idactualizarpago);
 $ejecutar->execute();
if ($ejecutar->affected_rows){
    $respuesta = "Exito";
}else {
    $respuesta = "Error";
}

return $respuesta;
}