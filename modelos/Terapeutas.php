<?php  

  //conexion a la base de datos


	require_once("../config/conexion.php");

	
	class Terapeuta extends Conectar{

		public function get_terapeutas(){

			$conectar=parent::conexion();
			parent::set_names();
			

			$sql="select t.id_terapeuta, t.cedula_terapeuta, t.nombre, t.apellido, t.direccion, t.codigo_cell, t.telefono, t.correo, t.descripcion, t.id_especialidad, t.imagen, e.id_especialidad, e.nombre as especialidad

			from terapeuta t

			INNER JOIN especialidad e ON t.id_especialidad=e.id_especialidad

			";

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
              $destination = '../vistas/upload/terapeutas/' . $new_name;
              move_uploaded_file($_FILES['producto_imagen']['tmp_name'], $destination);
              return $new_name;
            }


          }

		public function registrar_terapeuta($cedula_terapeuta,$nombre,$apellido,$direccion,$codigo_cell,$telefono,$correo,$descripcion,$id_especialidad){

			$conectar=parent::conexion();
			parent::set_names();

			require_once("Terapeutas.php");


            $imagen_producto = new Terapeuta();

                  
            $image = '';
            if($_FILES["producto_imagen"]["name"] != '')
            {
              $image = $imagen_producto->upload_image();
            }

			$sql="insert into terapeuta 
			values(null,?,?,?,?,?,?,?,?,?,?);";

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["cedula_terapeuta"]);
			$sql->bindValue(2, $_POST["nombre"]);
			$sql->bindValue(3, $_POST["apellido"]);
			$sql->bindValue(4, $_POST["direccion"]);
			$sql->bindValue(5, $_POST["codigo_cell"]);
			$sql->bindValue(6, $_POST["telefono"]);
			$sql->bindValue(7, $_POST["correo"]);
			$sql->bindValue(8, $_POST["descripcion"]);
			$sql->bindValue(9, $_POST["especialidad"]);
			$sql->bindValue(10, $image);



			$sql->execute();

			//print_r($_POST);

		}

		

		// método para mostrar los datos de un registro a modificar
		public function get_terapeuta_por_cedula($cedula_terapeuta){

			$conectar=parent::conexion();
   	    	parent::set_names();

   	    	$sql="select * from terapeuta where cedula_terapeuta=?";

   	    	$sql=$conectar->prepare($sql);

   	    	$sql->bindValue(1, $cedula_terapeuta);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

		}

		public function get_terapeuta_por_id($id_terapeuta){

			$conectar=parent::conexion();
			parent::set_names();
			

          	$sql="select * from terapeuta where id_terapeuta=?";

          	$sql=$conectar->prepare($sql);

          	$sql->bindValue(1, $id_terapeuta);
          	$sql->execute();

          	return $resultado=$sql->fetchAll();

		}

		public function editar_terapeuta($id_terapeuta,$nombre,$apellido,$direccion,$codigo_cell,$telefono,$correo,$descripcion,$id_especialidad,$imagen){

			$conectar=parent::conexion();
			parent::set_names();

			require_once("Terapeutas.php");


              $imagen_producto = new Terapeuta();

              $imagen = '';

              if($_FILES["producto_imagen"]["name"] != '')
                {
                  $imagen = $imagen_producto->upload_image();
                }
              else
                {
                  
                  $imagen = $_POST["hidden_producto_imagen"];
                }

			$sql="update terapeuta set

			nombre=?,
			apellido=?,
			direccion=?,
			codigo_cell=?,
			telefono=?,
			correo=?,
			descripcion=?,
			id_especialidad=?,
		    imagen=?
			where
			id_terapeuta=?

			";

			//echo $sql;

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["nombre"]);
			$sql->bindValue(2, $_POST["apellido"]);
			$sql->bindValue(3, $_POST["direccion"]);
			$sql->bindValue(4, $_POST["codigo_cell"]);
			$sql->bindValue(5, $_POST["telefono"]);
			$sql->bindValue(6, $_POST["correo"]);
			$sql->bindValue(7, $_POST["descripcion"]);
			$sql->bindValue(8, $_POST["especialidad"]);
			$sql->bindValue(9, $imagen);


			$sql->bindValue(10, $_POST["id_terapeuta"]);//input tipo hidden

			$sql->execute();

			//print_r($_POST);

		}

		//valida si existe el estado en la BD

        public function get_cedula_terapeuta($cedula_terapeuta){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from terapeuta where cedula_terapeuta=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $cedula_terapeuta);
          $sql->execute();

          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

	}



?>