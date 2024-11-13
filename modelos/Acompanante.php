<?php 

	require_once('../config/conexion.php');

	class Acompanante extends Conectar{

		// listar los acompañantes
		public function get_acompanante(){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="select * from acompanante";

			$sql=$conectar->prepare($sql);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll();

		}

		// registrar los acompañantes
		public function registrar_acompanante($cedula_acompanante,$nacionalidad,$nombre_acompanante,$apellido_acompanante,$direccion_acompanante,$codigo_cell,$telefono_acompanante,$relacion){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="insert into acompanante
			values(null,?,?,?,?,?,?,?,?,now());";

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["cedula_acompanante"]);
			$sql->bindValue(2, $_POST["nacionalidad"]);
			$sql->bindValue(3, $_POST["nombre_acompanante"]);
			$sql->bindValue(4, $_POST["apellido_acompanante"]);
			$sql->bindValue(5, $_POST["direccion_acompanante"]);
			$sql->bindValue(6, $_POST["codigo_cell"]);
			$sql->bindValue(7, $_POST["telefono_acompanante"]);
			$sql->bindValue(8, $_POST["relacion"]);

			$sql->execute();

			//print_r($_POST);

		}

		// método para mostrar los datos de un registro a modificar
		public function get_acompanante_por_cedula($cedula_acompanante){

			$conectar=parent::conexion();
   	    	parent::set_names();

   	    	$sql="select * from acompanante where cedula_acompanante=?";

   	    	$sql=$conectar->prepare($sql);

   	    	$sql->bindValue(1, $cedula_acompanante);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

		}

		// mostar los datos del acompañante por el id
		public function get_acompanante_por_id($id_acompanante){

			$conectar=parent::conexion();
			parent::set_names();

          	$sql="select * from acompanante where id_acompanante=?";

          	$sql=$conectar->prepare($sql);

          	$sql->bindValue(1, $id_acompanante);
          	$sql->execute();

          	return $resultado=$sql->fetchAll();

		}

		// editar los acompañantes
		public function editar_acompanante($cedula_acompanante,$nacionalidad,$nombre_acompanante,$apellido_acompanante,$direccion_acompanante,$codigo_cell,$telefono_acompanante,$relacion){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="update acompanante set

			cedula_acompanante=?,
			nacionalidad=?,
			nombre_acompanante=?,
			apellido_acompanante=?,
			direccion_acompanante=?,
			codigo_cell=?,
			telefono_acompanante=?,
			relacion=?
			where
			id_acompanante=?

			";

			//echo $sql;

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["cedula_acompanante"]);
			$sql->bindValue(2, $_POST["nacionalidad"]);
			$sql->bindValue(3, $_POST["nombre_acompanante"]);
			$sql->bindValue(4, $_POST["apellido_acompanante"]);
			$sql->bindValue(5, $_POST["direccion_acompanante"]);
			$sql->bindValue(6, $_POST["codigo_cell"]);
			$sql->bindValue(7, $_POST["telefono_acompanante"]);
			$sql->bindValue(8, $_POST["relacion"]);
			$sql->bindValue(9, $_POST["id_acompanante"]); //input tipo hidden

			$sql->execute();

			//print_r($_POST);


		}

		//valida cedula del acompanante

   	    public function get_cedula_del_acompanante($cedula_acompanante){
          
          $conectar=parent::conexion();
		  parent::set_names();

          $sql="select * from acompanante where cedula_acompanante=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $cedula_acompanante);
          $sql->execute();

          return $resultado=$sql->fetchAll();

   	    }


	}


?>