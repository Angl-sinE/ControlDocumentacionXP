<?php
include ('ModuloHeaderP.php');

?>
<div id="page-wrapper">
<div class="row">
        <div class="col-lg-12">
        <h1>Papelera de Registros de Diseño <i class="fa fa-trash"></i></h1>
        <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Restaura los campos eleminados.
                    </div>
        </div>
    </div>
     <hr>
       <div class="col-lg-12">
          <div class=" panel panel-danger">
            <div class="panel-heading">
              <h3 class="panel-title text-center">Roles Borrados</h3>
            </div>
            <div class="panel-body">
              <table data-toggle="table">
              <thead>
              <tr>
              <th class="info">Proyecto</th>
              <th class="info">Rol</th>
              <th>Función</th>
              <th class="info">Restaurar</th>
              </tr>
              </thead>
              <tbody>
              <?php
              $documentacion->readRolesDeSistemaTrash($idProyectoActivo);
              ?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
         <div class="col-lg-12">
          <div class=" panel panel-danger">
            <div class="panel-heading">
              <h3 class="panel-title text-center">Casos de Uso Borrados</h3>
            </div>
            <div class="panel-body">
              <table data-toggle="table">
              <thead>
              <tr>
              <th class="info">Proyecto</th>
              <th class="info">Caso de Uso</th>
              <th class="info">Rol</th>
              <th class="info">Acción</th>
              <th>Pre-Condición</th>
              <th>Post-Condición</th>
              <th>Flujo Normal</th>
              <th>Flujo Alternativo</th>
              <th class="info">Borrar</th>
              </tr>
              </thead>
              <tbody>
              <?php
              $documentacion->readCasosDeUsoTrash($idProyectoActivo);
              ?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class=" panel panel-danger">
            <div class="panel-heading">
              <h3 class="panel-title text-center">Diagramas Borrados</h3>
            </div>
            <div class="panel-body">
              <table data-toggle="table">
              <thead>
              <tr>
              <th class="info">Proyecto</th>
              <th class="info">Tipo</th>
              <th>Diagrama</th>
               <th class="info">Restaurar</th>
              </tr>
              </thead>
              <tbody>
              <?php
              $documentacion->readDiagramaTrash($idProyectoActivo);
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