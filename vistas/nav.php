<?php 

  require_once("../config/conexion.php");

  $nombre_user = $_SESSION["nombre"];
  $apellido_user = $_SESSION["apellidos"];
  $img_user = $_SESSION["imagen"];

?>

	  <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">
                <figure>
                   <?php echo "<img src=\"upload/users/".$img_user."\" alt=\"user-picture\" class=\"img-responsive img-circle center-box\">" ?>
                </figure>

                <li style="color:#fff; cursor:default;">
                 <?php echo "<span class=\"all-tittles\">".$nombre_user." ".$apellido_user." </span>"; ?>
                </li>

                <li  class="tooltips-general btn-help" data-placement="bottom" title="Ayuda">
                    <i class="fa fa-question-circle-o zmdi-hc-fw"></i>
                </li>

            </ul>
      </nav>


      <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">Ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    Ayuda en serio, Si este sistema es perfecto bb :v
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                </div>
            </div>
          </div>
        </div>
