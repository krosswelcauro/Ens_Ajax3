<?php 

  require_once("../config/conexion.php");
  require_once("modales/detalle_consulta_modal.php");

  $nombre_user = $_SESSION["nombre"];
  $apellido_user = $_SESSION["apellidos"];
  $img_user = $_SESSION["imagen"];

  require_once("opciones.php");

?>

<title>Reportes Consultas por fecha - ENS & END</title>
<link rel="icon" href="../public/images/logoend.png" />
<link rel="stylesheet" type="text/css" href="../css/acom.css">
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<div class="content-page-container full-reset custom-scroll-containers">
      
<?php require_once("nav.php"); ?>

<section class="content">    
          <div class="root">
            <div class="wrapper"> 
                <section class="content">
                
                  <div id="resultados_ajax"></div>

                    <div class="panel panel-default">
                    
                      <div class="panel-body">

                        <div class="box-header">
                          <h3 class="box-title">Lista de consultas por fecha</h3>
                        </div>
                        
                        <br>

                        <form class="form-inline">

                          <div class="form-group">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Fecha Inicial</label>
                             <div class="col-sm-10">
                               <input type="text" class="form-control" id="datepicker" name="datepicker" placeholder="Fecha Inicial">
                             </div>
                          </div>

                          <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Fecha Final</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="datepicker2" name="datepicker2" placeholder="Fecha Final">
                            </div>
                          </div>

                         

                           <div class="btn-group text-center">
                             <button type="button" class="btn btn-primary" id="btn_consulta_fecha"><i class="fa fa-search" aria-hidden="true"></i> Consultar</button>
                           </div>
                       </form>

                   </div>
                  </div>
               
                  <div class="row">
                    <div class="col-xs-12">
                      
                      <div class="table-responsive">
                        <!-- /.box-header -->
                        <div class="box-body">
                         <table id="consultas_fecha_data" class="table table-bordered table-striped" style="min-width: 100%;">
                            <thead>
                            <tr style="background-color:#355a9d; color: white;">
                              <th>Fecha</th>
                              <th>Número de consulta</th>
                              <th>Paciente</th>
                              <th>Motivo</th>
                              <th>Acompañante</th>
                              <th>Terapeuta</th>
                              <th>Ver Detalle</th>
                              <th>Estado</th>
                            </tr>
                            </thead>
                            
                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
          <!-- /.content-wrapper -->
        </div>      <!-- Wrapper -->  
      </div>      <!-- root -->     
    </section> <!-- contenido -->
  <?php require_once("footer.php"); ?>
</div> <!-- contenido con scroll -->
     
<!-- JavaScript Para este modal -->
<script type="text/javascript" src="js/consultas.js"></script>

<?php 

   require_once("cierre.php");

?>



