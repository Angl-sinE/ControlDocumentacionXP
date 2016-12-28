<?php
include('ModuloHeaderP.php');

if(!empty($_GET["id"])){

$idt=intval($_GET["id"]);
$idUFav=$idUrol; 


if ($tutorial->createTutorialFav($idt,$idUFav)) {
echo"<script language ='javascript'>alert('Marcado como Favorito');</script>";
echo "<script language='javascript'> window.location.href ='VistaTutorial.php' </script>"; 

	return true;
	
	}
else{
echo"<script language ='javascript'>alert('El tutorial ya esta marcado');</script>";
echo "<script language='javascript'> window.location.href ='VistaTutorial.php' </script>"; 
	return false;

	}

}
else{
	echo"<script language ='javascript'>alert('No se encontrol el usuario o la ID del tutorial');</script>";

	return false;
	
}

?>
