<?php 
    session_start();
    @$var = $_SESSION["correo"];    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>S.E.R.L.I.</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href=".resources/vendor/bootstrap/css/render.css" rel="stylesheet">
    <link href="resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/plugins/sweetAlert2/sweetalert2.min.css">  
      
    <link rel="stylesheet" href="resources/plugins/animate.css/animate.css">  
    <link href="resources/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="resources/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="resources/dist/css/nativo.css" rel="stylesheet">

    <link href="resources/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="resources/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="resources/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top navbar-fixed-top" role="navigation" style="border-bottom:1px solid #a0999b42">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">S.E.R.L.I.</a>
            </div>
            
            
            <ul class="nav navbar-top-links navbar-right">
                <!--<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <?php if (@$var == 'crespin@outlook.es' ) { ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo strtoupper(@$_SESSION["rol"]) ?>&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $_SESSION["correo"] ?></a></li>
                        <li class="divider"></li>
                        <li><a href="model/logout.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                </li>
                
                <?php }else{} ?>
            </ul>
            <?php if (@$var == 'crespin@outlook.es' ) { ?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li><a href="inicio"><i class="fa fa-dashboard fa-fw"></i> Inicio</a></li>
                        <li><a href="backup"><i class="fa fa-lock fa-fw"></i> Administraci&oacute;n</a></li>
                        <li><a href="#"><i class="fa fa-clipboard fa-fw"></i> Afiliaci&oacute;n<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="afiliacion_pacientes">Registro de Pacientes</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-stethoscope fa-fw"></i> Exam&eacute;n F&iacute;sico<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="examenf">Ir a Exam&eacute;n</a></li>
                            </ul>
                        </li>
                        
                        <!--<li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Estad&iacute;sticas</a></li>-->
                        <li><a href="#"><i class="fa fa-check fa-fw"></i> Prescripci&oacute;n<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="presc">Exam&eacute;nes Complementarios</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            
            <?php }else{} ?>
        </nav>