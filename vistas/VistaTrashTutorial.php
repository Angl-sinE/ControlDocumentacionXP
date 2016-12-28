<?php
include ('VistaHeaderAdmin.php');

?>
<div id="page-wrapper">
<div class="row">
        <div class="col-lg-12">
        <h1>Papelera de Registros de Tutoriales <i class="fa fa-trash"></i></h1>
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
                    <h3 class="panel-title">Tutoriales <i class="fa fa-flask"></i> </h3>
                </div>
                <div class="panel-body">
                <div class="col-md-12">
                  <table class="table table-hover" data-toggle="table">
                <thead>
                 <thead>
                    <tr>
                      <th class="info">Tutorial</th>
                      <th class="info">Categoria</th>
                      <th>Contenido</th>
                      <th>Fuente</th>
                      <th>Imagen</th>
                     <th class="info">Restaurar</th>
                      </tr>
                  </thead>
                 <tbody>
                    <?php
                    $tutorial->readTutorialTrash();
                    ?>   
                  </tbody>
                  
                  </table>
                  
              </div>

            </div>
          </div>
        </div>
        <div class="col-lg-12 text-left">
            <a href="VistaTareaAdmin.php" class="btn btn-warning btn-lg "> Regresar <i class="glyphicon glyphicon-backward"></i> </a>
            <br><br> 
          </div>



<?php include ('VistaFooterAdmin.php'); ?>     