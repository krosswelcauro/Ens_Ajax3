<?php 

  require_once("../config/conexion.php");
  require_once("modales/religion_modal.php");


  $nombre_user = $_SESSION["nombre"];
  $apellido_user = $_SESSION["apellidos"];
  $img_user = $_SESSION["imagen"];

   require_once("opciones.php");

?>

<title>Reportes - ENS & END</title>
<link rel="icon" href="../public/images/logoend.png" />
<link rel="stylesheet" type="text/css" href="../css/acom.css">

<div class="content-page-container full-reset custom-scroll-containers">
      
<?php require_once("nav.php"); ?>
      


        <div class="container" style="background-color: rgb(245,245,245);">
            <div class="page-header">
              <h1 class="all-tittles">Reportes <small>Generales y Espesíficos</small></h1>
            </div>
        </div>

        <div class="tab-content" style="background-color: rgb(245,245,245);">
            <div role="tabpanel" class="tab-pane fade in active" id="security">
                <div class="container-fluid"  style="margin: 50px 0;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <img src="../public/images/clock.png" alt="chart" class="img-responsive center-box" style="max-width: 50%; margin-left: 35%">
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                            Aquí en esta seccion se encuentran los reportes, en esta sección puede ver e imprimir los reportes estadistico del sistema ENS&END.
                        </div>
                    </div>
                </div> 

                <div class="container-fluid">

                <div class="row">
                    <div class="col-xs-6 col-md-6">
                        <div class="box-header with-border">
                            <h1 class="box-title">
                                <a href="reporte_consultas_por_fecha.php"><button class="btn btn-primary btn-lg"><img src="../public/images/calendar.png" alt="users-sesion" class="img-responsive center-box" style="max-width: 50px;"> Reporte de consultas por fechas</button></a>
                            </h1>
                            <div class="box-tools pull-right"></div>
                        </div><!-- box header -->
                    </div>


                    <div class="col-xs-6 col-md-6">
                        <div class="box-header with-border">
                            <h1 class="box-title">
                                <a href="reporte_consultas_mes.php"><button class="btn btn-primary btn-lg"><img src="../public/images/mes.png" alt="users-sesion" class="img-responsive center-box" style="max-width: 50px;"> Reporte de consultas por mes</button></a>
                            </h1>
                            <div class="box-tools pull-right"></div>
                        </div><!-- box header -->
                    </div>


                    <div class="col-xs-6 col-md-6">
                        <div class="box-header with-border">
                            <h1 class="box-title">
                                <a href="reporte_top_pacientes.php"><button class="btn btn-primary btn-lg"><img src="../public/images/chart.png" alt="users-sesion" class="img-responsive center-box" style="max-width: 50px;"> Pacientes con mayores visitas</button></a>
                            </h1>
                            <div class="box-tools pull-right"></div>
                        </div><!-- box header -->
                    </div>



                    <div class="col-xs-6 col-md-6">
                        <div class="box-header with-border">
                            <h1 class="box-title">
                                <a href="reporte_top_enfermedad.php"><button class="btn btn-primary btn-lg"><img src="../public/images/enf.png" alt="users-sesion" class="img-responsive center-box" style="max-width: 50px;"> Enfermedad con mayores visitas</button></a>
                            </h1>
                            <div class="box-tools pull-right"></div>
                        </div><!-- box header -->
                    </div>


                    </div>
                </div>
            </div>
        </div>    

<?php require_once("footer.php"); ?>
</div> <!-- contenido con scroll -->

<?php 
   require_once("cierre.php");
?>

