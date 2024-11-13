<?php  

	require_once("../config/conexion.php");
	
	class Capa extends Conectar{

		public function get_capas(){

			$conectar=parent::conexion();
			parent::set_names();
			

			$sql="select * from capa";

			$sql=$conectar->prepare($sql);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll();

		}

		public function upload_image() {

            if(isset($_FILES["producto_imagen"]))
            {
              $extension = explode('.', $_FILES['producto_imagen']['name']);
              $new_name = rand() . '.' . $extension[1];
              $destination = '../vistas/upload/laminas/' . $new_name;
              move_uploaded_file($_FILES['producto_imagen']['tmp_name'], $destination);
              return $new_name;
            }


          }

		public function registrar_capa($capa,$lamina){

			$conectar=parent::conexion();
			parent::set_names();

			$imagen_producto = new Capa();

                  
            $image = '';
            if($_FILES["producto_imagen"]["name"] != '')
            {
              $image = $imagen_producto->upload_image();
            }



			$sql="insert into capa values(null,?,?);";

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["capa"]);
			$sql->bindValue(2, $image);

			$sql->execute();

			//print_r($_POST);

		}

		public function get_capa_por_id($id_capa){

			$conectar=parent::conexion();
			parent::set_names();
			

          	$sql="select * from capa where id_capa=?";

          	$sql=$conectar->prepare($sql);

          	$sql->bindValue(1, $id_capa);
          	$sql->execute();

          	return $resultado=$sql->fetchAll();

		}

		public function editar_capa($id_capa, $capa, $lamina){

			$conectar=parent::conexion();
			parent::set_names();

			require_once("Capa.php");


              $imagen_producto = new Capa();

              $imagen = '';

              if($_FILES["producto_imagen"]["name"] != '')
                {
                  $imagen = $imagen_producto->upload_image();
                }
              else
                {
                  
                  $imagen = $_POST["lamina"];
                }

			$sql="update capa set

			nombre=?,
			lamina=?

			where
			id_capa=?


			";

			//echo $sql;

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["capa"]);	
			$sql->bindValue(2, $imagen);	
			$sql->bindValue(3, $_POST["id_capa"]);//input tipo hidden

			$sql->execute();

			//print_r($_POST);

		}

		//valida si existe el estado en la BD

        public function get_nombre_capa($capa){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from capa where nombre=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $capa);
          $sql->execute();

          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

	}



?>