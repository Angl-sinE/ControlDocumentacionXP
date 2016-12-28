<?php
session_start();
include('datos/Config.php');
include ('ModuloLogin.php');
include ('ModuloProyecto.php');
include ('ModuloDocumentacion.php');
include ('ModuloDocumentacionAdmin.php');
include ('ModuloComentAdmin.php');
include('ModuloTarea.php');
include('ModuloReporte.php');
include('ModuloTutorial.php');


// Iniciar Base de Datos
$database = new Configuracion();
$db= $database->conectaBD();
////////////////////// iniciar la clase Usuario
$usuario = new Usuario($db);
/////////////////////////// Sesiones 
$id = $_SESSION['id_user'];
$nombre = $_SESSION['nombre'];
$user=$_SESSION['user'];
$idUrol=$usuario->getIdURol($id);
/////////////////////////// Proyecto
$proyecto = new Proyecto($db);
/////////////////////////// Tarea
$tarea = new Tarea($db);
//////////////// Documentacion 
$documentacion = new Documentacion($db);
$documentacionAdmin = new DocumentacionAdmin($db);
//////////////////// comentarios
$comentarios = new Comentario($db);
//////////////////////////// Reporte
$reporte = new Reporte($db);
////////////////// Tutorial
$tutorial = new Tutorial($db);



if (!$usuario->inicio_sesion()){
    header("location: ../index.php");
}
if (isset($_GET['q'])){
    $usuario->fin_sesion();
    header("location:../index.php");
}


// Id del Proyecto Activo
$queryidA=("SELECT idProyecto FROM proyecto WHERE idUsuario = '$idUrol' AND selectProyecto = 's'");
$idpA=$proyecto->getProyectoIdActivo($queryidA);
$idProyectoActivo=intval($idpA);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestiona Tus Proyectos</title>
    <link rel="stylesheet" type="text/css" href="../recursos/css/bootstrap.min2.css" />
    <link rel="stylesheet" type="text/css" href="../recursos/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../recursos/css/local.css" />
    <link rel="stylesheet" type="text/css" href="../recursos/css/jasny-bootstrap.min.css"  />
    <link rel="stylesheet" type="text/css" href="../recursos/css/awesome-bootstrap-checkbox.css" />
    <link rel="stylesheet" type="text/css" href="../recursos/lib/table/dist/bootstrap-table.css" />
    <link rel="stylesheet" type="text/css" href="../recursos/lib/carousel/dist/css/bootstrap-modal-carousel.css" />
    <body>

     <br><br>    
<div id="page-wrapper" id="contenido" name="contenido"> 

<div class="row">
 <div class="col-lg-16">
<?php 
$reporte->readProyectoFinal($idProyectoActivo);
?>
 </div>
</div>
<br>
<div class="row">
  <div class="col-lg-12">
  
  <div class="panel panel-info">
   <div class="panel-heading"><h2 class="text-center"> Planificación</h2></div> 
   <div class="panel-body">

     <div class="col-lg-12">
       <h3 class="text-center">
       <i class="fa fa-users fa-4x"></i>
       <br><br>
       <span class="label label-info"> Historias de Usuario</span></h3>
       <?php
       $reporte->readHistoriasFinal($idProyectoActivo);
       ?>
     </div>
     <div class="col-lg-12">
        <h3 class="text-center"><span class="label label-info">Requisitos del Sistema</span></h3>
        <div class="col-lg-6">
      <h3 class="text-center">
       <i class="fa fa-wrench fa-4x"></i>
       <br><br>
      <span class=" label label-info">Funcionales</span></h3>
        <?php 
      $reporte->readRequisitosFFinal($idProyectoActivo);
        ?>
        </div>
        <div class="col-lg-6 ">
          <h3 class="text-center">
           <i class="fa fa-plus-circle fa-4x"></i>
       <br><br>
          <span class=" label label-info"> No Funcionales</span></h3>
         <?php
          $reporte->readRequisitosNFFinal($idProyectoActivo);
          ?>
         </div>
     </div>
   </div>
  </div>
  </div>
