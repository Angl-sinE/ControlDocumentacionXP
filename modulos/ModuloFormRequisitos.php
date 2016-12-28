<?php
include('datos/Config.php');
include ('ModuloDocumentacion.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$documentacion = new Documentacion($db);

if (
  (($_POST['funcionales'] != ''))&&
  (($_POST['idPlanificacion'] != '')) &&
  (isset($_POST['noFuncionales'])) 
  

  ) {
  $selecciona= is_array($_POST['noFuncionales']) ? implode(',', $_POST['noFuncionales']) : $_POST['noFuncionales'];
  $noFuncionales = $selecciona;
  $documentacion->funcionales = $_POST['funcionales'];
  $documentacion->noFuncionales = $noFuncionales;
  $id=  $_POST['idPlanificacion'];
  $documentacion->idPlanificacion = $_POST['idPlanificacion'];
  
  if ($documentacion->createRequisitos($id)) {
  echo 'Exito! Requisitos del sistema Creados';
  return true;
  } 
  else{
      echo 'Oops! El proyecto solo puede tener un conjunto de requisitos ';
    return false;
  }

}else{
	echo 'Oops! Recuerda que debes Iniciar La Planificacion y Registrar Al menos seleccionar 1 Requisito No Funcional';
	return false;
}

?>