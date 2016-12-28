<?php
include ('ModuloHeaderP.php');

?>
<div id="page-wrapper">
<div class="row">
   <div class="col-lg-12">
                    <h1>Datos de Documentación <i class="fa fa-book"></i></h1>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       Desde aquí podrás consultar Los Datos de diferentes registros de la documentación
                       como las Herramientas de Programación disponibles y su descripcion, Los Tipos de Diagramas 
                       y los tipos de Prueba.
                    </div>
                </div>
                </div><hr>
 <div class="row">
  <div class="col-lg-12">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h2 class="panel-title text-center">Datos de Documentación</h2>
      </div>
        <div class="panel-body bg-danger">
          <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <div class="btn-group" role="group">
             <a id="DOC1" type="button" class="btn btn-default" target="1">Ver Tipos de Diagramas</a> 
            </div>
            <div class="btn-group" role="group">
             <a id="DOC2" type="button" class="btn btn-default" target="4">Ver Herramientas de Programación</a> 
            </div>
             <div class="btn-group" role="group">
             <a id="DOC3" type="button" class="btn btn-default" target="4">Ver Tipos de Prueba</a> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-16" id="panelDOC1" name="panelDOC1"style="display:none">
    <div class="col-lg-12">
           <div class="panel panel-info">
        <div class="panel-heading">
          <h4 class="panel-title"> <i class="fa fa-sitemap"></i> Diagramas</h4></div>
          <div class="panel-body">
            <div class="col-lg-12">
              <div class="list-group ">
              <?php
              $documentacionAdmin->readDiagramasUser();
              ?>
              </div>
              </div>
              </div>
              </div>
          	
          </div>
          
  </div>
   <div class="col-lg-16" id="panelDOC2" name="panelDOC2" style="display:none">
   <div class="col-lg-12">
           <div class="panel panel-info">
        <div class="panel-heading">
          <h4 class="panel-title"> <i class="fa fa-code"></i> Herramientas de Programación</h4></div>
          <div class="panel-body">
            <div class="col-lg-12">
              <div class="list-group">
              <?php
              $documentacionAdmin->readLenguajesUser();
              ?>
              </div>
              </div>
              </div>
              </div>
          	
          </div>
  	
  		
  </div>
   <div class="col-lg-16" id="panelDOC3" name="panelDOC3" style="display:none">
   <div class="col-lg-12">
           <div class="panel panel-info">
        <div class="panel-heading">
          <h4 class="panel-title"> <i class="fa fa-cubes"></i> Tipos de Prueba</h4></div>
          <div class="panel-body">
            <div class="col-lg-12">
              <div class="list-group">
              <?php
              $documentacionAdmin->readPruebasUser();
              ?>
              </div>
              </div>
              </div>
              </div>
          	
          </div>
  	
  		
  </div>




<?php include ("ModuloFooterP.php"); ?>