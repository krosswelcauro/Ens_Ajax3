<?php

  require_once("../config/conexion.php");
  require_once("../modelos/Capa.php");


  $capas = new Capa();

   $id_capa = isset($_POST["id_capa"]);
   $capa=isset($_POST["capa"]);
   $imagen = isset($_POST["lamina"]);

     switch($_GET["op"]){

         case "guardaryeditar":

                 $datos = $capas->get_nombre_capa($_POST["capa"]);


	                     if(empty($_POST["id_capa"])){


	                     	   if(is_array($datos)==true and count($datos)==0){
                                
                                $capas->registrar_capa($id_capa, $capa,$imagen);

                                 $messages[]="La capa se registró correctamente";

	                     	   } else {

                                    $messages[]="La capa ya esta registada";

	                     	   }
                     
	                     } //cierre de la validacion empty

	                     else {

                             /*si ya existe entonces editamos el usuario*/

                            $capas->editar_capa($id_capa,$capa,$imagen);

                             $messages[]="La capa se modifico correctamente";
	                     }

                 //mensaje success
     if(isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
	 //fin success

      //mensaje error
         if(isset($errors)){
			
			?>
				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Error!</strong> 
						<?php
							foreach($errors as $error) {
									echo $error;
								}
							?>
				</div>
			<?php

			}

	 //fin mensaje error
         break;


         case "mostrar":

          $datos = $capas->get_capa_por_id($_POST["id_capa"]);

             if(is_array($datos)==true and count($datos)>0){

             	 foreach($datos as $row){
                      
                    $output["capa"] = $row["nombre"];
                    if($row["lamina"] != '')
          
          {
            $output['lamina'] = '<img src="../vistas/upload/laminas/'.$row["lamina"].'" class="img-thumbnail" width="150" height="150" /><input type="hidden" name="lamina" value="'.$row["lamina"].'" />';
          }
          else
          {
            $output['lamina'] = '<input type="hidden" name="lamina" value="" />';
          }

             	 }

             	 echo json_encode($output);

             } else {

                $errors[]="No hay datos en la tabla";

             }


	         //inicio de mensaje de error

				if(isset($errors)){
			
					?>
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Error!</strong> 
							<?php
								foreach($errors as $error) {
										echo $error;
									}
								?>
					</div>
					<?php
			      }

	        //fin de mensaje de error

         break;




         case "listar":
          
         $datos = $capas->get_capas();

         //declaramos el array

         $data = Array();


         foreach($datos as $row){

            
            $sub_array= array();

           date_default_timezone_set('America/Caracas');

  	       $sub_array[] = $row["nombre"];

           if($row["lamina"] != '')
            {
              $sub_array[] = '

              <img src="upload/laminas/'.$row["lamina"].'" class="img-thumbnail" width="150" height="150" /><input type="hidden" name="lamina" value="'.$row["lamina"].'" />
                    ';
                  }
                  else
                  {
                    
                $sub_array[] = '<button type="button" id="" class="btn btn-primary btn-md"><i class="fa fa-picture-o" aria-hidden="true"></i> Sin imagen</button>';
                  }


                $sub_array[] = '<button type="button" onClick="mostrar('.$row["id_capa"].');"  id="'.$row["id_capa"].'" class="btn btn-warning btn-md update"><i class="fa fa-pencil"></i> Editar</button>';


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