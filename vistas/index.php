<?php

 require_once("../config/conexion.php");

     

     if(isset($_POST["enviar"]) and $_POST["enviar"]=="si"){

       require_once("../modelos/Usuarios.php");

       $usuario = new Usuarios();

       $usuario->login();

   }

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login - ENS & END</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/bower_components/font-awesome/css/font-awesome.min.css">  
  <link rel="stylesheet" href="../public/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../css/login.css">
</head>


<body class="hold-transition login-page">

<div class="login-box">

  <!-- /.login-logo -->
  <div class="login-box-body">

 <!--INICIO MENSAJES DE ALERTA-->
   <div class="container-fluid">
      
      <div class="row">
         <div class="col-lg-12">
        
        <div class="box-body">
            
          <?php 


            if(isset($_GET["m"])){

                switch($_GET["m"]){
                    case "1";
                        ?> 
                            <div class="alert alert-danger alert-dismissable">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h4><i class="icon fa fa-ban"></i> Datos incorrectos o no tienes permiso!</h4>
                              
                            </div>

                        <?php
                    break;

                    case "2";
                        ?> 
                            <div class="alert alert-danger alert-dismissable">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h4><i class="icon fa fa-ban"></i> Los campos estan vacios</h4>    
                            </div>
                        <?php
                    break;
                }
            }
          ?>         
        </div>
    

        </div>
      </div>
  </div>
  <!--/container-fluid-->
<!-- FIN MENSAJES DE ALERTA-->

<!--login-box-msg-->

          <form action="" method="post">

          <a href="index.php"><img class="avatar" src="../public/images/logoend.png" alt="logo de usuario"></a>
          <?php  
          if (empty($_GET["m"])) {
            ?>
            <div class="">
              <h1><i class="icon fa fa-users"></i> Inicar sesión</h1>
            </div>                  
            <?php                
          }
          ?>

            <br><br>          
          
            <label for="username">Usuario o Correo</label>
            <div class="form-group has-feedback">
              <input type="text" name="correo" id="correo" class="form-control">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>


            <label for="password">Contraseña</label>
            <div class="form-group has-feedback">
              <input type="password" name="password" id="password" class="form-control">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group">
              <input type="hidden" name="enviar" class="form-control" value="si">
            </div>

            <br>
            <br>
            <div class="row">
              <div class="col-xs-7 col-xs-offset-3 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2">
                <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-power-off" aria-hidden="true"></i>  Iniciar Sesión</button>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-7 col-xs-offset-3 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2">
                <div class="login-icon ml-2">
                  <a class="btn btn-primary btn-block btn-flat" id="inicio" href="../index.php"><i class="fa fa-home"> Volver a inicio</a></i>
                </div>
              </div>
            </div>
          </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<!-- jQuery 3 -->
<script src="../public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../public/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

