<?php  

	require_once("../config/conexion.php");
	
	class Oficio extends Conectar{

		public function get_oficios(){

			$conectar=parent::conexion();
			parent::set_names();
			

			$sql="select * from oficio";

			$sql=$conectar->prepare($sql);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll();

		}

		public function registrar_oficio($oficio){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="insert into oficio values(null,?);";

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["oficio"]);

			$sql->execute();

			//print_r($_POST);

		}

		public function get_oficio_por_id($id_oficio){

			$conectar=parent::conexion();
			parent::set_names();
			

          	$sql="select * from oficio where id_oficio=?";

          	$sql=$conectar->prepare($sql);

          	$sql->bindValue(1, $id_oficio);
          	$sql->execute();

          	return $resultado=$sql->fetchAll();

		}

		public function editar_oficio($id_oficio, $oficio){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="update oficio set

			nombre=?
			where
			id_oficio=?

			";

			//echo $sql;

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["oficio"]);	
			$sql->bindValue(2, $_POST["id_oficio"]);//input tipo hidden

			$sql->execute();

			//print_r($_POST);

		}

		//valida si existe el estado en la BD

        public function get_nombre_oficio($oficio){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from oficio where nombre=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $oficio);
          $sql->execute();

          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

	}



?>