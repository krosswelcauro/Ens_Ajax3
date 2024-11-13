
var tabla;
 
 //Función que se ejecuta al inicio
  function init(){

      listar();

      //cuando se da click al boton submit entonces se ejecuta la funcion guardaryeditar(e);
	$("#organo_form").on("submit",function(e)
	{
		guardaryeditar(e);	
	})

  }

  //funcion que limpia los campos del formulario

   function limpiar(){

   	$("#nombre").val("");
   	$('#id_enfermedad').val("");
	$('#id_dicc').val("");
	$('#producto_imagen').val("");
   }

    //function listar 

    function listar(){

    	tabla=$('#organo_data').dataTable({

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
					url: '../ajax/organo.php?op=listar',
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
    
     //Mostrar datos del organo en la ventana modal del formulario 

     function mostrar(id_organo){

     $.post("../ajax/organo.php?op=mostrar",{id_organo : id_organo}, function(data, status)
	
		{ 

         data = JSON.parse(data);

                $("#organoModal").modal("show");
                $("#id_organo").val(data.id_organo);
                $('#nombre').val(data.nombre);
				$('#id_enfermedad').val(data.id_enfermedad);
				$('#id_dicc').val(data.id_dicc);
				$('.modal-title').text("Editar Organo");
				$('#id_organo').val(id_organo);
				$('#producto_uploaded_image').html(data.producto_imagen);
				$('#action').val("Edit");


		});

   }

      
      function guardaryeditar(e){

      	e.preventDefault();
      	var formData = new FormData($("#organo_form")[0]);


               $.ajax({

               	    url: "../ajax/organo.php?op=guardaryeditar",
				    type: "POST",
				    data: formData,
				    contentType: false,
				    processData: false,

				    success: function(datos){

				    	console.log(datos);

				    	$('#organo_form')[0].reset();
						$('#organoModal').modal('hide');

						$('#resultados_ajax').html(datos);
						$('#organo_data').DataTable().ajax.reload();
				
                        limpiar();

				    }
               });


      }


  init();

 




