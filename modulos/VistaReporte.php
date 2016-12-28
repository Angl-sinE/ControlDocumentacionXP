<?php
include ("ModuloHeaderP.php");
?>
<div id="page-wrapper">
<div class="row">
                <div class="col-lg-12">
                    <h1>Reporte de la Documentación <i class="fa fa-tachometer"></i></h1>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       Imprime un Reporte de todos los registros de tu Proyecto y Documentación

                    </div>
                </div>
            </div><hr>
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
       <h3 class="text-center"><span class="label label-info">Historias de Usuario</span></h3>
       <?php
       $reporte->readHistoriasFinal($idProyectoActivo);
       ?>
     </div>
     <div class="col-lg-12">
        <h3 class="text-center"><span class="label label-info">Requisitos del Sistema</span></h3>
        <div class="col-lg-6">
      <h3 class="text-center"><span class=" label label-info">Funcionales</span></h3>
        <?php 
      $reporte->readRequisitosFFinal($idProyectoActivo);
        ?>
        </div>
        <div class="col-lg-6 ">
          <h3 class="text-center"><span class=" label label-info"> No Funcionales</span></h3>
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
       <h3 class="text-center"><span class="label label-warning">Roles</span></h3>
      
       <?php
       $reporte->readRolesFinal($idProyectoActivo);
       ?>
      
     </div>
     <div class="col-lg-12">
        <h3 class="text-center"><span class="label label-warning">Casos de Uso</span></h3>
       <?php 
      $reporte->readCasoDeUsoFinal($idProyectoActivo);
        ?>
     
     </div>
     <div class="col-lg-12">
          <h3 class="text-center"><span class=" label label-warning">Diagramas</span></h3>
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
       <h3 class="text-center"><span class="label label-success">Herramientas de Codificación</span></h3>
     
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
        <h3 class="text-center"><span class="label label-danger">Pruebas del Proyecto</span></h3>
       <?php 
      $reporte->readPruebasFinal($idProyectoActivo);
        ?>
      </div>
     </div>
  </div>
  </div>  
</div>
<div class="col-lg-12">
<div class="row">
  <div class="col-lg-12 text-center ">
    <a href="ImagenPagina.php"  class="btn btn-info btn-lg "><i class="fa fa-file-image-o"></i> Ver Documentación</a>
      </div>
      
      </div>
      </div>
      <br><br><br>


<?php include ("ModuloFooterP.php"); ?>
