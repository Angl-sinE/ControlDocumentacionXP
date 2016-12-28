<?php
include('datos/Config.php');
include ('ModuloProyecto.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$proyecto = new Proyecto($db);

if(!empty($_GET["ready"] && $_GET["id"] && $_GET["u"] )){
$idp=intval($_GET["id"]);
$ready=$_GET["ready"]; 
$idU =$_GET["u"];

if ($proyecto->selectProyectoDesactiva($ready,$idp,$idU)) {
echo"<script language ='javascript'>alert('El Proyecto fue desactivado');</script>";
echo "<script language='javascript'> window.location.href ='VistaProyecto.php' </script>"; 


}
else{
	return false;
//echo"<script language ='javascript'>alert('Oops: Solo puedes activar un proyecto a la vez');</script>";
//echo "<script language='javascript'> window.location.href ='VistaProyecto.php' </script>"; 


	}

}
else{
	return false;
	
}

?>