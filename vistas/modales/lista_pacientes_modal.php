<!--FORMULARIO VENTANA MODAL-->

            <div id="modalPaciente" class="modal fade">
              
              <div class="modal-dialog">
                

                    <div class="modal-content">
                      
                       <div class="step__header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h2 class="step__title">Búsqueda de Paciente</h2>
                      </div>


                       <div class="modal-body">

                         <div id="resultados_ajax" class="text-center"></div>

                                  <div class="step__body">

                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="box">
                                            <div class="box-header with-border">

                                            <div class="panel-body table-responsive">
                                            
                                              <table id="pacientes_data" class="table table-bordered table-striped">

                                                <thead>
                                                  <tr>    
                                                   <th>Cedula</th>
                                                   <th>Nombre</th>
                                                   <th>Apellido</th>
                                                   <th>Direccion</th>

                                                   <th width="10%">Acción</th>
                                                  </tr>
                                                </thead>

                                                <tbody>
                                              
                                                </tbody>

                                              </table>
                                            </div>
                                    
                                          </div><!-- /.box -->
                                        </div><!-- /.box -->
                                      </div><!-- /.col -->
                                    </div> <!-- /.row -->
                                  </div> <!-- step body -->  

                        </div> 
                        <!-- /modal - body -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>                                   
                        </div>

                     </div>
                      <!-- /modal - content -->                   


              </div>

            </div>     

