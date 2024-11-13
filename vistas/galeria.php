<!DOCTYPE>
<html>
    <head>
    <title>Galeria - ENS & END</title>
    <link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/> 
    <link href="../css/styles.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="../public/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="icon" href="../public/images/logoend.png" />

    </head>

	<body>

        <header class="py-3">
          <div class="container">

            <div id="logo">
            <span id="home"></span>
            <h1> <a href="../index.php"><span class="fa fa-stethoscope" aria-hidden="true"></span> ENS <span class="asperson"> & </span>END </a></h1>
            </div>

                <nav class="d-lg-flex">
                  <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                  <input type="checkbox" id="drop" />
                  <ul class="menu mt-2 ml-auto">
                    <li class="active"><a href="../index.php">Inicio</a></li>
                    <li class=""><a href="galeria.php">Galeria</a></li>
                    <li class=""><a href="contact.php">Contactos</a></li>
                  </ul>
                  <div class="login-icon ml-2">
                    <a class="user" href="index.php"><i class="fa fa-sign-in"></i> Iniciar Sesión</a>
                  </div>
                </nav>
                <div class="clear"></div>
              </div>
        </header>

        <br><br>
        <br>

		<div id="Slider-main" class="carousel slide" data-ride="carousel">
        

        <div class="carousel-inner" role="listbox">

            <div class="item active">
                <center><img src="upload/galeria/1.png" alt="Acodjar_slider_img" class="img-responsive"></center>
            </div>
            <div class="item">
                <center><img src="upload/galeria/2.png" alt="Acodjar_slider_img" class="img-responsive"></center>
            </div>
            <div class="item">
                <center><img src="upload/galeria/3.png" alt="Acodjar_slider_img" class="img-responsive"></center>
            </div>
            <div class="item">
                <center><img src="upload/galeria/5.png" alt="Acodjar_slider_img" class="img-responsive"></center>
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
	</body>

    <?php  require_once("../footer.php")?>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../public/js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../public/js/main.js"></script>
</html>