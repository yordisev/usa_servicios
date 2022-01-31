<?php 
	require "../template/header.php";
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
            <div class="card-header"><h3 class="mb-0">Servicios a Realizar<button type="button" onclick="modalagregar()" class="btn btn-primary float-right">Nuevo Pedido</button></h3></div>
            <?php include("FormServiciosRealizar.php");?>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="TablaServiciosaRealizar">
                <thead class="thead-light">
                <tr>
                                                <th>AGREGAREMPLEADOS</th>
                                                <th>CLIENTE</th>
                                                <th>SERVICIO</th>
                                                <th>FECHA INICIO</th>
                                                <th>FECHA FIN</th>
                                                <th>TOTAL A PAPGAR</th>
                                                <th>FECHA DE REGISTRO</th>
                                                <th>ESTADO</th>
                                                <th>ACCIONES</th>
                                            </tr>
                </thead>
               
              </table>
            </div>
          </div>
          </div>
          </div>
   
<?php 
	require "../template/footer.php";
 ?>

 <script src="../template/js/ServiciosController.js"></script>
