
var tabla;
 
 //Función que se ejecuta al inicio
  function init(){

      listar();

      //cuando se da click al boton submit entonces se ejecuta la funcion guardaryeditar(e);
	$("#capa_form").on("submit",function(e)
	{

		guardaryeditar(e);	
	})

	 //cambia el titulo de la ventana modal cuando se da click al boton
	$("#add_button").click(function(){
			
			$(".modal-title").text("Agregar Capa");
		
	  });

  }

  //funcion que limpia los campos del formulario

   function limpiar(){

   	$("#capa").val("");
	$('#lamina').val("");
   }

    //function listar 

    function listar(){

    	tabla=$('#capa_data').dataTable({

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
					url: '../ajax/capa.php?op=listar',
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
    
     //Mostrar datos del capa en la ventana modal del formulario 

     function mostrar(id_capa){

     $.post("../ajax/capa.php?op=mostrar",{id_capa : id_capa}, function(data, status)
	
		{ 

         data = JSON.parse(data);

                $("#capaModal").modal("show");
                $("#capa").val(data.capa);
                $('#lamina').html(data.lamina);
				$('.modal-title').text("Editar capa");
				$('#id_capa').val(id_capa);				
				$('#action').val("Edit");


		});

   }

    //la funcion guardaryeditar(e); se llama cuando se da click al boton submit  
      
      function guardaryeditar(e){

      	e.preventDefault(); //No se activará la acción predeterminada del evento
      	var formData = new FormData($("#capa_form")[0]);



               $.ajax({

               	    url: "../ajax/capa.php?op=guardaryeditar",
				    type: "POST",
				    data: formData,
				    contentType: false,
				    processData: false,

				    success: function(datos){

				    	console.log(datos);

				    	$('#capa_form')[0].reset();
						$('#capaModal').modal('hide');

						$('#resultados_ajax').html(datos);
						$('#capa_data').DataTable().ajax.reload();
				
                        limpiar();

				    }
               });

	         } 

      

  init();

 




