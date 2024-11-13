<!--FORMULARIO VENTANA MODAL-->
    <div id="capaModal" class="modal fade">
              <div class="modal-dialog">
                
                 <form method="post" id="capa_form">

                    <div class="modal-content">
                      
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                         <div class="step__header">
                            <h4 class="modal-title">Agregar nueva capa</h4>
                         </div>
                       </div>

                             <div class="modal-body">

                                      <label>Nombre</label>
                                      <input type="text" name="capa" id="capa" class="form-control" placeholder="Ingrese el nombre" required/>
                                      <br />
                                    
                                      <span id="lamina"></span>
                                      <br>
                                      <label for="producto_imagen" class="subir">
                                          <i class="fa fa-folder-open"></i> Inserte Imagen
                                      </label>

                                      <input id="producto_imagen" name="producto_imagen" onchange='cambiar()' type="file" style='display: none;'/>
                                      <br />

                                    
                               </div> <!-- modal body -->


                              <div class="modal-footer">
                                 <input type="hidden" name="id_capa" id="id_capa"/>

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
