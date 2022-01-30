 <!-- Modals agregar usuario -->
 <div class="card">
              <div class="row">
                  <div class="modal fade" id="modal-add-usuario" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h6 class="modal-title" id="modal-title-default">Agregar Nuevo Usuario</h6>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <form role="form" v-on:submit.prevent="insertarusuario(datousuario)">
                                 <div class="row">
    <div class="col-md-12">
      <label class="form-control-label"># Documento</label>
      <div class="form-group">
        <input type="number" class="form-control" v-model="datousuario.identificacion"  placeholder="# documento">
      </div>
    </div>
     </div>
    <div class="row">
    <div class="col-md-6">
      <label class="form-control-label">Nombres</label>
      <div class="form-group">
        <input type="text" placeholder="Regular" v-model="datousuario.nombres" class="form-control"/>
      </div>
    </div>
    <div class="col-md-6">
      <label class="form-control-label">Apellidos</label>
      <div class="form-group">
        <input type="text" placeholder="Regular" v-model="datousuario.apellidos" class="form-control"/>
      </div>
    </div>
    </div>
 <div class="row">
    <div class="col-md-4">
      <label class="form-control-label">Telefono</label>
      <div class="form-group">
        <input type="number" placeholder="Regular" v-model="datousuario.telefono" class="form-control"/>
      </div>
    </div>
    <div class="col-md-4">
      <label class="form-control-label">Usuario</label>
      <div class="form-group">
        <input type="text" placeholder="Regular" v-model="datousuario.usuario" class="form-control"/> 
      </div>
    </div>
     <div class="col-md-4">
      <label class="form-control-label">Contraseña</label>
      <div class="form-group">
        <input type="text" placeholder="Regular" v-model="datousuario.password" class="form-control"/>
      </div>
    </div>
    </div>
     <div class="row">
    <div class="col-md-4">
      <label class="form-control-label">Seccional</label>
      <div class="form-group">
        <select class="form-control" v-model="datousuario.seccional" @change='getmunicipios()'>
       <option value='0' >Seleccionar Departamento</option>
       <option v-for="item in departamentos"  :value="item.id_departamento" :key="item.id_departamento">{{ item.nombre_departamento }}</option>
    </select>
      </div>
    </div>
    <div class="col-md-4">
      <label class="form-control-label">Municipio</label>
      <div class="form-group">
        <select class="form-control" v-model="datousuario.municipio">
   <option value='0' >Seleccionar Departamento</option>
       <option v-for="item in municipios" :value="item.id_municipio" :key="item.id_municipio">{{ item.nombre_municipio }}</option>
    </select>
      </div>
    </div>
     <div class="col-md-4">
      <label class="form-control-label">Rol</label>
      <div class="form-group">
        <select class="form-control" v-model="datousuario.rolid">
      <option>1</option>
      <option>2</option>
    </select>
      </div>
    </div>
    </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group has-success">
        <input type="text" placeholder="Success" class="form-control is-valid" />
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group has-danger">
        <input type="email" placeholder="Error Input" class="form-control is-invalid" />
      </div>
    </div>
  </div>
                              
                                <div class="text-center">
                                  <button type="submit" class="btn btn-primary my-4">Guardar</button>
                                </div>
                              </form>
                        </div>
                       
                      </div>
                    </div>
                  </div>
           
              </div>
       
          </div>