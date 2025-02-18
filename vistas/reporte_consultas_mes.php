<?php 

  require_once("../config/conexion.php");
  require_once("modales/detalle_consulta_modal.php");

  
  $nombre_user = $_SESSION["nombre"];
  $apellido_user = $_SESSION["apellidos"];
  $img_user = $_SESSION["imagen"];

   require_once("opciones.php");

?>

<title>Reportes de consultas por Mes - ENS & END</title>
<link rel="icon" href="../public/images/logoend.png" />
<link rel="stylesheet" type="text/css" href="../css/acom.css">
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<div class="content-page-container full-reset custom-scroll-containers">
      
<?php require_once("nav.php"); ?>

<section class="content">    
          <div class="root">
            <div class="wrapper"> 
                 <div class="content-wrapper">

                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                      <h1>
                        Reportes de consultas
                      </h1>
                      
                    </section>

                    <!-- Main content -->
                    <section class="content">
                    
                   <div id="resultados_ajax"></div>

                     <div class="panel panel-default">
                        
                        <div class="panel-body">

                            <form class="form-inline">
                              <div class="form-group">
                               
                                 <div class="col-sm-10">
                                    <select name="mes" id="mes" class="form-control">
                                                <option value="">MES</option>
                                                <option value="01">ENERO</option>
                                                <option value="02">FEBRERO</option>
                                                <option value="03">MARZO</option>
                                                <option value="04">ABRIL</option>
                                                <option value="05">MAYO</option>
                                                <option value="06">JUNIO</option>
                                                <option value="07">JULIO</option>
                                                <option value="08">AGOSTO</option>
                                                <option value="09">SEPTIEMBRE</option>
                                                <option value="10">OCTUBRE</option>
                                                <option value="11">NOVIEMBRE</option>
                                                <option value="12">DICIEMBRE</option>
                                              </select>
                                 </div>
                              </div>

                              <div class="form-group row">
                                
                                <div class="col-sm-10">
                                  <select name="ano" id="ano" class="form-control">
                                                  <option value="">AÑO</option>
                                                  <option value="2014">2014</option>
                                                  <option value="2015">2015</option>
                                                  <option value="2016">2016</option>
                                                  <option value="2017">2017</option>
                                                  <option value="2018">2018</option>
                                                  <option value="2019">2019</option>
                                                  <option value="2020">2020</option>
                                                  <option value="2021">2021</option>
                                                  <option value="2022">2022</option>
                                                  <option value="2023">2023</option>
                                                  <option value="2024">2024</option>
                                                  <option value="2025">2025</option>
                                                  <option value="2026">2026</option>
                                                  <option value="2027">2027</option>
                                                  <option value="2028">2028</option>
                                                  <option value="2029">2029</option>
                                                  <option value="2030">2030</option>
                                                  <option value="2031">2031</option>
                                                  <option value="2032">2032</option>
                                                  <option value="2033">2033</option>
                                                  <option value="2034">2034</option>
                                                  <option value="2035">2035</option>
                                                </select>
                                </div>
                              </div>

                             

                               <div class="btn-group text-center">
                                 <button type="button" class="btn btn-primary" id="btn_consulta_fecha_mes"><i class="fa fa-search" aria-hidden="true"></i> Consultar</button>
                               </div>
                           </form>

                       </div>
                      </div>

                   
                      <div class="row">
                        <div class="col-xs-12">
                          
                          <div class="table-responsive">
                            <div class="box-header">
                              <h3 class="box-title">Lista de consultas por mes</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                             <table id="consultas_fecha_mes_data" class="table table-bordered table-striped">
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
                </div>
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




