<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Icono -->
    <link rel="icon" href="../public/images/logoend.png" />
    <!-- Toques de apariencia -->
    <link rel="stylesheet" href="../css/paneles.css">
    <!-- Design icons -->
    <link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Boostrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Scroll chidori para todas las pantallas -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css"> 
    <!-- Mejoras para la tabla -->
    <link rel="stylesheet" href="../public/datatables/jquery.dataTables.min.css">
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../public/datatables/datatables.min.css"/>

    <!-- Date Picker -->
    <link rel="stylesheet" href="../public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../public/bower_components/bootstrap-daterangepicker/daterangepicker.css">

</head>


<body>
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">

            <div class="logo full-reset all-tittles">
            <i class="visible-xs fa fa-navicon mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
                Proyecto Ens & End
            </div>

            <div class="full-reset">
                <figure>
                    <center><img src="../public/images/logoend.png" alt="Biblioteca" class="img-responsive center-box" style="width:55%;"></center>
                </figure>
            </div>


             <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">

                    <li><a href="home.php"><i class="fa fa-home"></i>&nbsp;&nbsp; Inicio</a></li>

                    <li>
                        <div class="dropdown-menu-button"><i class="fa fa-edit"></i>&nbsp;&nbsp; Registros <i class="fa fa-angle-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="paciente.php"><i class="fa fa-user"></i> &nbsp;&nbsp; Paciente</a></li>

                            <li>
                                <a href="acompanantes.php"><i class="fa fa-users"></i>&nbsp;&nbsp; Acompañante</a>
                            </li>

                            <li>
                                <a href="terapeuta.php"><i class="fa fa-user-md"></i>&nbsp;&nbsp; Terapeuta</a>
                            </li>
                        </ul>
                    </li>




                    <li>
                        <div class="dropdown-menu-button"><i class="fa fa-medkit"></i>&nbsp;&nbsp; Gestión Medica <i class="fa fa-angle-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li>
                                <a href="diccionario.php"><i class="fa fa-book"></i> &nbsp;&nbsp; Diccionario Bio-Emocional</a>
                            </li>

                            <li>
                                <a href="capas.php"><i class="fa fa-tasks"></i>&nbsp;&nbsp; Capas</a>
                            </li>


                            <li>
                                <a href="consultas.php"><i class="fa fa-hospital-o"></i>&nbsp;&nbsp; Consultas</a>
                            </li>

                            <li>
                                <a href="enfermedad.php"><i class="fa fa-thermometer"></i>&nbsp;&nbsp; Desequilibrios</a>
                            </li>


                            <li>
                                <a href="informesm.php"><i class="fa fa-heartbeat"></i>&nbsp;&nbsp; Informes Medicos</a>
                            </li>

                            <li>
                                <a href="organos.php"><i class="fa fa-child"></i>&nbsp;&nbsp; Organos</a>
                            </li>

                            <li>
                                <a href="terapia.php"><i class="fa fa-universal-access"></i>&nbsp;&nbsp; Terapias</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <div class="dropdown-menu-button"><i class="fa fa-plus"></i>&nbsp;&nbsp; Otros <i class="fa fa-angle-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li>
                                <a href="especialidad.php"><i class="fa fa-graduation-cap"></i>&nbsp;&nbsp; Especialidad</a>
                            </li>

                            <li>
                                <a href="oficios.php"><i class="fa fa-tag"></i>&nbsp;&nbsp; Oficios</a>
                            </li>

                            <li>
                                <a href="trabajo.php"><i class="fa fa-user-secret"></i>&nbsp;&nbsp; Trabajo</a>
                            </li>

                            <li>
                                <a href="religion.php"><i class="fa fa-university"></i>&nbsp;&nbsp; Religion</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="reportes.php"><i class="fa fa-pie-chart"></i>&nbsp;&nbsp; Reportes y estadísticas</a>
                    </li>

                    
                    <li>
                        <a href="usuarios.php"><i class="fa fa-vcard-o"></i>&nbsp;&nbsp; Usuarios</a>
                    </li>


                    <li><a href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;&nbsp; Cerrar sesión</a></li>

                    
                </ul>
            </div>
        </div>    
    </div>


</body>
    <script>window.jQuery || document.write('<script src="../public/js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../public/js/main.js"></script>
</html>