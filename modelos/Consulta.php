<?php  

	require_once("../config/conexion.php");
	
	class Consulta extends Conectar{

		public function get_consultas(){

			$conectar=parent::conexion();
		    parent::set_names();

			$sql="select c.id_consulta, c.n_consulta, c.motivo, c.explicacion, c.intensidad, c.escala, c.id_paciente, c.id_acompanante, c.id_terapeuta, c.cierre, c.fecha_hora, p.id_paciente, p.nombre_paciente as nom_paciente, p.apellido_paciente as ape_paciente, a.id_acompanante, a.nombre_acompanante as nom_acompanante, a.apellido_acompanante as ape_acompanante, t.id_terapeuta, t.nombre as nom_terapeuta, t.apellido as ape_terapeuta
			
			from consulta c 

			INNER JOIN paciente p ON c.id_paciente=p.id_paciente
			INNER JOIN acompanante a ON c.id_acompanante=a.id_acompanante
			INNER JOIN terapeuta t ON c.id_terapeuta=t.id_terapeuta";

			$sql=$conectar->prepare($sql);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll();

		}


		public function get_consultas_reporte(){

			$conectar=parent::conexion();
		    parent::set_names();

			$sql="select c.id_consulta, c.n_consulta, c.motivo, c.explicacion, c.intensidad, c.escala, c.id_paciente, c.id_acompanante, c.id_terapeuta, c.cierre, c.fecha_hora, p.id_paciente, p.nombre_paciente as nom_paciente, p.apellido_paciente as ape_paciente, a.id_acompanante, a.nombre_acompanante as nom_acompanante, a.apellido_acompanante as ape_acompanante, t.id_terapeuta, t.nombre as nom_terapeuta, t.apellido as ape_terapeuta
			
			from consulta c 

			INNER JOIN paciente p ON c.id_paciente=p.id_paciente
			INNER JOIN acompanante a ON c.id_acompanante=a.id_acompanante
			INNER JOIN terapeuta t ON c.id_terapeuta=t.id_terapeuta

			order by c.id_paciente asc";

			$sql=$conectar->prepare($sql);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll();

		}


		public function get_consultas_por_paciente($id_paciente){

			$conectar=parent::conexion();
			parent::set_names();
			

          	$sql="select * from consulta where id_paciente=?";

          	$sql=$conectar->prepare($sql);

          	$sql->bindValue(1, $id_paciente);
          	$sql->execute();

          	return $resultado=$sql->fetchAll();

		}


		public function numero_consulta(){

		    $conectar=parent::conexion();
		    parent::set_names();

		 
		    $sql="select n_consulta from consulta;";

		    $sql=$conectar->prepare($sql);

		    $sql->execute();
		    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

		       foreach($resultado as $k=>$v){

		                 $n_consulta["numero"]=$v["n_consulta"];

		                 
		             }

		                   if(empty($n_consulta["numero"]))
		                {
		                  echo 'F000001';
		                }else
		          
		                  {
		                    $num     = substr($n_consulta["numero"] , 1);
		                    $dig     = $num + 1;
		                    $fact = str_pad($dig, 6, "0", STR_PAD_LEFT);
		                    echo 'F'.$fact;
		                    
		                  } 
		  }


		public function numero_id_aspecto(){

		    $conectar=parent::conexion();
		    parent::set_names();

		 
		    $sql="select id_aspectos_evaluar from aspectos_evaluar;";

		    $sql=$conectar->prepare($sql);

		    $sql->execute();
		    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

		       foreach($resultado as $k=>$v){

		                 $id_aspectos_evaluar["numero"]=$v["id_aspectos_evaluar"];

		             }

		                   if(empty($id_aspectos_evaluar["numero"]))
		                {
		                  echo '1';
		                }else
		          
		                  {
		                    $num     = $id_aspectos_evaluar["numero"];
		                    $dig     = $num + 1;
		                    echo $dig;
		                    
		                  } 
		  }

		/*metodo para agregar la consulta */
  	 	public function agrega_detalle_consulta(){

			$conectar=parent::conexion();
			parent::set_names();

			$sql="insert into consulta 
			values(null,?,?,?,?,?,?,?,?,?,now());";

			$sql=$conectar->prepare($sql);
			
			$sql->bindValue(1, $_POST["n_consulta"]);
			$sql->bindValue(2, $_POST["motivo"]);
			$sql->bindValue(3, $_POST["explicacion"]);
			$sql->bindValue(4, $_POST["intensidad"]);
			$sql->bindValue(5, $_POST["escala"]);
			$sql->bindValue(6, $_POST["id_acompanante"]);
			$sql->bindValue(7, $_POST["id_paciente"]);
			$sql->bindValue(8, $_POST["id_terapeuta"]);
			$sql->bindValue(9, $_POST["cierre"]);


			$sql->execute();

			//print_r($_POST);

		}

		public function agrega_detalle_informe(){

			$conectar=parent::conexion();
			parent::set_names();


			$sql="insert into aspectos_evaluar 
			values(?,?,?);";

			$sql=$conectar->prepare($sql);

			$sql->bindValue(1, $_POST["id_aspectos_evaluar"]);
			$sql->bindValue(2, $_POST["nombre_asp"]);
			$sql->bindValue(3, $_POST["descripcion_asp"]);

			$sql->execute();



			$sql2="insert into aspecto_consulta 
			values(?,?,?,?,?,?,?);";

			$sql2=$conectar->prepare($sql2);

			$sql2->bindValue(1, $_POST["n_consulta"]);
			$sql2->bindValue(2, $_POST["observacion_terapeuta"]);
			$sql2->bindValue(3, $_POST["valoracion"]);
			$sql2->bindValue(4, $_POST["actividad_hogar"]);
			$sql2->bindValue(5, $_POST["reforzamiento"]);
			$sql2->bindValue(6, $_POST["id_terapia"]);
			$sql2->bindValue(7, $_POST["id_aspectos_evaluar"]);


			$sql2->execute();

			//printf($sql2);



			$sql3="insert into historial 
			values(null,?,?,?,?,?,?);";

			$sql3=$conectar->prepare($sql3);

			$sql3->bindValue(1, $_POST["tratamientoMed"]);
			$sql3->bindValue(2, $_POST["observacion"]);
			$sql3->bindValue(3, $_POST["anio"]);
			$sql3->bindValue(4, $_POST["mes"]);
			$sql3->bindValue(5, $_POST["n_consulta"]);
			$sql3->bindValue(6, $_POST["id_enfermedad"]);


			$sql3->execute();
			print_r($_POST);




			$sql4="insert into futura_visita 
			values(?,?,?,?);";

			$sql4=$conectar->prepare($sql4);

			$sql4->bindValue(1, $_POST["dia"]);
			$sql4->bindValue(2, $_POST["hora"]);
			$sql4->bindValue(3, $_POST["id_paciente"]);
			$sql4->bindValue(4, $_POST["id_terapeuta"]);

			$sql4->execute();



			$sql5="update consulta set cierre = ? where n_consulta = ?";

			$sql5=$conectar->prepare($sql5);

			$sql5->bindValue(1, $_POST["cierre"]);
			$sql5->bindValue(2, $_POST["n_consulta"]);
			$sql5->execute();

			//print_r($_POST);
		}

		public function get_consulta_por_id($id_consulta){

			$conectar=parent::conexion();
			parent::set_names();

          	$sql="select * from consulta where id_consulta=?";

          	$sql=$conectar->prepare($sql);

          	$sql->bindValue(1, $id_consulta);
          	$sql->execute();

          	return $resultado=$sql->fetchAll();

		}


		public function lista_busca_registros_fecha($fecha_inicial, $fecha_final){

            $conectar= parent::conexion();
			parent::set_names();

           			date_default_timezone_set('America/Caracas');
            
            $date_inicial = $_POST["fecha_inicial"];
            $date = str_replace('/', '-', $date_inicial);
            $fecha_inicial = date("Y-m-d", strtotime($date));
         
            $date_final = $_POST["fecha_final"];
            $date = str_replace('/', '-', $date_final);
            $fecha_final = date("Y-m-d", strtotime($date));

           
             
            $sql= "SELECT C.id_consulta, c.n_consulta, c.motivo as motivo, c.explicacion as explicacion, c.intensidad as intensidad, c.escala as escala, c.id_acompanante, c.id_paciente, c.id_terapeuta, c.cierre as cierre, c.fecha_hora as fecha_hora, a.id_acompanante, a.nombre_acompanante as nom_acom, a.apellido_acompanante as ape_acom, p.id_paciente, p.nombre_paciente as nom_pac, p.apellido_paciente as ape_pac, t.id_terapeuta, t.nombre as nom_ter, t.apellido as ape_ter 

            FROM consulta c

            INNER JOIN acompanante a ON a.id_acompanante=c.id_acompanante
            INNER JOIN paciente p ON p.id_paciente=c.id_paciente
            INNER JOIN terapeuta t ON t.id_terapeuta=c.id_terapeuta

            WHERE fecha_hora>=? and fecha_hora<=? ";



            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$fecha_inicial);
            $sql->bindValue(2,$fecha_final);
            $sql->execute();
            return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
			//print_r($_POST);

       }


       
        //BUSCA REGISTROS COMPRAS-FECHA-MES

        public function lista_busca_registros_fecha_mes($mes, $ano){

          $conectar= parent::conexion();
		  parent::set_names();

             $mes=$_POST["mes"];
             $ano=$_POST["ano"];
            
           $fecha= ($ano."-".$mes."%");
      
          $sql= "SELECT C.id_consulta, c.n_consulta, c.motivo as motivo, c.explicacion as explicacion, c.intensidad as intensidad, c.escala as escala, c.id_acompanante, c.id_paciente, c.id_terapeuta, c.cierre as cierre, c.fecha_hora as fecha_hora, 
          	  a.id_acompanante, a.nombre_acompanante as nom_acom, a.apellido_acompanante as ape_acom, 
          	  p.id_paciente, p.nombre_paciente as nom_pac, p.apellido_paciente as ape_pac, 
          	  t.id_terapeuta, t.nombre as nom_ter, t.apellido as ape_ter 

            FROM consulta c

            INNER JOIN acompanante a ON a.id_acompanante=c.id_acompanante
            INNER JOIN paciente p ON p.id_paciente=c.id_paciente
            INNER JOIN terapeuta t ON t.id_terapeuta=c.id_terapeuta 

            WHERE fecha_hora like ? ";

            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$fecha);
            $sql->execute();
            return $result = $sql->fetchAll(PDO::FETCH_ASSOC);


        }


        public function editar_estado($id_consulta,$cierre){


          $conectar=parent::conexion();
          parent::set_names();

            //el parametro est se envia por via ajax
          if($_POST["cierre"]=="0"){

            $cierre=1;

          } else {

            $cierre=0;
          }

          $sql="update consulta set 
            
            cierre=?

            where 
            id_consulta=?


          ";

          $sql=$conectar->prepare($sql);


          $sql->bindValue(1,$cierre);
          $sql->bindValue(2,$id_consulta);
          $sql->execute();


        }


       public function get_detalle_historial_consulta($n_consulta){

          $conectar=parent::conexion();
           parent::set_names();

          $sql="SELECT * from historial where n_consulta = ?
          
          ;";

          $sql=$conectar->prepare($sql);
              

          $sql->bindValue(1,$n_consulta);
          $sql->execute();
          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

       
            
       }


       public function get_detalle_aspecto_consulta($n_consulta){

       $conectar=parent::conexion();
           parent::set_names();

          $sql="SELECT ac.observacion_terapeuta as obser, ac.valoracion as valor, ac.id_terapia , ac.actividad_hogar as acti, 
          ac.id_aspectos_evaluar,
          asp.id_aspectos_evaluar, asp.descripcion_asp as asp_descrip,             
          t.id_terapia, t.nombre as t_nombre  

          from aspecto_consulta ac 

          INNER JOIN terapia t ON ac.id_terapia = t.id_terapia 
          INNER JOIN aspectos_evaluar asp ON ac.id_aspectos_evaluar = asp.id_aspectos_evaluar 

          where n_consulta = ?
          
          ;";


          $sql=$conectar->prepare($sql);
              

          $sql->bindValue(1,$n_consulta);
          $sql->execute();
          $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

       
              $html= "

              <thead style='background-color:#A9D0F5'>

                                    <th>Observación terapeuta</th>
                                    <th>Valoración</th>
                                    <th>Terapia realizada</th>
                                    <th>Act. Hogar</th>
                                    <th>Aspectos a Evaluar</th>

                                    
                                   
                                </thead>


                              ";

           

              foreach($resultado as $row)
        {

         
        $html.="<tr class='filas'><td>".$row['obser']."</td><td>".$row['valor']."</td> <td>".$row["t_nombre"]."</td> <td>".$row['acti']."</td> <td>".$row['asp_descrip']."</td> </tr>";
                   
                  
        }

 
      
      echo $html;

       }


}
?>