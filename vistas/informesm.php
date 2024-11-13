<?php 
require_once("../config/conexion.php");
require_once("modales/lista_consultas_modal.php");  
require_once("../modelos/Enfermedades.php");
require_once("../modelos/Terapias.php");

  $enfermedad = new Enfermedad();

  $enf = $enfermedad->get_enfermedades();

  $terapia = new Terapia();

  $tera = $terapia->get_terapias();


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

            <form method="post" id="informes" name="informes" class="form-register">
                        
                    <div class="form-register__body">

                        <div id="resultados_ajax" class="text-center"></div>

                        <div class="step active" id="step-1">
                            <div class="step__header">
                              <div class="col-xs-12 col-sm-4 col-md-3">
                              <center><img src="../public/images/consul.png" alt="users-sesion" class="img-responsive center-box" style="max-width: 80px;"></center>
                                </div>
                                <h2 class="step__title">Búsqueda de consultas</h2>
                            </div>
                            <div class="step__body">
                                     <div class="row">
                                          
                                        <div class="col-lg-8">

                                            <div class="box">
                                           
                                              <div class="box-body">

                                              <div class="form-group">

                                                <div class="col-lg-6 col-lg-offset-3">
                                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalConsulta"><i class="fa fa-search" aria-hidden="true" readonly></i>  Buscar Consulta
                                                  </button>
                                                </div>
                                              </div>

                                              <br>
                                              <br>
                                              <br>

                                              <center>

                                                <div class="col-md-12 wthree_contact_left_grid pr-md-0">
                                                  <div class="form-group">
                                                    <label for="" class="col-lg-3 control-label">N° Consulta</label>
                                                      <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="n_consulta" name="n_consulta" placeholder="Cedula" required pattern="[0-9]{0,15}" readonly>
                                                      </div>
                                                    </div>
                                                </div>

                                                 <br>
                                              <br>
                                                <br> 
  
                                                <div class="col-md-12 wthree_contact_left_grid pr-md-0">
                                                  <div class="form-group">
                                                    <label for="" class="col-lg-3 control-label">Fecha de la consulta</label>
                                                      <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="fecha_hora" name="fecha_hora" placeholder="Cedula" required pattern="[0-9]{0,15}" readonly>
                                                      </div>
                                                    </div>
                                                </div>

                                                 <br>
                                              <br>
                                                <br>      

                                                 <div class="col-md-12 wthree_contact_left_grid pr-md-0">
                                                  <div class="form-group">
                                                    <label for="" class="col-lg-3 control-label">Paciente</label>
                                                      <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="id_paciente" name="id_paciente" placeholder="Cedula" required pattern="[0-9]{0,15}" readonly>

                                                      </div>
                                                    </div>
                                                </div>

                                                <br>
                                              <br>
                                                <br>



                                                <div class="col-md-12 wthree_contact_left_grid pr-md-0">
                                                  <div class="form-group">
                                                    <label for="" class="col-lg-3 control-label">Terapeuta</label>
                                                      <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="id_terapeuta" name="id_terapeuta" placeholder="Cedula" required pattern="[0-9]{0,15}" readonly>

                                                      </div>
                                                    </div>
                                                </div>

                                                <br>
                                              <br>
                                                <br>


                                                <div class="col-md-12 wthree_contact_left_grid pr-md-0">
                                                  <div class="form-group">
                                                    <label for="" class="col-lg-3 control-label">Motivo</label>
                                                      <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="motivo" name="motivo" placeholder="Cedula" required pattern="[0-9]{0,15}" readonly>
                                                      </div>
                                                    </div>
                                                </div>
                                                
                                                <br><br>
                                                <br><br>
                                              </center>

                                              </div>
                                          </div>
                                        </div>
                                     </div>
                            </div> 

                          <div class="step__footer">
                            <button type="button" class="step__button step__button--next" data-to_step="2" data-step="1">Siguiente</button>
                          </div>

                      </div> <!-- fin del setp 1 -->


                          <!-- Segunda pantalla (Creación del informe) -->
                        <div class="step" id="step-2">
                            <div class="step__header">
                              <div class="col-xs-12 col-sm-4 col-md-3">
                              <center><img src="../public/images/info.png" alt="users-sesion" class="img-responsive center-box" style="max-width: 80px;"></center>
                              </div>
                                <h2 class="step__title">Creación del informe</h2>
                            </div>
                            
                            <div class="step__body">
                              <div class="col-lg-8 agileinfo_mail_grid_right">
                                    <div class="row">

                                    <!--------------- Los datos de aspectos a evaluar ----------------->

                                    <input type="hidden" id="id_aspectos_evaluar" name="id_aspectos_evaluar" value="<?php 
                                    require_once("../modelos/Consulta.php");
                                      $consul = new Consulta();
                                      $codigo=$consul->numero_id_aspecto();?>"  
                                    readonly>

                                      
                                      <div class="col-md-6 wthree_contact_left_grid pr-md-0">
                                        <div class="form-group">
                                          <label>Motivo de la Consulta</label>
                                          <input type="text" name="nombre_asp"  id="nombre_asp" class="form-control" placeholder="Nombre ASP" required="">
                                        </div>
                                      </div>

                                     <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Descripción del Paciente para el Terapeuta</label>
                                          <textarea name="descripcion_asp" id="descripcion_asp" placeholder="Datos de la consulta a tener en cuenta..." class="form-control" required=""></textarea>
                                        </div>
                                      </div>
                                      
                                    <!--------------- Los datos de aspectos consulta ----------------->
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Observación del Terapeuta en la Consulta</label>
                                          <textarea name="observacion_terapeuta" id="observacion_terapeuta" placeholder="Observaciones del terapeuta para el paciente..." class="form-control" required=""></textarea>
                                        </div>
                                      </div>

                                      <div class="col-md-5">
                                        <div class="form-group">
                                          <label>Valoración de la Consulta</label>

                                          <select class="form-control" id="valoracion" name="valoracion" required>
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
                                        </div>
                                      </div>

                                    <!--------------- Los datos del historial ----------------->

                                      <div class="col-md-7">
                                        <div class="form-group">
                                          <label>Tratamiento Médico</label>

                                          <textarea name="tratamientoMed" id="tratamientoMed" placeholder="Ingrese el tratamiento..." class="form-control" required></textarea>
                                        </div>
                                      </div>

                                      
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Reseña para el Paciente</label>

                                          <textarea name="observacion" id="observacion" placeholder="Datos para que el paciente tome en cuenta..." class="form-control" required=""></textarea>
                                        </div>
                                      </div>

                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <label>Mes de consulta</label>

                                          <select class="form-control" id="mes" name="mes" required>
                                            <option value="">Seleccione</option>
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                          </select> 
                                        </div>
                                      </div>

                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <label>Año de consulta</label>

                                          <input type="text" class="form-control" name="anio" id="anio" placeholder="Ej, 2020">
                                        </div>
                                      </div>


                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Desequilibrio</label>

                                          <select class="form-control" id="id_enfermedad" name="id_enfermedad" required>
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
                                        </div>
                                      </div>

                                    <!--------------- Otros datos de aspecto consulta ----------------->
                                    
                                    <br><br>

                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Actividad para el Hogar</label>

                                          <input type="text" class="form-control" name="actividad_hogar" id="actividad_hogar" placeholder="Tarea para asignar al paciente">
                                        </div>
                                      </div>

                                      <br><br><br>

                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Reforzamiento</label>

                                          <input type="text" class="form-control" name="reforzamiento" id="reforzamiento" placeholder="Obsequio (Ej: chupeta, caramelo, etc)">
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Terapia realizada</label>

                                          <select class="form-control" id="id_terapia" name="id_terapia" required>
                                            <?php
                                              for($i=0; $i<sizeof($tera); $i++){
                                            ?>
                                                <option value="<?php echo $tera[$i]["id_terapia"]?>">
                                                  <?php echo $tera[$i]["nombre"];?>
                                                </option>
                                            <?php
                                             }
                                            ?>                                           
                                          </select>
                                        </div>
                                      </div>
                                    
                                    <!--------------- Los datos de la futura visita ----------------->
                                    <div class="row">

                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <br><br>
                                          <h4>Próxima Visita</h4>
                                        </div>
                                      </div>
                                      

                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label>Día</label>

                                          <input type="date" class="form-control" name="dia" id="dia" minlength="">
                                        </div>
                                      </div>

                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label>Hora</label>

                                          <select class="form-control" id="hora" name="hora" required>
                                            <option value="">Seleccione</option>
                                            <option value="7">7 am</option>
                                            <option value="8">8 am</option>
                                            <option value="9">9 am</option>
                                            <option value="10">10 am</option>
                                            <option value="11">11 am</option>
                                            <option value="12">12 pm</option>
                                            <option value="13">1 pm</option>
                                            <option value="14">2 pm</option>
                                            <option value="15">3 pm</option>
                                            <option value="16">4 pm</option>
                                            <option value="17">5 pm</option>
                                            <option value="18">6 pm</option>
                                            <option value="19">7 pm</option>
                                          </select> 
                                        </div>
                                      </div>
                                      </div>
                                      
                                      
                                    

                                      

                                      <div class="step__footer">
                                        <input type="hidden" name="cierre" id="cierre" value="0" />
                                        <input type="hidden" name="id_consulta" id="id_consulta"/>
                                        <button type="button" class="step__button step__button--back" data-to_step="1" data-step="2">Regresar</button>

                                          <button type="button" onClick="registrarInformes()" class="step__button" id="btn"><i class="fa fa-save" aria-hidden="true"></i>  Registrar</button>
                                      </div>

                                    </div>
                                </div>


                                <div class="col-lg-4 col-md-6 mt-lg-0 mt-4 contact-info">
                                  <div class="col-lg-6 col-lg-offset-3">
                                    <button type="button" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true" readonly></i>  Todas las consultas del paciente
                                    </button>
                                  </div>
                                </div>
                    </div> <!-- form register body -->

                </form> 
            </div> <!-- root -->
      </div> <!-- main content -->
    </div> <!-- wrappper -->
    <?php  require_once("footer.php");?>
</div> <!-- scrollbar -->

<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/informes.js"></script>
<script type="text/javascript" src="js/consultas.js"></script>

<?php 

} else {

  header("Location:".Conectar::ruta()."vistas/index.php");
}

?>