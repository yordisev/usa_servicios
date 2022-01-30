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
                <div class="card-header">
                    <h3 class="mb-0">Clientes<button type="button" onclick="modalagregar()" class="btn btn-primary btn-neutral float-right">Agregar</button></h3>
                </div>
                <?php include("FormClientes.php"); ?>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="tablalistadoclientes">
                        <thead class="thead-light">
                            <tr>
                                <th>ID Cliente</th>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>Referido</th>
                                <th>Cedula Ref</th>
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

    <script src="../template/js/ClientesController.js"></script>