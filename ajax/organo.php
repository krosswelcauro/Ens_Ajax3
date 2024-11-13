<?php  

	require_once("../config/conexion.php");
	require_once("../modelos/Organos.php");

	$organos = new Organo();

	$id_organo=isset($_POST["id_organo"]);
	$id_dicc=isset($_POST["id_dicc"]);
	$id_enfermedad=isset($_POST["id_enfermedad"]);
	$nombre=isset($_POST["nombre"]);
   	$imagen = isset($_POST["hidden_producto_imagen"]);



	switch($_GET["op"]){

		case 'guardaryeditar':

            $datos = $organos->get_nombre_organo($_POST["nombre"]);

            if(empty($_POST["id_organo"])){

            	if(is_array($datos)==true and count($datos)==0){

            		$organos->registrar_organo($id_dicc,$id_enfermedad,$nombre);

                    $messages[]="El organo se registró correctamente";


            	} else {

                    $errors[]="El organo ya esta registrado";

            	}

            }
            else if ($datos =! 0) {

            	$organos->editar_organo($id_dicc,$id_enfermedad,$nombre,$id_organo);

                $messages[]="El organo se editó correctamente";

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

			$datos=$organos->get_organo_por_id($_POST["id_organo"]);

			if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{

					$output["id_organo"] = $row["id_organo"];
					$output["nombre"] = $row["nombre"];
					$output["id_enfermedad"] = $row["id_enfermedad"];
					$output["id_dicc"] = $row["id_dicc"];

					if($row["laminaDes"] != '')
			          {
			            $output['producto_imagen'] = '<img src="../vistas/upload/organos/'.$row["laminaDes"].'" class="img-thumbnail" width="150" height="150" /><input type="hidden" name="hidden_producto_imagen" value="'.$row["laminaDes"].'" />';
			          }
			          else
			          {
			            $output['producto_imagen'] = '<input type="hidden" name="hidden_producto_imagen" value="" />';
			          }


			         if($row["laminaColor"] != '')
			          {
			            $output['producto_imagen'] = '<img src="../vistas/upload/organos/'.$row["laminaColor"].'" class="img-thumbnail" width="150" height="150" /><input type="hidden" name="hidden_producto_imagen" value="'.$row["laminaColor"].'" />';
			          }
			          else
			          {
			            $output['producto_imagen'] = '<input type="hidden" name="hidden_producto_imagen" value="" />';
			          }


			          if($row["laminaFoco"] != '')
			          {
			            $output['producto_imagen'] = '<img src="../vistas/upload/organos/'.$row["laminaFoco"].'" class="img-thumbnail" width="150" height="150" /><input type="hidden" name="hidden_producto_imagen" value="'.$row["laminaFoco"].'" />';
			          }
			          else
			          {
			            $output['producto_imagen'] = '<input type="hidden" name="hidden_producto_imagen" value="" />';
			          }



				}

				echo json_encode($output);

			} else {

                $errors[]="El organo no existe";

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

    		$datos=$organos->get_organos();

 	 		$data= Array();

     		foreach($datos as $row){

				$sub_array = array();

				$sub_array[] = $row["nombre"];
				$sub_array[] = $row["id_dicc"];
				$sub_array[] = $row["id_enfermedad"];

				if($row["laminaDes"] != '')
		          {
		           	$sub_array[] = '
		     		<img src="upload/organos/'.$row["laminaDes"].'" class="img-thumbnail" width="150" height="150" /><input type="hidden" name="hidden_producto_imagen" value="'.$row["laminaDes"].'" />
		            ';
		          }
		          else
		          {
		        	$sub_array[] = '<button type="button" id="" class="btn btn-primary btn-md"><i class="fa fa-picture-o" aria-hidden="true"></i> Sin imagen</button>';
		          }



		          if($row["laminaColor"] != '')
		          {
		           	$sub_array[] = '
		     		<img src="upload/organos/'.$row["laminaColor"].'" class="img-thumbnail" width="150" height="150" /><input type="hidden" name="hidden_producto_imagen" value="'.$row["laminaColor"].'" />
		            ';
		          }
		          else
		          {
		        	$sub_array[] = '<button type="button" id="" class="btn btn-primary btn-md"><i class="fa fa-picture-o" aria-hidden="true"></i> Sin imagen</button>';
		          }


		          if($row["laminaFoco"] != '')
		          {
		           	$sub_array[] = '
		     		<img src="upload/organos/'.$row["laminaFoco"].'" class="img-thumbnail" width="150" height="150" /><input type="hidden" name="hidden_producto_imagen" value="'.$row["laminaFoco"].'" />
		            ';
		          }
		          else
		          {
		        	$sub_array[] = '<button type="button" id="" class="btn btn-primary btn-md"><i class="fa fa-picture-o" aria-hidden="true"></i> Sin imagen</button>';
		          }




				$sub_array[] = '<button type="button" onClick="mostrar('.$row["id_organo"].');"  id="'.$row["id_organo"].'" class="btn btn-warning btn-md update"><i class="fa fa-pencil"></i> Editar</button>';


                

        
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