<!--FORMULARIO VENTANA MODAL-->

            <div id="terapiaModal" class="modal fade">
              
              <div class="modal-dialog">
                
                 <form method="post" id="terapia_form">

                    <div class="modal-content">
                      
                       <div class="modal-header">

                         <button type="button" class="close" data-dismiss="modal">&times;</button>

                         <div class="step__header">
                          
                            <h4 class="modal-title">Agregar Terapia</h4>

                         </div>

                       </div>


                       <div class="modal-body">

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <label>Nombre de la Terapia</label>
                                <input type="text" name="terapia" id="terapia" class="form-control" placeholder="Ingrese nombre de la terapia" required pattern="^[a-zA-Z_áéíóúñ\s]{0,100}$"/>
                              </div>
                            </div>
                            
                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <label>Descripción de la Terapia</label>
                                <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripción de la terapia..." required pattern="^[a-zA-Z_áéíóúñ\s]{0,100}$"/>
                              </div>
                            </div>
                            
                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <label>Costo Referencial $</label>
                                <input type="text" name="costo_refe" id="costo_refe" class="form-control" placeholder="12000" required pattern="[0-9]{0,15}"/>
                              </div>
                            </div>
                            
                          </div>

                        </div> 
                        <!-- /modal - body -->

                        <div class="modal-footer">
                            <input type="hidden" name="id_terapia" id="id_terapia"/>

                            <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                         
                            <button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>                                 
                        </div>

                     </div>
                      <!-- /modal - content -->                   

                 </form>


              </div>

            </div>     