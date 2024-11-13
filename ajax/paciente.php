<?php 
	// llamo la conexión
	require_once("../config/conexion.php");
	// llamo el modelo
	require_once("../modelos/Paciente.php");
	
	$pacientes = new Paciente();

  	//declaramos las variables de los valores que se envian por el formulario y que recibimos por ajax y decimos que si existe el parametro que estamos recibiendo
  	$id_paciente=isset($_POST["id_paciente"]);
  	$cedula_pac=isset($_POST["cedula_pac"]); //este es un campo de tipo hidden

  	$nacionalidad=isset($_POST["nacionalidad"]);
  	$cedula_paciente=isset($_POST["cedula_paciente"]);
  	$nombre_paciente=isset($_POST["nombre_paciente"]);
  	$apellido_paciente=isset($_POST["apellido_paciente"]);
  	$direccion_paciente=isset($_POST["direccion_paciente"]);
  	$codigo_cell=isset($_POST["codigo_cell"]);
  	$telefono_paciente=isset($_POST["telefono_paciente"]);
  	$sexo_paciente=isset($_POST["sexo_paciente"]);
  	$fecha_nac=isset($_POST["fecha_nac"]);
  	$lugar_nac=isset($_POST["lugar_nac"]);
  	$con_quien_vive=isset($_POST["con_quien_vive"]);
  	$lateralidad_biologica=isset($_POST["lateralidad_biologica"]);
  	$hobbie=isset($_POST["hobbie"]);
  	$id_ciudad=isset($_POST["ciudad"]);
  	$id_religion=isset($_POST["religion"]);
  	$id_oficio=isset($_POST["oficio"]);
  	$id_trabajo=isset($_POST["trabajo"]);

  	
  	switch($_GET["op"]){

  		case 'guardaryeditar':
  			/*verificamos si existe la cedula en la base de datos, si ya existe un registro con la cedula entonces no se registra el acompañante*/
  			$datos = $pacientes->get_cedula_del_paciente($_POST["cedula_paciente"]);

  			/*si el id no existe entonces lo registra
	        importante: se debe poner el $_POST sino no funciona*/
	        if(empty($_POST["cedula_pac"])){ //$_POST["id_paciente"]

	        	if(is_array($datos)==true and count($datos)==0){

	        		$pacientes->registrar_paciente($nacionalidad,$cedula_paciente,$nombre_paciente,$apellido_paciente,$direccion_paciente,$codigo_cell,$telefono_paciente,$sexo_paciente,$fecha_nac,$lugar_nac,$con_quien_vive,$lateralidad_biologica, $hobbie, $id_ciudad, $id_religion, $id_oficio, $id_trabajo);

	        		$messages[]="El Paciente se registró correctamente";

	        	} else {
                    /*si ya exista la cedula entonces aparece el mensaje*/
                    $errors[]="La cédula ya esta registrada";
	            }

	        } else if ($datos =! 0) {
					/*si ya existe el id, entonces editamos el acompañante*/
	        	$pacientes->editar_paciente($nacionalidad,$cedula_paciente,$nombre_paciente,$apellido_paciente,$direccion_paciente,$codigo_cell,$telefono_paciente,$sexo_paciente,$fecha_nac,$lugar_nac,$con_quien_vive,$lateralidad_biologica, $hobbie, $id_ciudad, $id_religion, $id_oficio, $id_trabajo);

	        	$messages[]="El Paciente se modificó correctamente";
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
    
           //el parametro id_pacientes se envia por AJAX cuando se edita el acompañante

          	$datos = $pacientes->get_paciente_por_cedula($_POST["cedula_pac"]); //id_paciente

          	//validacion del id del acompañante  

             if(is_array($datos)==true and count($datos)>0){

             	 foreach($datos as $row){
                      	//cedula_paciente
                    $output["cedula_pac"] = $row["cedula_paciente"];
                    $output["nacionalidad"] = $row["nacionalidad"];
                    $output["nombre_paciente"] = $row["nombre_paciente"];
            		$output["apellido_paciente"] = $row["apellido_paciente"];
            		$output["direccion_paciente"] = $row["direccion_paciente"];
            		$output["codigo_cell"] = $row["codigo_cell"];
            		$output["telefono_paciente"] = $row["telefono_paciente"];
            		$output["sexo_paciente"] = $row["sexo_paciente"];
            		$output["fecha_nac"] = $row["fecha_nac"];
            		$output["lugar_nac"] = $row["lugar_nac"];
            		$output["con_quien_vive"] = $row["con_quien_vive"];
            		$output["lateralidad_biologica"] = $row["lateralidad_biologica"];
            		$output["hobbie"] = $row["hobbie"];
            		$output["ciudad"] = $row["id_ciudad"];
            		$output["religion"] = $row["id_religion"];
            		$output["oficio"] = $row["id_oficio"];
            		$output["trabajo"] = $row["id_trabajo"];

            		
             	 }

             	 echo json_encode($output);

             } else {

                //si no existe el registro entonces no recorre el array
                $errors[]="El paciente no esta registrado";

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

  			$datos = $pacientes->get_paciente();

         //declaramos el array

         $data = Array();


         foreach($datos as $row){

            
            $sub_array= array();

	         date_default_timezone_set('America/Caracas');
	  	     
	  	     $sub_array[]= $row["cedula_paciente"];
	  	     $sub_array[]= $row["nacionalidad"];
	  	     $sub_array[] = $row["nombre_paciente"];
	         $sub_array[] = $row["apellido_paciente"];
	         $sub_array[] = $row["direccion_paciente"];
	         $sub_array[] = $row["codigo_cell"];
	         $sub_array[] = $row["telefono_paciente"];
	         $sub_array[] = $row["sexo_paciente"];
	         $sub_array[] = $row["fecha_nac"];
	         $sub_array[] = $row["lugar_nac"];
	         $sub_array[] = $row["lateralidad_biologica"];
	         $sub_array[] = $row["hobbie"];
	         $sub_array[] = $row["ciudad"];
	         $sub_array[] = $row["religion"];
	         $sub_array[] = $row["oficio"];
	         $sub_array[] = $row["trabajo"];



	         $sub_array[] = '<button type="button" onClick="mostrar('.$row["cedula_paciente"].');"  id="'.$row["id_paciente"].'" class="btn btn-warning btn-md update"><i class="fa fa-pencil"></i> Editar</button>';


        
	     		$data[]=$sub_array;
	    
	        
        	}

         	$results= array(	

         	"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
         	echo json_encode($results);

  		break;

  		//REGISTRO DE LA CONSULTA EN OTRO MODULO

  		case "registrar_consulta":

        //se llama al modelo Consulta.php

        require_once('../modelos/Consulta.php');

	    $consul = new Consulta();

	    $consul->agrega_detalle_consulta();

     	break;




  		case "listar_en_consulta":

	     $datos=$pacientes->get_paciente();

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

     case "buscar_paciente":


	$datos=$pacientes->get_paciente_por_id($_POST["id_paciente"]);


          // comprobamos que el proveedor esté activo, de lo contrario no lo agrega
	      if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					$output["cedula_paciente"] = $row["cedula_paciente"];
					$output["nombre_paciente"] = $row["nombre_paciente"];
					$output["apellido_paciente"] = $row["apellido_paciente"];
            		$output["direccion_paciente"] = $row["direccion_paciente"];
					
					
				}

			

	        }

	        echo json_encode($output);

     break;

  	}


  	


?>