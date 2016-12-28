<?php
include('datos/Config.php');
include ('ModuloDocumentacion.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$documentacion = new Documentacion($db);
if (!empty($_GET['id'] && $_GET['a'] )) {
$activoRs=intval($_GET["a"]);

$id=intval($_GET["id"]);

if ($documentacion->deleteRoles($activoRs,$id)) {
	return true;
	}
	else {
	return false;
	} 	

}


?>