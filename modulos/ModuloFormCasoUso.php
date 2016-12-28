<?php
include('datos/Config.php');
include ('ModuloDocumentacion.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$documentacion = new Documentacion($db);

if (
  (($_POST['nombreCasoUso'] != ''))&&
  (($_POST['accionCasoUso'] != ''))&&
  (isset($_POST['preCondicion'])) &&
  (isset($_POST['postCondicion'])) &&
  (($_POST['flujoNormal'] != ''))&&
  (($_POST['flujoAlternativo'] != ''))&&
  (($_POST['rolCasoUso'] != ''))&&
  (($_POST['idDiseno'] != ''))
  
  ) {

  $documentacion->nombreCasoUso = $_POST['nombreCasoUso'];
  $documentacion->accionCasoUso = $_POST['accionCasoUso'];
  $documentacion->preCondicion = $_POST['preCondicion'];
  $documentacion->postCondicion = $_POST['postCondicion'];
  $documentacion->flujoNormal = $_POST['flujoNormal'];
  $documentacion->flujoAlternativo = $_POST['flujoAlternativo'];
  $documentacion->idRolesDeSistema = $_POST['rolCasoUso'];
  $documentacion->idDiseno = $_POST['idDiseno'];
  if ($documentacion->createCasoUso()) {
  echo 'Exito! Caso de Uso Creado';
  return true;
  } 
  else{
      echo 'Oops! El caso de Uso no se puede repetir ';
    return false;
  }

}else{
	echo 'Oops! Primero Debes Registrar un Rol para tu sistema';
	return false;
}
?>