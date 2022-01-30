<?php

function selectCliente($json){
    require_once('../config/config.php');
$query = mysqli_query($mysqli, "SELECT id_cliente, tipo_doc, numero_doc, p_nombre, s_nombre, p_apellido,
s_apellido, telefono, direccion, referido,cedula_ref,telefono_ref FROM clientes WHERE id_cliente = $json");
$datos = $query->fetch_assoc();
return $datos;

    }


function ListaCliente(){
require_once('../config/config.php');
$query = mysqli_query($mysqli,"SELECT id_cliente, numero_doc, p_nombre, p_apellido,
telefono,referido,cedula_ref, estado FROM clientes");
$datos = array();
while ($row = $query->fetch_assoc()) {
  $datos[]= $row;
}
return $datos;
}

function RegistroCliente($json)
{
    require_once('../config/config.php');
    $query = $mysqli->prepare("INSERT INTO clientes (tipo_doc, numero_doc, p_nombre, s_nombre, p_apellido, s_apellido,
    telefono,direccion,referido,cedula_ref,telefono_ref,fecha_registro) VALUES (?,?,?,?,?,?,?,?,?,?,?,NOW())");
    $query->bind_param("sssssssssss", $json->tipo_doc,$json->numero_doc,$json->p_nombre,$json->s_nombre,$json->p_apellido,$json->s_apellido,
    $json->telefono,$json->direccion,$json->referido,$json->cedula_ref,$json->telefono_ref);
    $query->execute();
    $id_registro = $query->insert_id;
    if ($id_registro > 0) {
        $msg = 'Exito';
    } else {
        $msg = 'Error';
    }
    return $msg;
}

function ActualizarCliente($json)
{
    require_once('../config/config.php');
    $ejecutar = $mysqli->prepare("UPDATE  clientes  SET tipo_doc = ?, p_nombre = ?, s_nombre =?, p_apellido=?, s_apellido=?, telefono=?,
    direccion = ?,referido = ?,cedula_ref = ?,telefono_ref = ? WHERE numero_doc = ?");
    $ejecutar->bind_param("sssssssssss", $json->tipo_doc,$json->p_nombre,$json->s_nombre,$json->p_apellido,$json->s_apellido,
    $json->telefono,$json->direccion,$json->referido,$json->cedula_ref,$json->telefono_ref,$json->numero_doc);
 $ejecutar->execute();
if ($ejecutar->affected_rows){
    $respuesta = "Exito";
}else {
    $respuesta = "Error";
}

return $respuesta;
}

function EstadoCliente($json)
{
    require_once('../config/config.php');
    $ejecutar = $mysqli->prepare("UPDATE  clientes  SET estado = ?  WHERE id_cliente = ?");
    $ejecutar->bind_param("ss", $json->actaulizarestado,$json->idcliente);
 $ejecutar->execute();
if ($ejecutar->affected_rows){
    $respuesta = "Exito";
}else {
    $respuesta = "Error";
}

return $respuesta;
}

function ConsultaClient($json)
{

    require_once('../config/config.php');
    $ejecutar = $mysqli->prepare("SELECT id_cliente, tipo_doc, numero_doc, p_nombre, s_nombre, p_apellido, s_apellido, telefono, direccion, referido,cedula_ref,telefono_ref FROM clientes WHERE tipo_doc = ? AND numero_doc = ?");
    $ejecutar->bind_param("ss", $json->tipoDoc, $json->numDoc);
    $ejecutar->execute();
    $datos = $ejecutar->get_result();

    if ($datos->num_rows > 0) {
        while ($row = mysqli_fetch_array($datos, MYSQLI_ASSOC)) {
            $data = json_encode($row);
        }
    } else {
        $data = 'Error';
    }

    return $data;
}
