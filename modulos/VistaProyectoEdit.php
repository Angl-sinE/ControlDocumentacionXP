<?php 
include ('ModuloHeaderP.php');

?>
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
    <h1>Editar Proyecto <i class="fa fa-edit"></i></h1>
    </div>
</div>
<hr>
<div class="col-lg-6">

<?php

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

$proyecto->idProyecto = $id;

$proyecto->proyectoParaUpdate();
if(isset($_GET["id"])){
$idP= $_GET['id'];

$proyecto->proyectoParaUpdate();
} 

if (isset($_POST['update'])) {

    $proyecto->idProyecto = $idP;
    $proyecto->nombreProyecto = $_POST['nombreProyecto'];
    $proyecto->descripcionProyecto = $_POST['descripcionProyecto'];
    $proyecto->categoriaProyecto = $_POST['categoriaProyecto'];
    $categoriaOtro = isset($_POST['categoriaOtro']);

 if ($proyecto->updateProyecto()){
   echo'
        <div class="row">
   <div class="col-lg-16">
   <div class="alert alert-dismissable alert-success">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong>Exito! El proyecto ha sido editado!</strong></div>
   </div></div>';
        }
else {
        echo '
        <div class="row">
   <div class="col-lg-16">
   <div class="alert alert-dismissable alert-danger">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong>Oops! Intenta Seleccionar el proyecto de nuevo</strong></div>
   </div></div>';

         }

}


?>


    <div class="panel panel-success">
 				<div class="panel-heading">
 					<h4 class="panel-title">Modifica los Datos del Proyecto</h4>
                </div>
 					<div class="panel-body">
 						<div class="col-lg-12">		
 							<form role="form" action="VistaProyectoEdit.php?id=<?php echo $idProyecto; ?>" method="post">
 							
 								<div class="form-group">
                            	<label>Nombre del Proyecto</label>
                            	<input class="form-control" name="nombreProyecto" value="<?php echo $nombreProyecto; ?>">
                           		</div>
                           		<div class="form-group">
                            	<label>Descripción</label>
                            	<textarea class="form-control" rows="5" col="6" name="descripcionProyecto"><?php echo $descripcionProyecto; ?></textarea>
                           		</div>
                                 <div class="form-group">
                                <label>Categoria</label>
                                <select class="form-control" name="categoriaProyecto" id="categoriaProyecto">
                                <option>Selccionar...</option>
                                <?php 

                                $documentacionAdmin->selectCategorias();
                                ?>
                                </select>
                                </div>
                                <div class="form-group">
                                <label>Nombre de Otra Categoria</label>
                                <input class="form-control"  name="categoriaOtro" id="categoriaOtro" value="<?php echo $categoriaOtro; ?>">
                                </div>
                                 
                        		<br>
                                <input type="submit" name ="update" value="Actualizar"class="btn btn-warning pull-middle">
                                <button type="reset" class="btn btn-danger pull-right" >Borrar Datos</button>
            			</form>
                    	</div>
 						
 					</div>
                    </div>
                <a href="VistaProyecto.php" class="btn btn-warning btn-lg "> Regresar <i class="glyphicon glyphicon-backward"></i> </a>
                <br><br><br><br>   
 				</div>

 		</div>
</div>

<?php 
include ('ModuloFooterP.php');
?>