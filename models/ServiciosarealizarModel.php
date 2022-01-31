<?php


function llamartodoslosclientes(){
      require_once('../config/config.php');
      $query = mysqli_query($mysqli,"SELECT c.numero_doc, CONCAT(c.p_nombre,' ',c.s_nombre, ' ',c.p_apellido,' ',c.s_apellido) AS cliente
      FROM clientes c");
      $datos = array();
      while ($row = $query->fetch_assoc()) {
        $datos[]= $row;
      }
      return $datos;
      }
function llamartodoslosservicios(){
      require_once('../config/config.php');
      $query = mysqli_query($mysqli,"SELECT * 
      from servicios s");
      $datos = array();
      while ($row = $query->fetch_assoc()) {
        $datos[]= $row;
      }
      return $datos;
      }

function selectservicio($json){
    require_once('../config/config.php');
$query = mysqli_query($mysqli, "SELECT s.id_ser_rea, c.numero_doc, CONCAT(c.p_nombre,' ',c.s_nombre, ' ',c.p_apellido,' ',c.s_apellido) AS cliente,
se.id_servicio, se.nombre, s.fecha_inicio,s.hora_inicio, s.fecha_fin,s.hora_fin, s.total_a_pagar,s.fecha,s.estado_servicio
FROM servicios_a_realizar s
INNER JOIN clientes c ON s.cliente=c.numero_doc
INNER JOIN servicios se ON s.servicio=se.id_servicio WHERE s.id_ser_rea = $json");
$datos = $query->fetch_assoc();
return $datos;

    }


function ListaServiciosRealizar(){
require_once('../config/config.php');
$query = mysqli_query($mysqli,"SELECT s.id_ser_rea, CONCAT(c.p_nombre,' ',c.s_nombre, ' ',c.p_apellido,' ',c.s_apellido) AS cliente,
se.nombre, s.fecha_inicio,s.fecha_fin,s.total_a_pagar,s.fecha,s.estado_servicio
FROM servicios_a_realizar s
INNER JOIN clientes c ON s.cliente=c.numero_doc
INNER JOIN servicios se ON s.servicio=se.id_servicio ");
$datos = array();
while ($row = $query->fetch_assoc()) {
  $datos[]= $row;
}
return $datos;
}

function Realizaresteservicio($json)
{
    require_once('../config/config.php');
    $query = $mysqli->prepare("INSERT INTO servicios_a_realizar (cliente, servicio, fecha_inicio, hora_inicio, fecha_fin, hora_fin,fecha,estado_servicio) VALUES (?,?,?,?,?,?,NOW(),'A')");
    $query->bind_param("ssssss", $json->clienteservicio,$json->servicionombre,$json->fechainicio,$json->horainicio,$json->fechafin,$json->horafin);
    $query->execute();
    $id_registro = $query->insert_id;
    if ($id_registro > 0) {
        $msg = 'Exito';
    } else {
        $msg = 'Error';
    }
    return $msg;
}

// function ActualizarEmpleado($json)
// {
//     require_once('../config/config.php');
//     $ejecutar = $mysqli->prepare("UPDATE  empleados  SET tipo_doc = ?, p_nombre = ?, s_nombre =?, p_apellido=?, s_apellido=?, telefono=?,
//     direccion = ? WHERE numero_doc = ?");
//     $ejecutar->bind_param("ssssssss", $json->tipo_doc,$json->p_nombre,$json->s_nombre,$json->p_apellido,$json->s_apellido,
//     $json->telefono,$json->direccion,$json->numero_doc);
//  $ejecutar->execute();
// if ($ejecutar->affected_rows){
//     $respuesta = "Exito";
// }else {
//     $respuesta = "Error";
// }

// return $respuesta;
// }


