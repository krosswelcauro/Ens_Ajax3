<?php 

  require_once("../config/conexion.php");

  $nombre_user = $_SESSION["nombre"];
  $apellido_user = $_SESSION["apellidos"];
  $img_user = $_SESSION["imagen"];



  require_once("opciones.php");


?>

<title>Inicio - ENS & END</title>
<link rel="icon" href="../public/images/logoend.png" />
<link rel="stylesheet" type="text/css" href="../css/acom.css">
<link rel="stylesheet" type="text/css" href="../css/cartelera.css">


<div class="content-page-container full-reset custom-scroll-containers">
      
      <?php require_once("nav.php") ?>


    <section class="content">    
                  <section class="content">
                  	<div class="container">
			            <div class="page-header">
			              <h1 class="all-tittles">Cartelera Informativa</h1>
			            </div>
			        </div>

			        <br>

		            <div role="tabpanel" class="tab-pane fade in active" id="security">
		                <div class="container-fluid"  style="margin: 50px 0;">
		                    <div class="row">
		                        <div class="col-xs-12 col-sm-4 col-md-3">
                                	<img src="../public/images/clock.png" alt="users-sesion" class="img-responsive center-box" style="max-width: 120px;">
                            	</div>
		                        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
		                            Bienvenido al sistema Ens&End esta es la sección noticias, en donde encontraras todas la información nueva referente al sistema.
		                        </div>
		                    </div>
		                </div>  
		            </div>

			        <div id="Slider-main" class="carousel slide" data-ride="carousel">
			        
				        <div class="carousel-inner" role="listbox">
				            <div class="item active">
				                <img src="upload/galeria/1.png" alt="Acodjar_slider_img" class="img-responsive">
				            </div>
				            <div class="item">
				                <img src="upload/galeria/2.png" alt="Acodjar_slider_img" class="img-responsive">
				            </div>
				            <div class="item">
				                <img src="upload/galeria/3.png" alt="Acodjar_slider_img" class="img-responsive">
				            </div>
				            <div class="item">
				                <img src="upload/galeria/5.png" alt="Acodjar_slider_img" class="img-responsive">
				            </div>
				         </div>

					        <a class="left carousel-control" href="#Slider-main" role="button" data-slide="prev">
					            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					            <span class="sr-only">Previous</span>
					        </a>

					        <a class="right carousel-control" href="#Slider-main" role="button" data-slide="next">
					            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					            <span class="sr-only">Next</span>
					        </a>
			        </div>
                  </section> <!-- seccion content -->
    </section> <!-- contenido -->
  <?php require_once("footer.php"); ?>
</div> <!-- contenido con scroll -->

<?php 

  require_once("cierre.php");

?>
