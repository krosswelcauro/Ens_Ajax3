            <!--FORMULARIO VENTANA MODAL-->

            <div id="religionModal" class="modal fade">
              
              <div class="modal-dialog">
                
                 <form method="post" id="religion_form">

                    <div class="modal-content">
                      
                       <div class="modal-header">

                         <button type="button" class="close" data-dismiss="modal">&times;</button>

                         <div class="step__header">
                          
                            <h4 class="modal-title">Agregar Religion</h4>

                         </div>

                       </div>


                       <div class="modal-body">

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                    <label>Nombre de la Religion</label>

                                 <input type="text" name="religion" id="religion" class="form-control" placeholder="Ingrese nombre del oficio" required pattern="^[a-zA-Z_áéíóúñ\s]{0,50}$"/>
                              </div>
                            </div>
                            
                          </div>

                        </div> 
                        <!-- /modal - body -->

                        <div class="modal-footer">
                            <input type="hidden" name="id_religion" id="id_religion"/>

                            <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                         
                            <button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>                                   
                        </div>

                     </div><!-- /modal - content -->
                 </form>
              </div><!-- /modal - dialog -->
            </div>  