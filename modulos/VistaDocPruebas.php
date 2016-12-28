<div class="col-lg-16" style="display:none" id="panel4">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h2 class="panel-title text-center"><?php echo $tituloPanel4; ?></h2>
      </div>
        <div class="panel-body">
         <div class="col-lg-6" id="selectPrueba">
           <div class="panel panel-warning">
            <div class="panel-heading"><h3>Seleccionar Proyecto</h3></div>
              <div class="panel-body"> 
                 <div class="col-lg-12">
                   <label>Confirma el Proyecto para Documentar:</label>
                   
                    <form  id="pruebaIni" name="pruebaIni" role="form">
                      <div class="form-group">
                      <select class="form-control" name="tID" id="tID" required>
                        <option  name="Alta">Selecionar ...</option>
                         <?php 
                          $proyecto->documentaProyecto($idUrol);
                          ?>
                     </select>
                     </div>
                     <br>
                     <div class="form-group">
                     <input type="submit" id="pruebaStart"  name ="pruebaStart" value="Inicia Pruebas" class="btn btn-block btn-primary ">
                     </div> 
                    </form>
                        <button id="cancelaPrueba" class="btn btn-block btn-danger">Ya he Seleccionado un Proyecto</button>
                       <a href="VistaProyecto.php" class="btn btn-block btn-warning">Deseo Cambiar de Proyecto</a>
                </div>
              </div> 
            </div>
          </div>
          
                                         
          <div class="col-lg-6">
           <div class="panel panel-primary">
            <div class="panel-heading">
              <h3>Pruebas</h3></div>
                <div class="panel-body">
                  <div class="col-lg-12">
                    <form role="form" name="formaPrueba" id="formaPrueba">
                                                        
                      <div class="form-group">
                      <label>Tipos de Prueba </label>
                        <select class="form-control" name="tipoPrueba" id="tipoPrueba">
                        <option  name="Alta">Selecionar ...</option>
                        
                       <?php 
                       $documentacionAdmin->selectPrueba();
                      
                       ?>
                        </select>
                      </div>
                      <div class="form-group">
                      <label>Historia de Usuario </label>
                        <select class="form-control" name="idHistoriasUsuario" id="idHistoriasUsuario" >
                        <option  name="Alta">Selecionar ...</option>
                       
                       <?php 
                       $queryHp = ("SELECT nombreHistoria, idHistoriasUsuario FROM historiasusuario WHERE idPlanificacion = '$idPlan'");
                       $documentacion->selectHistoria($queryHp);
                      
                       ?>
                        </select>
                      </div>
                      <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Resultado Esperado</span>
                      <textarea class="form-control" rows="5" col="6" id="resultadoEsperado" name="resultadoEsperado" placeholder="Inserta el resultado esperado de la Prueba " required></textarea>
                    </div><br>
                     <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Resultado Obtenido </span>
                      <textarea class="form-control" rows="5" col="6" id="resultadoObtenido" name="resultadoObtenido" placeholder="Inserta el resultado Obtenido de la Prueba" required></textarea>
                    </div><br>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Revisiones </span>
                      <textarea class="form-control" rows="5" col="6" id="revisiones" name="revisiones" placeholder="Inserta la Descripcion de la historia de Usuario" ></textarea>
                    </div>
                      <br>  
                        
                      <div class="form-group">
                        <input type="hidden"  id="idPruebas" name="idPruebas" value="<?php echo $idPrueba; ?>" >
                      </div>
                       <div class="form-group">
                        <input type="submit" id="pruebas" name ="pruebas" value="Registrar Prueba"class="btn btn-success pull-middle">
                        <input type="reset" value="Borrar"class="btn btn-danger pull-middle">
                      </div>      
                    </form>
                  </div>
                </div>
              </div>
          </div>
      <div class="col-lg-6" style="display:none" id="infoPrueba">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="panel-title">Información</h4></div>
          <div class="panel-body">
            <div class="col-lg-12">
              <div class="list-group">
                <a href="#" class="list-group-item">
                  <h3 class="list-group-item-heading"><span class="label label-default">Tipos de Prueba</span></h3><br>
                  <p class="list-group-item-text text-justify">Las pruebas son actividades que se realizan para verificar
                   el funcionamiento del sistema. En XP Se presentan en diferentes tipos y funcionalidades específicas,
                    indicando a que operación<strong>(Historia de Usuario)</strong>se aplicó la prueba, que resultados arrojó y como se encararon.
                     Selecciona entre los diferentes tipos de Prueba disponible y continua registrando los campos correspondientes.</p>
                </a>
                <a href="#" class="list-group-item">
                  <h3 class="list-group-item-heading"><span class="label label-default">Historia de Usuario Asociada</span></h3><br>
                  <p class="list-group-item-text text-justify">Para Agilizar el proceso a cada prueba se le asigna una historia de usuario ya creada,
                   de esta manera se pueden verificar todas las operaciones registradas al inicio del proyecto.
                    (Para seleccionar una historia esta debe estar registrada en la fase de Planificación) </p>
                </a>
                <a href="#" class="list-group-item">
                   <h3 class="list-group-item-heading"><span class="label label-default">Resultado Esperado</span></h3><br>
                  <p class="list-group-item-text">
                  Es el resultado que se concibió en la creación de la función, se debe llenar el campo con la descripción de ese resultado. </p>
                </a>
                 <a href="#" class="list-group-item">
                   <h3 class="list-group-item-heading"><span class="label label-default">Resultado Obtenido</span></h3><br>
                  <p class="list-group-item-text">El resultado que arrojó la ejecución de la  función del sistema <strong>(Historia de Usuario)</strong></p>
                </a>
                 <a href="#" class="list-group-item">
                  <h3 class="list-group-item-heading"><span class="label label-default">Revisión</span></h3><br>
                  <p class="list-group-item-text">Es la descripción de los pasos tomados dado el resultado obtenido, para verificar que se cumpla con la función de la Historia de Usuario.  </p>
                </a>
                </div>
           </div>
           
         </div>
        </div>
    </div>
    <!--
      <div class="col-lg-12">
            <div class="panel panel-default text-center">
            <br>
               <a  href="VistaDocumentacion.php" type="button" class="btn btn-lg btn-primary ">Cargar Campos Registrados <i class="fa fa-refresh"></i> </a>  
            <br><br>
            </div>
             
            </div>
            -->
         
         <div class="col-lg-12">
            <div class=" panel panel-success">
              <div class="panel-heading">
               <h3 class="panel-title text-center">Pruebas Registradas</h3></div>
                <div class="panel-body">
                 <table data-toggle="table">
                  <thead>
                   <tr>
                   <th class="info">Proyecto</th>
                   <th class="info">Prueba</th>
                   <th class="info">Historia</th>
                   <th>Resultado Esperado</th>
                   <th>Resultado Obtenido</th>
                   <th>Revisiones</th>
                 <!--  <th class="warning">Editar</th>-->
                   <th class="danger">Borrar</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                       $documentacion->readPruebasUsuario($idProyectoActivo);
                  ?>             
                  </tbody>
                 </table>
                </div>
            </div>
          </div>
          <div class="col-lg-12 text-left">
            <a href="VistaTrashPrueba.php" class="btn btn-info btn-lg "> Papelera <i class="fa fa-trash"></i> </a> 
          </div>
       <div class="col-lg-12 text-center">
         <form id="formaConfirmaPrueba" name="formaConfirmaPrueba">
         <div class="form-group">
           <input type ="hidden"  id="idProyecto" name="idProyecto" value="<?php echo $idProyectoActivo; ?>" ></div>
            <div class="form-group">
            <input type="submit" id="pruebaEnd"  name ="pruebaEnd" value="Confirmar Pruebas" class="btn btn-lg btn-info ">
               </div>
            </form>
         </div>
         
             
      </div>
     </div>
  </div>