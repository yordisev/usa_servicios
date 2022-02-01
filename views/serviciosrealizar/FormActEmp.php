 <!-- Modals agregar usuario -->
 <div class="card">
   <div class="row">
     <div class="modal fade" id="modal-add-actualizarempleasignado" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
       <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h6 class="modal-title" id="modal-title-default">Actualizar Tiempo Empleado</h6>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
             </button>
           </div>
           <div class="modal-body">
             <form id="Actualizatiempo" class="Actualizatiempo">
               <div class="row">
                 <div class="col-md-6">
                   <div class="form-group">
                     <label><strong>FECHA DE INICIO</strong></label>
                     <input type="date" class="form-control" name="Empleado_fecha_inicio" id="Empleado_fecha_inicio">
                   </div>
                 </div>
                 <div class="col-md-6">
                   <div class="form-group">
                     <label><strong>HORA DE INICIO</strong></label>
                     <input type="time" class="form-control" name="Empleado_hora_inicio" id="Empleado_hora_inicio">
                   </div>
                 </div>
               </div>
               <div class="row">
               <div class="col-md-6">
                   <div class="form-group">
                     <label><strong>FECHA FINALIZACION</strong></label>
                     <input type="date" class="form-control" name="Empleado_fecha_fin" id="Empleado_fecha_fin">
                   </div>
                 </div>
                 <div class="col-md-6">
                 <div class="form-group">
                     <label><strong>HORA DE FINALIZACION</strong></label>
                     <input type="time" class="form-control" name="Empleado_hora_fin" id="Empleado_hora_fin">
                   </div>
                   </div>
               </div>
               <div class="row">
                 <div class="col-md-12">
                 <div class="form-group">
                     <label><strong>ID Servicio Empleado Asignado</strong></label>
                     <input type="text" class="form-control" name="id_tiempo_ser_emple" id="id_tiempo_ser_emple" readonly>
                   </div>
                   </div>
               </div>

               <div class="text-center">
               <button  type="button" onclick="ActualizarEmpleAsignado()" class="btn btn-success"><span>ACTUALIZAR</span></button>
               </div>
             </form>
           </div>

         </div>
       </div>
     </div>

   </div>

 </div>