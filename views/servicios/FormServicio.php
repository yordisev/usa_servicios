 <!-- Modals agregar usuario -->
 <div class="card">
   <div class="row">
     <div class="modal fade" id="modal-add-servicio" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
       <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h6 class="modal-title" id="modal-title-default">REGISTRAR NUEVO SERVIO</h6>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
             </button>
           </div>
           <div class="modal-body">
             <form id="nuevoservicio" class="nuevoservicio">
               <div class="row">
                 <div class="col-md-6">
                   <div class="form-group">
                     <label><strong>NOMBRE DEL SERVICIO</strong></label>
                     <input type="text" class="form-control" name="servicionombre" id="servicionombre">
                   </div>
                 </div>
                 <div class="col-md-6">
                   <div class="form-group">
                     <label><strong>PRECIO DEL SERVICIO</strong></label>
                     <input type="text" class="form-control" name="precioservicio" id="precioservicio">
                   </div>
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-6">
                   <div class="form-group">
                     <!-- <label><strong>ID DEL SERVICO</strong></label> -->
                     <input type="hidden" class="form-control" name="id_servicio" id="id_servicio">
                   </div>
                 </div>
               </div>

               <div class="text-center">
               <button id="botondeeditar" type="button" onclick="GuardarServicio()" class="btn btn-success botondeeditar"><span id="btnText">ACTUALIZAR</span></button>
               </div>
             </form>
           </div>

         </div>
       </div>
     </div>

   </div>

 </div>