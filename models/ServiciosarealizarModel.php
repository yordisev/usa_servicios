<?php


function lista_servicios_por_cliente(){
    require_once('../config/config.php');
    $query = mysqli_query($mysqli,"SELECT s.id_servicio_cliente,s.cliente, CONCAT(c.p_nombre,' ',c.s_nombre,' ',c.p_apellido,' ',c.s_apellido) AS clientenombre,
    s.fecha,s.estado
    FROM servicios_clientes s
    INNER JOIN clientes c ON s.cliente=c.numero_doc");
    $datos = array();
    while ($row = $query->fetch_assoc()) {
      $datos[]= $row;
    }
    return $datos;
    }



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


function ListaServiciosRealizar($json){
require_once('../config/config.php');
$query = mysqli_query($mysqli,"SELECT s.id_ser_rea, CONCAT(c.p_nombre,' ',c.s_nombre, ' ',c.p_apellido,' ',c.s_apellido) AS cliente,
se.nombre, s.fecha_inicio,s.fecha_fin,s.total_a_pagar,s.fecha,s.estado_servicio
FROM servicios_a_realizar s
INNER JOIN clientes c ON s.cliente=c.numero_doc
INNER JOIN servicios se ON s.servicio=se.id_servicio 
WHERE s.id_servicio_cliente= '$json->id_servicio_a_realizar_del_cliente'");
$datos = array();
while ($row = $query->fetch_assoc()) {
  $datos[]= $row;
}
return $datos;
}

function Realizaresteservicio($json)
{
    require_once('../config/config.php');
    $query = $mysqli->prepare("INSERT INTO servicios_a_realizar (id_servicio_cliente,cliente, servicio, fecha_inicio, hora_inicio, fecha_fin, hora_fin,fecha,estado_servicio) VALUES (?,?,?,?,?,?,?,NOW(),'A')");
    $query->bind_param("sssssss",$json->id_servico_cliente, $json->clienteservicio,$json->servicionombre,$json->fechainicio,$json->horainicio,$json->fechafin,$json->horafin);
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
    $ejecutar = $mysqli->prepare("UPDATE  servicios_a_realizar  SET cliente = ?, servicio = ?, fecha_inicio =?, hora_inicio=?, fecha_fin=?, hora_fin=?
     WHERE id_ser_rea = ?");
    $ejecutar->bind_param("sssssss", $json->clienteservicio,$json->servicionombre,$json->fechainicio,$json->horainicio,$json->fechafin,
    $json->horafin,$json->idservicorealizar);
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
    $ejecutar = $mysqli->prepare("UPDATE  servicios_a_realizar  SET estado_servicio = ? WHERE id_ser_rea = ?");
    $ejecutar->bind_param("ss", $json->actaulizarestado,$json->id_servicioterminado);
 $ejecutar->execute();
if ($ejecutar->affected_rows){
    $respuesta = "Exito";
}else {
    $respuesta = "Error";
}

return $respuesta;
}


function Agregarclienteaserviciosnuevo($json)
{
    require_once('../config/config.php');
    $query = $mysqli->prepare("INSERT INTO servicios_clientes (cliente,fecha,estado) VALUES (?,NOW(),'A')");
    $query->bind_param("s",$json->clienteservicio);
    $query->execute();
    $id_registro = $query->insert_id;
    if ($id_registro > 0) {
        $msg = 'Exito';
    } else {
        $msg = 'Error';
    }
    return $msg;
}