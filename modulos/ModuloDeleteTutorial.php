<?php
include('datos/Config.php');
include ('ModuloTutorial.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();

$tutorial = new Tutorial($db);
if (!empty($_GET['id'] && $_GET['a'] )) {
$activoT=intval($_GET["a"]);

$id=intval($_GET["id"]);

if ($tutorial->tutorialTrash($activoT,$id)) {
	return true;
	}
	else {
	return false;
	} 	

}


?>