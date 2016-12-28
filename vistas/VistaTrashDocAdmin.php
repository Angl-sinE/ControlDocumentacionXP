<?php
include ('VistaHeaderAdmin.php');

?>
<div id="page-wrapper">
<div class="row">
        <div class="col-lg-12">
        <h1>Papelera de Registros Para Documentación <i class="fa fa-trash"></i></h1>
        <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Restaura los campos eleminados.
                    </div>
        </div>
    </div>
     <hr>
        <div class="col-lg-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Diagramas  <i class="fa fa-sitemap"></i> </h3>
                </div>
                <div class="panel-body">
                <div class="col-md-12">
                  <table class="table table-hover" data-toggle="table">
                  <thead>
                    <tr>
                      <th>Diagrama</th>
                      <th class="success">Función</th>
                      <th class="info">Restaurar</th>
                      </tr>
                  </thead>
                 <tbody>
                        <?php
                       $docAdmin->readDiagramasTrash();
                        ?>
                  </tbody>
                  </table>
                  
              </div>

            </div>
          </div>
        </div>
        <div class="col-lg-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Lenguajes  <i class="fa fa-code"></i> </h3>
                </div>
                <div class="panel-body">
                <div class="col-md-12">
                  <table class="table table-hover" data-toggle="table">
                  <thead>
                    <tr>
                      <th>Lenguaje</th>
                      <th class="success">Tipo</th>
                       <th class="success">Descrcipción</th>
                      <th class="info">Restaurar</th>
                      </tr>
                  </thead>
                 <tbody>
                        <?php
                       $docAdmin->readLenguajesTrash();
                        ?>
                  </tbody>
                  </table>
                  
              </div>

            </div>
          </div>
        </div>
      <div class="col-lg-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Pruebas   <i class="fa fa-cubes"></i> </h3>
                </div>
                <div class="panel-body">
                <div class="col-md-12">
                  <table class="table table-hover" data-toggle="table">
                  <thead>
                    <tr>
                      <th>Tipo de Prueba</th>
                      <th class="success">Descripción</th>
                      <th class="info">Restaurar</th>
                      </tr>
                  </thead>
                 <tbody>
                        <?php
                       $docAdmin->readPruebasTrash();
                        ?>
                  </tbody>
                  </table>
                  
              </div>

            </div>
          </div>
        </div>
        <div class="col-lg-12 text-left">
            <a href="VistaDocAdmin.php" class="btn btn-warning btn-lg "> Regresar <i class="glyphicon glyphicon-backward"></i> </a>
            <br><br> 
          </div>



<?php include ('VistaFooterAdmin.php'); ?>     