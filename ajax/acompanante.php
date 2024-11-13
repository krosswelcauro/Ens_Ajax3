<?php 
	// llamo la conexión
	require_once("../config/conexion.php");
	// llamo el modelo
	require_once("../modelos/Acompanante.php");
	
	$acompanantes = new Acompanante();

  	//declaramos las variables de los valores que se envian por el formulario y que recibimos por ajax y decimos que si existe el parametro que estamos recibiendo
  	$id_acompanante=isset($_POST["id_acompanante"]);
  	$cedula_acom=isset($_POST["cedula_acom"]); //este es un campo de tipo hidden
  	$cedula_acompanante=isset($_POST["cedula_acompanante"]);
  	$nacionalidad=isset($_POST["nacionalidad"]);
  	$nombre_acompanante=isset($_POST["nombre_acompanante"]);
  	$apellido_acompanante=isset($_POST["apellido_acompanante"]);
  	$direccion_acompanante=isset($_POST["direccion_acompanante"]);
  	$codigo_cell=isset($_POST["codigo_cell"]);
  	$telefono_acompanante=isset($_POST["telefono_acompanante"]);
  	$relacion=isset($_POST["relacion"]);
  	
  	switch($_GET["op"]){

  		case 'guardaryeditar':
  			/*verificamos si existe la cedula en la base de datos, si ya existe un registro con la cedula entonces no se registra el acompañante*/
  			$datos = $acompanantes->get_cedula_del_acompanante($_POST["cedula_acompanante"]);

  			/*si el id no existe entonces lo registra
	        importante: se debe poner el $_POST sino no funciona*/
	        if(empty($_POST["id_acompanante"])){ //$_POST["id_acompanante"]

	        	if(is_array($datos)==true and count($datos)==0){

	        		$acompanantes->registrar_acompanante($cedula_acompanante,$nacionalidad,$nombre_acompanante,$apellido_acompanante,$direccion_acompanante,$codigo_cell,$telefono_acompanante,$relacion);

	        		$messages[]="El acompañante se registró correctamente";

	        	} else {
                    /*si ya exista la cedula entonces aparece el mensaje*/
                    $errors[]="La cédula ya existe";
	            }

	        } else if ($datos =! 0) {
					/*si ya existe el id, entonces editamos el acompañante*/
	        	$acompanantes->editar_acompanante($cedula_acompanante,$nacionalidad,$nombre_acompanante,$apellido_acompanante,$direccion_acompanante,$codigo_cell,$telefono_acompanante,$relacion);

	        	$messages[]="El acompañante se modifico correctamente";
	        	}	


	        //mensaje success
     		if(isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
	 		//fin success

      		//mensaje error
         	if(isset($errors)){
			
				?>
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Error!</strong> 
							<?php
								foreach($errors as $error) {
										echo $error;
									}
								?>
					</div>
				<?php

			}
			//fin mensaje error


  		break;

  		case 'mostrar':

  			//selecciona el id del acompañante
    
           //el parametro id_acompanantes se envia por AJAX cuando se edita el acompañante

          	$datos = $acompanantes->get_acompanante_por_id($_POST["id_acompanante"]); //id_acompanante

          	//validacion del id del acompañante  

             if(is_array($datos)==true and count($datos)>0){

             	 foreach($datos as $row){
                      	//cedula_acompanante
                    $output["id_acompanante"] = $row["id_acompanante"];
                    $output["cedula_acompanante"] = $row["cedula_acompanante"];
                    $output["nacionalidad"] = $row["nacionalidad"];
                    $output["nombre_acompanante"] = $row["nombre_acompanante"];
            		$output["apellido_acompanante"] = $row["apellido_acompanante"];
            		$output["direccion_acompanante"] = $row["direccion_acompanante"];
            		$output["codigo_cell"] = $row["codigo_cell"];
            		$output["telefono_acompanante"] = $row["telefono_acompanante"];
            		$output["relacion"] = $row["relacion"];
            		
             	 }

             	 echo json_encode($output);

             } else {

                //si no existe el registro entonces no recorre el array
                $errors[]="El acompañante no existe";

            }

            //mensaje error
         	if(isset($errors)){
			
				?>
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Error!</strong> 
							<?php
								foreach($errors as $error) {
										echo $error;
									}
								?>
					</div>
				<?php

			}
			//fin mensaje error

  		break;

  		case 'listar':

  			$datos = $acompanantes->get_acompanante();

         //declaramos el array

         $data = Array();


         foreach($datos as $row){

            
            $sub_array= array();

	         date_default_timezone_set('America/Caracas');

	  	     $sub_array[]= $row["cedula_acompanante"];
	  	     $sub_array[]= $row["nacionalidad"];
	  	     $sub_array[] = $row["nombre_acompanante"];
	         $sub_array[] = $row["apellido_acompanante"];
	         $sub_array[] = $row["direccion_acompanante"];
	         $sub_array[] = $row["codigo_cell"];
	         $sub_array[] = $row["telefono_acompanante"];
	         $sub_array[] = $row["relacion"];


	         $sub_array[] = '<button type="button" onClick="mostrar('.$row["id_acompanante"].');"  id="'.$row["id_acompanante"].'" class="btn btn-warning btn-md update"><i class="fa fa-pencil"></i> Editar</button>';

        
	     		$data[]=$sub_array;
	    
	        
        	}

         	$results= array(	

         	"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
         	echo json_encode($results);

  		break;

  		case "listar_en_consulta":

     	$datos=$acompanantes->get_acompanante();

     	//Vamos a declarar un array
 	 	$data= Array();

     	foreach($datos as $row)
			{
				$sub_array = array();

				// $est = '';
				
				//  $atrib = "btn btn-success btn-md estado";
				// if($row["estado"] == 0){
				// 	$est = 'INACTIVO';
				// 	$atrib = "btn btn-warning btn-md estado";
				// }
				// else{
				// 	if($row["estado"] == 1){
				// 		$est = 'ACTIVO';
						
				// 	}	
				// }
				
				
	            $sub_array[]= $row["cedula_acompanante"];
	            $sub_array[]= $row["nacionalidad"];
	  	     	$sub_array[] = $row["nombre_acompanante"];
	         	$sub_array[] = $row["apellido_acompanante"];
	         	$sub_array[] = $row["direccion_acompanante"];
	         	$sub_array[] = $row["codigo_cell"];
	         	$sub_array[] = $row["telefono_acompanante"];


                 $sub_array[] = '<button type="button" onClick="agregar_registro('.$row["id_acompanante"].');" id="'.$row["id_acompanante"].'" class="btn btn-primary btn-md"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>';
                
				$data[] = $sub_array;
			}

	      $results = array(
	 			"sEcho"=>1, //Información para el datatables
	 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
	 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
	 			"aaData"=>$data);
	 		echo json_encode($results);


     break;

     case "buscar_acompanante":


	$datos=$acompanantes->get_acompanante_por_id($_POST["id_acompanante"]);


          // comprobamos que el proveedor esté activo, de lo contrario no lo agrega
	      if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
	  	     		$output["cedula_acompanante"] = $row["cedula_acompanante"];
	  	     		$output["nacionalidad"] = $row["nacionalidad"];
                    $output["nombre_acompanante"] = $row["nombre_acompanante"];
            		$output["apellido_acompanante"] = $row["apellido_acompanante"];
            		$output["direccion_acompanante"] = $row["direccion_acompanante"];
            		$output["codigo_cell"] = $row["codigo_cell"];
            		$output["telefono_acompanante"] = $row["telefono_acompanante"];
					
					
				}

			

	        }

	        echo json_encode($output);

     break;

  	}


?>