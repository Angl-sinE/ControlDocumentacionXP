<?php
include('datos/Config.php');
include ('ModuloDocumentacionAdmin.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$docAdmin = new DocumentacionAdmin($db);
if (!empty($_GET['id'] && $_GET['a'] )) {
$activoPt=intval($_GET["a"]);

$id=intval($_GET["id"]);

if ($docAdmin->deletePrueba($activoPt,$id)) {
	return true;
	}
	else {
	return false;
	} 	

}


?>