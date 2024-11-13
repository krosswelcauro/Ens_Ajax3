
var tabla;

var tabla_en_consulta;


//Función que se ejecuta al inicio
function init(){

	listar();

	listar_en_consulta();


	//cuando se da click al boton submit entonces se ejecuta la funcion guardaryeditar(e);
	$("#acompanante_form").on("submit",function(e)
	{

		guardaryeditar(e);	
	})

	 //cambia el titulo de la ventana modal cuando se da click al boton
	$("#add_button").click(function(){
			
			$(".modal-title").text("Agregar Acompañante");
		
	  });
}

//funcion que limpia los campos del formulario
function limpiar(){

   	$("#cedula_acompanante").val("");
   	$("#nacionalidad").val("");
   	$('#nombre_acompanante').val("");
	$('#apellido_acompanante').val("");
	$('#codigo_cell').val("");
	$('#telefono_acompanante').val("");
	$('#direccion_acompanante').val("");
	$('#relacion').val("");
	$('#id_acompanante').val("");
}

//function listar 
function listar(){

    	tabla=$('#acompanante_data').dataTable({

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
					url: '../ajax/acompanante.php?op=listar',
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
function mostrar(id_acompanante){

     $.post("../ajax/acompanante.php?op=mostrar",{id_acompanante : id_acompanante}, function(data, status)
	
		{ 

         data = JSON.parse(data);

                $("#acompananteModal").modal("show");
                $("#cedula_acompanante").val(data.cedula_acompanante);
                $("#nacionalidad").val(data.nacionalidad);
                $('#nombre_acompanante').val(data.nombre_acompanante);
				$('#apellido_acompanante').val(data.apellido_acompanante);
				$('#direccion_acompanante').val(data.direccion_acompanante);
				$('#codigo_cell').val(data.codigo_cell);
				$('#telefono_acompanante').val(data.telefono_acompanante);
				$('#relacion').val(data.relacion);
				
				$('.modal-title').text("Editar Acompañante");
				$('#id_acompanante').val(id_acompanante);
				$('#action').val("Edit");


		});

}


//la funcion guardaryeditar(e); se llama cuando se da click al boton submit  
function guardaryeditar(e){

      	e.preventDefault(); //No se activará la acción predeterminada del evento
      	var formData = new FormData($("#acompanante_form")[0]);

      	  /*var password1= $("#password1").val();
	      var password2= $("#password2").val();*/
            
               $.ajax({

               	    url: "../ajax/acompanante.php?op=guardaryeditar",
				    type: "POST",
				    data: formData,
				    contentType: false,
				    processData: false,

				    success: function(datos){

				    	console.log(datos);

				    	$('#acompanante_form')[0].reset();
						$('#acompananteModal').modal('hide');

						$('#resultados_ajax').html(datos);
						$('#acompanante_data').DataTable().ajax.reload();
				
                        limpiar();
   						$("#cedula_acom").val("");


				    }
               });

}

//Función Listar
function listar_en_consulta(){

	tabla_en_consulta=$('#acompanantes_data').dataTable(
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
					url: '../ajax/acompanante.php?op=listar_en_consulta',
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

//AUTOCOMPLETAR DATOS DEL ACOMPANANTE EN CONSULTA
	

	 	function agregar_registro(id_acompanante){

      
		$.ajax({
			url:"../ajax/acompanante.php?op=buscar_acompanante",
			method:"POST",
			data:{id_acompanante:id_acompanante},
			dataType:"json",
			success:function(data)
			{
               
             
            /*si el proveedor esta activo entonces se ejecuta, de lo contrario 
            el formulario no se envia y aparecerá un mensaje */
            // if(data.estado){

				$('#modalAcompanante').modal('hide');
				$('#cedula_acompanante').val(data.cedula_acompanante);
				$('#nacionalidad').val(data.nacionalidad);
				$('#nombre_acompanante').val(data.nombre_acompanante);
				$('#apellido_acompanante').val(data.apellido_acompanante);
				$('#direccion_acompanante').val(data.direccion_acompanante);
				$('#codigo_cell').val(data.codigo_cell);
				$('#telefono_acompanante').val(data.telefono_acompanante);
				$('#id_acompanante').val(data.id_acompanante);


				
				
				$('#id_acompanante').val(id_acompanante);
				

			}
		})
	
    }


init();