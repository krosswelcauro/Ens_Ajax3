<?php  

	require_once("../config/conexion.php");
	require_once("../modelos/Ciudades.php");

	$ciudades = new Ciudad();

	$id_ciudad=isset($_POST["id_ciudad"]);
	$id_estado=isset($_POST["estado"]);
	$ciudad=isset($_POST["ciudad"]);

	switch($_GET["op"]){

		case 'guardaryeditar':

            $datos = $ciudades->get_nombre_ciudad($_POST["ciudad"]);

            if(empty($_POST["id_ciudad"])){

            	if(is_array($datos)==true and count($datos)==0){

            		$ciudades->registrar_ciudad($ciudad,$id_estado);

                    $messages[]="La ciudad se registró correctamente";


            	} else {

                    $errors[]="La ciudad ya existe";

            	}

            }
            else {

            	$ciudades->editar_ciudad($id_ciudad, $ciudad, $id_estado);

                $messages[]="La ciudad se editó correctamente";

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

			$datos=$ciudades->get_ciudad_por_id($_POST["id_ciudad"]);

			if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					$output["id_ciudad"] = $row["id_ciudad"];
					$output["ciudad"] = $row["nombre"];
					$output["estado"] = $row["id_estado"];

				}

				echo json_encode($output);

			} else {

                $errors[]="La ciudad no existe";

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

    		$datos=$ciudades->get_ciudades();

 	 		$data= Array();

     		foreach($datos as $row){

				$sub_array = array();

				$sub_array[] = $row["nombre"];
				$sub_array[] = $row["estado"];

				$sub_array[] = '<button type="button" onClick="mostrar('.$row["id_ciudad"].');"  id="'.$row["id_ciudad"].'" class="btn btn-warning btn-md update"><i class="fa fa-pencil"></i> Editar</button>';


                $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_ciudad"].');"  id="'.$row["id_ciudad"].'" class="btn btn-danger btn-md"><i class="fa fa-trash"></i> Eliminar</button>';
                

        
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