<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include('datos/Config.php');
include ('ModuloTarea.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$tareas = new Tarea($db);


if (
 ((isset($_POST['nombreTarea'])) && ($_POST['nombreTarea'] != '')) &&
((isset($_POST['categoriaTarea'])) && ($_POST['categoriaTarea'] != ''))&&
((isset($_POST['prioridadTarea'])) && ($_POST['prioridadTarea'] != ''))&&
((isset($_POST['desTarea'])) && ($_POST['desTarea'] != ''))

)

{
	$tareas->nombreTarea = $_POST['nombreTarea'];
  $tareas->categoriaTarea = $_POST['categoriaTarea'];
  $tareas->prioridadTarea = $_POST['prioridadTarea'];
  $tareas->descripcionTarea = $_POST['desTarea'];
   if ($tareas->createTarea()) {
   	echo 'Exito! La Tarea fue registrada';
   	return true;
  }else{
  	echo 'Oops! Datos incorrectos, el nombre de la Tarea no puede repetirse';
  	return false;
  	}
	
 }else{
 	echo 'Oops! el registro no se encontro, intanta mas tarde';
 		
	}

 

?>