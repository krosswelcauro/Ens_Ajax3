<?php  
  require_once("../modelos/Ciudades.php");
  require_once("../modelos/Oficios.php");
  require_once("../modelos/Religiones.php");
  require_once("../modelos/Trabajos.php");


  $trabajos = new Trabajo();
  $tra = $trabajos->get_trabajos();

  $ciudades = new Ciudad();

  $ciu = $ciudades->get_ciudades();

  $oficios = new Oficio();

  $ofi = $oficios->get_oficios();

  $religiones = new Religion();

  $rel = $religiones->get_religiones();

?>    

<!--FORMULARIO VENTANA MODAL-->

            <div id="pacienteModal" class="modal fade">
              
              <div class="modal-dialog">
                
                 <form method="post" id="paciente_form">

                    <div class="modal-content">
                      
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <div class="step__header">
                            <h4 class="modal-title">Agregar Paciente</h4>
                          </div>
                       </div>


                       <div class="modal-body">

                        <div class="row">
                          <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                              <label>Documento de</label>
                              <select class="form-control" name="nacionalidad" id="nacionalidad"> 
                                <option value="">Seleccione</option>                                
                                <option value="V"> V</option>
                                <option value="E"> E</option>
                              </select> 
                             </div>
                          </div>

                          <div class="col-xs-9 col-sm-9 col-md-9">
                            <div class="form-group">
                              <label>Identificación</label>
                              <input type="text" name="cedula_paciente" id="cedula_paciente" class="form-control" placeholder="Ej. 12345678" required pattern="[0-9]{0,15}"/>
                            </div>
                          </div>
                        </div>

                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Nombre</label>
                               <input type="text" name="nombre_paciente" id="nombre_paciente" class="form-control" placeholder="Ingrese nombre" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/>
                            </div>
                          </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <label>Apellido</label>
                                <input type="text" name="apellido_paciente" id="apellido_paciente" class="form-control" placeholder="Ingrese Apellido" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/>
                              </div>
                            </div>
                           
                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <label>Dirección</label>
                                  <textarea class="form-control" cols="78" rows="3" id="direccion_paciente" name="direccion_paciente"  placeholder="Direccion ..." required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$">
                                  </textarea>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <label>Con quien vive</label>
                                  <input type="text" name="con_quien_vive" id="con_quien_vive" class="form-control" placeholder="Con quien vives ?" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3">
                              <div class="form-group">
                                  <label>Número de</label>
                                  <select class="form-control" id="codigo_cell" name="codigo_cell" required>
                                    <option value="">Seleccione</option>
                                    <option value="0414">0414</option>
                                    <option value="0424">0424</option>
                                    <option value="0416">0416</option>
                                    <option value="0426">0426</option>
                                  </select>                              
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                  <label>Teléfono</label>
                                  <input type="text" name="telefono_paciente" id="telefono_paciente" class="form-control" placeholder="Teléfono" required pattern="[0-9]{0,15}" maxlength="7" minlength="7" />
         
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <label>Sexo</label>
                                <select class="form-control" id="sexo_paciente" name="sexo_paciente" required>
                                    <option value="Masculino" selected>Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                               <label>Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control">
                                 <br>
                            </div>

                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label>Lugar de Nacimiento</label>
                                <input type="text" name="lugar_nac" id="lugar_nac" class="form-control" placeholder="Lugar de Nacimiento"  required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/> <br>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label>Lateralidad</label>
                                <select class="form-control" id="lateralidad_biologica" name="lateralidad_biologica" required>
                                    <option value="">-- Selecciona su lateralidad --</option>
                                    <option value="Derecho" selected>Derecho</option>
                                    <option value="Izquierdo">Izquierdo</option>
                                </select>
                                 <br>
                            </div>

                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label>Hobbies</label>
                                <input type="text" name="hobbie" id="hobbie" class="form-control" placeholder="Hobbie" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/>
                                <br />
                            </div>

                          </div>
                         
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label>Ciudad</label>
                                <select class="form-control" name="ciudad" id="ciudad">
                                    <option value="">-- Selecciona su ciudad --</option> 
                                    <?php

                                      for($i=0; $i<sizeof($ciu); $i++){
                                        ?>
                                          <option value="<?php echo $ciu[$i]["id_ciudad"]?>"><?php echo $ciu[$i]["nombre"]?></option>
                                        <?php
                                      }
 
                                    ?>
                                      
                                    </select>
                                 <br />
                            </div>

                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label>Religión</label>
                                 <select class="form-control" id="religion" name="religion" required>
                                    <option value="">-- Selecciona su Religión --</option>
                                    <?php

                                      for($i=0; $i<sizeof($rel); $i++){
                                        ?>
                                          <option value="<?php echo $rel[$i]["id_religion"]?>"><?php echo $rel[$i]["nombre"]?></option>
                                        <?php
                                      }
 
                                    ?>
                                 </select>
                                 <br />
                            </div>

                          </div>

                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <label>Oficio</label>
                                 <select class="form-control" id="oficio" name="oficio" required>
                                    <option value="">-- Selecciona su Oficio --</option>
                                    <?php

                                      for($i=0; $i<sizeof($ofi); $i++){
                                        ?>
                                          <option value="<?php echo $ofi[$i]["id_oficio"]?>"><?php echo $ofi[$i]["nombre"]?></option>
                                        <?php
                                      }
 
                                    ?>
                                 </select>
                                
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <label>Trabajo</label>
                                 <select class="form-control" id="trabajo" name="trabajo" required>
                                    <option value="">-- Selecciona su trabajo --</option>
                                    <?php
                                      for($i=0; $i<sizeof($tra); $i++){
                                        ?>
                                          <option value="<?php echo $tra[$i]["id_trabajo"]?>"><?php echo $tra[$i]["nombre"]; ?></option>
                                        <?php
                                      }
                                    ?>  
                                 </select>
                                 <br /> 
                            </div>
                          </div>

                        </div> 
                        <!-- /modal - body -->

                        <div class="modal-footer">
                            <input type="hidden" name="cedula_pac" id="cedula_pac"/>

                            <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                         
                            <button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>                                   
                        </div>

                     </div>
                      <!-- /modal - content -->                                         
                 </form>
              </div>
            </div>
            
              