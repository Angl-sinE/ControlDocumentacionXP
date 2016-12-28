<?php
include('datos/Config.php');
include ('ModuloDocumentacion.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$documentacion = new Documentacion($db);

if (($_POST['cID']) != '') {

  $documentacion->idProyecto = $_POST['cID'];
  if ($documentacion->createCodificacion()) {
  echo 'Exito! Iniciaste la Codificación del Proyecto';
  return true;
  } 
  else{
      echo 'Oops! este Proyecto ya esta Codificado';
    return false;
  }

}else{
	echo 'Oops! el registro no se encontro, intenta mas tarde';
	return false;
}
?>