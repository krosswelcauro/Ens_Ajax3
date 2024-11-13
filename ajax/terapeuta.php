<?php  

	require_once("../config/conexion.php");
	require_once("../modelos/Terapeutas.php");

	$terapeutas = new Terapeuta();

	$id_terapeuta=isset($_POST["id_terapeuta"]);
	$cedula_ter=isset($_POST["cedula_ter"]);
	$cedula_terapeuta=isset($_POST["cedula_terapeuta"]);
	$nombre=isset($_POST["nombre"]);
	$apellido=isset($_POST["apellido"]);
	$direccion=isset($_POST["direccion"]);
	$codigo_cell=isset($_POST["codigo_cell"]);
	$telefono=isset($_POST["telefono"]);
	$correo=isset($_POST["correo"]);
	$descripcion=isset($_POST["descripcion"]);
	$id_especialidad=isset($_POST["especialidad"]);
   	$imagen = isset($_POST["hidden_producto_imagen"]);



	switch($_GET["op"]){

		case 'guardaryeditar':

            $datos = $terapeutas->get_cedula_terapeuta($_POST["cedula_terapeuta"]);

            if(empty($_POST["id_terapeuta"])){

            	if(is_array($datos)==true and count($datos)==0){

            		$terapeutas->registrar_terapeuta($cedula_terapeuta,$nombre,$apellido,$direccion,$codigo_cell,$telefono,$correo,$descripcion,$id_especialidad,$imagen);

                    $messages[]="El terapeuta se registró correctamente";


            	} else {

                    $errors[]="El terapeuta ya existe";

            	}

            }
            else if ($datos =! 0) {

            	$terapeutas->editar_terapeuta($id_terapeuta,$cedula_terapeuta,$nombre,$apellido,$direccion,$codigo_cell,$telefono,$correo,$descripcion,$id_especialidad,$imagen);

                $messages[]="El terapeuta se editó correctamente";

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

			$datos=$terapeutas->get_terapeuta_por_id($_POST["id_terapeuta"]);

			if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{

					$output["id_terapeuta"] = $row["id_terapeuta"];
					$output["cedula_terapeuta"] = $row["cedula_terapeuta"];
					$output["nombre"] = $row["nombre"];
					$output["apellido"] = $row["apellido"];
					$output["direccion"] = $row["direccion"];
					$output["codigo_cell"] = $row["codigo_cell"];
					$output["telefono"] = $row["telefono"];
					$output["email"] = $row["correo"];
					$output["descripcion"] = $row["descripcion"];

					$output["especialidad"] = $row["id_especialidad"];
					if($row["imagen"] != '')
			          {
			            $output['producto_imagen'] = '<img src="../vistas/upload/terapeutas/'.$row["imagen"].'" class="img-thumbnail" width="150" height="150" /><input type="hidden" name="hidden_producto_imagen" value="'.$row["imagen"].'" />';
			          }
			          else
			          {
			            $output['producto_imagen'] = '<input type="hidden" name="hidden_producto_imagen" value="" />';
			          }

				}

				echo json_encode($output);

			} else {

                $errors[]="El terapeuta no existe";

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

    		$datos=$terapeutas->get_terapeutas();

 	 		$data= Array();

     		foreach($datos as $row){

				$sub_array = array();

				$sub_array[] = $row["cedula_terapeuta"];
				$sub_array[] = $row["nombre"];
				$sub_array[] = $row["apellido"];
				$sub_array[] = $row["direccion"];
				$sub_array[] = $row["codigo_cell"];
				$sub_array[] = $row["telefono"];
				$sub_array[] = $row["correo"];
				$sub_array[] = $row["descripcion"];
				$sub_array[] = $row["especialidad"];

				$sub_array[] = '<button type="button" onClick="mostrar('.$row["id_terapeuta"].');"  id="'.$row["id_terapeuta"].'" class="btn btn-warning btn-md update"><i class="fa fa-pencil"></i> Editar</button>';

                if($row["imagen"] != '')
		          {
		           	$sub_array[] = '
		     		<img src="upload/terapeutas/'.$row["imagen"].'" class="img-thumbnail" width="150" height="150" /><input type="hidden" name="hidden_producto_imagen" value="'.$row["imagen"].'" />
		            ';
		          }
		          else
		          {
		        	$sub_array[] = '<button type="button" id="" class="btn btn-primary btn-md"><i class="fa fa-picture-o" aria-hidden="true"></i> Sin imagen</button>';
		          }
                

        
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