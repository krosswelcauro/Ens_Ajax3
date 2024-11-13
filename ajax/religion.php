<?php  

	require_once("../config/conexion.php");
	require_once("../modelos/Religiones.php");

	$religiones = new Religion();

	$id_religion=isset($_POST["id_religion"]);
	$religion=isset($_POST["religion"]);

	switch($_GET["op"]){

		case 'guardaryeditar':

            $datos = $religiones->get_nombre_religion($_POST["religion"]);

            if(empty($_POST["id_religion"])){

            	if(is_array($datos)==true and count($datos)==0){

            		$religiones->registrar_religion($religion);

                    $messages[]="El religion se registró correctamente";


            	} else {

                    $errors[]="El religion ya existe";

            	}

            }
            else {

            	$religiones->editar_religion($id_religion, $religion);

                $messages[]="El religion se editó correctamente";

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

			$datos=$religiones->get_religion_por_id($_POST["id_religion"]);

			if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					$output["id_religion"] = $row["id_religion"];
					$output["religion"] = $row["nombre"];

				}

				echo json_encode($output);

			} else {

                $errors[]="El religion no existe";

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

    		$datos=$religiones->get_religiones();

 	 		$data= Array();

     		foreach($datos as $row){

				$sub_array = array();

				$sub_array[] = $row["nombre"];

				$sub_array[] = '<button type="button" onClick="mostrar('.$row["id_religion"].');"  id="'.$row["id_religion"].'" class="btn btn-warning btn-md update"><i class="fa fa-pencil"></i> Editar</button>';


                
                

        
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