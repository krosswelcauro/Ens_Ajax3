<?php 

  require_once("../config/conexion.php");
  require_once("modales/usuarios_modal.php");

  $nombre_user = $_SESSION["nombre"];
  $apellido_user = $_SESSION["apellidos"];
  $img_user = $_SESSION["imagen"];

   require_once("opciones.php");
?>

<title>Usuarios - ENS & END</title>
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
                            <h4 class="step__title">Lista de usuarios</h4>
                        </div>

                        <div id="resultados_ajax" class="text-center"></div>

                          <div class="step__body">

                            <div class="row">
                              <div class="col-md-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                      <h1 class="box-title">
                                        <button class="btn btn-primary btn-lg" id="add_button" onclick="limpiar()" data-toggle="modal" data-target="#usuarioModal"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Usuario</button>
                                      </h1>
                                      <div class="box-tools pull-right"></div>
                                    </div><!-- box header -->

                                     <div class="panel-body table-responsive">
                                      
                                      <table id="usuario_data" class="table table-bordered table-striped">

                                        <thead>
                                          
                                            <tr>
                                              
                                            <th>Indentificación</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Usuario</th>
                                            <th>Cargo</th>
                                            <th>Teléfono</th>
                                            <th>Correo</th>
                                            <th>Dirección</th>
                                            <th width="0%">Fecha Ingreso</th>
                                            <th>Estado</th>
                                            <th width="10%">Editar</th>
                                            
                                            <th>Ver Foto </th>



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
<script type="text/javascript" src="js/usuarios.js"></script>


<?php
   require_once("cierre.php");
?>

