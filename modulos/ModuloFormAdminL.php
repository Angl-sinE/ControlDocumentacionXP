<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('datos/Config.php');
include ('ModuloDocumentacionAdmin.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$docAdmin = new DocumentacionAdmin($db);


if (
 ((isset($_POST['nombreLenguaje'])) && ($_POST['nombreLenguaje'] != '')) &&
((isset($_POST['tipoLenguaje'])) && ($_POST['tipoLenguaje'] != ''))&&
((isset($_POST['desLenguaje'])) && ($_POST['desLenguaje'] != ''))

)

{
	$docAdmin->lenguajeNombre = $_POST['nombreLenguaje'];
  $docAdmin->lenguajeTipo = $_POST['tipoLenguaje'];
  $docAdmin->lenguajeDescripcion = $_POST['desLenguaje'];
   if ($docAdmin->createLenguajeTipo()) {
   	echo 'Exito! Los datos fueron registrados';
   	return true;
  }else{
  	echo 'Oops! Datos incorrectos, intenta de nuevo';
  	return false;
  	}
	
 }else{
 	echo 'Oops! el registro no se encontro, intanta mas tarde';
 		
	}

   

?>