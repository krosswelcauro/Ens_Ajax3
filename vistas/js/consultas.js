
var tabla;

var tabla_en_consultas;

var tabla_consultas_mes;


 
 //Función que se ejecuta al inicio
  function init(){

      listar();

      //cuando se da click al boton submit entonces se ejecuta la funcion guardaryeditar(e);
	$("#form-register").on("submit",function(e)
	{
		guardaryeditar(e);	
	})

  }

  //funcion que limpia los campos del formulario

   function limpiar(){

   	$("#motivo").val("");
   	$('#explicacion').val("");
	$('#instensidad').val("");
	$('#escala').val("");
	$('#id_paciente').val("");
	$('#id_acompanante').val("");
	$('#id_terapeuta').val("");
	$('#cierre').val("");
   }


   function agregar_registro_consulta(id_consulta){

      
		$.ajax({
			url:"../ajax/consulta.php?op=buscar_consulta",
			method:"POST",
			data:{id_consulta:id_consulta},
			dataType:"json",
			success:function(data)
			{

				$('#modalConsulta').modal('hide');
				$('#n_consulta').val(data.n_consulta);
				$('#fecha_hora').val(data.fecha_hora);
				$('#id_paciente').val(data.id_paciente);
				$('#id_terapeuta').val(data.id_terapeuta);
				$('#motivo').val(data.motivo);
				$('#id_consulta').val(data.id_consulta);

				$('#id_consulta').val(id_consulta);

			}
		})
	
    }


    //function listar 

    function listar(){

    	tabla=$('#consulta_data').dataTable({

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
					url: '../ajax/consultas.php?op=listar',
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
    
     //Mostrar datos del consultas en la ventana modal del formulario 

     function mostrar(n_consultas){

     $.post("../ajax/consultas.php?op=mostrar",{n_consultas : n_consultas}, function(data, status)
	
		{ 

         data = JSON.parse(data);

                $("#consultasModal").modal("show");
                $("#n_consultas").val(data.n_consultas);
                $('#motivo').val(data.motivo);
				$('#expliacion').val(data.expliacion);
				$('#instensidad').val(data.instensidad);
				$('#escala').val(data.escala);
				$('#id_paciente').val(data.id_paciente);
				$('#id_acompanante').val(data.id_acompanante);
				$('#id_terapeuta').val(data.id_terapeuta);
				$('#cierre').val(data.cierre);
				$('.modal-title').text("Editar consultas");
				$('#n_consultas').val(n_consultas);
				$('#action').val("Edit");


		});

   }

       function cambiarEstado(id_consulta,cierre){
            
        bootbox.confirm("¿Está Seguro de cambiar de estado?", function(result){
		if(result)
		{
           
           $.ajax({
				url:"../ajax/consulta.php?op=activarydesactivar",
				 method:"POST",
				
				data:{id_consulta:id_consulta, cierre:cierre},
				
				success: function(data){
                 
                  explode();
			    
			    }

			});


       }

		 });//bootbox

       } 


           $(document).on("click","#btn_consulta_fecha", function(){


           	var fecha_inicial= $("#datepicker").val();
           	var fecha_final= $("#datepicker2").val();


        if(fecha_inicial!="" && fecha_final!=""){

	      tabla_en_consultas= $('#consultas_fecha_data').DataTable({

	    
	       "aProcessing": true,//Activamos el procesamiento del datatables
	       "aServerSide": true,//Paginación y filtrado realizados por el servidor
	      dom: 'Bfrtip',//Definimos los elementos del control de tabla
	      buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],

	         "ajax":{
	            url:"../ajax/consulta.php?op=buscar_consultas_fecha",
                type : "post",
				//dataType : "json",
				data:{fecha_inicial:fecha_inicial,fecha_final:fecha_final},						
				error: function(e){
					console.log(e.responseText);

				},

	          
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
			 
			    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			 
			    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			 
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

			   }, 
	      });
	        }
	    });



        $(document).on("click","#btn_consulta_fecha_mes", function(){

           	var mes= $("#mes").val();
           	var ano= $("#ano").val();


        if(mes!="" && ano!=""){

	      var tabla_consultas_mes= $('#consultas_fecha_mes_data').DataTable({
	        
	       "aProcessing": true,//Activamos el procesamiento del datatables
	       "aServerSide": true,//Paginación y filtrado realizados por el servidor
	      dom: 'Bfrtip',//Definimos los elementos del control de tabla
	      buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],

	         "ajax":{
	            url:"../ajax/consulta.php?op=buscar_consultas_fecha_mes",
                type : "post",
				//dataType : "json",
				data:{mes:mes,ano:ano},						
				error: function(e){
					console.log(e.responseText);

				},

	          
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
			 
			    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			 
			    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			 
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

			   }, 
	      });

	        }

	    });


	 $(document).on('click', '.detalle', function(){

		var n_consulta = $(this).attr("id");

		$.ajax({
			url:"../ajax/consulta.php?op=ver_detalle_consulta",
			method:"POST",
			data:{n_consulta:n_consulta},
			cache:false,
			//dataType:"json",
			success:function(data)
			{
				$("#detalles").html(data);

			}
		})
	});

	 $(document).on('click', '.detalle', function(){
	 	//toma el valor del id
		var n_consulta = $(this).attr("id");

		$.ajax({
			url:"../ajax/consulta.php?op=ver_detalle_historial_consulta",
			method:"POST",
			data:{n_consulta:n_consulta},
			cache:false,
			dataType:"json",
			success:function(data)
			{
				$("#n_consulta").html(data.n_consulta);
				$("#tratamientoMed").html(data.tratamientoMed);
				$("#observacion").html(data.observacion);
				$("#ano").html(data.ano);
				$("#mes").html(data.mes);
                 
			}
		})
	});


       function explode(){

	    location.reload();
	}

  init();


 




