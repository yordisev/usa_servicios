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
            <div class="card-header"><h3 class="mb-0">Usuarios del Sistema <button type="button" onclick="modalagregar()" class="btn btn-primary btn-neutral float-right">Agregar</button></h3></div>
            <?php include("FormUsuarios.php");?>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="TablaUsuarios">
                <thead class="thead-light">
                <tr>
                                                <th>#</th>
                                                <th>Tipo Documento</th>
                                                <th>Documento</th>
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th>Usuario</th>
                                                <th>Nivel</th>
                                                <th>Estado</th>
                                                <th>Opciones</th>
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

 <script src="../template/js/UsuariosController.js"></script>

