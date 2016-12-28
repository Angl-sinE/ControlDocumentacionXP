<?php
include ('ModuloHeaderP.php');
$titulo_pagina ="Papelera de Proyectos";
?>
<div id="page-wrapper">
<div class="row">
        <div class="col-lg-12">
        <h1><?php  echo $titulo_pagina;   ?> <i class="fa fa-trash"></i></h1>
        <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Restaura los proyectos eleminados al panel de proyectos creados.
                    </div>
        </div>
    </div>
     <hr>

<div class="col-lg-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h4 class="panel-title">Mis Proyectos Eliminados</h4>
                    </div>
                    <div class="panel-body">
                 <table data-toggle="table">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Categoria</th>
                      <th>Categoria Unica</th>
                      <th>Fecha de Inicio</th>
                      <th>Ultima Edición</th>
                      <th>Restaurar</th>
                     </tr>
                  </thead>
                 <tbody>
                        <?php
                        
                        $proyecto->readProyectot($idUrol);
                        ?>
                  </tbody>
                  </table>
                 </div>

                </div>
                <a href="VistaProyecto.php" class="btn btn-warning btn-lg "> Regresar <i class="glyphicon glyphicon-backward"></i> </a>      
            </div>
<?php include ('ModuloFooterP.php'); ?>                