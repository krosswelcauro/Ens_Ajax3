<?php  

	require_once("../config/conexion.php");
	
	class Organo extends Conectar{

		public function get_organos(){

			$conectar=parent::conexion();
			parent::set_names();
			

			$sql="select * from organo";

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
              $destination = '../vistas/upload/organos/' . $new_name;
              move_uploaded_file($_FILES['producto_imagen']['tmp_name'], $destination);
              return $new_name;
            }


          }

		public function registrar_organo($id_dicc,$id_enfermedad,$nombre){

			$conectar=parent::conexion();
			parent::set_names();

			$imagen_producto = new Organo();

                  
            $image = '';
            if($_FILES["producto_imagen"]["name"] != '')
            {
              $image = $imagen_producto->upload_image();
            }


			$sql="insert into organo values(null, ?,?,?,?,?,?);";

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["id_dicc"]);
			$sql->bindValue(2, $_POST["id_enfermedad"]);
			$sql->bindValue(3, $_POST["nombre"]);
			$sql->bindValue(4, $image);
			$sql->bindValue(5, $image);
			$sql->bindValue(6, $image);

			$sql->execute();

			//print_r($_POST);

		}

		public function get_organo_por_id($id_organo){

			$conectar=parent::conexion();
			parent::set_names();
			

          	$sql="select * from organo where id_organo=?";

          	$sql=$conectar->prepare($sql);

          	$sql->bindValue(1, $id_organo);
          	$sql->execute();

          	return $resultado=$sql->fetchAll();

		}

		public function editar_organo($id_dicc,$id_enfermedad,$nombre,$id_organo){

			$conectar=parent::conexion();
			parent::set_names();

			require_once("Organos.php");


              $imagen_producto = new Organo();

              $imagen = '';

              if($_FILES["producto_imagen"]["name"] != '')
                {
                  $imagen = $imagen_producto->upload_image();
                }
              else
                {
                  
                  $imagen = $_POST["hidden_producto_imagen"];
                }

			$sql="update organo set

			id_dicc=?,
			id_enfermedad=?,
			nombre=?,
			laminaDes=?,
			laminaFoco=?,
			laminaColor=?

			where
			id_organo=?

			";

			//echo $sql;

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["id_dicc"]);	
			$sql->bindValue(2, $_POST["id_enfermedad"]);	
			$sql->bindValue(3, $_POST["nombre"]);	
			$sql->bindValue(4, $imagen);	
			$sql->bindValue(5, $imagen);	
			$sql->bindValue(6, $imagen);	
			$sql->bindValue(7, $_POST["id_organo"]);//input tipo hidden

			$sql->execute();

			//print_r($_POST);

		}


		//valida si existe el estado en la BD

        public function get_nombre_organo($nombre){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from organo where nombre=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $nombre);
          $sql->execute();

          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

	}



?>