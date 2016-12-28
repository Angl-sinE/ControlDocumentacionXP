<?php
include('datos/Config.php');
include ('ModuloDocumentacion.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$documentacion = new Documentacion($db);

if (
  (($_POST['nombreHistoria'] != ''))&&
  (($_POST['descripcionHistoria'] != ''))&&
  (($_POST['prioridad'] != ''))&&
  (($_POST['iteracion'] != ''))&&
  (($_POST['idPlanificacion'] != '')) &&
  (isset($_POST['observacion'])) 
  

  ) {

  $documentacion->nombreHistoria = $_POST['nombreHistoria'];
  $documentacion->descripcionHistoria = $_POST['descripcionHistoria'];
  $documentacion->prioridad = $_POST['prioridad'];
  $documentacion->iteracion = $_POST['iteracion'];
  $documentacion->observacion = $_POST['observacion'];
  $documentacion->idPlanificacion = $_POST['idPlanificacion'];
  if ($documentacion->createHistorias()) {
  echo 'Exito! Historia de Usuario Creada';
  return true;
  } 
  else{
      echo 'Oops! Ocurrió un problema, El nombre de la Historia no se puede repetir ';
    return false;
  }

}else{
	echo ' Oops!  Recuerda que debes Iniciar La Planificacion ';
	return false;
}
?>