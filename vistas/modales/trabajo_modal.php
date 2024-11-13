 <!--FORMULARIO VENTANA MODAL-->

            <div id="trabajoModal" class="modal fade">
              
              <div class="modal-dialog">
                
                 <form method="post" id="trabajo_form">

                    <div class="modal-content">
                      
                       <div class="modal-header">

                         <button type="button" class="close" data-dismiss="modal">&times;</button>

                         <div class="step__header">
                          
                            <h4 class="modal-title">Agregar Trabajo</h4>

                         </div>

                       </div>


                       <div class="modal-body">

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                    <label>Nombre del Trabajo</label>

                                 <input type="text" name="trabajo" id="trabajo" class="form-control" placeholder="Ingrese nombre del trabajo" required pattern="^[a-zA-Z_áéíóúñ\s]{0,50}$"/>
                              </div>
                            </div>
                            
                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                    <label>Cargo</label>

                                 <input type="text" name="cargo" id="cargo" class="form-control" placeholder="Ingrese nombre del cargo" required pattern="^[a-zA-Z_áéíóúñ\s]{0,50}$"/>
                              </div>
                            </div>
                            
                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                    <label>Direccion</label>

                                 <textarea cols="68" class="form-control" rows="3" id="direccion" name="direccion"  placeholder="Ingrese la dirección" required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$">
                                  </textarea>
                              </div>
                            </div>
                            
                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <label>Telefono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingrese número telefonico" required pattern="[0-9]{0,15}" maxlength="12" />
                              </div>
                            </div>
                            
                          </div>

                        </div> 
                        <!-- /modal - body -->

                        <div class="modal-footer">
                            <input type="hidden" name="id_trabajo" id="id_trabajo"/>

                            <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                         
                            <button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>                                   
                        </div>

                     </div>
                      <!-- /modal - content -->                   

                 </form>


              </div>

            </div>  