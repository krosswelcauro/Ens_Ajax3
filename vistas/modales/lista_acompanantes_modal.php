 <!--FORMULARIO VENTANA MODAL-->
  <div id="modalAcompanante" class="modal fade">
            
    <div class="modal-dialog tamanomodal">
    
          <div class="wrapper"> 
              <div class="content-wrapper">        
                <section class="content">

                      <div class="step__header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h2 class="step__title">Búsqueda de acompañantes</h2>
                      </div>

                      <div id="resultados_ajax" class="text-center"></div>

                        <div class="step__body">

                          <div class="row">
                            <div class="col-md-12">
                              <div class="box">
                                  <div class="box-header with-border">

                                  <div class="panel-body table-responsive">
                                  
                                    <table id="acompanantes_data" class="table table-bordered table-striped">

                                      <thead>
                                        <tr>    
                                         <th>Cedula</th>
                                         <th>Nacionalidad</th>
                                         <th>Nombre</th>
                                         <th>Apellido</th>
                                         <th>Dirección</th>
                                         <th>Codigo</th>
                                         <th>Telefono</th>
                                         

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




                          <div class="modal-footer">                   
                              <button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
                           </div>
                        </div> <!-- step body -->  
                </section> <!-- seccion content -->
              </div>     <!--Content-Wrapper-->
            </div>      <!-- Wrapper -->

    </div> <!-- /modal - dialog -->
  
  </div><!-- /modal - principal -->



            
