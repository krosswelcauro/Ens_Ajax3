<?php  

	require_once("../config/conexion.php");
	
	class Ciudad extends Conectar{

		public function get_ciudades(){

			$conectar=parent::conexion();
			parent::set_names();
			

			$sql="select c.id_ciudad, c.nombre, c.id_estado, e.id_estado, e.nombre as estado

			from ciudad c

			INNER JOIN estado e ON c.id_estado=e.id_estado

			";

			$sql=$conectar->prepare($sql);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll();

		}

		public function registrar_ciudad($ciudad,$id_estado){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="insert into ciudad 
			values(null,?,?);";

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["ciudad"]);
			$sql->bindValue(2, $_POST["estado"]);


			$sql->execute();

			//print_r($_POST);

		}

		public function get_ciudad_por_id($id_ciudad){

			$conectar=parent::conexion();
			parent::set_names();
			

          	$sql="select * from ciudad where id_ciudad=?";

          	$sql=$conectar->prepare($sql);

          	$sql->bindValue(1, $id_ciudad);
          	$sql->execute();

          	return $resultado=$sql->fetchAll();

		}

		public function editar_ciudad($id_ciudad, $ciudad, $id_estado){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="update ciudad set

			nombre=?,
			id_estado=?
			where
			id_ciudad=?

			";

			//echo $sql;

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["ciudad"]);
			$sql->bindValue(2, $_POST["estado"]);
			$sql->bindValue(3, $_POST["id_ciudad"]);//input tipo hidden

			$sql->execute();

			//print_r($_POST);

		}

		//valida si existe el estado en la BD

        public function get_nombre_ciudad($ciudad){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from ciudad where nombre=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $ciudad);
          $sql->execute();

          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

	}



?>