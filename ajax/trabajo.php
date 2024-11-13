<?php  

	require_once("../config/conexion.php");
	require_once("../modelos/Trabajos.php");

	$trabajos = new Trabajo();

	$id_trabajo=isset($_POST["id_trabajo"]);
	$trabajo=isset($_POST["trabajo"]);
	$cargo=isset($_POST["cargo"]);
	$direccion=isset($_POST["direccion"]);
	$telefono=isset($_POST["telefono"]);


	switch($_GET["op"]){

		case 'guardaryeditar':

            $datos = $trabajos->get_nombre_trabajo($_POST["trabajo"]);

            if(empty($_POST["id_trabajo"])){

            	if(is_array($datos)==true and count($datos)==0){

            		$trabajos->registrar_trabajo($trabajo,$cargo,$direccion,$telefono);

                    $messages[]="El trabajo se registró correctamente";


            	} else {

                    $errors[]="El trabajo ya existe";

            	}

            }
            else {

            	$trabajos->editar_trabajo($id_trabajo,$trabajo,$cargo,$direccion,$telefono);

                $messages[]="El trabajo se editó correctamente";

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

			$datos = $trabajos->get_trabajo_por_id($_POST["id_trabajo"]);

			if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					$output["id_trabajo"] = $row["id_trabajo"];
					$output["trabajo"] = $row["nombre"];
					$output["cargo"] = $row["cargo"];
					$output["direccion"] = $row["direccion"];
					$output["telefono"] = $row["telefono"];

				}

				echo json_encode($output);

			} else {

                $errors[]="El trabajo no existe";

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

    		$datos = $trabajos->get_trabajos();

 	 		$data= Array();

     		foreach($datos as $row){

				$sub_array = array();

				$sub_array[] = $row["nombre"];
				$sub_array[] = $row["cargo"];
				$sub_array[] = $row["direccion"];
				$sub_array[] = $row["telefono"];

				$sub_array[] = '<button type="button" onClick="mostrar('.$row["id_trabajo"].');"  id="'.$row["id_trabajo"].'" class="btn btn-warning btn-md update"><i class="fa fa-pencil"></i> Editar</button>';


                // $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_trabajo"].');"  id="'.$row["id_trabajo"].'" class="btn btn-danger btn-md"><i class="fa fa-trash"></i> Eliminar</button>';
                

        
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