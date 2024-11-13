<?php  
  require_once("../config/conexion.php");
  require_once("../modelos/Estado.php");

  $estado = new Estado();

  $est = $estado->get_estados();

  ?>

<!--FORMULARIO VENTANA MODAL-->
            <div id="ciudadModal" class="modal fade">
              
              <div class="modal-dialog">
                
                 <form method="post" id="ciudad_form">

                    <div class="modal-content">
                      
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>

                         <div class="step__header">
                            <h4 class="modal-title">Agregar Ciudad</h4>
                         </div>
                       </div>


                       <div class="modal-body">
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                    <label>Nombre de la Ciudad</label>

                                 <input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Ingrese nombre de la ciudad" required pattern="^[a-zA-Z_áéíóúñ\s]{0,50}$"/>
                              </div>
                            </div>    
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label>Estado</label>                                      
                                <select class="form-control" name="estado" id="estado" required>
                                  <option value="">-- Seleccione el estado --</option> 
                                  <?php

                                      for($i=0; $i<sizeof($est); $i++){
                                        ?>
                                          <option value="<?php echo $est[$i]["id_estado"]?>"><?php echo $est[$i]["nombre"];?></option>
                                        <?php
                                      }
 
                                    ?>
                                </select>
                                <br />
                            </div>
                        </div> <!-- /modal - body -->
                        

                        <div class="modal-footer">
                            <input type="hidden" name="id_ciudad" id="id_ciudad"/>

                            <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                         
                            <button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>                                   
                        </div><!-- modal footer -->

                    </div><!-- /modal - body --> 
                </div><!-- /modal - content -->
			</form>
   		</div>   
   	</div>   
