<?php
include ("VistaHeaderAdmin.php");
?>
<div id="page-wrapper">
	<div class="col-lg-12">
    		<h1>Ver Proyectos Creados </h1>
    	</div>
    	 <div class="col-sm-16 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Proyectos <i class="fa fa-folder-open"></i></h3>
                </div>
                <div class="panel-body ">
                 <a  href="VistaProyectoAdmin.php" type="button" class="btn btn-primary "><i class="fa fa-refresh"></i> </a>
                 <br><br>  

                  <table class="table table-hover bg-info" data-toggle="table">
                  <thead>
                    <tr>
                      <th>Usuario</th>
                      <th>Proyecto</th>
                      <th>Descripcion</th>
                      <th>Categoria</th>
                      <th>Otra</th>
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
        <div class="col-sm-9 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Categorias <i class="fa fa-tasks"></i></h3>
                </div>
                <div class="panel-body">
                 <button id="nuevoCategoria" type="button" class="btn btn-info "> <i class="fa fa-plus"></i> Agregar Categorias</button>
                  <a  href="VistaProyectoAdmin.php" type="button" class="btn btn-primary "><i class="fa fa-refresh"></i> </a>                                
                 <br><br>
                  <div class="row" id="exitoCat" name="exitoCat" style="display:none">
                   <div class="col-md-12">
                    <div class="alert alert-dismissable alert-success">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong id="exito_msgCat"></strong></div>
                    </div></div>
                    <div class="row" id="errorCat" name="errorCat" style="display:none">
                    <div class="col-md-12">
                    <div class="alert alert-dismissable alert-danger">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong id="error_msgCat"></strong></div>
                    </div></div> 

                <div class="col-md-12" id="registroCategoria" style="display:none">
               <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"> Agrega Nueva Categoria <i class="fa fa-plus"></i> </h3>
                </div>
                <div class="panel-body">
               
                <form  id="formaCategoria" name="formaCategoria"  >
                <div class="form-group">
                              <label>Nombre de la Categoria</label>
                              <input  class="form-control" id="nombre" name="nombre"  required>
                              </div>
                               <br>
                                <input  name="agregarCategoria"id="agregarCategoria" type="submit" class="btn btn-success" value="Agregar Categoria">
                                <button type="reset" class="btn btn-danger " >Borrar Datos</button>
                  </form>
                  </div>
                </div>
                 
               </div>                   
                  <table class="table table-hover" data-toggle="table">
                  <thead>
                    <tr>
                      <th class="info">Categoria</th>
                             
                      </tr>
                  </thead>
                 <tbody>
                        <?php
                        $proyecto->readCategorias();
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