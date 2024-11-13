<!--FORMULARIO VENTANA MODAL-->
    <div id="usuarioModal" class="modal fade">
              <div class="modal-dialog">
                
                 <form method="post" id="usuario_form">

                    <div class="modal-content">
                      
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                         <div class="step__header">
                            <h4 class="modal-title">Agregar Usuario</h4>
                         </div>
                       </div>

                             <div class="modal-body">
                                 <label>Cédula</label>
                                    <input type="text" name="cedula" id="cedula" class="form-control" placeholder="Cédula" required pattern="[0-9]{0,15}"/>
                                    <br/>

                                      <label>Nombres</label>
                                      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/>
                                      <br />
                                      
                                      <label>Apellidos</label>
                                      <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/>
                                      <br />
                                      
                                      <label>Cargo</label>
                                       <select class="form-control" id="cargo" name="cargo" required>
                                          <option value="">-- Selecciona cargo --</option>
                                          <option value="Administrador" selected>Administrador</option>
                                          <option value="Terapeuta">Terapeuta</option>
                                          <option value="Asistente">Asistente</option>
                                          <option value="Paciente">Paciente</option>
                                       </select>
                                       <br />
                                      
                                      <label>Usuario</label>
                                      <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/>
                                      <br />
                                      
                                      <label>Password</label>
                                      <input type="password" name="password1" id="password1" class="form-control" placeholder="Password" required/>
                                      <br />
                                     
                                      <label>Repita Password</label>
                                      <input type="password" name="password2" id="password2" class="form-control" placeholder="Repita Password" required/>
                                      <br />
                                      
                                      <label>Teléfono</label>
                                      <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Teléfono" required pattern="[0-9]{0,15}"/>
                                      <br />
                                      
                                      <label>Correo</label>
                                      <input type="email" name="email" id="email" class="form-control" placeholder="Correo" required="required"/>
                                      <br />
                                      
                                      <label>Dirección</label>
                                      <textarea cols="78" rows="3" id="direccion" name="direccion" class="form-control" placeholder="Direccion ..." required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$">
                                      </textarea>
                                      <br />

                                      <span id="producto_uploaded_image"></span>
                                      <span id="estado" value="1"></span>
                                      <br>
                                      <label for="producto_imagen" class="subir">
                                          <i class="fa fa-folder-open"></i> Inserte Imagen
                                      </label>

                                      <input id="producto_imagen" name="producto_imagen" onchange='cambiar()' type="file" style='display: none;'/>
                                      <br />

                                    
                               </div> <!-- modal body -->


                              <div class="modal-footer">
                                 <input type="hidden" name="estado" id="estado" value="1" />

                                 <input type="hidden" name="id_usuario" id="id_usuario"/>

                                 <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>         
                                <button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
                              </div>
                           


                     </div><!-- /modal - content -->
                 </form>
      </div>
        </div>

<script>
    function cambiar(){
    
      var pdrs = document.getElementById('producto_imagen').files[0].name;
      document.getElementById('info').innerHTML = pdrs;
}
</script>
