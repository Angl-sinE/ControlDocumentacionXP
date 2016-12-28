<?php
include('datos/Config.php');
include ('ModuloDocumentacionAdmin.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$docAdmin = new DocumentacionAdmin($db);
if (((isset($_POST['tipoD'])) && ($_POST['tipoD'] != '')) &&
((isset($_POST['funcionD'])) && ($_POST['funcionD'] != '')))
{
	$docAdmin->nombreDiagrama = $_POST['tipoD'];
  $docAdmin->funcionDiagrama = $_POST['funcionD'];
  
   if ($docAdmin->createDiagramaTipo()) {
   	echo 'Exito! Los datos fueron registrados';
   	return true;
  }else{
  	echo 'Oops! Datos incorrectos, intenta de nuevo';
  	return false;
  	}
	
 }else{
 	echo 'Oops! el registro no se encontro, intenta mas tarde';
 	return false;
 		
	}

?>