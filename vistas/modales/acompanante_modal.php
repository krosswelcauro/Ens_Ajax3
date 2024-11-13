    <!--FORMULARIO VENTANA MODAL-->

    <div id="acompananteModal" class="modal fade">
      
      <div class="modal-dialog">
        
         <form method="post" id="acompanante_form">

            <div class="modal-content">
              
               <div class="modal-header">

                 <button type="button" class="close" data-dismiss="modal">&times;</button>

                 <h4 class="modal-title">Agregar Acompañante</h4>
                 

               </div>


               <div class="modal-body">

                 <label>Indentificación</label>
                 <input type="text" name="cedula_acompanante" id="cedula_acompanante" class="form-control" placeholder="9746513" required pattern="[0-9]{0,15}" minlength="5" maxlength="8" title="El campo identificación solo admite números" />
                
                <br />

                  <label>Nacionalidad</label>
                   <select class="form-control" id="nacionalidad" name="nacionalidad" required>
                      <option value="">-- Seleccione una --</option>
                      <option value="V" selected>V</option>
                      <option value="E">E</option>
                   </select>
                   <br />

                  <label>Nombre</label>
                  <input type="text" name="nombre_acompanante" id="nombre_acompanante" class="form-control" placeholder="Nombres" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/>
                  <br />
                  
                  <label>Apellido</label>
                  <input type="text" name="apellido_acompanante" id="apellido_acompanante" class="form-control" placeholder="Apellidos" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/>
                  <br />

                  <label>Dirección</label>
                  <textarea class="form-control" cols="78" rows="3" id="direccion_acompanante" name="direccion_acompanante"  placeholder="Direccion ..." required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$">
                  </textarea>
                  <br />


                  <label>Número de</label>
                   <select class="form-control" id="codigo_cell" name="codigo_cell" required>
                      <option value="">-- Selecciona uno --</option>
                      <option value="0424" selected>0424</option>
                      <option value="0414">0414</option>
                      <option value="0416">0416</option>
                      <option value="0426">0426</option>
                      <option value="0251">0251</option>
                   </select>
                   <br />


                  <label>Teléfono</label>
                  <input type="text" name="telefono_acompanante" id="telefono_acompanante" class="form-control" placeholder="Teléfono" required pattern="[0-9]{0,15}"/>
                  <br />
                  
                  <label>Relación</label>
                   <select class="form-control" id="relacion" name="relacion" required>
                      <option value="">-- Selecciona relacion --</option>
                      <option value="Padre" selected>Padre</option>
                      <option value="Madre">Madre</option>
                      <option value="Hermano/a">Hermano/a</option>
                      <option value="Novio/a">Novio/a</option>
                      <option value="Primo/a">Primo/a</option>
                      <option value="Amigo/a">Amigo/a</option>

                   </select>
                   <br />

               </div>


               <div class="modal-footer">

                 <input type="hidden" name="cedula_acom" id="cedula_acom"/>
                 <input type="hidden" name="id_acompanante" id="id_acompanante"/>

                 <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
         
          <button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
            
                 

               </div>



            </div>
           

         </form>


      </div>

    </div>