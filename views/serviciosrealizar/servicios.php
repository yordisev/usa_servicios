 <!-- Modals agregar usuario -->
 <div class="card">
   <div class="row">
     <div class="modal fade" id="modal-add-usuario" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
       <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h6 class="modal-title" id="modal-title-default">SERVICIOS DISPONIBLES</h6>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
             </button>
           </div>
           <div class="modal-body">
             <form id="registrar_usuario" class="registrar_usuario">
               <div class="row">
                 <div class="col-md-6">
                   <div class="form-group">
                     <label><strong>Tipo de Documento</strong></label>
                     <select class="form-control" name="tipoDoc" id="tipoDoc">
                       <option value="" readonly>Seleccionar</option>
                       <option value="CC">Cédula de Ciudadanía</option>
                       <option value="TI">Tarjeta de Identidad</option>
                       <option value="RC">Registro Civil</option>
                       <option value="CE">Cédula de Extranjería</option>
                     </select>
                   </div>
                 </div>
                 <div class="col-md-6">
                   <div class="form-group">
                     <label><strong>Numero de Documento</strong></label>
                     <input type="text" class="form-control" name="numDoc" id="numDoc">
                   </div>
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-6">
                   <div class="form-group">
                     <label><strong>NOMBRES</strong></label>
                     <input type="text" class="form-control" name="nombres" id="nombres">
                   </div>
                 </div>
                 <div class="col-md-6">
                   <div class="form-group">
                     <label><strong>APELLIDOS</strong></label>
                     <input type="text" class="form-control" name="apellidos" id="apellidos">
                   </div>
                 </div>
               </div>
               <div class="row">
                 <div id="usuarioclasemd12" class="col-md-6">
                   <div class="form-group">
                     <label><strong>CORREO ELECTRONICO</strong></label>
                     <input type="text" class="form-control" name="usuario" id="usuario">
                   </div>
                 </div>
                 <div id="passwordhide" class="col-md-6">
                   <div class="form-group">
                     <label><strong>CONTRASEÑA</strong></label>
                     <input type="password" class="form-control" name="contrasena" id="contrasena">
                   </div>
                 </div>
               </div>

               <div class="text-center">
               <button id="botondeeditar" type="button" onclick="GuardarUsuario()" class="btn btn-success botondeeditar"><span id="btnText">ACTUALIZAR</span></button>
               </div>
             </form>
           </div>

         </div>
       </div>
     </div>

   </div>

 </div>