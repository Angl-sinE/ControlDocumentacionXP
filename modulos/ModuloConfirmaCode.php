<?php
include('datos/Config.php');
include ('ModuloDocumentacion.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$documentacion = new Documentacion($db);

if (($_POST['idProyecto']) != '') {

  $idProyecto = $_POST['idProyecto'];
  if ($documentacion->confirmaCodificacion($idProyecto)) {
  echo 'Exito! Has Completado la fase de Codificación';
  return true;
  } 
  else{
      echo 'Oops! Ocurrió un problema, Intenta mas tarde';
    return false;
  }

}else{
	echo 'Oops! el registro no se encontro, intanta mas tarde';
	return false;
}

?>