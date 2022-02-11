<?php 
	const BASE_URL = "http://localhost/usa_servicios/";
	// const BASE_URL = "http://192.168.52.54/usa_servicios/";
	require_once('../../models/sessiones.php');
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Dashboard PRO - Premium Bootstrap 4 Admin Template</title>
  <!-- Favicon -->
  <link rel="icon" href="<?= BASE_URL ?>assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
   <!-- datatable -->
   <link rel="stylesheet" href="<?= BASE_URL ?>assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/argon.css?v=1.1.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="<?= BASE_URL ?>pages/dashboards/dashboard.html">
          <img src="<?= BASE_URL ?>assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
     
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL ?>views/inicio/">
                <i class="ni ni-shop text-blue"></i>
                <span class="nav-link-text">Inicio</span>
              </a>
            </li>
            <?php if($_SESSION['nivel'] == '1'){ ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL ?>views/usuarios/">
                <i class="ni ni-circle-08 text-blue"></i>
                <span class="nav-link-text">Usuarios</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL ?>views/clientes/">
                <i class="fa fa-users text-orange"></i>
                <span class="nav-link-text">Clientes</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL ?>views/empleados/">
                <i class="ni ni-badge text-blue"></i>
                <span class="nav-link-text">Empleados</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ni ni-credit-card text-orange"></i>
                <span class="nav-link-text">Ingresos</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ni ni-money-coins text-blue"></i>
                <span class="nav-link-text">Pagos Realizados</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL ?>views/servicios/">
                <i class="ni ni-delivery-fast text-orange"></i>
                <span class="nav-link-text">Servicios</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL ?>views/serviciosrealizar/">
                <i class="ni ni-briefcase-24 text-blue"></i>
                <span class="nav-link-text">Servicios a Realizar</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL ?>views/reportes/">
                <i class="ni ni-chart-bar-32 text-orange"></i>
                <span class="nav-link-text">Reportes</span>
              </a>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL ?>views/empleadoservicio/">
                <i class="ni ni-bullet-list-67 text-blue"></i>
                <span class="nav-link-text">Servicios a Realizar Empleado</span>
              </a>
            </li>
          </ul>
       
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
          <ul class="navbar-nav align-items-center ml-md-auto">
          <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="../../assets/img/theme/team-4.jpg">
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['nombre']; ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="../../index.php?cerrar_sesion=true" onclick="Logout()" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 