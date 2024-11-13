<!--JS para este modulo-->
<script type="text/javascript" src="js/diccionario.js"></script>

<!--FORMULARIO VENTANA MODAL-->
    <div id="diccionarioModal" class="modal fade">
              <div class="modal-dialog">
                
                 <form method="post" id="diccionario_form">

                    <div class="modal-content">
                      
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                         <div class="step__header">
                            <h4 class="modal-title">Agregar Término</h4>
                         </div>
                       </div>


			                       <div class="modal-body">

			                          <div class="row">
			                            <div class="col-xs-12 col-sm-12 col-md-12">
			                              <div class="form-group">
			                                    <label>Nombre del Término</label>

			                                 <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre del término" required pattern="^[a-zA-Z_áéíóúñ\s]{0,50}$"/>
			                              </div>
			                            </div>
			                            
			                          </div>

			                          <div class="row">
			                            <div class="col-xs-12 col-sm-12 col-md-12">
			                              <div class="form-group">
			                                    <label>Definición del Término</label>

			                                 <textarea class="form-control" cols="78" rows="3" id="definicion" name="definicion"  placeholder="Ingrese la definicion" required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$">
			                                  </textarea>
			                              </div>
			                            </div>
			                            
			                          </div>

			                          <div class="row">
			                            <div class="col-xs-12 col-sm-12 col-md-12">
			                              <div class="form-group">
			                                    <label>Técnico del Término</label>

			                                 <textarea class="form-control" cols="78" rows="3" id="tecnico" name="tecnico"  placeholder="Ingrese el concepto tecnico" required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$">
			                                  </textarea>
			                              </div>
			                            </div>
			                            
			                          </div>

			                          <div class="row">
			                            <div class="col-xs-12 col-sm-12 col-md-12">
			                              <div class="form-group">
			                                    <label>Sentido Biologico del Término</label>

			                                 <textarea class="form-control" cols="78" rows="3" id="sentidoBio" name="sentidoBio"  placeholder="Ingrese el sentido Biologico" required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$">
			                                  </textarea>
			                              </div>
			                            </div>
			                            
			                          </div>

			                          <div class="row">
			                            <div class="col-xs-12 col-sm-12 col-md-12">
			                              <div class="form-group">
			                                    <label>Conflicto</label>

			                                 <textarea class="form-control" cols="78" rows="3" id="conflicto" name="conflicto"  placeholder="Ingrese conflicto" required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$">
			                                  </textarea>
			                              </div>
			                            </div>
			                            
			                          </div>


			                        </div> <!-- /modal - body -->

                        <div class="modal-footer">
                            <input type="hidden" name="id_dicc" id="id_dicc"/>

                            <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                         
                            <button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>                                   
                        </div>

                     </div><!-- /modal - content -->
                 </form>
			</div>
        </div>

