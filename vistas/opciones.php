<?php  
if ($_SESSION["cargo"] == 'Administrador') {                 
                  require_once("menu.php");
              }

              else if($_SESSION["cargo"] == 'Terapeuta'){
                 require_once("menu_terapeuta.php");
              } 

              else if($_SESSION["cargo"] == 'Asistente'){
                 require_once("menu_asistente.php");
              } 

              else if($_SESSION["cargo"] == 'Paciente'){
                 require_once("menu_paciente.php");
              } 
?>