<?php
include('datos/Config.php');
include ('ModuloDocumentacion.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$documentacion = new Documentacion($db);
if(!empty($_GET['id'] && $_GET['a'] && $_GET['p'] )){
$activo=intval($_GET["a"]);

$idplan=intval($_GET["p"]);

$idH=intval($_GET["id"]);  

if ($documentacion->deleteHistorias($activo,$idplan,$idH)) {
	return true;
	}
	else {
	return false;
	}

}




?>
