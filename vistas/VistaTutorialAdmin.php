<?php
include ("VistaHeaderAdmin.php");
?>
<div id="page-wrapper">
  <div class="col-lg-12">
        <h1>Administrar Tutoriales </h1>
      </div>
       <div class="col-sm-9 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Tutoriales <i class="fa fa-flask"></i> </h3>
                </div>
                <div class="panel-body">
                <button id="nuevoTutorial" type="button" class="btn btn-info "> <i class="fa fa-plus"></i> Agregar Tutorial</button>
                  <a  href="VistaTutorialAdmin.php" type="button" class="btn btn-primary "><i class="fa fa-refresh"></i> </a>                                
                 <br><br>
                  <div class="row" id="exitoTut" name="exitoTut" style="display:none">
                   <div class="col-md-12">
                    <div class="alert alert-dismissable alert-success">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong id="exito_msgTut"></strong></div>
                    </div></div>
                    <div class="row" id="errorTut" name="errorTut" style="display:none">
                    <div class="col-md-12">
                    <div class="alert alert-dismissable alert-danger">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong id="error_msgTut"></strong></div>
                    </div></div>

                      <div class="col-md-12" id="registroTutorial" style="display:none">
                      <div class="panel panel-info">
                    <div class="panel-heading">
                      <h3 class="panel-title"> Agrega Nuevo Tutorial  <i class="fa fa-plus"></i> </h3>
                    </div>
                <div class="panel-body">
                <form  id="formaTutorial"  name="formaTutorial" enctype="multipart/form-data"  >
                <div class="form-group">
                              <label>Nombre de Tutorial</label>
                              <input  class="form-control" id="nombreTutorial" name="nombreTutorial"  required>
                              </div>
                              <label>Categoria de Tutorial </label>
                              <select class="form-control" id="categoriaTutorial" name="categoriaTutorial" required>
                                <option  name="Alta">Seleccionar ...</option>
                                <option  name="Documentación-Primeros Pasos" value="Documentación-Primeros Pasos">Documentación - Primeros Pasos</option>
                                <option  name="Documentación-Planificación" value="Documentación-Planificación">Documentación - Planificación</option>
                                <option  name="Documentación-Diseño" value="Documentación-Diseño">Documentación - Diseño</option>
                                <option  name="Documentación-Codificación" value="Documentación-Codificación">Documentación - Codificación</option>
                                <option  name="Documentación-Pruebas" value="Documentación-Pruebas">Documentación - Pruebas</option>
                                <option  name="Metodología-XP" value="Metodología-XP">Metodología - XP</option>
                                <option  name="Metodología-UML" value="Metodología-UML">Metodología - Lenguaje UML</option>
                                <option  name="Metodología-Fase" value="Metodología-Agiles">Metodología - Fases</option>
                                <option  name="Metodología-General" value="Metodología-General">Metodología  - General</option>
                              </select>
                              <br>
                             <div class="form-group"><br>
                              <label>Contenido</label>
                              <textarea  class="form-control" rows="5" col="6" id="contenidoTutorial" name="contenidoTutorial"  required></textarea>
                              </div>
                              <div class="form-group">
                              <label>Fuente </label>
                              <input  class="form-control" id="fuenteTutorial" name="fuenteTutorial"  >
                              </div>
                              <div class="form-group">
                                <label>Insertar Imagen </label>
                               <input type="file" class="btn btn-primary" id="imagen" name="imagen"  >
                               <br>
                               </div>
                               <div id="previewImg" name="previewImg"></div>
                                <br>
                                <input  name="agregarTutorial" id="agregarTutorial" type="submit" class="btn btn-success" value="Agregar Tutorial"    >
                                <button type="reset" class="btn btn-danger " >Borrar Datos</button>
                                </form>
                                

                 
                  </div>
                </div>
                 
               </div>                    
                  <table class="table table-hover" data-toggle="table">
                  <thead>
                    <tr>
                      <th class="info">Tutorial</th>
                      <th class="info">Categoria</th>
                      <th>Contenido</th>
                      <th>Fuente</th>
                      <th>Imagen</th>
                    <!--  <th class="warning">Editar</th>-->
                      <th class="danger">Borrar</th>
                      </tr>
                  </thead>
                 <tbody>
                    <?php
                    $tutorial->readTutorialAdmin();
                    ?>   
                  </tbody>
                  </table>
                    
                </div>
            </div>
        </div>
         <br><br>
             <div class="col-lg-12 text-left">
            <a href="VistaTrashTutorial.php" class="btn btn-info btn-lg "> Papelera <i class="fa fa-trash"></i> </a>
            <br><br> 
          </div>
   
</div>
<?php
include ("VistaFooterAdmin.php");
?>