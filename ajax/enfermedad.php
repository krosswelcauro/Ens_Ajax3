<?php  

	require_once("../config/conexion.php");
	require_once("../modelos/Enfermedades.php");

	$enfermedades = new Enfermedad();

	$id_enfermedad=isset($_POST["id_enfermedad"]);
	$enfermedad=isset($_POST["enfermedad"]);

	switch($_GET["op"]){

		case 'guardaryeditar':

            $datos = $enfermedades->get_nombre_enfermedad($_POST["enfermedad"]);

            if(empty($_POST["id_enfermedad"])){

            	if(is_array($datos)==true and count($datos)==0){

            		$enfermedades->registrar_enfermedad($enfermedad);

                    $messages[]="La enfermedad se registró correctamente";


            	} else {

                    $errors[]="La enfermedad ya existe";

            	}

            }
            else {

            	$enfermedades->editar_enfermedad($id_enfermedad, $enfermedad);

                $messages[]="La enfermedad se editó correctamente";

            }

		    //mensaje success
		    if (isset($messages)){
						
				?>
					<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>¡Bien hecho!</strong>
							<?php
								foreach ($messages as $message) {
										echo $message;
									}
								?>
					</div>
				<?php
			}
			//fin success

			//mensaje error
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

			 //fin mensaje error

		break;

		case 'mostrar':

			$datos=$enfermedades->get_enfermedad_por_id($_POST["id_enfermedad"]);

			if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					$output["id_enfermedad"] = $row["id_enfermedad"];
					$output["enfermedad"] = $row["nombre"];

				}

				echo json_encode($output);

			} else {

                $errors[]="La enfermedad no existe";

			}

			//inicio de mensaje de error
			if(isset($errors)){
			
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
	        //fin de mensaje de error


		break;

		case 'listar':

			$datos=$enfermedades->get_enfermedades();

 	 		$data= Array();

     		foreach($datos as $row){

				$sub_array = array();

				$sub_array[] = $row["nombre"];

				$sub_array[] = '<button type="button" onClick="mostrar('.$row["id_enfermedad"].');"  id="'.$row["id_enfermedad"].'" class="btn btn-warning btn-md update"><i class="fa fa-pencil"></i> Editar</button>';


                $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_enfermedad"].');"  id="'.$row["id_enfermedad"].'" class="btn btn-danger btn-md"><i class="fa fa-trash"></i> Eliminar</button>';
                

        
	     		$data[]=$sub_array;
	    
	        
         	}

         	$results= array(	

	         	"sEcho"=>1, //Información para el datatables
	 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
	 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
	 			"aaData"=>$data);
        	echo json_encode($results);

		break;

	}


?>