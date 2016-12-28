<?php
include('datos/Config.php');
include ('ModuloDocumentacion.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$documentacion = new Documentacion($db);

if (
  (($_POST['idCodificacion'] != '')) && (isset($_POST['lenguajes'])) 
  )
   {
  $selecciona= is_array($_POST['lenguajes']) ? implode(',', $_POST['lenguajes']) : $_POST['lenguajes'];
  $selectLenguajes = $selecciona;

  $documentacion->lenguajes = $selectLenguajes;
   $id=  $_POST['idCodificacion'];
  $documentacion->idCodificacion = $_POST['idCodificacion'];
  if ($documentacion->createLenguajes($id)) {
  echo 'Exito! Herramientas de Programación Registradas';
  return true;
  } 
  else{
      echo 'Oops! Solo puedes registrar un conjunto de lenguajes por proyecto ';
    return false;
  }

}else{
	echo 'Oops! Recuerda Iniciar la Fase de Codificación';
	return false;
}

?>