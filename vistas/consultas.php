<?php 
require_once("../config/conexion.php");
require_once("../modelos/Terapeutas.php");
require_once("../modelos/Consulta.php");
require_once("modales/lista_acompanantes_modal.php");
require_once("modales/lista_pacientes_modal.php");

  $consul = new Consulta();

  $terapeuta = new Terapeuta();

  $tera = $terapeuta->get_terapeutas();


  $nombre_user = $_SESSION["nombre"];
  $apellido_user = $_SESSION["apellidos"];
  $img_user = $_SESSION["imagen"];

   if(isset($_SESSION["id_usuario"])){

              if ($_SESSION["cargo"] == 'Administrador') {                 
                  require_once("menu.php");
              }

              else if($_SESSION["cargo"] == 'Terapeuta'){
                 require_once("menu_terapeuta.php");
              } 

              else if($_SESSION["cargo"] == 'Asistente'){
                 require_once("menu_asistente.php");
              } 

              else if($_SESSION["cargo"] == 'Paciente'){
                 require_once("logout.php");
              } 
?>


<title>Consultas - ENS & END</title>
<link rel="stylesheet" type="text/css" href="../css/acom.css">
<link rel="icon" href="../public/images/logoend.png" />



<div class="content-page-container full-reset custom-scroll-containers">

<?php require_once("nav.php"); ?>
     

<div class="wrapper">
    <div class="main_content">
      <div class="root">



            <form method="post" id="form-register" name="form-register" class="form-register">

				            <div class="form-register__body">

                        <div id="resultados_ajax" class="text-center"></div>


                          <!-- Primera pantalla (Busqueda del paciente) -->
				                <div class="step active" id="step-1">
				                    <div class="step__header">
                              <div class="col-xs-12 col-sm-4 col-md-3">
                              <center><img src="../public/images/pac.png" alt="users-sesion" class="img-responsive center-box" style="max-width: 80px;"></center>
                          </div>
				                        <h2 class="step__title">Búsqueda de paciente</h2>
				                    </div>
				                    <div class="step__body">
				                      <!--FILA Paciente - Listado-->
                                     <div class="row">
                                          
                                        <div class="col-lg-8">

                                            <div class="box">
                                           
                                              <div class="box-body">

                                              <div class="form-group">
                                                
                                                <!--IMPORTANTE PONER EL ID de data-target="#modalProveedor" debe ser DIFERENTE AL DE ventas.php ya que eran iguales y ocurra un error, es importante que el id sea unico y diferente en todas las ventanas modales-->
                                                <div class="col-lg-6 col-lg-offset-3">
                                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPaciente"><i class="fa fa-search" aria-hidden="true"></i>  Buscar Paciente
                                                  </button>
                                                </div>
                                              </div>

                                              <br>
                                              <br>

                                              <center>

                                                <div class="col-xs-16 col-sm-16 col-md-16">
                                                   <div class="form-group">
                                                    <input type="hidden" name="id_paciente" id="id_paciente" value="id_paciente"/>
                                                    <label for="" class="col-lg-3 control-label">Cédula:</label>
                                                      <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="cedula_paciente" name="cedula_paciente" placeholder="Cedula" required pattern="[0-9]{0,15}" readonly>
                                                      </div>
                                                    </div>
                                                </div>

                                              <br>
                                              <br>

                                                <div class="col-xs-16 col-sm-16 col-md-16">
                                                   <div class="form-group">
                                                      <label for="" class="col-lg-3 control-label">Nombre:</label>
                                                      <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="nombre_paciente" name="nombre_paciente" placeholder="Razón Social" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$" readonly>
                                                      </div>
                                                    </div>
                                                </div>

                                              <br>
                                              <br>

                                                <div class="col-xs-16 col-sm-16 col-md-16">
                                                   <div class="form-group">
                                                      <label for="" class="col-lg-3 control-label">Apellido:</label>
                                                      <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="apellido_paciente" name="apellido_paciente" placeholder="Razón Social" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$" readonly>
                                                      </div>
                                                    </div>
                                                </div>

                                              <br>
                                              <br>

                                                <div class="col-xs-16 col-sm-16 col-md-16">
                                                   <div class="form-group">
                                                      <label for="" class="col-lg-3 control-label">Direccion:</label>
                                                      <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="direccion_paciente" name="direccion_paciente" placeholder="Razón Social" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$" readonly>
                                                      </div>
                                                    </div>
                                                </div>

                                              <br>
                                              <br>

                                              </center>

                                              </div>
                                              <!-- /.box-body -->
                                            <!--</form>-->
                                          </div>
                                          <!-- /.box -->
                                        </div>
                                        <!--fin col-lg-16-->
                                     </div>
                                     <!--fin row-->
				                    </div> <!-- Fin del step body -->

				                  <div class="step__footer">
				                    <button type="button" class="step__button step__button--next" data-to_step="2" data-step="1">Siguiente</button>
				                  </div>
				              </div> <!-- fin del setp 1 -->


                          <!-- Segunda pantalla (Busqueda del paciente) -->
				                <div class="step" id="step-2">
				                    <div class="step__header">
                              <div class="col-xs-12 col-sm-4 col-md-3">
                              <center><img src="../public/images/user02.png" alt="users-sesion" class="img-responsive center-box" style="max-width: 80px;"></center>
                          </div>
				                        <h2 class="step__title">Búsqueda de acompañante</h2>
				                    </div>
				                      <div class="step__body">
                              <!--FILA Paciente - Listado-->
                                     <div class="row">
                                          
                                        <div class="col-lg-8">

                                            <div class="box">
                                           
                                              <div class="box-body">

                                              <div class="form-group">
                                                

                                                <div class="col-lg-6 col-lg-offset-3">
                                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAcompanante"><i class="fa fa-search" aria-hidden="true"></i>  Buscar Acompañante
                                                  </button>
                                                </div>
                                              </div>

                                              <br>
                                              <br>

                                              <center>

                                                <div class="col-xs-16 col-sm-16 col-md-16">
                                                   <div class="form-group">
                                                    <input type="hidden" name="id_acompanante" id="id_acompanante" value="id_acompanante" />
                                                    <label for="" class="col-lg-3 control-label">Cédula:</label>
                                                      <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="cedula_acompanante" name="cedula_acompanante" placeholder="Cedula" required pattern="[0-9]{0,15}" readonly>
                                                      </div>
                                                    </div>
                                                </div>

                                              <br>
                                              <br>

                                                <div class="col-xs-16 col-sm-16 col-md-16">
                                                   <div class="form-group">
                                                      <label for="" class="col-lg-3 control-label">Nombre:</label>
                                                      <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="nombre_acompanante" name="nombre_acompanante" placeholder="Razón Social" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$" readonly>
                                                      </div>
                                                    </div>
                                                </div>

                                              <br>
                                              <br>

                                                <div class="col-xs-16 col-sm-16 col-md-16">
                                                   <div class="form-group">
                                                      <label for="" class="col-lg-3 control-label">Apellido:</label>
                                                      <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="apellido_acompanante" name="apellido_acompanante" placeholder="Razón Social" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$" readonly>
                                                      </div>
                                                    </div>
                                                </div>

                                              <br>
                                              <br>

                                                <div class="col-xs-16 col-sm-16 col-md-16">
                                                   <div class="form-group">
                                                      <label for="" class="col-lg-3 control-label">Direccion</label>
                                                        <div class="col-lg-9">
                                                          <input type="text" class="form-control" id="direccion_acompanante" name="direccion_acompanante" placeholder="Direccion" required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                              <br>
                                              <br>

                                                <div class="col-xs-16 col-sm-16 col-md-16">
                                                   <div class="form-group">
                                                      <label for="" class="col-lg-3 control-label">Telefono</label>
                                                      <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="telefono_acompanante" name="telefono_acompanante" placeholder="0000 000 00 00" required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$" readonly>
                                                      </div>
                                                    </div>
                                                </div>

                                              <br>
                                              <br>


                                              </center>

                                              </div>
                                              <!-- /.box-body -->
                                            <!--</form>-->
                                          </div>
                                          <!-- /.box -->
                                        </div>
                                        <!--fin col-lg-16-->
                                     </div>
                                     <!--fin row-->
                            </div> <!-- Fin del step body -->

				                    <div class="step__footer">
				                        <button type="button" class="step__button step__button--back" data-to_step="1" data-step="2">Regresar</button>
				                        <button type="button" class="step__button step__button--next" data-to_step="3" data-step="2">Siguiente</button>
				                    </div>
				                </div> <!-- fin del step 2  -->


                          <!-- Tercera pantalla (Creación de cita) -->
				                <div class="step" id="step-3">
				                    <div class="step__header">
                              <div class="col-xs-12 col-sm-4 col-md-3">
                              <center><img src="../public/images/consul.png" alt="users-sesion" class="img-responsive center-box" style="max-width: 80px;"></center>
                              </div>
				                        <h2 class="step__title">Creación de cita</h2>
				                    </div>
				                    <div class="step__body">
                              <!--FILA Paciente - Listado-->
                                     <div class="row">
                                          
                                        <div class="col-lg-8">

                                            <div class="box">
                                           
                                              <div class="box-body">

                                              <center>

                                                <div class="col-xs-16 col-sm-16 col-md-16">
                                                   <div class="form-group">
                                                      <label for="" class="col-lg-3 control-label">N° Consulta:</label>
                                                      <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="n_consulta" name="n_consulta" value="<?php $codigo=$consul->numero_consulta();?>"  readonly>
                                                      </div>
                                                    </div>
                                                </div>

                                              <br>
                                              <br>

                                                <div class="col-xs-16 col-sm-16 col-md-16">
                                                   <div class="form-group">
                                                    <label for="" class="col-lg-3 control-label">Motivo:</label>
                                                      <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="motivo" name="motivo" placeholder="Ingrese el motivo de la consulta" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$">
                                                      </div>
                                                    </div>
                                                </div>

                                              <br>
                                              <br>

                                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                      <label for="" class="col-lg-3 control-label">Explicación:</label>
                                                      <div class="col-lg-9">
                                                       <?php echo "<textarea id=\"explicacion\" name=\"explicacion\" class=\"form-control\"  maxlength=\"300\" placeholder=\"Expliacion de la consulta...\" rows=6 cols=80></textarea>";  ?> <br>
                                                      </div>
                                                    </div>
                                                  </div>

                                              <br>
                                              <br>

                                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                      <label for="" class="col-lg-3 control-label">Intensidad:</label>
                                                      <div class="col-lg-9">
                                                       <select class="form-control" id="intensidad" name="intensidad" required>
                                                          <option value="">Seleccione</option>
                                                          <option value="Leve">Leve</option>
                                                          <option value="Moderado">Moderado</option>
                                                          <option value="Instenso">Instenso</option>
                                                        </select> 
                                                        <br>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  
                                              


                                              <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                      <label for="" class="col-lg-3 control-label">Escala:</label>
                                                      <div class="col-lg-9">
                                                       <select class="form-control" id="escala" name="escala" required>
                                                          <option value="">Seleccione</option>
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                          <option value="4">4</option>
                                                          <option value="5">5</option>
                                                          <option value="6">6</option>
                                                          <option value="7">7</option>
                                                          <option value="8">8</option>
                                                          <option value="9">9</option>
                                                          <option value="10">10</option>
                                                        </select> 
                                                        <br>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  
                                                <div class="col-xs-16 col-sm-16 col-md-16">
                                                   <div class="form-group">
                                                      <label for="" class="col-lg-3 control-label">Terapeuta:</label>
                                                      <div class="col-lg-9">
                                                       <select class="form-control" id="id_terapeuta" name="id_terapeuta" required>
                                                          <option value="">-- Selecciona el terapeuta --</option>
                                                          <?php
                                                              for($i=0; $i<sizeof($tera); $i++){
                                                                ?>
                                                                  <option value="<?php echo $tera[$i]["id_terapeuta"]?>"><?php echo $tera[$i]["nombre"].' '. $tera[$i]["apellido"]; ?></option>
                                                                <?php
                                                              }
                         
                                                            ?>
                                                       </select>
                                                        <br>
                                                     </div>
                                                    </div>
                                                </div>

                                              <br>
                                              <br>

                                              </center>

                                              </div>
                                              <!-- /.box-body -->
                                            <!--</form>-->
                                          </div>
                                          <!-- /.box -->
                                        </div>
                                        <!--fin col-lg-16-->
                                     </div>
                                     <!--fin row-->
                            </div> <!-- Fin del step body -->

				                      <div class="step__footer">
                                <input type="hidden" name="cierre" id="cierre" value="1" />
                                <button type="button" class="step__button step__button--back" data-to_step="2" data-step="3">Regresar</button>

                                  <button type="button" onClick="registrarConsulta()" class="step__button" id="btn"><i class="fa fa-save" aria-hidden="true"></i>  Registrar</button>
				                      </div> <!-- fin del step 3 -->

				            </div> <!-- form register body -->

				        </form> 
				    </div> <!-- root -->
      </div> <!-- main content -->
    </div> <!-- wrappper -->
    <?php  require_once("footer.php");?>
</div> <!-- scrollbar -->
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/pacientes.js"></script>
<script type="text/javascript" src="js/acompanantes.js"></script>
<script type="text/javascript" src="js/consultas.js"></script>
<?php 

} else {

  header("Location:".Conectar::ruta()."vistas/index.php");
}

?>