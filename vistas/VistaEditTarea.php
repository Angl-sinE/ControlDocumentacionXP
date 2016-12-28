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
               <div class="col-md-12" id="registroTarea" style="display">
               <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"> Editar Tarea   <i class="fa fa-pencil"></i> </h3>
                </div>
                <div class="panel-body">
               
                <form  role="form" method="post" action="VistaEditTarea.php" id="formaTarea" name="formaTarea"  >
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
                                <input  name="agregarTarea"id="agregarTarea" type="submit" class="btn btn-success" value="Editar">
                                <button type="reset" class="btn btn-danger " >Borrar Datos</button>
                  </form>
                  </div>
                </div>
                 
               </div>                   
                
    
                </div>

            </div>
        </div>
         <div class="col-lg-12 text-left">
            <a href="VistaTareaAdmin.php" class="btn btn-warning btn-lg "> Regresar <i class="glyphicon glyphicon-backward"></i> </a>
            <br><br> 
          </div>
             </div>

</div>

<?php
include ("VistaFooterAdmin.php");
?>