<?php
include('datos/Config.php');
include ('ModuloDocumentacion.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$documentacion = new Documentacion($db);

if (($_POST['tID']) != '') {

  $documentacion->idProyecto = $_POST['tID'];
  if ($documentacion->createPruebas()) {
  echo 'Exito! Iniciaste las Pruebas del Proyecto';
  return true;
  } 
  else{
      echo 'Oops!, Este Proyecto ya Inició la Fase de Pruebas';
    return false;
  }

}else{
	echo 'Oops! el registro no se encontro, intanta mas tarde';
	return false;
}
?>