
var tabla_en_informes;
 
 //Función que se ejecuta al inicio
  function init(){

	listar_consulta_en_informe();
      //cuando se da click al boton submit entonces se ejecuta la funcion guardaryeditar(e);
	$("#informes").on("submit",function(e)
	{
		guardaryeditar(e);	
	})

  }

  //funcion que limpia los campos del formulario

   function limpiar(){

   	$("#id_aspectos_evaluar").val("");
   	$("#nombre_asp").val("");
   	$('#descripcion_asp').val("");
	$('#n_consulta').val("");
	$('#observacion_terapeuta').val("");
	$('#valoracion').val("");
	$('#tratamientoMed').val("");
	$('#observacion').val("");
	$('#anio').val("");
	$('#mes').val("");
	$('#id_enfermedad').val("");
	$('#dia').val("");
	$('#hora').val("");
	$('#id_paciente').val("");
	$('#id_terapeuta').val("");

	$('#reforzamiento').val("");
	$('#id_terapia').val("");
	$('#actividad_hogar').val("");

   }


   function registrarInformes(){
    
    var id_aspectos_evaluar = $("#id_aspectos_evaluar").val();
    var nombre_asp = $("#nombre_asp").val();
    var descripcion_asp = $("#descripcion_asp").val();
    var n_consulta = $("#n_consulta").val();
    var observacion_terapeuta = $("#observacion_terapeuta").val();
    var valoracion = $("#valoracion").val();
    var tratamientoMed = $("#tratamientoMed").val();
    var observacion = $("#observacion").val();
    var anio = $("#anio").val();
    var mes = $("#mes").val();
    var id_enfermedad = $("#id_enfermedad").val();
    var dia = $("#dia").val();
    var hora = $("#hora").val();
    var id_paciente = $("#id_paciente").val();
    var id_terapeuta = $("#id_terapeuta").val();

    var actividad_hogar = $("#actividad_hogar").val();
    var reforzamiento = $("#reforzamiento").val();
    var id_terapia = $("#id_terapia").val();




    if(nombre_asp!="" && descripcion_asp!="" && n_consulta!="" && observacion_terapeuta!="" && observacion!="" && valoracion!="" && tratamientoMed!=""){


    $.ajax({
		url:"../ajax/consulta.php?op=registrar_informe",
		method:"POST",
		data:{'id_aspectos_evaluar':id_aspectos_evaluar,'nombre_asp':nombre_asp,'descripcion_asp':descripcion_asp,'n_consulta':n_consulta,'observacion_terapeuta':observacion_terapeuta,'valoracion':valoracion,'tratamientoMed':tratamientoMed,'observacion':observacion,'anio':anio,'mes':mes,'id_enfermedad':id_enfermedad,'dia':dia,'hora':hora,'id_paciente':id_paciente,'id_terapeuta':id_terapeuta, 'reforzamiento':reforzamiento, 'actividad_hogar':actividad_hogar, 'id_terapia':id_terapia,},
		cache: false,
		dataType:"html",
		error:function(x,y,z){
			console.log(x);
			console.log(y);
			console.log(z);
		},
        
		success:function(data){
			
			console.log(data);

		
		    var id_aspectos_evaluar = $("#id_aspectos_evaluar").val("");
		    var nombre_asp = $("#nombre_asp").val("");
		    var descripcion_asp = $("#descripcion_asp").val("");
		    var n_consulta = $("#n_consulta").val("");
		    var observacion_terapeuta = $("#observacion_terapeuta").val("");
		    var valoracion = $("#valoracion").val("");
		    var tratamientoMed = $("#tratamientoMed").val("");
		    var observacion = $("#observacion").val("");
		    var anio = $("#anio").val("");
		    var mes = $("#mes").val("");
		    var dia = $("#dia").val("");
		    var hora = $("#hora").val("");
		    var id_paciente = $("#id_paciente").val("");
		    var id_terapeuta = $("#id_terapeuta").val("");

		    var actividad_hogar = $("#actividad_hogar").val();
    		var reforzamiento = $("#reforzamiento").val();
    		var id_terapia = $("#id_terapia").val();




          
          setTimeout ("bootbox.alert('Se ha registrado la consulta con éxito');", 100); 
          
          setTimeout ("explode();", 2000); 

         	
		}


	});	


	 } else{

	 	 bootbox.alert("Debe agregar un paciente, un acompañante y los campos nombre_asp, descripcion_asp, n_consulta, observacion_terapeuta y un teraputa");
	 	 return false;
	 } 	
	
  }



    function listar_consulta_en_informe(){

	tabla_en_informes=$('#lista_consulta_data').dataTable(
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
					url: '../ajax/consulta.php?op=listar_consulta_en_informe',
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
	

/*RESFRESCA LA PAGINA DESPUES DE REGISTRAR LA COMPRA*/
       function explode(){

	    location.reload();
	}
 

  init();

 




