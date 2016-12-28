<?php
include('datos/Config.php');
include ('ModuloReporte.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Reporte
$reporte = new  Reporte($db);

if (((isset($_POST['tipoPrueba'])) && ($_POST['tipoPrueba'] != '')) &&
((isset($_POST['desPrueba'])) && ($_POST['desPrueba'] != '')))
{
	$docAdmin->pruebaNombre = $_POST['tipoPrueba'];
  $docAdmin->pruebaDescripcion = $_POST['desPrueba'];
   if ($docAdmin->createPruebaTipo()) {
   	echo 'Exito! Los datos fueron registrados';
   	return true;
  }else{
  	echo 'Oops!  No se pueden repetir las pruebas, intenta de nuevo';
  	return false;
  	}
	
 }else{
 	echo 'Oops! el registro no se encontro, intenta mas tarde';
 	return false;
 		
	}

?>