<?php

function llamarreporteEmpleados(){
    require_once('../config/config.php');
    $query = mysqli_query($mysqli,"SELECT CONCAT(e.p_nombre,' ',e.p_apellido) AS empleado,
    COUNT(s.trabajador) AS total_trabajo
    FROM servicios_a_realizar_trabajadore s
    INNER JOIN servicios_a_realizar se ON s.id_servicio=se.id_ser_rea
    INNER JOIN empleados e ON s.trabajador=e.numero_doc
    GROUP BY s.trabajador");
    $datos = array();
    while ($row = $query->fetch_assoc()) {
      $datos[]= $row;
    }
    return $datos;
    }


    function llamarreporteServicios($json){
      require_once('../config/config.php');
      $query = mysqli_query($mysqli,"SELECT se.nombre, COUNT(s.servicio) AS servicios
      FROM servicios_a_realizar s
      INNER JOIN servicios se ON s.servicio=se.id_servicio
      WHERE s.fecha_inicio BETWEEN '$json->fecha_ini' AND '$json->fecha_fin'
      GROUP BY s.servicio");
      $datos = array();
      while ($row = $query->fetch_assoc()) {
        $datos[]= $row;
      }
      return $datos;
      }