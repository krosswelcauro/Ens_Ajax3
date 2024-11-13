
 var tabla;

 //Función que se ejecuta al inicio
function init(){
	
	listar();

	 //cuando se da click al boton submit entonces se ejecuta la funcion guardaryeditar(e);
	$("#terapeuta_form").on("submit",function(e)
	{

		guardaryeditar(e);	
	})
    
    //cambia el titulo de la ventana modal cuando se da click al boton
	$("#add_button").click(function(){
			
			$(".modal-title").text("Agregar Terapeuta");
		
	  });

	
}


//Función limpiar
function limpiar()
{
	$("#id_terapeuta").val("");
	$('#cedula_terapeuta').val("");
	$('#nombre').val("");
	$('#apellido').val("");
	$('#direccion').val("");
	$('#codigo_cell').val("");
	$('#telefono').val("");
	$('#correo').val("");
	$('#descripcion').val("");
	$('#especialidad').val("");
	$('#producto_imagen').val("");

}

//Función Listar
function listar()
{
	tabla=$('#terapeuta_data').dataTable(
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
					url: '../ajax/terapeuta.php?op=listar',
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

 //Mostrar datos del producto en la ventana modal 
function mostrar(id_terapeuta)
{
	$.post("../ajax/terapeuta.php?op=mostrar",{id_terapeuta : id_terapeuta}, function(data, status)
	{
		data = JSON.parse(data);

		 //alert(data.cedula);
		
			
				$('#terapeutaModal').modal("show");
                $('#cedula_terapeuta').val(data.cedula_terapeuta);
                $('#nombre').val(data.nombre);
                $('#apellido').val(data.apellido);
                $('#direccion').val(data.direccion);
                $('#codigo_cell').val(data.codigo_cell);
                $('#telefono').val(data.telefono);
                $('#correo').val(data.email);
                $('#descripcion').val(data.descripcion);
                $('#especialidad').val(data.especialidad);
				$('#producto_uploaded_image').html(data.producto_imagen);
                
				
				$('.modal-title').text("Editar Terapeuta");
				$('#id_terapeuta').val(id_terapeuta);
				$('#resultados_ajax').html(data);
				//$("#producto_data").DataTable().ajax.reload();
				
				//$('#action').val("Edit");
				
				
		});
        
        
	}


//la funcion guardaryeditar(e); se llama cuando se da click al boton submit
function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	var formData = new FormData($("#terapeuta_form")[0]);


		$.ajax({
			url: "../ajax/terapeuta.php?op=guardaryeditar",
		    type: "POST",
		    data: formData,
		    contentType: false,
		    processData: false,

		    success: function(datos)
		    {                    
		        
		         console.log(datos);

	            $('#terapeuta_form')[0].reset();
				$('#terapeutaModal').modal('hide');

				$('#resultados_ajax').html(datos);
				$('#terapeuta_data').DataTable().ajax.reload();
				
                limpiar();
					
		    }

		});
       
}


init();