<?php 

  require_once("../config/conexion.php");
  require_once("../modelos/Consulta.php");

  $pac_consulta = new Consulta();
  $pac = $pac_consulta->get_consultas_reporte();


  $nombre_user = $_SESSION["nombre"];
  $apellido_user = $_SESSION["apellidos"];
  $img_user = $_SESSION["imagen"];

  require_once("opciones.php");

?>

<title>Reportes Top pacientes por fecha - ENS & END</title>
<link rel="icon" href="../public/images/logoend.png" />
<link rel="stylesheet" type="text/css" href="../css/acom.css">
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<div class="content-page-container full-reset custom-scroll-containers">
<script src="../public/bower_components/code/highcharts.js"></script>
<script src="../public/bower_components/code/modules/data.js"></script>
<script src="../public/bower_components/code/modules/drilldown.js"></script>


      
<?php require_once("nav.php"); ?>

<section class="content">

<div class="step__header">
    <div class="col-xs-12 col-sm-4 col-md-3">
        <center><img src="../public/images/chart.png" alt="users-sesion" class="img-responsive center-box" style="max-width: 80px;"></center>
    </div>
    <h2 class="step__title">Pacientes con mayor frecuencia</h2>
</div>    

<button type="button" class="btn btn-primary btn-lg" onclick="javascript:imprim1(container);" style="margin: 20px 20px 20px 20px;">
    <i class="fa fa-print"></i> Imprimir
</button>

          <div class="root">
            <div class="wrapper"> 
                <table id="" class="table table-bordered table-striped">
                 <tbody>
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                 </tbody>
              </table>              

                
 
            </div>
          <!-- /.content-wrapper -->
        </div>      <!-- Wrapper -->  
      </div>      <!-- root -->     
    </section> <!-- contenido -->
  <?php require_once("footer.php"); ?>
</div> <!-- contenido con scroll -->

<script type="text/javascript">

// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Estadisditicas'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total de visitas'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b> of total<br/>'
    },

    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [

        <?php  

        $acum = null;

            for($i=0; $i<sizeof($pac); $i++){

                $his = $pac_consulta->get_consultas_por_paciente($pac[$i]["id_paciente"]);

                $datos_encontrados = array();

                $d =  $datos_encontrados["id"] = $pac[$i]["id_paciente"];
                $nombre = $pac[$i]["nom_paciente"];

                $num = $datos_encontrados["numero"] = count($his);


                if ($d != $acum)  {
                    echo "{
                        name: '$nombre',
                        y: $num,
                        drilldown: '$nombre'
                        },

                        ";
                    $acum = $d;
                }
                else {

                }
                    
            }

            
        ?>
        ]
    }]
    
});
</script>


<script>
function imprim1(container){
var printContents = document.getElementById('container').innerHTML;
        w = window.open();
        w.document.write(printContents);
        w.document.close(); // necessary for IE >= 10
        w.focus(); // necessary for IE >= 10
        w.print();
        w.close();
        return true;}
</script>



    
<?php 
   require_once("cierre.php");
?>


    