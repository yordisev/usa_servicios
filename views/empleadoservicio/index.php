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
            <div class="card-header"><h3 class="mb-0"> Mis Servicios Asignados</h3></div>
            <div class="table-responsive py-4">
            <div class="table-responsive py-4">
                    <!-- <div style="width:auto; height:380px; overflow:auto;"> -->
                    <table class="table table-flush" id="misservicios">
                        <thead class="thead-light">
                            <tr>
                                <th>ACCIONES</th>
                                <th>EMPLEADO</th>
                                <th>FECHA I</th>
                                <th>HORA I</th>
                                <th>FECHA F</th>
                                <th>HORA F</th>
                                <th>FECHA</th>
                                <th>ESTADO</th>
                            </tr>
                        </thead>
                    </table>
                    <!-- </div> -->
                </div>
            </div>
          </div>
          </div>
          </div>
   
<?php 
	require "../template/footer.php";
 ?>

 <script src="../template/js/EmpleadosServiciosController.js"></script>

