<?php  

	require_once("../config/conexion.php");
	
	class Terapia extends Conectar{

		public function get_terapias(){

			$conectar=parent::conexion();
			parent::set_names();
			

			$sql="select * from terapia";

			$sql=$conectar->prepare($sql);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll();

		}

		public function registrar_terapia($terapia,$descripcion,$costo_refe){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="insert into terapia values(null,?,?,?);";

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["terapia"]);
			$sql->bindValue(2, $_POST["descripcion"]);
			$sql->bindValue(3, $_POST["costo_refe"]);

			$sql->execute();

			//print_r($_POST);

		}

		public function get_terapia_por_id($id_terapia){

			$conectar=parent::conexion();
			parent::set_names();
			

          	$sql="select * from terapia where id_terapia=?";

          	$sql=$conectar->prepare($sql);

          	$sql->bindValue(1, $id_terapia);
          	$sql->execute();

          	return $resultado=$sql->fetchAll();

		}

		public function editar_terapia($id_terapia,$terapia,$descripcion,$costo_refe){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="update terapia set

			nombre=?,
			descripcion=?,
			costo_refe=?
			where
			id_terapia=?

			";

			//echo $sql;

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["terapia"]);
			$sql->bindValue(2, $_POST["descripcion"]);
			$sql->bindValue(3, $_POST["costo_refe"]);	
			$sql->bindValue(4, $_POST["id_terapia"]);//input tipo hidden

			$sql->execute();

			//print_r($_POST);

		}

		//valida si existe el estado en la BD

        public function get_nombre_terapia($terapia){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from terapia where nombre=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $terapia);
          $sql->execute();

          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

	}



?>