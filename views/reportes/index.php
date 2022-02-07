<?php 
	require "../template/header.php";
  if($_SESSION['nivel'] == '1'){
 ?>

<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
         
        </div>
      </div>
    </div>

    <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header"><h3 class="mb-0">Servicios
                <div class="float-right">
                    <button type="button" onclick="ReporteClientesver()" class="btn btn-primary">Clientes</button>
                    <button type="button" onclick="reportesempleadosver()" class="btn btn-success">Empleados</button>
                    <button type="button" onclick="ReporteServiciosver()" class="btn btn-info">Servicios</button>
                </div>
        </h3></div>
 <!-- ////////////////////////////////////// -->
 <div class="card-body">
            <div id="reportesempleadosver" class="table-responsive py-4">
            <div id="chart"></div>
          </div>
         <!-- ////////////////////////////////////// -->
         
         <div id="ReporteServiciosver" class="table-responsive py-4">
               <div id="fechasseleccionarservicios" class="row">
               <div class="col-md-4">
                   <div class="form-group">
                     <label><strong>INICIO</strong></label>
                     <input type="date" class="form-control" name="fecha_ini" id="fecha_ini">
                   </div>
                 </div>
                 <div class="col-md-4">
                 <div class="form-group">
                     <label><strong>FIN</strong></label>
                     <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
                   </div>
                   </div>

                   <div class="col-md-1">
                 <div class="form-group">
                     <label><strong>Buscar</strong></label>
                     <button type="button" onclick="ReporteServicios()" class="btn btn-info">Buscar</button>
                   </div>
                   </div>
                   
                   
               
            
               </div>
               <div id="chart1"></div>

              
         
          </div>
            <!-- ////////////////////////////////////// -->
            </div>
          </div>
          </div>
          </div>
   
<?php 
 } else {
  session_destroy();
  echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
      }
	require "../template/footer.php";
 ?>

 <script src="../template/js/Reportes.js"></script>

