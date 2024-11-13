<?php 

	require_once("../config/conexion.php");

	Class Diccionario extends Conectar{

		// listar las palabras del diccionario
		public function get_palabras(){

			$conectar=parent::conexion();
			parent::set_names();
			
			$sql="select * from diccionario_bioemocional";

			$sql=$conectar->prepare($sql);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll();

		}

		// registrar las palabras del diccionario
		public function registrar_palabra($nombre,$definicion,$tecnico,$sentidoBio,$conflicto){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="insert into diccionario_bioemocional
			values(null,?,?,?,?,?);";

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["nombre"]);
			$sql->bindValue(2, $_POST["definicion"]);
			$sql->bindValue(3, $_POST["tecnico"]);
			$sql->bindValue(4, $_POST["sentidoBio"]);
			$sql->bindValue(5, $_POST["conflicto"]);

			$sql->execute();

			//print_r($_POST);

		}

		// método para mostrar los datos de un registro a modificar
		public function get_palabra_por_id($id_dicc){

			$conectar=parent::conexion();
			parent::set_names();
			

   	    	$sql="select * from diccionario_bioemocional where id_dicc=?";

   	    	$sql=$conectar->prepare($sql);

   	    	$sql->bindValue(1, $id_dicc);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

		}

		public function editar_palabra($id_dicc,$nombre,$definicion,$tecnico,$sentidoBio,$conflicto){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="update diccionario_bioemocional set

			nombre=?,
			definicion=?,
			tecnico=?,
			sentidoBio=?,
			conflicto=?

			where
			id_dicc=?

			";

			//echo $sql;

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["nombre"]);
			$sql->bindValue(2, $_POST["definicion"]);
			$sql->bindValue(3, $_POST["tecnico"]);
			$sql->bindValue(4, $_POST["sentidoBio"]);
			$sql->bindValue(5, $_POST["conflicto"]);
			$sql->bindValue(6, $_POST["id_dicc"]);//input tipo hidden

			$sql->execute();

			//print_r($_POST);

		}

		//valida si existe la palabra en la BD

        public function get_palabra_nombre($nombre){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from diccionario_bioemocional where nombre=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $nombre);
          $sql->execute();

          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

	}



?>