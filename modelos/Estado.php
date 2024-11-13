<?php  

	require_once("../config/conexion.php");
	
	class Estado extends Conectar{

		public function get_estados(){

			$conectar=parent::conexion();
			parent::set_names();
			

			$sql="select * from estado";

			$sql=$conectar->prepare($sql);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll();

		}

		public function registrar_estado($estado){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="insert into estado values(null,?);";

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["estado"]);


			$sql->execute();

			//print_r($_POST);

		}

		public function get_estado_por_id($id_estado){

			$conectar=parent::conexion();
			parent::set_names();
			

          	$sql="select * from estado where id_estado=?";

          	$sql=$conectar->prepare($sql);

          	$sql->bindValue(1, $id_estado);
          	$sql->execute();

          	return $resultado=$sql->fetchAll();

		}

		public function editar_estado($id_estado, $estado){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="update estado set

			nombre=?
			where
			id_estado=?

			";

			//echo $sql;

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["estado"]);
			$sql->bindValue(2, $_POST["id_estado"]);//input tipo hidden

			$sql->execute();

			//print_r($_POST);

		}

		//valida si existe el estado en la BD

        public function get_nombre_estado($estado){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from estado where nombre=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $estado);
          $sql->execute();

          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

	}



?>