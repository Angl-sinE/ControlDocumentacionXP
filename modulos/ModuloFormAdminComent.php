<?php
include('datos/Config.php');
include ('ModuloComentAdmin.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$comentarios = new Comentario($db);

if (((isset($_POST['idUsuario'])) && ($_POST['idUsuario'] != '')) &&
((isset($_POST['comentario'])) && ($_POST['comentario'] != '')))
{
	$comentarios->idUsuario = $_POST['idUsuario'];
  $comentarios->comentarioContenido = $_POST['comentario'];
   if ($comentarios->createComent()) {
   	echo 'Exito! El comentario fue registrado';
   	return true;
  }else{
  	echo 'Oops!  No se pueden repetir los comentarios, intenta de nuevo';
  	return false;
  	}
	
 }else{
 	echo 'Oops! el registro no se encontro, intenta mas tarde';
 	return false;
 		
	}

?>