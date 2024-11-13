<?php  
  require_once("../config/conexion.php");
  require_once("../modelos/Enfermedades.php");
  require_once("../modelos/Diccionario.php");

  $diccionario = new Diccionario();

  $dic = $diccionario->get_palabras();


  $enfermedad = new Enfermedad();

  $enf = $enfermedad->get_enfermedades();

?>
<!--FORMULARIO VENTANA MODAL-->
    <div id="organoModal" class="modal fade">
              <div class="modal-dialog">
                
                 <form method="post" id="organo_form">

                    <div class="modal-content">
                      
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                         <div class="step__header">
                            <h4 class="modal-title">Agregar nuevo organo</h4>
                         </div>
                       </div>

                             <div class="modal-body">

                                      <label>Nombre</label>
                                      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre" required/>
                                      <br />

                                      <div class="row">
                                          <div class="col-xs-12 col-sm-12 col-md-12">
                                              <label>Enfermedad</label>                                      
                                              <select class="form-control" name="id_enfermedad" id="id_enfermedad" required>
                                                <option value="">-- Seleccione el enfermedad --</option> 
                                                <?php

                                                    for($i=0; $i<sizeof($enf); $i++){
                                                      ?>
                                                        <option value="<?php echo $enf[$i]["id_enfermedad"]?>">
                                                          <?php echo $enf[$i]["nombre"];?>
                                                        </option>
                                                      <?php
                                                    }
               
                                                  ?>
                                              </select>
                                              <br />
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col-xs-12 col-sm-12 col-md-12">
                                              <label>Término del diccionario</label>                                      
                                              <select class="form-control" name="id_dicc" id="id_dicc" required>
                                                <option value="">-- Seleccione el Término --</option> 
                                                <?php

                                                    for($i=0; $i<sizeof($dic); $i++){
                                                      ?>
                                                        <option value="<?php echo $dic[$i]["id_dicc"]?>">
                                                          <?php echo $dic[$i]["nombre"];?>
                                                        </option>
                                                      <?php
                                                    }
               
                                                  ?>
                                              </select>
                                              <br />
                                          </div>
                                      </div>
                                    
                                      <span id="producto_uploaded_image"></span>
                                      <br>
                                      <label for="producto_imagen" class="subir">
                                          <i class="fa fa-folder-open"></i> Inserte Imagen
                                      </label>




                                      <input id="producto_imagen" name="producto_imagen" onchange='cambiar()' type="file" style='display: none;'/>
                                      <br />

                                    
                               </div> <!-- modal body -->


                              <div class="modal-footer">
                                 <input type="hidden" name="id_organo" id="id_organo"/>

                                 <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>

                                <button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
                              </div>
                           


                     </div><!-- /modal - content -->
                 </form>
      </div>
        </div>

<script>
    function cambiar(){
    
      var pdrs = document.getElementById('producto_imagen').files[0].name;
      document.getElementById('info').innerHTML = pdrs;
}
</script>

