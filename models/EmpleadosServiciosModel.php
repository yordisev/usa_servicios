<?php



function selectServicioempleado(){
   
require_once('../config/config.php');
$cedula_empleado = $_SESSION['numero_doc'];
$query = mysqli_query($mysqli,"SELECT s.id_servicioarealizar, u.numero_doc, s.id_servicio, CONCAT(u.nombres,' ',u.apellidos) AS empleado,
s.fecha_inicio,s.hora_inicio,s.fecha_fin,s.hora_fin,s.fecha,s.estadoservi,s.estadoemple
FROM servicios_a_realizar_trabajadore s
INNER JOIN servicios_a_realizar se ON s.id_servicio=se.id_ser_rea
INNER JOIN usuarios u ON s.trabajador=u.numero_doc
WHERE s.trabajador = '$cedula_empleado' and s.estadoemple  NOT IN ('Termino')");
$datos = array();
while ($row = $query->fetch_assoc()) {
  $datos[]= $row;
}
return $datos;
}


 
    function iniciartrabajo($json)
{
    require_once('../config/config.php');
    $ejecutar = $mysqli->prepare("UPDATE  servicios_a_realizar_trabajadore  SET fecha_inicio = ?, hora_inicio = ?, estadoemple = 'I' WHERE id_servicioarealizar = ?");
    $ejecutar->bind_param("sss", $json->fecha,$json->hora,$json->numeroservicio);
 $ejecutar->execute();
if ($ejecutar->affected_rows){
    $respuesta = "Exito";
}else {
    $respuesta = "Error";
}

return $respuesta;
}

    function terminartrabajo($json)
{
    require_once('../config/config.php');
    $ejecutar = $mysqli->prepare("UPDATE  servicios_a_realizar_trabajadore  SET fecha_fin = ?, hora_fin = ?, estadoemple = 'T' WHERE id_servicioarealizar = ?");
    $ejecutar->bind_param("sss", $json->fecha,$json->hora,$json->numeroservicio);
 $ejecutar->execute();
if ($ejecutar->affected_rows){
    $respuesta = "Exito";
}else {
    $respuesta = "Error";
}

return $respuesta;
}