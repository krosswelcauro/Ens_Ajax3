capas.php<?php 

  require_once("../config/conexion.php");
  require_once("modales/capaModal.php");

  $nombre_user = $_SESSION["nombre"];
  $apellido_user = $_SESSION["apellidos"];
  $img_user = $_SESSION["imagen"];

   require_once("opciones.php");
?>

<title>Capas - ENS & END</title>
<link rel="icon" href="../public/images/logoend.png" />
<link rel="stylesheet" type="text/css" href="../css/acom.css">

<div class="content-page-container full-reset custom-scroll-containers">

<?php require_once("nav.php"); ?>

    <section class="content">    
          <div class="root">
            <div class="wrapper"> 
                <div class="content-wrapper">        
                  <section class="content">

                        <div class="step__header">
                          <div class="col-xs-12 col-sm-4 col-md-3">
                              <center><img src="../public/images/cap.png" alt="users-sesion" class="img-responsive center-box" style="max-width: 70px;"></center>
                          </div>
                            <h4 class="step__title">Lista de capas registradas</h4>
                        </div>

                        <div id="resultados_ajax" class="text-center"></div>

                          <div class="step__body">

                            <div class="row">
                              <div class="col-md-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                      <h1 class="box-title">
                                        <button class="btn btn-primary btn-lg" id="add_button" onclick="limpiar()" data-toggle="modal" data-target="#capaModal"><i class="fa fa-plus" aria-hidden="true"></i> Nueva Capa</button>
                                      </h1>
                                      <div class="box-tools pull-right"></div>
                                    </div><!-- box header -->

                                     <div class="panel-body table-responsive">
                                      
                                      <table id="capa_data" class="table table-bordered table-striped">

                                        <thead>
                                          
                                            <tr>
                                              
                                            <th>Capa</th>
                                            <th>Ver Foto </th>
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
<script type="text/javascript" src="js/capa.js"></script>


<?php
   require_once("cierre.php");
?>

