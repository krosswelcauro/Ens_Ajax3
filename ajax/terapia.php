<?php  

	require_once("../config/conexion.php");
	require_once("../modelos/Terapias.php");

	$terapias = new Terapia();

	$id_terapia=isset($_POST["id_terapia"]);
	$terapia=isset($_POST["terapia"]);
	$descripcion=isset($_POST["descripcion"]);
	$costo_refe=isset($_POST["costo_refe"]);

	switch($_GET["op"]){

		case 'guardaryeditar':

            $datos = $terapias->get_nombre_terapia($_POST["terapia"]);

            if(empty($_POST["id_terapia"])){

            	if(is_array($datos)==true and count($datos)==0){

            		$terapias->registrar_terapia($terapia,$descripcion,$costo_refe);

                    $messages[]="La terapia se registró correctamente";


            	} else {

                    $errors[]="La terapia ya existe";

            	}

            }
            else {

            	$terapias->editar_terapia($id_terapia,$terapia,$descripcion,$costo_refe);

                $messages[]="La terapia se editó correctamente";

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

			$datos=$terapias->get_terapia_por_id($_POST["id_terapia"]);

			if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					$output["id_terapia"] = $row["id_terapia"];
					$output["terapia"] = $row["nombre"];
					$output["descripcion"] = $row["descripcion"];
					$output["costo_refe"] = $row["costo_refe"];

				}

				echo json_encode($output);

			} else {

                $errors[]="La terapia no existe";

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

			$datos=$terapias->get_terapias();

 	 		$data= Array();

     		foreach($datos as $row){

				$sub_array = array();

				$sub_array[] = $row["nombre"];
				$sub_array[] = $row["descripcion"];
				$sub_array[] = $row["costo_refe"];

				$sub_array[] = '<button type="button" onClick="mostrar('.$row["id_terapia"].');"  id="'.$row["id_terapia"].'" class="btn btn-warning btn-md update"><i class="fa fa-pencil"></i> Editar</button>';

        
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