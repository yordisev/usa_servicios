 <!-- Modals agregar Empleados -->
 <div class="card">
     <div class="row">
         <div class="modal fade" id="modal-add-empleados" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
             <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h6 class="modal-title" id="modal-title-default">Agregar Nuevo Empleado</h6>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span>
                         </button>
                     </div>
                     <div class="modal-body">
                <form id="registrar_empleados" class="registrar_empleados">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tipo Documento</label>
                            <select class="form-control" name="tipo_doc" id="tipo_doc">
                                <option value="" readonly>Seleccionar</option>
                                <option value="TI">Tarjeta de Identidad</option>
                                <option value="RC">Registro Civil</option>
                                <option value="CC">Cédula de Ciudadania</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Numero Documento</label>
                            <input type="number" class="form-control" name="numero_doc" id="numero_doc">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Primer Nombre</label>
                            <input type="text" class="form-control" name="p_nombre" id="p_nombre">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Segundo Nombre</label>
                            <input type="text" class="form-control" name="s_nombre" id="s_nombre">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Primer Apellido</label>
                            <input type="text" class="form-control" name="p_apellido" id="p_apellido">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Segundo Apellido</label>
                            <input type="text" class="form-control" name="s_apellido" id="s_apellido">
                        </div>
                        <!-- --------------------------------------------------------------------- -->
                        <div class="form-group col-md-6">
                            <label>Telefono</label>
                            <input type="number" class="form-control" name="telefono" id="telefono">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Direccion</label>
                            <input type="text" class="form-control" name="direccion" id="direccion">
                        </div>
                        <!-- ------------------------------------------------------------------------------ -->
                    </div>


                    <div class="text-center mt-4">
                        <button id="botondeeditar" type="button" onclick="GuardarEmpleado()" class="btn btn-success botondeeditar"><span id="btnText">ACTUALIZAR</span></button>
                        </div>


                </form>
            </div>

                 </div>
             </div>
         </div>

     </div>

 </div>