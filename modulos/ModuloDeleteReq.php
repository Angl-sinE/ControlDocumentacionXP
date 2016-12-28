<?php
include('datos/Config.php');
include ('ModuloDocumentacion.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$documentacion = new Documentacion($db);
if (!empty($_GET['idr'] && $_GET['ar'] )) {
$activoR=intval($_GET["ar"]);

$idr=intval($_GET["idr"]);

if ($documentacion->deleteRequerimientos($activoR,$idr)) {
	return true;
	}
	else {
	return false;
	} 	

}


?>