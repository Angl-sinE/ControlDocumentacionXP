<?php
include ("VistaHeaderAdmin.php");
?>
<div id="page-wrapper">
	<div class="col-lg-12">
    		<h1>Administrar Tareas  </h1>
    	</div>
    	 <div class="col-sm-9 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Tareas <i class="fa fa-tasks"></i></h3>
                </div>
                <div class="panel-body">
                 <button id="nuevoTarea" type="button" class="btn btn-info "> <i class="fa fa-plus"></i> Agregar Tareas</button>
                  <a  href="VistaTareaAdmin.php" type="button" class="btn btn-primary "><i class="fa fa-refresh"></i> </a>                                
                 <br><br>
                  <div class="row" id="exitoT" name="exitoT" style="display:none">
                   <div class="col-md-12">
                    <div class="alert alert-dismissable alert-success">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong id="exito_msgT"></strong></div>
                    </div></div>
                    <div class="row" id="errorT" name="errorT" style="display:none">
                    <div class="col-md-12">
                    <div class="alert alert-dismissable alert-danger">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong id="error_msgT"></strong></div>
                    </div></div> 

                      <div class="col-md-12" id="registroTarea" style="display:none">
               <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"> Agrega Nueva Tarea  <i class="fa fa-plus"></i> </h3>
                </div>
                <div class="panel-body">
               
                <form  id="formaTarea" name="formaTarea"  >
                <div class="form-group">
                              <label>Nombre de la Tarea</label>
                              <input  class="form-control" id="nombreTarea" name="nombreTarea"  required>
                              </div>
                              <label>Categoria de la Tarea </label>
                              <select class="form-control" id="categoriaTarea" name="categoriaTarea" required>
                                <option  name="Alta">Seleccionar ...</option>
                                <option  name="Alta" value="Planificación">Planificación</option>
                                <option  name="Alta" value="Diseño">Diseño</option>
                                <option  name="Alta" value="Codificación">Codificación</option>
                                <option  name="Alta" value="Pruebas">Pruebas</option>
                              </select>
                              <br>
                             <label>Prioridad de la Tarea </label>
                              <select class="form-control" id="prioridadTarea" name="prioridadTarea" required>
                                <option  name="Alta">Seleccionar ...</option>
                                <option  name="Alta" value="1">1</option>
                                <option  name="Alta" value="2">2</option>
                                <option  name="Alta" value="3">3</option>
                                <option  name="Alta" value="4">4</option>
                              </select>
                              <div class="form-group"><br>
                              <label>Descripción de la Tarea</label>
                              <textarea  class="form-control" rows="5" col="6" id="desTarea" name="desTarea"  required></textarea>
                              </div>
                                <br>
                                <input  name="agregarTarea"id="agregarTarea" type="submit" class="btn btn-success" value="Agregar Tarea">
                                <button type="reset" class="btn btn-danger " >Borrar Datos</button>
                  </form>
                  </div>
                </div>
                 
               </div>                   
                  <table class="table table-hover" data-toggle="table">
                  <thead>
                    <tr>
                      <th class="info">Tarea</th>
                      <th>Categoria</th>
                      <th>Prioridad</th>
                      <th>Descripción</th>
                    <!--  <th class="warning">Editar</th>-->
                      <th class="danger">Borrar</th>
                      </tr>
                  </thead>
                 <tbody>
                        <?php
                        $tareas->readTareasAdmin();
                        ?>
                  </tbody>
                  </table>
               
    
                </div>

            </div>
        </div>
     <br><br>
             <div class="col-lg-12 text-left">
            <a href="VistaTrashTarea.php" class="btn btn-info btn-lg "> Papelera <i class="fa fa-trash"></i> </a>
            <br><br> 
          </div>
</div>

<?php
include ("VistaFooterAdmin.php");
?>