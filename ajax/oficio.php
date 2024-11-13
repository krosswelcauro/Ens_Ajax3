<?php  

	require_once("../config/conexion.php");
	require_once("../modelos/Oficios.php");

	$oficios = new Oficio();

	$id_oficio=isset($_POST["id_oficio"]);
	$oficio=isset($_POST["oficio"]);

	switch($_GET["op"]){

		case 'guardaryeditar':

            $datos = $oficios->get_nombre_oficio($_POST["oficio"]);

            if(empty($_POST["id_oficio"])){

            	if(is_array($datos)==true and count($datos)==0){

            		$oficios->registrar_oficio($oficio);

                    $messages[]="El oficio se registró correctamente";


            	} else {

                    $errors[]="El oficio ya existe";

            	}

            }
            else {

            	$oficios->editar_oficio($id_oficio, $oficio);

                $messages[]="El oficio se editó correctamente";

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

			$datos=$oficios->get_oficio_por_id($_POST["id_oficio"]);

			if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					$output["id_oficio"] = $row["id_oficio"];
					$output["oficio"] = $row["nombre"];

				}

				echo json_encode($output);

			} else {

                $errors[]="El oficio no existe";

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

    		$datos=$oficios->get_oficios();

 	 		$data= Array();

     		foreach($datos as $row){

				$sub_array = array();

				$sub_array[] = $row["nombre"];

				$sub_array[] = '<button type="button" onClick="mostrar('.$row["id_oficio"].');"  id="'.$row["id_oficio"].'" class="btn btn-warning btn-md update"><i class="fa fa-pencil"></i> Editar</button>';


                // $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_oficio"].');"  id="'.$row["id_oficio"].'" class="btn btn-danger btn-md"><i class="fa fa-trash"></i> Eliminar</button>';
                

        
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