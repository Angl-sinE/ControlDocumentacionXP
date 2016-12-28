<?php
include ('ModuloHeaderP.php');
if(!empty($_GET["activo"] && $_GET["id"] )){
$idp=intval($_GET["id"]);
$activo=intval($_GET["activo"]); 

if ($tarea->deleteTarea($activo,$idp)) {
return true;

}
else{
return false;
	}

}
else{
	
	echo"<script language ='javascript'>alert('ERROR: con el proyecto seleccionado ');</script>";
}

?>
