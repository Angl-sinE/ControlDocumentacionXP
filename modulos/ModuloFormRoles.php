<?php
include('datos/Config.php');
include ('ModuloDocumentacion.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$documentacion = new Documentacion($db);

if (
  (($_POST['nombreRol'] != ''))&&
  (($_POST['funcionRol'] != ''))&&
  (($_POST['idDiseno'] != ''))
  
  ) {

  $documentacion->nombreRol = $_POST['nombreRol'];
  $documentacion->funcionRol = $_POST['funcionRol'];
  $documentacion->idDiseno = $_POST['idDiseno'];
  if ($documentacion->createRoles()) {
  echo 'Exito! Rol de Proyecto Creado';
  return true;
  } 
  else{
      echo 'Oops! Ocurrió un problema, Los Roles no se pueden repetir ';
    return false;
  }

}else{
	echo 'Oops! Recuerda Iniciar la Fase de Diseño';
	return false;
}
?>