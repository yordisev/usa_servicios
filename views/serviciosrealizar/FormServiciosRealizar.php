 <!-- Modals agregar usuario -->
 <div class="card">
   <div class="row">
     <div class="modal fade" id="modal-add-nuevoservicio" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
       <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h6 class="modal-title" id="modal-title-default">REGISTRAR NUEVO SERVIO</h6>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
             </button>
           </div>
           <div class="modal-body">
             <form id="registratnuevoservicio" class="registratnuevoservicio">
               <div class="row">
                   
                 <div class="col-md-12">
                 <div class="form-group">
                     <label><strong>SERVICIO</strong></label>
                     <select class="form-control" name="servicionombre" id="servicionombre">
                     </select>
                   </div>
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-6">
                   <div class="form-group">
                     <label><strong>FECHA DE INICIO</strong></label>
                     <input type="date" class="form-control" name="fechainicio" id="fechainicio">
                   </div>
                 </div>
                 <div class="col-md-6">
                   <div class="form-group">
                     <label><strong>HORA DE INICIO</strong></label>
                     <input type="time" class="form-control" name="horainicio" id="horainicio">
                   </div>
                 </div>
               </div>
               <div class="row">
               <div class="col-md-6">
                   <div class="form-group">
                     <label><strong>FECHA FINALIZACION</strong></label>
                     <input type="date" class="form-control" name="fechafin" id="fechafin">
                   </div>
                 </div>
                 <div class="col-md-6">
                 <div class="form-group">
                     <label><strong>HORA DE FINALIZACION</strong></label>
                     <input type="time" class="form-control" name="horafin" id="horafin">
                   </div>
                   </div>
               </div>
               <div class="row">
               <div class="col-md-6">
                   <div class="form-group">
                     <label><strong>ID DEL SEVICIO</strong></label>
                     <input type="text" class="form-control" value="<?php echo $_GET["id_servicio_del_cliente"]; ?>" name="id_servico_cliente" id="id_servico_client">
                   </div>
                 </div>
                 <div class="col-md-6">
                 <div class="form-group">
                     <label><strong>CLIENTE</strong></label>
                     <input type="text" class="form-control" value="<?php echo $_GET["cliente"]; ?>" name="clienteservicio" id="clienteservicio">
                   </div>
                   </div>
               </div>

               <div class="text-center">
               <button id="botondeeditar" type="button" onclick="GuardarServiciorealizar()" class="btn btn-success botondeeditar"><span id="btnText">ACTUALIZAR</span></button>
               </div>
             </form>
           </div>

         </div>
       </div>
     </div>

   </div>

 </div>