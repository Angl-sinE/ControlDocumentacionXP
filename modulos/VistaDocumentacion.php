<?php 
include ('ModuloHeaderP.php');
$tituloPanel1 = "Planificación";
$tituloPanel2 = "Diseño";
$tituloPanel3 = "Codificación";
$tituloPanel4 = "Pruebas";

?>
<div id="page-wrapper">
<?php

// Id de la planificación
$queryPlan = ("SELECT idPlanificacion FROM planificacion WHERE idProyecto = '$idProyectoActivo'");
$idPlan=$documentacion->getIdPlanificacion($queryPlan);
// Id del diseño
$queryDiseno = ("SELECT idDiseno FROM diseño WHERE idProyecto = '$idProyectoActivo'");
$idDiseno=$documentacion->getIdDiseno($queryDiseno);
// Id de la codificacion
$queryCode = ("SELECT idCodificacion FROM codificacion WHERE idProyecto = '$idProyectoActivo'");
$idCode = $documentacion->getIdCodificacion($queryCode);
// Id de la prueba
$queryPrueba =("SELECT idPruebas FROM pruebas WHERE idProyecto = '$idProyectoActivo'");
$idPrueba = $documentacion->getIdPruebas($queryPrueba);

?>

  <div class="row">
    <div class="col-lg-12">
      <h1>Documentación <i class="fa fa-archive"></i></h1>
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Desde aqui podras agregar los elementos  que componen la documentación de tu proyecto, que esta
        dividido en 4 Fases. Debes completar todos los campos para finalizar el proyecto, encontrarás mas detalles en el panel 'Información'.
      </div>
    </div>
  </div>
  <hr>
<!-- Botones de seleccion de panel-->
<div class="row">
<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h2 class="panel-title text-center">Fases</h2>
			</div>
				<div class="panel-body bg-danger">
					<div class="btn-group btn-group-justified" role="group" aria-label="...">
  					<div class="btn-group" role="group">
    				 <button id="p1" type="button" class="btn btn-default" target="1">Planificacion</button> 
  					</div>
  					<div class="btn-group" role="group">
    				 <button id="p2" type="button" class="btn btn-default" target="2">Diseño</button> 
  					</div>
  					<div class="btn-group" role="group">
    				 <button id="p3" type="button" class="btn btn-default" target="3">Codificación</button> 
  					</div>
  					<div class="btn-group" role="group">
    				 <button id="p4" type="button" class="btn btn-default" target="4">Pruebas</button> 
  					</div>
					</div>
				</div>
			</div>
</div>
</div>
<div class="col-md-12 text-center">
 <button id="btn-fav" name="btn-fav" type="button" class="btn btn-success" ><i class="fa fa-star"></i> Tutoriales Favoritos</button> 
</div>
<br><br><br>
<div id="favTut" name="favTut" class="col-lg-12" style="display:none">
<div  class="col-lg-12">
<div class="row">
  <div  class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Tutoriales Favoritos</h3>
         </div>
       <div  class="panel-body">
       <div id="carouselFav" class="carousel slide" data-ride="carousel">
       <div class="row">
        <div class="col-xs-offset-3 col-xs-6 ">
            <div class="carousel-inner"  >
                <div class="item active " >
                    <div class="carousel-content">
                     <h3 class="text-center text-info">Tutoriales Favoritos</h3>
                      <p class="text-center lead">Consulta los tutoriales Marcados como Favoritos</p>
                      </div>
                </div>
                <?php

                   $tutorial->readTutorialFav($idUrol);
                   ?>
                </div>
        </div>
      </div>
     <a class="left carousel-control" href="#carouselFav" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carouselFav" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<br>
<br>

<!--Barra de Progreso de la documentacion-->
  <h3 id="progress-stacked">Progreso</h3>
  <div id="finalizado" name="finalizado" style="display:none"><h2> ¡Exito! La Documentación del Proyecto esta Completa</h2></div>
	<div class="bs-example">
    <div class="progress progress-striped active">
       <div class="progress-bar" style="width:50 %"></div>
    </div>
  </div>
 <!-- Mensajes de Registro de Exito --> 
 <div class="row" style="display:none" id="res_exito">
   <div class="col-lg-12">
   <div class="alert alert-dismissable alert-success">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong id="exito_msgPlan"></strong></div>
   </div></div>
<div class="row" style="display:none" id="res_error">
   <div class="col-lg-12">
   <div class="alert alert-dismissable alert-danger">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong id="error_msgPlan"></strong></div>
   </div></div>


<!-- Paneles de la Documentacion-->
<div class="row">
  <!-- Panel 1-->
  <?php include ('VistaDocPlanificacion.php'); ?> 
  <!--  FIN Panel 1-->
  <!-- Panel 2 -->
  <?php include ('VistaDocDiseno.php'); ?>
  <!--  FIN Panel 2-->
  <!-- Panel 3 -->
  <?php include('VistaDocCodificacion.php'); ?>
  <!-- FIN Panel 3-->
  <!--Panel 4-->
  <?php include ('VistaDocPruebas.php'); ?>
  <!-- FIN Panel 4-->
<div id="conD" name="conD" class="col-lg-12" style="display:none">
<div class="col-lg-12 text-center">
         <form id="formaConfirmaDoc" name="formaConfirmaDoc">
         <div class="form-group">
           <input type ="hidden" id="idPlanifica" name="idPlanifica" value="<?php echo $idPlan; ?>" >
           <input type ="hidden" id="idDiseno" name="idDiseno" value="<?php echo $idDiseno; ?>" >
           <input type ="hidden"  id="idCodifica" name="idCodifica" value="<?php echo $idCode; ?>" >
           <input type ="hidden" id="idPruebas" name="idPruebas" value="<?php echo $idPrueba; ?>">
            <div class="form-group">
            <input type="submit" id="docEnd"  name ="docEnd" value="Confirmar Documentación" class="btn btn-lg btn-info ">
               </div>
            </form>
         </div>
         </div>
        

</div>
</div>

<?php
include ('ModuloFooterP.php');
?>