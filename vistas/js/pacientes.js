
var tabla;

var tabla_en_consulta;


//Función que se ejecuta al inicio
function init(){

	listar();

	listar_en_consulta();

	//cuando se da click al boton submit entonces se ejecuta la funcion guardaryeditar(e);
	$("#paciente_form").on("submit",function(e)
	{

		guardaryeditar(e);	
	})

	 //cambia el titulo de la ventana modal cuando se da click al boton
	$("#add_button").click(function(){
			
			$(".modal-title").text("Agregar Paciente");
		
	  });

}

//funcion que limpia los campos del formulario
function limpiar(){

   	$("#nacionalidad").val("");
   	$("#cedula_paciente").val("");
   	$('#nombre_paciente').val("");
	$('#apellido_paciente').val("");
	$('#direccion_paciente').val("");
	$('#codigo_cell').val("");
	$('#telefono_paciente').val("");
	$('#sexo_paciente_paciente').val("");
	$('#fecha_nac').val("");
	$('#lugar_nac').val("");
	$('#con_quien_vive').val("");
	$('#lateralidad_biologica').val("");
	$('#hobbie').val("");
	$('#ciudad').val("");
	$('#id_religion').val("");
	$('#id_oficio').val("");
	$('#id_trabajo').val("");

	$('#id_paciente').val("");
}

//function listar 
function listar(){

    	tabla=$('#paciente_data').dataTable({

    	"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],

		"ajax":

		   {
					url: '../ajax/paciente.php?op=listar',
					type : "post",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
			},

	    "bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 10,//Por cada 10 registros hace una paginación
	    "order": [[ 0, "desc" ]],//Ordenar (columna,orden)

	    "language": {
 
			    "sProcessing":     "Procesando...",
			 
			    "sLengthMenu":     "Mostrar _MENU_ registros",
			 
			    "sZeroRecords":    "No se encontraron resultados",
			 
			    "sEmptyTable":     "Ningún dato disponible en esta tabla",
			 
			    "sInfo":           "Mostrando un total de _TOTAL_ registros",
			 
			    "sInfoEmpty":      "Mostrando un total de 0 registros",
			 
			    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			 
			    "sInfoPostFix":    "",
			 
			    "sSearch":         "Buscar:",
			 
			    "sUrl":            "",
			 
			    "sInfoThousands":  ",",
			 
			    "sLoadingRecords": "Cargando...",
			 
			    "oPaginate": {
			 
			        "sFirst":    "Primero",
			 
			        "sLast":     "Último",
			 
			        "sNext":     "Siguiente",
			 
			        "sPrevious": "Anterior"
			 
			    },
			 
			    "oAria": {
			 
			        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			 
			        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			 
			    }

			   }//cerrando language




    	}).DataTable();
}

//Mostrar datos del acompañante en la ventana modal del formulario 
function mostrar(cedula_pac){

     $.post("../ajax/paciente.php?op=mostrar",{cedula_pac : cedula_pac}, function(data, status)
	
		{ 

         data = JSON.parse(data);

                $("#pacienteModal").modal("show");
                $("#nacionalidad").val(data.nacionalidad);
                $("#cedula_paciente").val(cedula_pac);
                $('#nombre_paciente').val(data.nombre_paciente);
				$('#apellido_paciente').val(data.apellido_paciente);
				$('#direccion_paciente').val(data.direccion_paciente);
				$('#codigo_cell').val(data.codigo_cell);
				$('#telefono_paciente').val(data.telefono_paciente);
				$('#sexo_paciente').val(data.sexo_paciente);
				$('#fecha_nac').val(data.fecha_nac);
				$('#lugar_nac').val(data.lugar_nac);
				$('#con_quien_vive').val(data.con_quien_vive);
				$('#lateralidad_biologica').val(data.lateralidad_biologica);
				$('#hobbie').val(data.hobbie);
				$('#ciudad').val(data.ciudad);
				$('#religion').val(data.religion);
				$('#oficio').val(data.oficio);
				$('#trabajo').val(data.trabajo);

				
				$('.modal-title').text("Editar Paciente");
				$('#cedula_pac').val(cedula_pac);
				$('#action').val("Edit");


		});

}


//la funcion guardaryeditar(e); se llama cuando se da click al boton submit  
function guardaryeditar(e){

      	e.preventDefault(); //No se activará la acción predeterminada del evento
      	var formData = new FormData($("#paciente_form")[0]);

      	  /*var password1= $("#password1").val();
	      var password2= $("#password2").val();*/
            
               $.ajax({

               	    url: "../ajax/paciente.php?op=guardaryeditar",
				    type: "POST",
				    data: formData,
				    contentType: false,
				    processData: false,

				    success: function(datos){

				    	console.log(datos);

				    	$('#paciente_form')[0].reset();
						$('#pacienteModal').modal('hide');

						$('#resultados_ajax').html(datos);
						$('#paciente_data').DataTable().ajax.reload();
				
                        limpiar();

				    }
               });

}

  //Función Listar
