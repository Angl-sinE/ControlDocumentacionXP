<?php
session_start();
include('datos/Config.php');
include ('ModuloLogin.php');
include ('ModuloProyecto.php');
include ('ModuloDocumentacion.php');
include ('ModuloDocumentacionAdmin.php');
include ('ModuloComentAdmin.php');
include('ModuloTarea.php');
include('ModuloReporte.php');
include('ModuloTutorial.php');


// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
////////////////////// iniciar la clase Usuario
$usuario = new Usuario($db);
/////////////////////////// Sesiones 
$id = $_SESSION['id_user'];
$nombre = $_SESSION['nombre'];
$user=$_SESSION['user'];
$idUrol=$usuario->getIdURol($id);
/////////////////////////// Proyecto
$proyecto = new Proyecto($db);
/////////////////////////// Tarea
$tarea = new Tarea($db);
//////////////// Documentacion 
$documentacion = new Documentacion($db);
$documentacionAdmin = new DocumentacionAdmin($db);
//////////////////// comentarios
$comentarios = new Comentario($db);
//////////////////////////// Reporte
$reporte = new Reporte($db);
////////////////// Tutorial
$tutorial = new Tutorial($db);



if (!$usuario->inicio_sesion()){
    header("location: ../index.php");
}
if (isset($_GET['q'])){
    $usuario->fin_sesion();
    header("location:../index.php");
}


// Id del Proyecto Activo
$queryidA=("SELECT idProyecto FROM proyecto WHERE idUsuario = '$idUrol' AND selectProyecto = 's'");
$idpA=$proyecto->getProyectoIdActivo($queryidA);
$idProyectoActivo=intval($idpA);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestiona Tus Proyectos</title>
    <link rel="stylesheet" type="text/css" href="../recursos/css/bootstrap.min2.css" />
    <link rel="stylesheet" type="text/css" href="../recursos/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../recursos/css/local.css" />
    <link rel="stylesheet" type="text/css" href="../recursos/css/jasny-bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../recursos/css/awesome-bootstrap-checkbox.css" />
    <link rel="stylesheet" type="text/css" href="../recursos/lib/table/dist/bootstrap-table.css" />
    <link rel="stylesheet" type="text/css" href="../recursos/lib/carousel/dist/css/bootstrap-modal-carousel.css" />
    <body>
    <div id="wrapper">
<!-- Cabecera-->        
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="VistaPanel.php">Panel de Control</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                <!-- MENU -->
                    <li><a href="VistaPanel.php"><i class="fa fa-home"></i> Inicio</a></li>
                    <li><a href="VistaProyecto.php"><i class="fa fa-folder"></i> Proyecto</a></li>
                    <li><a href="VistaDocumentacion.php"><i class="fa fa-archive"></i> Documentación</a></li>
                    <li><a href="VistaTutorial.php"><i class="fa fa-flask"></i> Tutoriales</a></li>
                    <li><a href="VistaReporte.php"><i class="fa fa-tachometer"></i> Reporte</a></li>
                    <li><a href="VistaComents.php"><i class="fa fa-comment"></i> Comentarios y Sugerencias </a></li>
                    <li><a href="VistaDatosDoc.php"><i class="fa fa-book"></i> Datos De Documentación</a></li>
                   
                 </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                 <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tasks"></i> Ver Tareas 
                       <b class="caret"></b></a>
                         <ul class="dropdown-menu">
                          <li class="divider"></li>
                          <li class="bg-info"><a href="VistaTarea.php"><i class="fa fa-cogs"></i> Administrar</a></li>
                          <li class="bg-info"><a href="#">Tareas Activas <b class="caret"></b></a></li>
                          <li>
                           <a>
                           <?php
                        
                            $tarea->readTareaM(); 
                            ?>                        
                           </a>
                            </li>
                            </ul>
                    </li>
                 <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-check"></i> Ver Proyecto Activo 
                       <b class="caret"></b></a>
                         <ul class="dropdown-menu">
                          <li class="divider"></li>
                           <li>
                           <a>
                         <?php
                         $queryAct = ("SELECT nombreProyecto FROM proyecto WHERE idUsuario = '$idUrol' AND activoProyecto = 1 AND selectProyecto = 's'");
                         $proyecto->getNombreHeader($queryAct);
                         ?>
                           </a>
                            </li>
                            </ul>
                    </li>
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-folder"></i>  Ver Mis Proyectos:
                       <b class="caret"></b></a>
                         <ul class="dropdown-menu">
                         <li class="divider"></li>
                         <li>
                         <a>
                            <?php
                              $queryp= ("SELECT nombreProyecto FROM proyecto WHERE idUsuario = '$idUrol' AND activoProyecto = 1");
                              $proyecto->getNombreHeader($queryp);
                            ?>
                        <hr>
                        </a>
                        </li>
                        </ul>
                        
                    </li>

                     <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Tu Perfil
                       <b class="caret"></b></a>
                         <ul class="dropdown-menu">
                           <li><a href="VistaPerfil.php"><i class="fa fa-user"></i> Administrar</a></li>
                           <li class="divider"></li>
                            <li><a href="../index.php?q=logout"><i class="fa fa-power-off"></i> Desconectar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
<!--Fin Cabecera -->