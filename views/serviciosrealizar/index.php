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
            <div class="card-header"><h3 class="mb-0">Agregar Cliente a Servicio<button type="button" onclick="modalagregar()" class="btn btn-primary float-right">Agregar</button></h3></div>
            <div class="card-body">
            <div class="table-responsive py-4">
              <table class="table table-flush" id="TablaServiciosaRealizarcliente">
                <thead class="thead-light">
                <tr>
                                                <th>AGREGARSERVICIOS</th>
                                                <th>DOCUMENTO</th>
                                                <th>NOMBRE</th>
                                                <th>FECHA</th>
                                                <th>ESTADO</th>
                                                <th>ACCIONES</th>
                                            </tr>
                </thead>
               
              </table>
            </div>
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

 <script src="../template/js/ServiciosController.js"></script>

