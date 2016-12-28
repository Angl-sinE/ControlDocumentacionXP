<?php
include ("ModuloHeaderP.php");
$titulo_pagina ="Administra Tareas";
?>
<div id="page-wrapper">

<?php
if (isset($_GET['delete_id'])) {
$tarea->deleteTarea();
   }
?>
<div class="row">
    <div class="col-lg-12">
       <h1><?php  echo $titulo_pagina;  ?> <i class="fa fa-tasks"></i></h1>
        <div class="alert alert-success alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         Desde aquí podrás administrar las Tareas del proyecto, consulta el panel de Información para más detalles.
        </div>
    </div>
    </div>
     <hr>
<div class="row">
   <div class="col-lg-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">Tareas Activas</h4>
                    </div>
                    <div class="panel-body">
                    <table data-toggle="table">
                    <thead>
                        <tr>
                            <th class="info">Nombre</th>
                            <th>Categoria</th>
                            <th class="danger">Desactivar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       
                        $tarea->readTarea();
                        ?>
                    </tbody>
                    </table>
                      
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h4 class="panel-title">Información</h4></div>
                    <div class="panel-body">
                      <div class="col-lg-12">
                        <div class="list-group">
                          <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">Tareas Activas</h4>
                            <p class="list-group-item-text">
                              Las Tareas son marcadores que te ayudan a tener 
                              un orden de secuencia de acciones a realizar en la documentacion de tu proyecto.
                            </p>
                            <p class="list-group-item-text">
                              Las Tareas que inician con <strong>Registrar</strong> son aquellas que se registran 
                              en la documentacion llenando los campos respectivos.
                            </p>
                            <p class="list-group-item-text">
                              Las que inician con <strong>Insertar</strong> son aquellas
                              que se agregan a la documentacion insertando un archivo previamente en una carpeta de
                              tu computador.
                            </p>
                            <p class="list-group-item-text">
                              Puedes desactivar tareas que consideres que no son necesarias para 
                              tu proyecto. Sin embargo el proyecto optimo es aquel que cumple todas las tareas.
                            </p>
                          </a>
                          <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">Tareas Inactivas</h4>
                            <p class="list-group-item-text">
                            Las Tareas inactivas no son contadas en tu rendimiento de proyecto.</p>
                          </a>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
             
      </div>         
           <div class="col-lg-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h4 class="panel-title">Tareas Inactivas</h4>
                    </div>
                    <div class="panel-body">
                   <table data-toggle="table">
                    <thead>
                        <tr>
                            
                            <th class="info">Nombre</th>
                            <th class="info">Categoria</th>
                            <th>Descripcion</th>
                            <th class="info">Activar</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       
                        $tarea->readTarea2();
                        ?>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
            
      </div>         


</div>

<?php include ("ModuloFooterP.php"); ?>