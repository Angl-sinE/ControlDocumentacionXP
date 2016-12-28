<?php
include('datos/Config.php');
include ('ModuloTarea.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();

$tareas = new Tarea($db);
if (!empty($_GET['id'] && $_GET['a'] )) {
$activoD=intval($_GET["a"]);

$id=intval($_GET["id"]);

if ($tareas->tareaTrash($activoD,$id)) {
	return true;
	}
	else {
	return false;
	} 	

}


?>