<?php  

	require_once("../config/conexion.php");
	
	class Religion extends Conectar{

		public function get_religiones(){

			$conectar=parent::conexion();
			parent::set_names();
			

			$sql="select * from religion";

			$sql=$conectar->prepare($sql);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll();

		}

		public function registrar_religion($religion){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="insert into religion values(null,?);";

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["religion"]);

			$sql->execute();

			//print_r($_POST);

		}

		public function get_religion_por_id($id_religion){

			$conectar=parent::conexion();
			parent::set_names();
			

          	$sql="select * from religion where id_religion=?";

          	$sql=$conectar->prepare($sql);

          	$sql->bindValue(1, $id_religion);
          	$sql->execute();

          	return $resultado=$sql->fetchAll();

		}

		public function editar_religion($id_religion, $religion){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="update religion set

			nombre=?
			where
			id_religion=?

			";

			//echo $sql;

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["religion"]);	
			$sql->bindValue(2, $_POST["id_religion"]);//input tipo hidden

			$sql->execute();

			//print_r($_POST);

		}

		//valida si existe el estado en la BD

        public function get_nombre_religion($religion){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from religion where nombre=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $religion);
          $sql->execute();

          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

	}



?>