</div><br>
<div class="row">
  <div class="col-lg-12">
  
  <div class="panel panel-warning">
   <div class="panel-heading"><h2 class="text-center"> Diseño</h2></div> 
   <div class="panel-body">
     <div class="col-lg-12 text-center">

       <h3 class="text-center">
        <i class="fa fa-user fa-4x"></i>
       <br><br>
       <span class="label label-warning">Roles</span></h3>
      
       <?php
       $reporte->readRolesFinal($idProyectoActivo);
       ?>
      
     </div>
     <div class="col-lg-12">
        <h3 class="text-center">
         <i class="fa fa-tasks fa-4x"></i>
       <br><br>
        <span class="label label-warning">Casos de Uso</span></h3>
       <?php 
      $reporte->readCasoDeUsoFinal($idProyectoActivo);
        ?>
     
     </div>
     <div class="col-lg-12">
          <h3 class="text-center">
           <i class="fa fa-sitemap fa-4x"></i>
       <br><br>
          <span class=" label label-warning">Diagramas</span></h3>
        <div class=""></div>
         <?php
          $reporte->readDiagramasFinal($idProyectoActivo);
          ?>
         </div>
   </div>
  </div>
  </div>
</div>

<div class="row">
   <div class="col-lg-12">
  
  <div class="panel panel-success">
   <div class="panel-heading"><h2 class="text-center">Codificación</h2></div> 
   <div class="panel-body">
     <div class="col-lg-12">
       <h3 class="text-center">
        <i class="fa fa-code fa-4x"></i>
       <br><br>
       <span class="label label-success">Herramientas de Codificación</span></h3>
     
       <?php
       $reporte->readHerramientasFinal($idProyectoActivo);
       ?>
       
     </div>
     </div>
  </div>
  </div>
</div>

<div class="row">
 <div class="col-lg-12">
  
  <div class="panel panel-danger">
   <div class="panel-heading"><h2 class="text-center">Pruebas</h2></div> 
   <div class="panel-body">
      <div class="col-lg-12">
        <h3 class="text-center">
         <i class="fa fa-cogs fa-4x"></i>
       <br><br>
        <span class="label label-danger">Pruebas del Proyecto</span></h3>
       <?php 
      $reporte->readPruebasFinal($idProyectoActivo);
        ?>
      </div>
     </div>
  </div>
  </div>  
</div>



</div>
</div>
<script type="text/javascript" src="../recursos/js/jqueryMaster.js"></script>
<script type="text/javascript" src="../recursos/js/bootstrap.min.js"></script>

<script type="text/javascript" src="../recursos/lib/table/dist/bootstrap-table.min.js" ></script>
<script type="text/javascript" src="../recursos/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="../recursos/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<script type="text/javascript" src="../recursos/js/jasny-bootstrap.min.js" ></script>
<script type="text/javascript" src="../recursos/lib/carousel/dist/js/bootstrap-modal-carousel.min.js"></script>  
<script type="text/javascript" src="../recursos/lib/canvas/dist/html2canvas.js"></script> 
<script type="text/javascript" src="../recursos/js/scriptPanel.js"></script>
<script type="text/javascript" src="../recursos/js/scriptTutorial.js"></script> 

<script type="text/javascript" src="../recursos/js/jqueryForm.js" ></script>
<script type="text/javascript" src="../recursos/js/formvalidator/dist/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="../recursos/js/formvalidator/dist/js/language/es_ES.js"></script>
<script type="text/javascript" src="../recursos/js/validator.js"></script>
<script type="text/javascript" src="../recursos/js/validaDoc.js"></script>
<script type="text/javascript" src="../recursos/js/DocReporte.js"></script> 
<script type="text/javascript">
$('#imp').on('click', function(){		
		html2canvas(document.body, {
	        onrendered: function(canvas) {
	        	
	        	$("#cotenido").hide();
	            document.body.appendChild(canvas);
	            window.print();
	            $('canvas').remove();
	            //$("#page").show();
	        }
	    });
	    
	});
</script>	  
<!-- estilo Paneles de Colapso -->
<style>
.panel-heading span {
    margin-top: -20px;
 }

.clickable {
    cursor: pointer;
}    
</style>


</body>
</html>

 
    