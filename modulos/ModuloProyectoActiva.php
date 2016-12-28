<?php
include ('ModuloHeaderP.php');

if(!empty($_GET["ready"] && $_GET["id"] && $_GET["u"])){
$idp=intval($_GET["id"]);
$ready=$_GET["ready"]; 
$idU=$_GET["u"]; 
if ($proyecto->selectProyectoActiva($ready,$idp,$idU)) {
echo"<script language ='javascript'>alert('El Proyecto Esta Listo Para Documentar');</script>";
echo "<script language='javascript'> window.location.href ='VistaProyecto.php' </script>"; 

	return true;
	
	}
else{
	return false;

	}

}
else{
	return false;
	
}

?>
