 var tabla;

function init(){
	
	listar();

	 //cuando se da click al boton submit entonces se ejecuta la funcion guardaryeditar(e);
	$("#terapia_form").on("submit",function(e)
	{

		guardaryeditar(e);	
	})
    
    //cambia el titulo de la ventana modal cuando se da click al boton
	$("#add_button").click(function(){
			
			$(".modal-title").text("Agregar Terapia");
		
	  });

	
}

//Función limpiar
function limpiar()
{
	
    $("#id_terapia").val("");
	$('#terapia').val("");
	$('#descripcion').val("");
	$('#costo_refe').val("");
    
}

//Función Listar
function listar()
{
	tabla=$('#terapia_data').dataTable(
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
					url: '../ajax/terapia.php?op=listar',
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
function mostrar(id_terapia)
{
	$.post("../ajax/terapia.php?op=mostrar",{id_terapia : id_terapia}, function(data, status)
	{
		data = JSON.parse(data);

		 //alert(data.cedula);
		
			
				$('#terapiaModal').modal("show");
                $('#terapia').val(data.terapia);
                $('#descripcion').val(data.descripcion);
                $('#costo_refe').val(data.costo_refe);
				
				$('.modal-title').text("Editar Terapia");
				$('#id_terapia').val(id_terapia);
				$('#resultados_ajax').html(data);
				
								
		});
        
        
	}


//la funcion guardaryeditar(e); se llama cuando se da click al boton submit
function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	var formData = new FormData($("#terapia_form")[0]);


		$.ajax({
			url: "../ajax/terapia.php?op=guardaryeditar",
		    type: "POST",
		    data: formData,
		    contentType: false,
		    processData: false,

		    success: function(datos)
		    {                    
		          /*bootbox.alert(datos);	          
		          mostrarform(false);
		          tabla.ajax.reload();*/

		         //alert(datos);
                 
                 /*imprimir consulta en la consola debes hacer un print_r($_POST) al final del metodo 
                    y si se muestran los valores es que esta bien, y se puede imprimir la consulta desde el metodo
                    y se puede ver en la consola o desde el mensaje de alerta luego pegar la consulta en phpmyadmin*/
		         console.log(datos);

	            $('#terapia_form')[0].reset();
				$('#terapiaModal').modal('hide');

				$('#resultados_ajax').html(datos);
				$('#terapia_data').DataTable().ajax.reload();
				
                limpiar();
					
		    }

		});
       
}

init();
