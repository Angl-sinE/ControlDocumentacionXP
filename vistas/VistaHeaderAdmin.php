<?php
session_start();
include('../modulos/datos/Config.php');
include ('../modulos/ModuloLogin.php');
include ('../modulos/ModuloProyecto.php');
include ('../modulos/ModuloTutorial.php');
include ('../modulos/ModuloDocumentacion.php');
include ('../modulos/ModuloDocumentacionAdmin.php');
include ('../modulos/ModuloTarea.php');
include ('../modulos/ModuloComentAdmin.php');
include ('../modulos/ModuloReporte.php');

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

if (!$usuario->inicio_sesion()){
    header("location: ../index.php");
}
if (isset($_GET['q'])){
    $usuario->fin_sesion();
    header("location:../index.php");
}
/////////////////////////// Proyecto
$proyecto = new Proyecto($db);
///////////////////////// Documentacion Admin
$docAdmin = new DocumentacionAdmin($db);
/////////////////////////// Tarea
$tareas = new Tarea($db);
//////////////// Tutorial 
$tutorial = new Tutorial($db);
//////////////// Comentarios
$comentarios = new Comentario($db);

$reportes = new Reporte($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestiona del Sistema</title>
    <link rel="stylesheet" type="text/css" href="../recursos/css/bootstrap.min2.css"/>
    <link rel="stylesheet" type="text/css" href="../recursos/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="../recursos/css/local.css"/>
    <link rel="stylesheet" type="text/css" href="../recursos/css/jasny-bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../recursos/css/awesome-bootstrap-checkbox.css"/>
    <link rel="stylesheet" type="text/css" href="../recursos/lib/table/dist/bootstrap-table.css"/>
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
                <a class="navbar-brand" href="VistaPanelAdmin.php" >Panel de Control  Administrador</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="VistaPanelAdmin.php"><i class="fa fa-home"></i> Inicio</a></li>
                    <li><a href="VistaUsuarios.php"><i class="fa fa-users"></i> Ver Usuarios</a></li>
                    <li><a href="VistaProyectoAdmin.php"><i class="fa fa-folder"></i>  Ver Proyectos</a></li>
                     <li><a href="VistaComAdmin.php"><i class="fa fa-comment"></i> Hacer Recomendaciones</a></li>
                    <li><a href="VistaTutorialAdmin.php"><i class="fa fa-flask"></i> Administrar Tutoriales</a></li>
                    <li><a href="VistaTareaAdmin.php"><i class="fa fa-tasks"></i> Administrar Tareas</a></li>
                    <li><a href="VistaDocAdmin.php"><i class="fa fa-archive"></i> Administrar  Documentación</a></li>
                   
                    
                 </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown user-dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  Perfil
                       <b class="caret"></b></a>
                         <ul class="dropdown-menu">
                           <li><a href="VistaPerfilAdmin.php"><i class="fa fa-cogs"></i> Administrar</a></li>
                           <li class="divider"></li>
                            <li><a href="../index.php?q=logout"><i class="fa fa-power-off"></i> Desconectar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
<!--Fin Cabecera -->