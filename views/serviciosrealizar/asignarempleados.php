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
    <div class="row card-wrapper">
        <div class="col-lg-4">

            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-gradient-info border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h3 font-weight-bold mb-0 text-white">ADORACION Y ORACION</span>
                                    <span class="h2 font-weight-bold mb-0 text-white"> ({{totalesporservicio.Adoracion}})</span>
                                    <span id="id_servicio_a_realizar" style="display: none;"><?php echo $_GET["id_servicio_r"]; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ------------------------------------------------------------------------------- -->
        </div>
        <div class="col-lg-8">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <div class="row">
                        <div class="float-right">

                            <router-link class="btn btn-danger float-right" :to="'/personas'">Atras</router-link>
                        </div>
                        <div class="float-left">

                            <button class="btn btn-success float-left" onclick="asignarunempleado('<?php echo $_GET['id_servicio_r']; ?>')">Asignar Empleados</button>
                        </div>
                    </div>

                </div>
                <div class="table-responsive py-4">
                    <!-- <div style="width:auto; height:380px; overflow:auto;"> -->
                    <table class="table table-flush" id="tablaempleadosasignados">
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

    <?php
    require "../template/footer.php";
    ?>

    <script src="../template/js/AsignarEmpleadosController.js"></script>