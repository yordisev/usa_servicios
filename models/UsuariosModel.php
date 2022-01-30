<?php

function ListaUsuarios(){
    require_once('../config/config.php');
    $query = mysqli_query($mysqli, "SELECT id_admin, tipo_doc, numero_doc, usuario, nombres, apellidos, nivel, estado FROM usuarios WHERE estado = 'A'");
    $datos = array();
    while ($row = $query->fetch_assoc()) {
        $datos[] = $row;
    }
    return $datos;
}

function RegistroUsuarios($json){
    require_once('../config/config.php');
    $query = $mysqli->prepare("INSERT INTO usuarios (tipo_doc, numero_doc, usuario, nombres, apellidos, password) VALUES (?,?,?,?,?,?)");
    $query->bind_param("ssssss", $json->tipoDoc, $json->numDoc, $json->usuario, $json->nombres, $json->apellidos, $json->contrasena);
    $query->execute();
    $id_registro = $query->insert_id;

    if ($id_registro > 0) {
        $msg = 'Exito';
    } else {
        $msg = 'Error';
    }
    return $msg;
}

function ObtenerUsu($id){
    require_once('../config/config.php');
    $query = mysqli_query($mysqli, "SELECT id_admin, tipo_doc, numero_doc, usuario, nombres, apellidos, nivel, estado FROM usuarios WHERE id_admin = $id");
    $datos = array();
    while ($row = $query->fetch_assoc()) {
        $datos[] = $row;
    }
    if (count($datos) > 0) {
        return json_encode($datos);
    } else {
        return "Error";
    }
}

function EditaUsuario($json){
    require_once('../config/config.php');
    $query = $mysqli->prepare("UPDATE usuarios SET tipo_doc = ?, usuario = ?, nombres = ?, apellidos = ? WHERE  numero_doc = ?");
    $query->bind_param("sssss", $json->tipoDoc, $json->usuario, $json->nombres, $json->apellidos, $json->numDoc);
    $query->execute();
    $id_registro = $query->affected_rows;

    if ($id_registro > 0) {
        $msg = 'Exito';
    } else {
        $msg = 'Error';
    }
    return $msg;
}

function BloqueaUsuario($id){
    require_once('../config/config.php');
    $query = $mysqli->prepare("UPDATE usuarios SET estado = 'X' WHERE  id_admin = ?");
    $query->bind_param("s", $id);
    $query->execute();
    $id_registro = $query->affected_rows;

    if ($id_registro > 0) {
        $msg = 'Exito';
    } else {
        $msg = 'Error';
    }
    return $msg;
}


