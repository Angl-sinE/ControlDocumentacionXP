<?php
include('datos/Config.php');
include ('ModuloDocumentacion.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$documentacion = new Documentacion($db);

if (($_POST['pID']) != '') {

  $documentacion->idProyecto = $_POST['pID'];
  if ($documentacion->createPlanificacion()) {
  echo 'Exito! Iniciaste la planificación del Proyecto';
  return true;
  } 
  else{
      echo 'Oops! este Proyecto ya esta planificado';
    return false;
  }

}else{
	echo 'Oops! el registro no se encontro, Recuerda Activar tu Proyecto';
	return false;
}
?>