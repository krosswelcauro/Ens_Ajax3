 <!--FORMULARIO VENTANA MODAL-->

            <div id="oficioModal" class="modal fade">
              
              <div class="modal-dialog">
                
                 <form method="post" id="oficio_form">

                    <div class="modal-content">
                      
                       <div class="modal-header">

                         <button type="button" class="close" data-dismiss="modal">&times;</button>

                         <div class="step__header">
                          
                            <h4 class="modal-title">Agregar Oficio</h4>

                         </div>

                       </div>


                       <div class="modal-body">

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                    <label>Nombre del Oficio</label>

                                 <input type="text" name="oficio" id="oficio" class="form-control" placeholder="Ingrese nombre del oficio" required pattern="^[a-zA-Z_áéíóúñ\s]{0,50}$"/>
                              </div>
                            </div>
                            
                          </div>

                        </div> 
                        <!-- /modal - body -->

                        <div class="modal-footer">
                            <input type="hidden" name="id_oficio" id="id_oficio"/>

                            <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                         
                            <button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>                                   
                        </div>

                     </div>
                      <!-- /modal - content -->


                            



                    </div>
                   

                 </form>


              </div>

            </div>  