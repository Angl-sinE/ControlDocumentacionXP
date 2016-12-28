<?php
include('datos/Config.php');
include ('ModuloDocumentacion.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$documentacion = new Documentacion($db);
if (!empty($_GET['id'] && $_GET['a'] )) {
$activoCu=intval($_GET["a"]);

$id=intval($_GET["id"]);

if ($documentacion->deleteCasoDeUso($activoCu,$id)) {
	return true;
	}
	else {
	return false;
	} 	

}


?>