<?php
include('datos/Config.php');
include ('ModuloDocumentacion.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$documentacion = new Documentacion($db);
$max =1024000;


$destino = '../imagenesUsuario/';
$extensionesPemitidas = array("jpeg", "jpg", "png");
$temporal = explode (".", $_FILES["diagramaImg"]["name"]);
$extension = end($temporal);
$archivo = $_FILES['diagramaImg']['name'];
$temporal = $_FILES['diagramaImg']['tmp_name'];
if (
($_FILES["diagramaImg"]["type"] == "image/jpeg")||
($_FILES["diagramaImg"]["type"] == "image/jpg") ||
($_FILES["diagramaImg"]["type"] == "image/png") &&
($_FILES["diagramaImg"]["size"] < $max ) &&
in_array($extension, $extensionesPemitidas)
) {
	if ($_FILES["diagramaImg"]["error"] > 0) {
		//echo "Regresa codigo: ".$_FILES["diagramaImg"]["temp"]. "<br>";
	}else {
		/*echo "Upload: ". $_FILES["imagen"]["name"]. "<br>";
		echo "Type: ". $_FILES["imagen"]["type"]. "<br>";
		echo "Size: ". $_FILES["imagen"]["size"]. "<br>";
		echo "Temp_file: ". $_FILES["imagen"]["tmp_name"]. "<br>";
		echo "datos de img recibidos"."<br>";*/
		if (file_exists($destino.$archivo)) {
			echo $archivo. "Este Diagrama Ya existe. ";
		}else{
			move_uploaded_file($temporal,"$destino/$archivo");
		//echo "guardado en :" .$destino.$_FILES["imagen"]["tmp_name"];	
		}
	}

if(
(($_POST['idTipoDiagrama'] != ''))&&
(($_POST['idDiseno'] != ''))&&
(isset($archivo))
)
{

	$documentacion->idTipoDiagrama = $_POST['idTipoDiagrama'];
	$documentacion->idDiseno = $_POST['idDiseno'];
	$documentacion->diagrama = $archivo ;
if ($documentacion->createDiagrama()) {
   	echo 'Exito! El diagrama fue Registrado';
   	return true;
  }else{
  	echo 'Oops! El Tipo de Diagrama no se puede repetir';
  	return false;
  	}

}
 else{
 	echo 'Oops! el registro no se encontro, intenta mas tarde';
 	return false;
 		
	}

}
 else{
	echo " El Formato de Archivo Invalido";
	return false;
}

/*
if(
(($_POST['idTipoDiagrama'] != ''))&&
(($_POST['idDiseno'] != ''))&&
(isset($archivo))

)
{

	$documentacion->idTipoDiagrama = $_POST['idTipoDiagrama'];
	$documentacion->idDiseno = $_POST['idDiseno'];
	$documentacion->diagrama = $archivo ;
if ($documentacion->createDiagrama()) {
   	echo 'Exito! El diagrama fue Registrado';
   	return true;
  }else{
  	echo 'Oops! Ocurrió un problema, El Diagrama no se puede repetir';
  	return false;
  	}

}
 else{
 	echo 'Oops! el registro no se encontro, intenta mas tarde';
 	return false;
 		
	}

*/	
?>