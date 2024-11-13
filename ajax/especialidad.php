<?php  

	require_once("../config/conexion.php");
	require_once("../modelos/Especialidades.php");

	$especialidades = new Especialidad();

	$id_especialidad=isset($_POST["id_especialidad"]);
	$especialidad=isset($_POST["especialidad"]);

	switch($_GET["op"]){

		case 'guardaryeditar':

            $datos = $especialidades->get_nombre_especialidad($_POST["especialidad"]);

            if(empty($_POST["id_especialidad"])){

            	if(is_array($datos)==true and count($datos)==0){

            		$especialidades->registrar_especialidad($especialidad);

                    $messages[]="La especialidad se registró correctamente";


            	} else {

                    $errors[]="La especialidad ya existe";

            	}

            }
            else {

            	$especialidades->editar_especialidad($id_especialidad, $especialidad);

                $messages[]="La especialidad se editó correctamente";

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

			$datos=$especialidades->get_especialidad_por_id($_POST["id_especialidad"]);

			if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					$output["id_especialidad"] = $row["id_especialidad"];
					$output["especialidad"] = $row["nombre"];

				}

				echo json_encode($output);

			} else {

                $errors[]="La especialidad no existe";

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

			$datos=$especialidades->get_especialidades();

 	 		$data= Array();

     		foreach($datos as $row){

				$sub_array = array();

				$sub_array[] = $row["nombre"];

				$sub_array[] = '<button type="button" onClick="mostrar('.$row["id_especialidad"].');"  id="'.$row["id_especialidad"].'" class="btn btn-warning btn-md update"><i class="fa fa-pencil"></i> Editar</button>';


                
                

        
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