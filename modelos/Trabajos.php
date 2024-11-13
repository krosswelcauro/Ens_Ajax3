<?php  

	require_once("../config/conexion.php");
	
	class Trabajo extends Conectar{

		public function get_trabajos(){

			$conectar=parent::conexion();
			parent::set_names();
			

			$sql="select * from trabajo";

			$sql=$conectar->prepare($sql);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll();

		}

		public function registrar_trabajo($trabajo,$cargo,$direccion,$telefono){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="insert into trabajo values(null,?,?,?,?);";

			//echo $sql;

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["trabajo"]);
			$sql->bindValue(2, $_POST["cargo"]);
			$sql->bindValue(3, $_POST["direccion"]);
			$sql->bindValue(4, $_POST["telefono"]);

			$sql->execute();

			//print_r($_POST);

		}

		public function get_trabajo_por_id($id_trabajo){

			$conectar=parent::conexion();
			parent::set_names();
			

          	$sql="select * from trabajo where id_trabajo=?";

          	$sql=$conectar->prepare($sql);

          	$sql->bindValue(1, $id_trabajo);
          	$sql->execute();

          	return $resultado=$sql->fetchAll();

		}

		public function editar_trabajo($id_trabajo,$trabajo,$cargo,$direccion,$telefono){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="update trabajo set

			nombre=?,
			cargo=?,
			direccion=?,
			telefono=?
			where
			id_trabajo=?

			";

			//echo $sql;

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["trabajo"]);
			$sql->bindValue(2, $_POST["cargo"]);
			$sql->bindValue(3, $_POST["direccion"]);
			$sql->bindValue(4, $_POST["telefono"]);	
			$sql->bindValue(5, $_POST["id_trabajo"]);//input tipo hidden

			$sql->execute();

			//print_r($_POST);

		}

		//valida si existe el estado en la BD

        public function get_nombre_trabajo($trabajo){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from trabajo where nombre=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $trabajo);
          $sql->execute();

          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

	}



?>