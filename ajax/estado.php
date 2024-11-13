<?php  

	require_once("../config/conexion.php");
	require_once("../modelos/Estado.php");

	$estados = new Estado();

	$id_estado=isset($_POST["id_estado"]);
	$estado=isset($_POST["estado"]);

	switch($_GET["op"]){

		case 'guardaryeditar':

            $datos = $estados->get_nombre_estado($_POST["estado"]);

            if(empty($_POST["id_estado"])){

            	if(is_array($datos)==true and count($datos)==0){

            		$estados->registrar_estado($estado);

                    $messages[]="El estado se registró correctamente";


            	} else {

                    $errors[]="El estado ya existe";

            	}

            }
            else {

            	$estados->editar_estado($id_estado, $estado);

                $messages[]="El estado se editó correctamente";

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

			$datos=$estados->get_estado_por_id($_POST["id_estado"]);

			if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					$output["id_estado"] = $row["id_estado"];
					$output["estado"] = $row["nombre"];

				}

				echo json_encode($output);

			} else {

                $errors[]="El estado no existe";

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

    		$datos=$estados->get_estados();

 	 		$data= Array();

     		foreach($datos as $row){

				$sub_array = array();

				$sub_array[] = $row["nombre"];

				$sub_array[] = '<button type="button" onClick="mostrar('.$row["id_estado"].');"  id="'.$row["id_estado"].'" class="btn btn-warning btn-md update"><i class="fa fa-pencil"></i> Editar</button>';


                $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_estado"].');"  id="'.$row["id_estado"].'" class="btn btn-danger btn-md"><i class="fa fa-trash"></i> Eliminar</button>';
                

        
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