<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('datos/Config.php');
include ('ModuloTutorial.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$tutorial = new Tutorial($db);


$max =1024000;


$destino = '../imagenesTutorial/';
$extensionesPemitidas = array("jpeg", "jpg", "png");
$temporal = explode (".", $_FILES["imagen"]["name"]);
$extension = end($temporal);
$archivo = $_FILES['imagen']['name'];
$temporal = $_FILES['imagen']['tmp_name'];
if (
($_FILES["imagen"]["type"] == "image/jpeg")||
($_FILES["imagen"]["type"] == "image/jpg") ||
($_FILES["imagen"]["type"] == "image/png") &&
($_FILES["imagen"]["size"] < $max ) &&
in_array($extension, $extensionesPemitidas)
) {
	if ($_FILES["imagen"]["error"] > 0) {
		echo "Regresa codigo: ".$_FILES["imagen"]["temp"]. "<br>";
	}else {
		/*echo "Upload: ". $_FILES["imagen"]["name"]. "<br>";
		echo "Type: ". $_FILES["imagen"]["type"]. "<br>";
		echo "Size: ". $_FILES["imagen"]["size"]. "<br>";
		echo "Temp_file: ". $_FILES["imagen"]["tmp_name"]. "<br>";
		echo "datos de img recibidos"."<br>";*/
		if (file_exists($destino.$archivo)) {
			echo $archivo. " Ya existe. ";
		}else{
			move_uploaded_file($temporal,"$destino/$archivo");
		//echo "guardado en :" .$destino.$_FILES["imagen"]["tmp_name"];	
		}
	}

}
 else{
	echo "Oops! el formato de Archivo es Invalido o no se encontro la imagen, intenta de nuevo ";
	return false;
}


if(
(($_POST['nombreTutorial'] != ''))&&
(($_POST['categoriaTutorial'] != ''))&&
(($_POST['contenidoTutorial'] != ''))&&
(isset($_POST['fuenteTutorial'])) &&
(isset($archivo))

)
{
	$tutorial->nombreTutorial = $_POST['nombreTutorial'];
	$tutorial->categoriaTutorial = $_POST['categoriaTutorial'];
	$tutorial->contenidoTutorial = $_POST['contenidoTutorial'];
	$tutorial->fuenteTutorial = $_POST['fuenteTutorial'];
	$tutorial->imagenTutorial =$archivo ;
	//$tutorial->imagenTutorial = $_FILES['imagenTutorial']['Temp'];
	if ($tutorial->createTutorial()) {
   	echo 'Exito! Los datos fueron registrados';
   	return true;
  }else{
  	echo 'Oops! Datos incorrectos, intenta de nuevo';
  	return false;
  	}

}
 else{
 	echo 'Oops! el registro no se encontro, intenta mas tarde';
 	return false;
 		
	}

	
?>