function listar_en_consulta(){

	tabla_en_consulta=$('#pacientes_data').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/paciente.php?op=listar_en_consulta',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 10,//Por cada 10 registros hace una paginación
	    "order": [[ 0, "desc" ]],//Ordenar (columna,orden)
	    
	    "language": {
 
			    "sProcessing":     "Procesando...",
			 
			    "sLengthMenu":     "Mostrar _MENU_ registros",
			 
			    "sZeroRecords":    "No se encontraron resultados",
			 
			    "sEmptyTable":     "Ningún dato disponible en esta tabla",
			 
			    "sInfo":           "Mostrando un total de _TOTAL_ registros",
			 
			    "sInfoEmpty":      "Mostrando un total de 0 registros",
			 
			    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			 
			    "sInfoPostFix":    "",
			 
			    "sSearch":         "Buscar:",
			 
			    "sUrl":            "",
			 
			    "sInfoThousands":  ",",
			 
			    "sLoadingRecords": "Cargando...",
			 
			    "oPaginate": {
			 
			        "sFirst":    "Primero",
			 
			        "sLast":     "Último",
			 
			        "sNext":     "Siguiente",
			 
			        "sPrevious": "Anterior"
			 
			    },
			 
			    "oAria": {
			 
			        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			 
			        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			 
			    }

			   }//cerrando language
	       
	}).DataTable();
}

//AUTOCOMPLETAR DATOS DEL PACIENTE EN CONSULTA
	

	 	function agregar_registro_paciente(id_paciente){

      
		$.ajax({
			url:"../ajax/paciente.php?op=buscar_paciente",
			method:"POST",
			data:{id_paciente:id_paciente},
			dataType:"json",
			success:function(data)
			{
               console.log(data);
             
            /*si el proveedor esta activo entonces se ejecuta, de lo contrario 
            el formulario no se envia y aparecerá un mensaje */
            // if(data.estado){

				$('#modalPaciente').modal('hide');
				$('#cedula_paciente').val(data.cedula_paciente);
				$('#nombre_paciente').val(data.nombre_paciente);
				$('#apellido_paciente').val(data.apellido_paciente);
				$('#direccion_paciente').val(data.direccion_paciente);
				$('#id_paciente').val(data.id_paciente);


				
				
				$('#id_paciente').val(id_paciente);
				

            // } else{
                
                // bootbox.alert(data.error);
              	


             // } //cierre condicional error

                        
				
			}
		})
	
    }


    function registrarConsulta(){
    
    var n_consulta = $("#n_consulta").val();
    var motivo = $("#motivo").val();
    var explicacion = $("#explicacion").val();
    var intensidad = $("#intensidad").val();
    var escala = $("#escala").val();
    var id_paciente = $("#id_paciente").val();
    var id_acompanante = $("#id_acompanante").val();
    var id_terapeuta = $("#id_terapeuta").val();
    var cierre = $("#cierre").val();



    if(motivo!="" && explicacion!="" && intensidad!="" && escala!="" && id_terapeuta!="" && id_paciente!="" && id_acompanante!=""){


    $.ajax({
		url:"../ajax/paciente.php?op=registrar_consulta",
		method:"POST",
		data:{'n_consulta':n_consulta,'motivo':motivo,'explicacion':explicacion,'intensidad':intensidad,'escala':escala,'id_paciente':id_paciente,'id_acompanante':id_acompanante,'id_terapeuta':id_terapeuta,'cierre':cierre},
		cache: false,
		dataType:"html",
		error:function(x,y,z){
			console.log(x);
			console.log(y);
			console.log(z);
		},
        
		success:function(data){
			
			console.log(data);

		
		    var n_consulta = $("#n_consulta").val("");
		    var motivo = $("#motivo").val("");
		    var explicacion = $("#explicacion").val("");
		    var intensidad = $("#intensidad").val("");
		    var escala = $("#escala").val("");
		    var id_paciente = $("#id_paciente").val("");
		    var id_acompanante = $("#id_acompanante").val("");
		    var id_terapeuta = $("#id_terapeuta").val("");
		    var cierre = $("#cierre").val("");

          
          setTimeout ("bootbox.alert('Se ha registrado la consulta con éxito');", 100); 
          
          setTimeout ("explode();", 2000); 

         	
		}


	});	

	 //cierre del condicional de validacion de los campos del producto,proveedor,pago

	 } else{

	 	 bootbox.alert("Debe agregar un paciente, un acompañante y los campos motivo, explicacion, intensidad, escala y un teraputa");
	 	 return false;
	 } 	
	
  }


 	/*RESFRESCA LA PAGINA DESPUES DE REGISTRAR LA COMPRA*/
       function explode(){

	    location.reload();
	}



init();