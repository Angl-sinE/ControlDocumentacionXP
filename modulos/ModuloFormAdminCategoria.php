<?php

include('datos/Config.php');
include ('ModuloProyecto.php');
// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
//////////////// Documentacion
$proyecto = new Proyecto($db);

if ($_POST['nombre'] != '')
  
  {

 $categoriaN = $_POST['nombre'];
   if ($proyecto->createCategoria($categoriaN)) {
  echo 'Exito! Categoria Creada';
  return true;
  } 
  else{
      echo 'Oops! La categoria no se puede repetir ';
    return false;
  }

}else{
  echo 'Oops! intenta de nuevo, recarga la pagina';
  return false;
}
 

?>