<?php 

	require_once('../config/conexion.php');

	class Paciente extends Conectar{

		// listar los acompañantes
		public function get_paciente(){

			$conectar=parent::conexion();
			parent::set_names();

			//$sql="select * from paciente";
			$sql="select p.id_paciente, p.nacionalidad, p.cedula_paciente, p.nombre_paciente, p.apellido_paciente, p.direccion_paciente, p.codigo_cell, p.telefono_paciente, p.sexo_paciente, p.fecha_nac, p.lugar_nac, p.con_quien_vive, p.lateralidad_biologica, p.hobbie, p.id_ciudad, p.id_religion, p.id_oficio, p.id_trabajo, c.id_ciudad, c.nombre as ciudad, r.id_religion, r.nombre  as religion, o.id_oficio, o.nombre as oficio, t.id_trabajo, t.nombre as trabajo

				from paciente p

				INNER JOIN ciudad c ON p.id_ciudad=c.id_ciudad
				INNER JOIN religion r ON p.id_religion=r.id_religion
				INNER JOIN oficio o ON p.id_oficio=o.id_oficio
				INNER JOIN trabajo t ON p.id_trabajo=t.id_trabajo

				";

			$sql=$conectar->prepare($sql);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll();

		}

		// registrar los acompañantes
		public function registrar_paciente($cedula_paciente,$nacionalidad,$nombre_paciente,$apellido_paciente,$direccion_paciente,$codigo_cell,$telefono_paciente,$sexo_paciente,$fecha_nac,$lugar_nac,$con_quien_vive,$lateralidad_biologica, $hobbie, $id_ciudad, $id_religion, $id_oficio, $id_trabajo){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="INSERT into paciente
			values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now());";

			$sql=$conectar->prepare($sql);

			
			$sql->bindValue(1, $_POST["cedula_paciente"]);		
			$sql->bindValue(2, $_POST["nacionalidad"]);
			$sql->bindValue(3, $_POST["nombre_paciente"]);
			$sql->bindValue(4, $_POST["apellido_paciente"]);
			$sql->bindValue(5, $_POST["direccion_paciente"]);
			$sql->bindValue(6, $_POST["codigo_cell"]);
			$sql->bindValue(7, $_POST["telefono_paciente"]);
			$sql->bindValue(8, $_POST["sexo_paciente"]);
			$sql->bindValue(9, $_POST["fecha_nac"]);
			$sql->bindValue(10, $_POST["lugar_nac"]);
			$sql->bindValue(11, $_POST["con_quien_vive"]);
			$sql->bindValue(12, $_POST["lateralidad_biologica"]);
			$sql->bindValue(13, $_POST["hobbie"]);
			$sql->bindValue(14, $_POST["ciudad"]);
			$sql->bindValue(15, $_POST["religion"]);
			$sql->bindValue(16, $_POST["oficio"]);
			$sql->bindValue(17, $_POST["trabajo"]);

			$sql->execute();

			//print_r($_POST);

		}

		// método para mostrar los datos de un registro a modificar
		public function get_paciente_por_cedula($cedula_paciente){

			$conectar=parent::conexion();
   	    	parent::set_names();

   	    	$sql="select * from paciente where cedula_paciente=?";

   	    	$sql=$conectar->prepare($sql);

   	    	$sql->bindValue(1, $cedula_paciente);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

		}

		// mostar los datos del acompañante por el id
		public function get_paciente_por_id($id_paciente){

			$conectar=parent::conexion();
			parent::set_names();

          	$sql="select * from paciente where id_paciente=?";

          	$sql=$conectar->prepare($sql);

          	$sql->bindValue(1, $id_paciente);
          	$sql->execute();

          	return $resultado=$sql->fetchAll();

		}

		// editar los acompañantes
		public function editar_paciente($cedula_paciente, $nacionalidad,$nombre_paciente,$apellido_paciente,$direccion_paciente,$codigo_cell,$telefono_paciente,$sexo_paciente,$fecha_nac,$lugar_nac,$con_quien_vive,$lateralidad_biologica, $hobbie, $id_ciudad, $id_religion, $id_oficio, $id_trabajo){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="update paciente set

			cedula_paciente=?,
			nacionalidad=?,
			nombre_paciente=?,
			apellido_paciente=?,
			direccion_paciente=?,
			codigo_cell=?,
			telefono_paciente=?,
			sexo_paciente=?,
			fecha_nac=?,
			lugar_nac=?,
			con_quien_vive=?,
			lateralidad_biologica=?,
			hobbie=?,
			id_ciudad=?,
			id_religion=?,
			id_oficio=?,
			id_trabajo=?

			where
			cedula_paciente=?

			";
			//echo $sql;
			

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["cedula_paciente"]);
			$sql->bindValue(2, $_POST["nacionalidad"]);
			$sql->bindValue(3, $_POST["nombre_paciente"]);
			$sql->bindValue(4, $_POST["apellido_paciente"]);
			$sql->bindValue(5, $_POST["direccion_paciente"]);
			$sql->bindValue(6, $_POST["codigo_cell"]);
			$sql->bindValue(7, $_POST["telefono_paciente"]);
			$sql->bindValue(8, $_POST["sexo_paciente"]);
			$sql->bindValue(9, $_POST["fecha_nac"]);
			$sql->bindValue(10, $_POST["lugar_nac"]);
			$sql->bindValue(11, $_POST["con_quien_vive"]);
			$sql->bindValue(12, $_POST["lateralidad_biologica"]);
			$sql->bindValue(13, $_POST["hobbie"]);
			$sql->bindValue(14, $_POST["ciudad"]);
			$sql->bindValue(15, $_POST["religion"]);
			$sql->bindValue(16, $_POST["oficio"]);
			$sql->bindValue(17, $_POST["trabajo"]);

			$sql->bindValue(18, $_POST["cedula_pac"]); //input tipo hidden

			$sql->execute();

			//print_r($_POST);


		}

		//valida cedula del paciente

   	    public function get_cedula_del_paciente($cedula_paciente){
          
          $conectar=parent::conexion();
		  parent::set_names();

          $sql="select * from paciente where cedula_paciente=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $cedula_paciente);
          $sql->execute();

          return $resultado=$sql->fetchAll();

   	    }

   	    public function get_filas_paciente(){

             $conectar= parent::conexion();
			 parent::set_names();

           
             $sql="select * from paciente";
             
             $sql=$conectar->prepare($sql);

             $sql->execute();

             $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

             return $sql->rowCount();
        
        }


	}


?>