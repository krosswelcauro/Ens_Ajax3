<?php 

  require_once("../config/conexion.php");
  require_once("modales/diccionario_modal.php");
  
  $nombre_user = $_SESSION["nombre"];
  $apellido_user = $_SESSION["apellidos"];
  $img_user = $_SESSION["imagen"];




   require_once("opciones.php");

?>

<title>Diccionario Bioemocional - ENS & END</title>
<link rel="icon" href="../public/images/logoend.png" />
<link rel="stylesheet" type="text/css" href="../css/acom.css">
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<div class="content-page-container full-reset custom-scroll-containers">
      
<?php require_once("nav.php"); ?>

<section class="content">    
          <div class="root">
            <div class="wrapper"> 
                <div class="content-wrapper">        
                  <section class="content">

                        <div class="step__header">
                          <div class="col-xs-12 col-sm-4 col-md-3">
                              <center><img src="../public/images/dic.png" alt="users-sesion" class="img-responsive center-box" style="max-width: 80px;"></center>
                          </div>
                            <h2 class="step__title">Búsqueda de Término</h2>
                        </div>

                        <div id="resultados_ajax" class="text-center"></div>

                          <div class="step__body">

                            <div class="row">
                              <div class="col-md-12">
                                <div class="box">

                                    <div class="box-header with-border">
                                      <h1 class="box-title">
                                        <button class="btn btn-primary btn-lg" id="add_button" onclick="limpiar()" data-toggle="modal" data-target="#diccionarioModal"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Término</button>
                                      </h1>
                                      <div class="box-tools pull-right"></div>
                                    </div><!-- box header -->

                                    <div class="panel-body table-responsive">
                                  
                                            <table id="diccionario_data" class="table table-bordered table-striped">

                                              <thead>
                                                
                                                  <tr>
                                                    
                                                  <th>Nombre</th>
                                                  <th>Definición</th>
                                                  <th>Técnico</th>
                                                  <th>Sentido Biológico</th>
                                                  <th>Conflicto</th>
                                                  <th width="10%">Editar</th>


                                                  </tr>
                                              </thead>

                                              <tbody>
                                                

                                              </tbody>


                                            </table>
                                      </div>
                            
                                </div><!-- /.box -->
                              </div><!-- /.col -->
                            </div> <!-- /.row -->
                          </div> <!-- step body -->  
                  </section> <!-- seccion content -->
                </div>     <!--Content-Wrapper-->
              </div>      <!-- Wrapper -->  
            </div>      <!-- root -->     
    </section> <!-- contenido -->
  <?php require_once("footer.php"); ?>
</div> <!-- contenido con scroll -->
     
<!-- JavaScript Para este modal -->
<script type="text/javascript" src="js/diccionario.js"></script>

<?php 

   require_once("cierre.php");

?>