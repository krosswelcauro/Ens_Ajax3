<?php  

	require_once("../config/conexion.php");
	require_once("../modelos/Consulta.php");

	$consulta = new Consulta();

	$n_consulta=isset($_POST["n_consulta"]);
	$motivo=isset($_POST["motivo"]);
	$explicacion=isset($_POST["explicacion"]);
	$intensidad=isset($_POST["intensidad"]);
	$escala=isset($_POST["escala"]);
	$id_acompanante=isset($_POST["id_acompanante"]);
	$id_paciente=isset($_POST["id_paciente"]);
	$id_terapeuta=isset($_POST["id_terapeuta"]);
	$cierre=isset($_POST["cierre"]);

	$actividad_hogar=isset($_POST["actividad_hogar"]);
	$reforzamiento=isset($_POST["reforzamiento"]);
	$id_terapia=isset($_POST["id_terapia"]);
	$observacion_terapeuta=isset($_POST["observacion_terapeuta"]);

	$id_aspecto_evaluar=isset($_POST["id_aspecto_evaluar"]);





	switch($_GET["op"]){

	case "ver_detalle_historial_consulta":


   	$datos= $consulta->get_detalle_historial_consulta($_POST["n_consulta"]);	

	      if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					$output["n_consulta"] = $row["n_consulta"];
					$output["tratamientoMed"] = $row["tratamientoMed"];
					$output["observacion"] = $row["observacion"];
									
				}
		          echo json_encode($output);
	        } else {
                 
                $errors[]="no existe";
	        }

				if (isset($errors)){
			
					?>
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Error!</strong> 
							<?php
								foreach ($errors as $error) {
										echo $error;
									}
								?>
					</div>
					<?php
			      }
  	break;


	case "ver_detalle_consulta":

  	   $datos= $consulta->get_detalle_aspecto_consulta($_POST["n_consulta"]);

  	   	if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					$output["observacion_terapeuta"] = $row["observacion_terapeuta"];
					$output["valoracion"] = $row["valoracion"];
					$output["id_terapia"] = $row["id_terapia"];
					$output["actividad_hogar"] = $row["actividad_hogar"];														
				}
		          echo json_encode($output);
	        } else {
                 
                $errors[]="no existe";
	        }

				if (isset($errors)){
			
					?>
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Error!</strong> 
							<?php
								foreach ($errors as $error) {
										echo $error;
									}
								?>
					</div>
					<?php
			      }
  	   
  	 break;


     case "listar_en_consulta":

	     $datos=$consulta->get_consultas();

	     //Vamos a declarar un array
	 	 $data= Array();

	     foreach($datos as $row)
			{
				$sub_array = array();
				
				
	            $sub_array[] = $row["cedula_paciente"];
				$sub_array[] = $row["nombre_paciente"];
	         	$sub_array[] = $row["apellido_paciente"];
	         	$sub_array[] = $row["direccion_paciente"];


                 $sub_array[] = '<button type="button" onClick="agregar_registro_paciente('.$row["id_paciente"].');" id="'.$row["id_paciente"].'" class="btn btn-primary btn-md"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>';
                
				$data[] = $sub_array;
			}

      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


     break;


     case "listar_consulta_en_informe":

	 $datos=$consulta->get_consultas();

 	 $data= Array();

     foreach($datos as $row)
			{
				//validación  para que si la consulta no este activa no me cargue sus datos
				if ($row["cierre"] == 1) {

				$sub_array = array();

           		date_default_timezone_set('America/Caracas');

	            $sub_array[]= $row["n_consulta"];
	  	     	$sub_array[] = $row["fecha_hora"];
	         	$sub_array[] = $row["nom_paciente"]." ".$row["ape_paciente"];
	         	$sub_array[] = $row["nom_terapeuta"]." ".$row["ape_terapeuta"];
	         	$sub_array[] = $row["motivo"];


                 $sub_array[] = '<button type="button" onClick="agregar_registro_consulta('.$row["id_consulta"].');" id="'.$row["id_consulta"].'" class="btn btn-primary btn-md"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>';
                
				$data[] = $sub_array;
				}
				
			}

	      $results = array(
	 			"sEcho"=>1, //Información para el datatables
	 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
	 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
	 			"aaData"=>$data);
	 		echo json_encode($results);


     break;


     case "buscar_consulta":

		$datos=$consulta->get_consulta_por_id($_POST["id_consulta"]);

	      if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
           			date_default_timezone_set('America/Caracas');

					$output["n_consulta"] = $row["n_consulta"];
					$output["fecha_hora"] = date("d-m-Y",strtotime($row["fecha_hora"]));
					$output["id_paciente"] = $row["id_paciente"];
					$output["id_terapeuta"] = $row["id_terapeuta"];
            		$output["motivo"] = $row["motivo"];
				}
	        }

	        echo json_encode($output);

     break;




     case "registrar_informe":

		require_once("../modelos/Consulta.php");

		$info = new Consulta();
	    $info->agrega_detalle_informe();

     break;

      
     case "buscar_consultas_fecha":
          
     $datos=$consulta->lista_busca_registros_fecha($_POST["fecha_inicial"], $_POST["fecha_final"]);

     //Vamos a declarar un array
 	 $data= Array();

     foreach($datos as $row)
			{
				$sub_array = array();

				$est = '';
			
				 $atrib = "btn btn-danger btn-md estado";
				if($row["cierre"] == 1){
					$est = 'ACTIVA';
					$atrib = "btn btn-success btn-md estado";
				}
				else{
					if($row["cierre"] == 0){
						$est = 'FINALIZADA';
						
					}	
				}

				
           			date_default_timezone_set('America/Caracas');


	       		 $sub_array[] = date("d-m-Y", strtotime($row["fecha_hora"]));
				 $sub_array[] = $row["n_consulta"];
				 $sub_array[] = $row["nom_pac"]." ".$row["ape_pac"];
				 $sub_array[] = $row["motivo"];
				 $sub_array[] = $row["nom_acom"]." ".$row["ape_acom"];
				 $sub_array[] = $row["nom_ter"]." ".$row["ape_ter"];


				               
              	 $sub_array[] = '<button class="btn btn-warning detalle" id="'.$row["n_consulta"].'"  data-toggle="modal" data-target="#detalle_consulta"><i class="fa fa-eye"></i></button>';
               

				 $sub_array[] = '<button type="button" onClick="cambiarEstado('.$row["id_consulta"].','.$row["cierre"].');" name="cierre" id="'.$row["id_consulta"].'" class="'.$atrib.'">'.$est.'</button>';


				$data[] = $sub_array;
			}


      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


     break;


      case "buscar_consultas_fecha_mes":

      
      $datos= $consulta->lista_busca_registros_fecha_mes($_POST["mes"],$_POST["ano"]);


        //Vamos a declarar un array
 	 $data= Array();

     foreach($datos as $row)
			{
				$sub_array = array();

				$est = '';
			
				 $atrib = "btn btn-danger btn-md estado";
				if($row["cierre"] == 1){
					$est = 'ACTIVA';
					$atrib = "btn btn-success btn-md estado";
				}
				else{
					if($row["cierre"] == 0){
						$est = 'FINALIZADA';
						
					}	
				}

				

         	$sub_array[] = date("d-m-Y", strtotime($row["fecha_hora"]));
				 $sub_array[] = $row["n_consulta"];
				 $sub_array[] = $row["nom_pac"]." ".$row["ape_pac"];
				 $sub_array[] = $row["motivo"];
				 $sub_array[] = $row["nom_acom"]." ".$row["ape_acom"];
				 $sub_array[] = $row["nom_ter"]." ".$row["ape_ter"];


				$sub_array[] = '<button class="btn btn-warning detalle" id="'.$row["n_consulta"].'"  data-toggle="modal" data-target="#detalle_consulta"><i class="fa fa-eye"></i></button>';
               

				 $sub_array[] = '<button type="button" onClick="cambiarEstado('.$row["id_consulta"].','.$row["cierre"].');" name="cierre" id="'.$row["id_consulta"].'" class="'.$atrib.'">'.$est.'</button>';
                
				$data[] = $sub_array;
			}




      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


     break;


     case "activarydesactivar":
              
              $datos = $consulta->get_consulta_por_id($_POST["id_consulta"]);
                
                 if(is_array($datos)==true and count($datos)>0){
                    
                    $consulta->editar_estado($_POST["id_consulta"],$_POST["cierre"]);
                 }
         break;
	
}
?>