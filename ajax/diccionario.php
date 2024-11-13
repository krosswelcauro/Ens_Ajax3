<?php  

	require_once("../config/conexion.php");
	require_once("../modelos/Diccionario.php");

	$diccionario = new Diccionario();

	$id_dicc=isset($_POST["id_dicc"]);
	$nombre=isset($_POST["nombre"]);
	$definicion=isset($_POST["definicion"]);
	$tecnico=isset($_POST["tecnico"]);
	$sentidoBio=isset($_POST["sentidoBio"]);
	$conflicto=isset($_POST["conflicto"]);


	switch($_GET["op"]){

		case 'guardaryeditar':

            $datos = $diccionario->get_palabra_nombre($_POST["nombre"]);

            if(empty($_POST["id_dicc"])){

            	if(is_array($datos)==true and count($datos)==0){

            		$diccionario->registrar_palabra($nombre,$definicion,$tecnico,$sentidoBio,$conflicto);

                    $messages[]="El término se registró correctamente";


            	} else {

                    $errors[]="El término ya existe";

            	}

            }
            else {

            	$diccionario->editar_palabra($id_dicc,$nombre,$definicion,$tecnico,$sentidoBio,$conflicto);

                $messages[]="El término se editó correctamente";

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

			$datos=$diccionario->get_palabra_por_id($_POST["id_dicc"]);

			if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					$output["id_dicc"] = $row["id_dicc"];
					$output["nombre"] = $row["nombre"];
					$output["definicion"] = $row["definicion"];
					$output["tecnico"] = $row["tecnico"];
					$output["sentidoBio"] = $row["sentidoBio"];
					$output["conflicto"] = $row["conflicto"];

				}

				echo json_encode($output);

			} else {

                $errors[]="El término no existe";

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

    		$datos=$diccionario->get_palabras();

 	 		$data= Array();

     		foreach($datos as $row){

				$sub_array = array();

				$sub_array[] = $row["nombre"];
				$sub_array[] = $row["definicion"];
				$sub_array[] = $row["tecnico"];
				$sub_array[] = $row["sentidoBio"];
				$sub_array[] = $row["conflicto"];

				$sub_array[] = '<button type="button" onClick="mostrar('.$row["id_dicc"].');"  id="'.$row["id_dicc"].'" class="btn btn-warning btn-md update"><i class="fa fa-pencil"></i> Editar</button>';

        
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