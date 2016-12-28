<?php
include('datos/Config.php');
include ('ModuloDocumentacion.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$documentacion = new Documentacion($db);

if (($_POST['dID']) != '') {

  $documentacion->idProyecto = $_POST['dID'];
  if ($documentacion->createDiseno()) {
  echo 'Exito! Iniciaste el Diseño del Proyecto';
  return true;
  } 
  else{
      echo 'Oops! este Proyecto ya tiene un Diseño';
    return false;
  }

}else{
	echo 'Oops! el registro no se encontro, intanta mas tarde';
	return false;
}
?>