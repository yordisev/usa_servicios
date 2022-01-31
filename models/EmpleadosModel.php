<?php

function selectEmpleado($json){
    require_once('../config/config.php');
$query = mysqli_query($mysqli, "SELECT id_empleado, tipo_doc, numero_doc, p_nombre, s_nombre, p_apellido,
s_apellido, telefono, direccion FROM empleados WHERE id_empleado = $json");
$datos = $query->fetch_assoc();
return $datos;

    }


function ListaEmpleados(){
require_once('../config/config.php');
$query = mysqli_query($mysqli,"SELECT id_empleado, numero_doc, p_nombre, p_apellido,
telefono, estado FROM empleados");
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

function EstadoEmpleado($json)
{
    require_once('../config/config.php');
    $ejecutar = $mysqli->prepare("UPDATE  empleados  SET estado = ?  WHERE id_empleado = ?");
    $ejecutar->bind_param("ss", $json->actaulizarestado,$json->idempleado);
 $ejecutar->execute();
if ($ejecutar->affected_rows){
    $respuesta = "Exito";
}else {
    $respuesta = "Error";
}

return $respuesta;
}

// function ConsultaClient($json)
// {

//     require_once('../config/config.php');
//     $ejecutar = $mysqli->prepare("SELECT id_cliente, tipo_doc, numero_doc, p_nombre, s_nombre, p_apellido, s_apellido, telefono, direccion, referido,cedula_ref,telefono_ref FROM clientes WHERE tipo_doc = ? AND numero_doc = ?");
//     $ejecutar->bind_param("ss", $json->tipoDoc, $json->numDoc);
//     $ejecutar->execute();
//     $datos = $ejecutar->get_result();

//     if ($datos->num_rows > 0) {
//         while ($row = mysqli_fetch_array($datos, MYSQLI_ASSOC)) {
//             $data = json_encode($row);
//         }
//     } else {
//         $data = 'Error';
//     }

//     return $data;
// }
