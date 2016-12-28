<?php
include ("VistaHeaderAdmin.php");
?>
<div id="page-wrapper">
  <div class="col-lg-12">
        <h1>Ver Proyectos Creados </h1>
      </div>
       <div class="col-sm-9 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Proyectos </h3>
                </div>
                <div class="panel-body">                    
                  <table class="table table-hover" data-toggle="table">
                  <thead>
                    <tr>
                      <th>Usuario</th>
                      <th>Proyecto</th>
                      <th>Descripcion</th>
                      <th>Categoria</th>
                      <th>Creado</th>
                      <th>Ultima Modificación</th>
                      </tr>
                  </thead>
                 <tbody>
                        <?php
                        $proyecto->readProyectoAdmin();
                        ?>
                  </tbody>
                  </table>
                    
                </div>
            </div>
        </div>
   
</div>

<?php
include ("VistaFooterAdmin.php");
?>