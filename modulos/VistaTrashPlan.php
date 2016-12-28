<?php
include ('ModuloHeaderP.php');

?>
<div id="page-wrapper">
<div class="row">
        <div class="col-lg-12">
        <h1>Papelera de Registros de Planificación <i class="fa fa-trash"></i></h1>
        <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Restaura los campos eleminados.
                    </div>
        </div>
    </div>
     <hr>

<div class="col-lg-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">Historias Eliminadas</h4>
                    </div>
                    <div class="panel-body">
                    <table data-toggle="table">
                  <thead>
                   <tr>
                   <th class="info">Proyecto</th>
                   <th class="info">Historia</th>
                   <th>Descripcion</th>
                   <th>Prioridad</th>
                   <th>Iteracion</th>
                   <th>Observaciones</th>
                  <th class="info">Restaurar</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $documentacion->readHistoriasTrash($idProyectoActivo);
                  ?>             
                  </tbody>
                 </table>
                
                 </div>

                </div>
                    
            </div>
  <div class="col-lg-12">
            <div class=" panel panel-danger">
              <div class="panel-heading">
               <h3 class="panel-title text-center">Requisitos Eliminados</h3></div>
                <div class="panel-body">
                 <table data-toggle="table">
                  <thead>
                   <tr>
                   <th class="info">Proyecto</th>
                   <th>Funcionales</th>
                   <th>No-Funcionales</th>
                  <th class="info">Restaurar</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $documentacion->readRequerimientosTrash($idProyectoActivo);
                   
                  ?>             
                  </tbody>
                 </table>
                </div>
            </div>
          </div> 
          <div class="col-lg-12">
            <a href="VistaDocumentacion.php" class="btn btn-warning btn-lg "> Regresar <i class="glyphicon glyphicon-backward"></i> </a>
            <br><br>          
          </div>
             
<?php include ('ModuloFooterP.php'); ?>                