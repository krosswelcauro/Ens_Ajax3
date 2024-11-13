<?php  

	require_once("../config/conexion.php");
	
	class Enfermedad extends Conectar{

		public function get_enfermedades(){

			$conectar=parent::conexion();
			parent::set_names();
			

			$sql="select * from enfermedad";

			$sql=$conectar->prepare($sql);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll();

		}


		public function get_historial_por_id_enfermedad($id_enfermedad){

			$conectar=parent::conexion();
			parent::set_names();
			

          	$sql="select * from historial where id_enfermedad=?";

          	$sql=$conectar->prepare($sql);

          	$sql->bindValue(1, $id_enfermedad);
          	$sql->execute();

          	return $resultado=$sql->fetchAll();

		}


		public function registrar_enfermedad($enfermedad){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="insert into enfermedad values(null,?);";

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["enfermedad"]);

			$sql->execute();

			//print_r($_POST);

		}

		public function get_enfermedad_por_id($id_enfermedad){

			$conectar=parent::conexion();
			parent::set_names();
			

          	$sql="select * from enfermedad where id_enfermedad=?";

          	$sql=$conectar->prepare($sql);

          	$sql->bindValue(1, $id_enfermedad);
          	$sql->execute();

          	return $resultado=$sql->fetchAll();

		}

		public function editar_enfermedad($id_enfermedad, $enfermedad){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="update enfermedad set

			nombre=?
			where
			id_enfermedad=?

			";

			//echo $sql;

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["enfermedad"]);	
			$sql->bindValue(2, $_POST["id_enfermedad"]);//input tipo hidden

			$sql->execute();

			//print_r($_POST);

		}

		//valida si existe el estado en la BD

        public function get_nombre_enfermedad($enfermedad){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from enfermedad where nombre=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $enfermedad);
          $sql->execute();

          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

	}



?>