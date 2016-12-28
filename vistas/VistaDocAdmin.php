<?php
include ("VistaHeaderAdmin.php");
?>
<div id="page-wrapper">
  <div class="col-lg-12">
        <h1>Tablas de Datos de Documentación </h1>
      </div>
      <div class="col-lg-12" id="diagramaS">
        <h2><small>Tipos de Diagramas</small></h2>
      </div>
       <div class="col-lg-12 " id="r-content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Diagramas   <i class="fa fa-sitemap"></i> </h3>
                </div>
                <div class="panel-body">
                 <button id="nuevoDiagrama" type="button" class="btn btn-info "> <i class="fa fa-plus"></i> Agregar Diagramas</button>
                  <a  href="VistaDocAdmin.php" type="button" class="btn btn-primary "><i class="fa fa-refresh"></i> </a>                                
                 <br><br>

              <div class="row" id="exitoD" name="exitoD" style="display:none">
              <div class="col-md-12">
                    <div class="alert alert-dismissable alert-success">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong id="exito_msgD"></strong></div>
              </div></div>
              <div class="row" id="error" name="error" style="display:none">
              <div class="col-md-12">
                    <div class="alert alert-dismissable alert-danger">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong id="error_msgD"></strong></div>
              </div></div>

              <div class="col-md-12" id="registroDiagrama" style="display:none">
               <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"> Agrega Nuevo Diagrama  <i class="fa fa-plus"></i> </h3>
                </div>
                <div class="panel-body">
               
                <form  id="formaDiagrama" name="formaDiagrama"  >
                <div class="form-group">
                              <label>Nombre o Tipo de Diagrama</label>
                              <input  class="form-control" id="tipoDiagrama" name="tipoD"  required>
                              </div>
                              <div class="form-group">
                              <label>Función de Diagrama</label>
                              <textarea  class="form-control" rows="5" col="6" id="funcionDiagrama" name="funcionD"  required></textarea>
                              </div>
                                <br>
                                <input  name="agregarDiagrama"id="agregarDiagrama" type="submit" class="btn btn-success" value="Agregar Diagrama ">
                                <button type="reset" class="btn btn-danger " >Borrar Datos</button>
                  </form>
                  </div>
                </div>
                 
               </div>
                <div class="col-md-12" >
                 <table class="table table-hover" data-toggle="table">
                  <thead>
                    <tr>
                      <th >Diagrama</th>
                      <th class="success">Función</th>
                      <th class=danger>Borrar</th>
                      </tr>
                  </thead>
                 <tbody>
                        <?php
                        $docAdmin->readDiagramas();
                        ?>
                  </tbody>
                  </table>
                  
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12" id="lenguajeS"><h2><small> Lenguajes de Programación</small></h2></div>
        <div class="col-lg-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Lenguajes   <i class="fa fa-code"></i> </h3>
                </div>
                <div class="panel-body">
                <button id="nuevoLenguaje" name="nuevoLenguaje" type="button" class="btn btn-info" > <i class="fa fa-plus"></i> Agregar Lenguajes</button>                
                 <a  href="VistaDocAdmin.php" type="button" class="btn btn-primary "><i class="fa fa-refresh"></i> </a>
                <br><br>
                <div class="row" id="exitoL" name="exitoL" style="display:none">
              <div class="col-md-12">
                      <div class="alert alert-dismissable alert-success">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong id="exito_msgL"></strong></div>
              </div></div>
              <div class="row" id="errorL" name="errorL" style="display:none">
              <div class="col-md-12">
                      <div class="alert alert-dismissable alert-danger">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong id="error_msgL"></strong></div>
              </div></div> 
              <div class="col-md-12" id="registroLenguaje" style="display:none">
               <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"> Agrega Nuevo Lenguaje  <i class="fa fa-plus"></i> </h3>
                </div>
                <div class="panel-body">
               
                <form  id="formaLenguaje" name="formaLenguaje"  >
                     <div class="form-group">
                        <label>Nombre del Lenguaje </label>
                        <input  class="form-control" id="nombreLenguaje" name="nombreLenguaje"   required>
                      </div>
                      <label>Categoria </label>
                              <select class="form-control" id="tipoLenguaje" name="tipoLenguaje" required>
                                <option  name="Alta">Seleccionar ...</option>
                                <option  name="Alta" value="Front-End">Front-End</option>
                                <option  name="Alta" value="Back-End">Back-End</option>
                                <option  name="Alta" value="Motor de Base de Datos">Motor de Base de Datos</option>
                                <option  name="Alta" value="Libreria">Libreria de Lenguaje</option>
                                 <option  name="Alta" value="Framework">Framework</option>
                                 <option  name="Alta" value="Otro">Otro</option>
                              </select>
                      <br>        
                      <div class="form-group">
                        <label>Descripción de Lenguaje</label>
                        <textarea  class="form-control" rows="5" col="6" id="desLenguaje" name="desLenguaje" required></textarea>
                      </div>
                        <br>
                        <input  id="agregarlengugaje" type="submit" class="btn btn-success" value="Agregar Lenguaje" >
                        <button type="reset" class="btn btn-danger " >Borrar Datos</button>
                  </form>
                  </div>
                </div>
                 
               </div>
                <div class="col-md-12"  >
                
                  <table class="table table-hover" data-toggle="table">
                  <thead>
                    <tr>
                      <th>Lenguaje</th>
                      <th class="success">Tipo</th>
                      <th class="success">Descripción</th>
                      <th class="danger">Borrar</th>
                      </tr>
                  </thead>
                 <tbody>
                        <?php
                       $docAdmin->readLenguajes();
                        ?>
                  </tbody>
                  </table>
                  
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12" id="pruebaS">
        <h2><small>Tipos de Prueba</small></h2>
      </div>

     <div class="col-lg-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Pruebas   <i class="fa fa-cubes"></i> </h3>
                </div>
                <div class="panel-body">
                <button id="nuevoPrueba" type="button" class="btn btn-info "> <i class="fa fa-plus"></i> Agregar Pruebas</button>                
                  <a  href="VistaDocAdmin.php" type="button" class="btn btn-primary "><i class="fa fa-refresh"></i> </a>           
                <br><br>
                 <div class="row" id="exitoP" name="exitoP" style="display:none">
              <div class="col-md-12">
                      <div class="alert alert-dismissable alert-success">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong id="exito_msgP"></strong></div>
              </div></div>
              <div class="row" id="errorP" name="errorP" style="display:none">
              <div class="col-md-12">
                      <div class="alert alert-dismissable alert-danger">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong id="error_msgP"></strong></div>
              </div></div>
              <div class="col-md-12" id="registroPrueba" style="display:none">
               <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"> Agrega Nueva Prueba  <i class="fa fa-plus"></i> </h3>
                </div>
                <div class="panel-body">
               
                <form  id="formaPrueba" name="formaPrueba"  >
                <div class="form-group">
                              <label>Nombre o Tipo de Prueba</label>
                              <input  class="form-control" id="tipoPrueba" name="tipoPrueba"  required>
                              </div>
                              <div class="form-group">
                              <label>Descripción de la Prueba</label>
                              <textarea  class="form-control" rows="5" col="6" id="desPrueba" name="desPrueba"  required></textarea>
                              </div>
                                <br>
                                <input  name="agregarPrueba"id="agregarPrueba" type="submit" class="btn btn-success" value="Agregar Prueba" >
                                <button type="reset" class="btn btn-danger " >Borrar Datos</button>
                  </form>
                  </div>
                </div>
                
               </div>

                <div class="col-md-12">
                  <table class="table table-hover" data-toggle="table">
                  <thead>
                    <tr>
                      <th>Tipo de Prueba</th>
                      <th class="success">Descripción</th>
                      <th class="danger">Borrar</th>
                      </tr>
                  </thead>
                 <tbody>
                        <?php
                       $docAdmin->readPruebaTipo();
                        ?>
                  </tbody>
                  </table>
                  
              </div>

            </div>
          </div>
        </div>
        <div class="col-lg-12 text-left">
            <a href="VistaTrashDocAdmin.php" class="btn btn-info btn-lg "> Papelera <i class="fa fa-trash"></i> </a>
            <br><br> 
          </div>

    

<?php
include ("VistaFooterAdmin.php");
?>