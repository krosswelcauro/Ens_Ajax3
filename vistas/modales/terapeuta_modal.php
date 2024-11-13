<?php  
  require_once("../modelos/Especialidades.php");
  require_once("modales/terapeuta_modal.php");

  $especialidad = new Especialidad();

  $esp = $especialidad->get_especialidades();
?>

    <!--FORMULARIO VENTANA MODAL-->
            <div id="terapeutaModal" class="modal fade">
              
              <div class="modal-dialog">
                
                 <form method="post" id="terapeuta_form">

                    <div class="modal-content">
                      
                       	<div class="modal-header">

                         	<button type="button" class="close" data-dismiss="modal">&times;</button>

                         <div class="step__header">
                           	<h4 class="modal-title">Agregar Terapeuta</h4>
                         </div>

                       </div>


                       <div class="modal-body">

                        <div class="row">
                          <!-- <div class="col-xs-2 col-sm-2 col-md-2">
                                  <label>N°</label>

                            <div class="form-group">
                              <select class="form-control" name="nacionalidad" id="nacionalidad"> 
                                <option value="V"> V</option>
                                <option value="E"> E</option>
                              </select> 
                             </div>
                          </div> -->

                          <div class="col-xs-9 col-sm-9 col-md-9">
                                  <label>Identificación</label>
                            <div class="form-group">
                              <input type="text" name="cedula_terapeuta" id="cedula_terapeuta" class="form-control" placeholder="Ingrese su cédula" required pattern="[0-9]{0,8}"/>
                            </div>
                          </div>
                        </div>

                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                  <label>Nombre</label>
                                 <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/>
                              </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">                               
                                <label>Apellido</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese apellido" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/>
                              </div>
                            </div>
                           
                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                  <label>Dirección</label>
                              <div class="form-group">
                                  <textarea cols="68" class="form-control" rows="3" id="direccion" name="direccion"  placeholder="Ingrese la dirección de habitacion" required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$">
                                  </textarea>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3">
                              <label>Número de</label>
                            <div class="form-group">
                              <select class="form-control" name="codigo_cell" id="codigo_cell"> 
                                <option value="">Selecciona</option>
                                <option value="0424"> 0424</option>
                                <option value="0414"> 0414</option>
                                <option value="0416"> 0416</option>
                                <option value="0426"> 0426</option>
                              </select> 
                             </div>
                            </div>


                            <div class="col-xs-8 col-sm-8 col-md-8">
                                  <label>Teléfono</label>
                              <div class="form-group">
                                  <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingrese número telefonico" required pattern="[0-9]{0,15}" maxlength="7" />
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">                               
                                <label>Correo electrónico</label>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo" required="required"/>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                  <label>Descripción</label>
                              <div class="form-group">
                                  <?php echo "<textarea id=\"descripcion\" name=\"descripcion\" class=\"form-control\"  maxlength=\"250\" placeholder=\"Ingrese descripcion del perfil del Terapeuta\" rows=6 cols=80></textarea>";  ?> <br>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label>Especialidad</label>
                               <select class="form-control" id="especialidad" name="especialidad" required>
                                  <option value="">-- Selecciona la especialidad --</option>
                                  <?php

                                      for($i=0; $i<sizeof($esp); $i++){
                                        ?>
                                          <option value="<?php echo $esp[$i]["id_especialidad"]?>"><?php echo $esp[$i]["nombre"]; ?></option>
                                        <?php
                                      }
 
                                    ?>
                               </select>
                               <br>
                            </div>

                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                               <span id="producto_uploaded_image"></span>
                               <br>
                                 <label for="producto_imagen" class="subir">
                                    <i class="fa fa-folder-open"></i> Inserte Imagen
                                  </label>

                                  <input id="producto_imagen" name="producto_imagen" onchange='cambiar()' type="file" style='display: none;'/> 
                            </div>
                          </div> 

                        </div> <!-- /modal - body -->

                        <div class="modal-footer">
                            
                            <input type="hidden" name="id_terapeuta" id="id_terapeuta"/>

                            <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                         
                            <button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>   

                        </div><!-- footer -->

                    </div> <!-- /modal - content -->                                           
                </form>
            </div>
        </div>


<script>
    function cambiar(){
    
      var pdrs = document.getElementById('producto_imagen').files[0].name;
      document.getElementById('info').innerHTML = pdrs;
}
</script>      