<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('datos/Config.php');
include ('ModuloReporte.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$reporte= new Reporte($db);

if (
  
  ($_POST['idPlanifica'] != '') &&
  ($_POST['idDiseno'] != '') &&
  ($_POST['idCodifica'] != '') &&
  ($_POST['idPruebas'] != '')
  ) {
 $reporte->idPlan = $_POST['idPlanifica'];
 $reporte->idDis = $_POST['idDiseno'];
 $reporte->idCode = $_POST['idCodifica'];
 $reporte->idPrueba = $_POST['idPruebas'];

  if ($reporte->createReporte()) {
 
  return true;
  } 
  else{
     
    return false;
  }

}else{
	
	return false;
}

?>