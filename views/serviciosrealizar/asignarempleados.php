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
    <div class="container-fluid mt--6">
      <div class="row card-wrapper">
        <div class="col-lg-6">
       <div class="card card-profile">
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading">SI</span>
                      <span class="description">Bautizado</span>
                    </div>
                    <div>
                      <span class="heading">SI</span>
                      <span class="description">Espiritu Santo</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                  {{asistente.p_nombre}} {{asistente.s_nombre}} {{asistente.p_apellido}} {{asistente.s_apellido}}
                </h5>
                <h3 class="h3">Años
                </h3>
                <h5 class="h3">{{asistente.tip_doc}}: {{asistente.numero_doc}}
                </h5>
                <div class="h5">
                  Telefono: {{asistente.telefono}}
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>{{asistente.nombre_municipio}}, {{asistente.nombre_departamento}}
                </div>
              </div>
            </div>
</div>
<!-- -------------------------------------------------------------------------- -->
<div class="row">
            <div class="col-md-6">

              <div class="card bg-gradient-info border-0" >
                <div class="card-body" >
                  <div class="row">
                    <div class="col">
                      <span class="h3 font-weight-bold mb-0 text-white">ADORACION Y ORACION</span>
                      <span class="h2 font-weight-bold mb-0 text-white"> ({{totalesporservicio.Adoracion}})</span>
                    </div>
                  
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-6">
              <div class="card bg-gradient-danger border-0">
                <div class="card-body" >
                  <div class="row">
                    <div class="col">
                     <span class="h3 font-weight-bold mb-0 text-white">CABALLEROS Y DORCAS</span>
                     <span class="h2 font-weight-bold mb-0 text-white"> ({{totalesporservicio.Cab_Dor}})</span>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
             
          </div>
          <div class="row">
            <div class="col-md-6">

              <div class="card bg-gradient-purple border-0" >
                <div class="card-body" >
                  <div class="row">
                    <div class="col">
                      <span class="h3 font-weight-bold mb-0 text-white">JOVENES</span>
                      <span class="h2 font-weight-bold mb-0 text-white"> ({{totalesporservicio.Jovenes}})</span>
                    </div>
                  
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-6">
              <div class="card bg-gradient-orange border-0">
                <div class="card-body" >
                  <div class="row">
                    <div class="col">
                     <span class="h3 font-weight-bold mb-0 text-white">DOMINICAL 1</span>
                     <span class="h2 font-weight-bold mb-0 text-white"> ({{totalesporservicio.Dominical1}})</span>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
             
          </div>
          <div class="row">
            <div class="col-md-6">

              <div class="card bg-gradient-green border-0" >
                <div class="card-body" >
                  <div class="row">
                    <div class="col">
                      <span class="h3 font-weight-bold mb-0 text-white">Dominical 2</span>
                      <span class="h2 font-weight-bold mb-0 text-white"> ({{totalesporservicio.Dominical2}})</span>
                    </div>
                  
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-6">
              <div class="card bg-gradient-yellow border-0">
                <div class="card-body" >
                  <div class="row">
                    <div class="col">
                     <span class="h3 font-weight-bold mb-0 text-white">EVANGELISTICO</span>
                     <span class="h2 font-weight-bold mb-0 text-white"> ({{totalesporservicio.Evangelistico}})</span>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
             
          </div>
<!-- ------------------------------------------------------------------------------- -->
        </div>
        <div class="col-lg-6">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
             <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group input-group-merge">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                          </div>
                          <input class="form-control" placeholder="Buscar por fecha" v-model="searchQuery" type="text">
                        </div>
                      </div>
                    </div>
                      <div class="float-right">

                         <router-link class="btn btn-danger float-right" :to="'/personas'">Atras</router-link>
                        </div>
                  </div>
                  
            </div>
            <div class="table-responsive py-4">
                 <div style="width:auto; height:380px; overflow:auto;">
              <table class="table table-flush" id="datatable-buttons">
                <thead class="thead-light">
                  <tr>
                    <th>Dia</th>
                    <th>Servicio</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                  </tr>
                </thead>
              
                <tbody>
                 
                  <tr v-for="(item, index) in resultQuery" :key="index" >
                    <td>{{item.dia}}</td>
                    <td>{{item.servicio}}</td>
                    <td><div v-if="item.estado_asistencia === 'A'">
<span class="badge badge-default">Asistio</span>
</div>
<div v-else-if="item.estado_asistencia === 'N'">
 <span class="badge badge-danger">No Asistio</span>
</div></td>
                    <td>{{item.fecha}}</td>
                  </tr>
                </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
        
      </div>
   
<?php 
	require "../template/footer.php";
 ?>

 <script src="../template/js/AsignarEmpleadosController.js"></script>

