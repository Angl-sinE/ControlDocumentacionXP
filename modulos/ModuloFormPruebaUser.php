<?php
include('datos/Config.php');
include ('ModuloDocumentacion.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$documentacion = new Documentacion($db);

if (
  (isset($_POST['tipoPrueba']))&&
  (isset($_POST['idHistoriasUsuario']))&&
  (($_POST['resultadoEsperado'] != ''))&&
  (($_POST['resultadoObtenido'] != ''))&&
  (isset($_POST['idPruebas'])) &&
  (isset($_POST['revisiones']) ) 
  

  ) {

  $documentacion->tipoPrueba = $_POST['tipoPrueba'];
  $documentacion->idHistoriasUsuario = $_POST['idHistoriasUsuario'];
  $documentacion->revisiones = $_POST['revisiones'];
  $documentacion->resultadoEsperado = $_POST['resultadoEsperado'];
  $documentacion->resultadoObtenido = $_POST['resultadoObtenido'];
  $documentacion->idPruebas = $_POST['idPruebas'];
  if ($documentacion->createPruebasUsuario()) {
  echo 'Exito! Prueba de Usuario Creada';
  return true;
  } 
  else{
      echo 'Oops! La Historia no se puede repetir en la Prueba y Recuerda Iniciar la Fase de Pruebas ';
    return false;
  }

}else{
	echo 'Oops! el registro no se encontro, intenta mas tarde';
	return false;
}
?>