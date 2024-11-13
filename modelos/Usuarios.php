<?php

  //conexion a la base de datos

   require_once("../config/conexion.php");


   class Usuarios extends Conectar {


        public function login(){

            $conectar=parent::conexion();
            parent::set_names();

            if(isset($_POST["enviar"])){

              //INICIO DE VALIDACIONES
              $password = $_POST["password"];

              $correo = $_POST["correo"];

              $estado = "1";

                if(empty($correo) and empty($password)){

                  header("Location:".Conectar::ruta()."vistas/index.php?m=2");
                 exit();


                }

             else {

                  $sql= "select * from usuarios where correo=? or usuario=? and password=? and estado=?";

                  $sql=$conectar->prepare($sql);

                  $sql->bindValue(1, $correo);
                  $sql->bindValue(2, $correo);
                  $sql->bindValue(3, $password);
                  $sql->bindValue(4, $estado);
                  $sql->execute();
                  $resultado = $sql->fetch();

                          //si existe el registro entonces se conecta en session
                      if(is_array($resultado) and count($resultado)>0){

                         /*IMPORTANTE: la session guarda los valores de los campos de la tabla de la bd*/
                       $_SESSION["id_usuario"] = $resultado["id_usuario"];
                       $_SESSION["correo"] = $resultado["correo"];
                       $_SESSION["usuario"] = $resultado["usuario"];
                       $_SESSION["cedula"] = $resultado["cedula"];
                       $_SESSION["nombre"] = $resultado["nombres"];
                       $_SESSION["apellidos"] = $resultado["apellidos"];
                       $_SESSION["cargo"] = $resultado["cargo"];
                       $_SESSION["telefono"] = $resultado["telefono"];
                       $_SESSION["direccion"] = $resultado["direccion"];
                       $_SESSION["imagen"] = $resultado["imagen"];



                        header("Location:".Conectar::ruta()."vistas/home.php");

                         exit();


                      } else {
                          
                          //si no existe el registro entonces le aparece un mensaje
                          header("Location:".Conectar::ruta()."vistas/index.php?m=1");
                          exit();
                       } 
                  
                   }//cierre del else


            }//condicion enviar
        }

       //listar los usuarios
        public function get_usuarios(){

          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from usuarios";

          $sql=$conectar->prepare($sql);
          $sql->execute();

          return $resultado=$sql->fetchAll();
        }

        /*poner la ruta vistas/upload*/
         public function upload_image() {

            if(isset($_FILES["producto_imagen"]))
            {
              $extension = explode('.', $_FILES['producto_imagen']['name']);
              $new_name = rand() . '.' . $extension[1];
              $destination = '../vistas/upload/users/' . $new_name;
              move_uploaded_file($_FILES['producto_imagen']['tmp_name'], $destination);
              return $new_name;
            }


          }


        //metodo para registrar usuario
        public function registrar_usuario($cedula,$nombre,$apellido,$telefono,$email,$direccion,$cargo,$usuario,$password1,$password2,$estado){

             $conectar=parent::conexion();
             parent::set_names();

             //llamo a la funcion upload_image()

            require_once("Usuarios.php");


            $imagen_producto = new Usuarios();

                  
            $image = '';
            if($_FILES["producto_imagen"]["name"] != '')
            {
              $image = $imagen_producto->upload_image();
            }


             $sql="insert into usuarios 
             values(null,?,?,?,?,?,?,?,?,?,?,?,now(),?);";

             $sql=$conectar->prepare($sql);

             $sql->bindValue(1, $_POST["cedula"]);
             $sql->bindValue(2, $_POST["nombre"]);
             $sql->bindValue(3, $_POST["apellido"]);
             $sql->bindValue(4, $_POST["telefono"]);
             $sql->bindValue(5, $_POST["email"]);
             $sql->bindValue(6, $_POST["direccion"]);
             $sql->bindValue(7, $_POST["cargo"]);
             $sql->bindValue(8, $_POST["usuario"]);
             $sql->bindValue(9, $_POST["password1"]);
             $sql->bindValue(10, $_POST["password2"]);
             $sql->bindValue(11, $image);
             $sql->bindValue(12, $_POST["estado"]);
             $sql->execute();
        }

        //metodo para editar usuario
        public function editar_usuario($id_usuario,$cedula,$nombre,$apellido,$telefono,$email,$direccion,$cargo,$usuario,$password1,$password2,$imagen,$estado){

             $conectar=parent::conexion();
             parent::set_names();

             //llamo a la funcion upload_image()

              require_once("Usuarios.php");


              $imagen_producto = new Usuarios();

              $imagen = '';

              if($_FILES["producto_imagen"]["name"] != '')
                {
                  $imagen = $imagen_producto->upload_image();
                }
              else
                {
                  
                  $imagen = $_POST["hidden_producto_imagen"];
                }

             $sql="update usuarios set 

              cedula=?,
              nombres=?,
              apellidos=?,
              telefono=?,
              correo=?,
              direccion=?,
              cargo=?,
              usuario=?,
              password=?,
              password2=?,
              imagen=?,
              estado = ?

              where 
              id_usuario=?

             ";

              //echo $sql;

             $sql=$conectar->prepare($sql);

             $sql->bindValue(1,$_POST["cedula"]);
             $sql->bindValue(2,$_POST["nombre"]);
             $sql->bindValue(3,$_POST["apellido"]);
             $sql->bindValue(4,$_POST["telefono"]);
             $sql->bindValue(5,$_POST["email"]);
             $sql->bindValue(6,$_POST["direccion"]);
             $sql->bindValue(7,$_POST["cargo"]);
             $sql->bindValue(8,$_POST["usuario"]);
             $sql->bindValue(9,$_POST["password1"]);
             $sql->bindValue(10,$_POST["password2"]);
             $sql->bindValue(11,$imagen);
             $sql->bindValue(12,$_POST["estado"]);
             $sql->bindValue(13,$_POST["id_usuario"]);
             $sql->execute();

             //print_r($_POST);
        }

        
        //mostrar los datos del usuario por el id
        public function get_usuario_por_id($id_usuario){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from usuarios where id_usuario=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $id_usuario);
          $sql->execute();

          return $resultado=$sql->fetchAll();

        }

        //editar el estado del usuario, activar y desactiva el estado

        public function editar_estado($id_usuario,$estado){


          $conectar=parent::conexion();
          parent::set_names();

            //el parametro est se envia por via ajax
          if($_POST["est"]=="0"){

            $estado=1;

          } else {

            $estado=0;
          }

          $sql="update usuarios set 
            
            estado=?

            where 
            id_usuario=?


          ";

          $sql=$conectar->prepare($sql);


          $sql->bindValue(1,$estado);
          $sql->bindValue(2,$id_usuario);
          $sql->execute();


        }


        //valida correo y cedula del usuario

        public function get_cedula_correo_del_usuario($cedula,$email){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from usuarios where cedula=? or correo=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $cedula);
          $sql->bindValue(2, $email);
          $sql->execute();

          return $resultado=$sql->fetchAll();

        }
   }



?>