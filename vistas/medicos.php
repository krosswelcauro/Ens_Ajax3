<?php 
require_once("../config/conexion.php");
require_once("../modelos/Terapeutas.php");
  
  $terapeuta = new Terapeuta();

  $tera = $terapeuta->get_terapeutas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> Contacto | ENS & END  </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Dental Health Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
  
  <!-- css files -->
    <link href="../css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="../css/cont.css" rel='stylesheet' type='text/css' /><!-- custom css -->

    <link rel="stylesheet" href="../public/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- //css files -->

</head>
<body>


<!-- //header -->
<header class="py-3">
  <div class="container">
      <div id="logo">
        <h1> <a href="../index.php"><span class="fa fa-stethoscope" aria-hidden="true"></span> ENS & END</a></h1>
      </div>
    <!-- nav -->
    <nav class="d-lg-flex">

      <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
      <input type="checkbox" id="drop" />
      <ul class="menu mt-2 ml-auto">
        <li class="active"><a href="../index.php">Inicio</a></li>
        
        <li class=""><a href="galeria.php">Galeria</a></li>
        
        <li class=""><a href="contact.php">Contactanos</a></li>
      </ul>
      <div class="login-icon ml-2">
        <a class="user" href="index.php"><i class="fa fa-sign-in"></i> Iniciar Sesión</a>
      </div>
    </nav>
    <div class="clear"></div>
    <!-- //nav -->
  </div>
</header>
<!-- //header -->

<!-- banner -->
<div class="innerpage-banner" id="home">
  <div class="inner-page-layer">
  </div>
</div>
<!-- //banner -->

<!-- contact -->
<section class="mail pt-lg-5 pt-4">
  <div class="container pt-lg-5">
    <h2 class="heading text-center mb-sm-5 mb-4"> Consulta tus médicos</h2>
    <div class="row agileinfo_mail_grids">
      <div class="col-lg-12 agileinfo_mail_grid_right">
        <form action="#" method="post">
          <div class="row">
            <?php
                for($i=0; $i<sizeof($tera); $i++){
                ?>
                <div class="col-md-6 wthree_contact_left_grid pr-md-0">
                  <img class="fotor" src="upload/terapeutas/<?php echo $tera[$i]["imagen"]; ?> ">

                  <div class="form-group">
                    <h5><?php echo $tera[$i]["nombre"]; ?> <?php echo $tera[$i]["apellido"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <p class="parrafo"><?php echo $tera[$i]["especialidad"]; ?></p>
                  </div>
                  <div class="form-group">
                    <h6 class="letra"><i class="fa fa-phone"> <?php echo $tera[$i]["codigo_cell"]; ?> - <?php echo $tera[$i]["telefono"]; ?></i></h6>
                  </div>

                  <div class="form-group">
                    <h6> <i class="fa fa-envelope"> <?php echo $tera[$i]["correo"]; ?> </i></h6>
                  </div>

                  <div class="form-group">
                    <h7> <?php echo $tera[$i]["descripcion"]; ?></h7>
                  </div>
                </div>
                <?php
                }
                                                           
            ?>
            
            <br><br>
            <br><br>
          </div>
        </form>
      </div>


    </div>
  </div>
  
  <!-- footer -->
<footer class="py-5">
  <div class="container py-sm-3">
    <div class="row footer-grids">
      <div class="col-lg-3 col-sm-6 mb-lg-0 mb-sm-5 mb-4">
        <h4 class="mb-sm-4 mb-3"><span class="fa fa-stethoscope"></span> ENS & END </h4>
        <p class="mb-3">Muchas personas estan siendo parte de este proyecto.No te quedes atrás, y forma parte de nosotros. Contamos con especialistas en el área de salud y psicoterapia.</p>
        <h5> Más de <span>500+ Personas</span> </h5>
      </div>
      <div class="col-lg-3 col-sm-6 mb-lg-0 mb-sm-5 mb-4">
        <h4 class="mb-sm-4 mb-3">Address Info</h4>
        <p><span class="fa mr-2 fa-map-marker"></span>64d canal street TT 3356 <span>Newyork, NY.</span></p>
        <p class="phone py-2"><span class="fa mr-2 fa-whatsapp"></span> +1(12) 123 456 789 </p>
        <p><span class="fa mr-2 fa-envelope"></span><a>info@example.com</a></p>
      </div>
      
      <div class="col-lg-4 col-sm-6">
        <h4 class="mb-sm-4 mb-3">Unete a nosotros</h4>
        <p class="mb-3">Contactanos para mayor información</p>
        <form action="#" method="post" class="d-flex">
          <input type="email" id="email" name="EMAIL" placeholder="Ingresa tu correo aquí" required="">
          <button type="submit" class="btn">Subscribe</button>
        </form>
        <div class="icon-social mt-3">
          <a href="#" class="button-footr">
            <span class="fa mx-2 fa-facebook"></span>
          </a>
          <a href="#" class="button-footr">
            <span class="fa mx-2 fa-twitter"></span>
          </a>
          <a href="#" class="button-footr">
            <span class="fa mx-2 fa-dribbble"></span>
          </a>
          <a href="#" class="button-footr">
            <span class="fa mx-2 fa-pinterest"></span>
          </a>
          <a href="#" class="button-footr">
            <span class="fa mx-2 fa-google-plus"></span>
          </a>

        </div>
      </div>
    </div>
  </div>
</footer>
<!-- //footer -->
</section>
<!-- //contact -->

<?php require_once("../footer.php"); ?>
</body>
</html>



