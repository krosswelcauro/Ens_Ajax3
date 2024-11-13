<?php  

	require_once("../config/conexion.php");
	
	class Especialidad extends Conectar{

		public function get_especialidades(){

			$conectar=parent::conexion();
			parent::set_names();
			

			$sql="select * from especialidad";

			$sql=$conectar->prepare($sql);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll();

		}

		public function registrar_especialidad($especialidad){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="insert into especialidad values(null,?);";

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["especialidad"]);

			$sql->execute();

			//print_r($_POST);

		}

		public function get_especialidad_por_id($id_especialidad){

			$conectar=parent::conexion();
			parent::set_names();
			

          	$sql="select * from especialidad where id_especialidad=?";

          	$sql=$conectar->prepare($sql);

          	$sql->bindValue(1, $id_especialidad);
          	$sql->execute();

          	return $resultado=$sql->fetchAll();

		}

		public function editar_especialidad($id_especialidad, $especialidad){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="update especialidad set

			nombre=?
			where
			id_especialidad=?

			";

			//echo $sql;

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["especialidad"]);	
			$sql->bindValue(2, $_POST["id_especialidad"]);//input tipo hidden

			$sql->execute();

			//print_r($_POST);

		}

		//valida si existe el estado en la BD

        public function get_nombre_especialidad($especialidad){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from especialidad where nombre=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $especialidad);
          $sql->execute();

          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

	}



?>