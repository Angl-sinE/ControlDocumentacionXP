<div class="col-lg-16" style="display:none" id="panel2">
    
    <div class="panel panel-info">
      <div class="panel-heading">
        <h2 class="panel-title text-center"><?php echo $tituloPanel2; ?></h2>
      </div>
      <div class="panel-body">
      
      <div class="col-lg-6" id="selectDiseno">
           <div class="panel panel-warning">
            <div class="panel-heading"><h3>Seleccionar Proyecto</h3></div>
              <div class="panel-body"> 
               <div class="col-lg-12">
                   <label>Selecciona Un Proyecto para Documentar:</label>
                  <form  id="disenoIni" name="disenoIni" role="form">
                    <div class="form-group">
                    <select class="form-control" name="dID" id="dID" required>
                      <option  name="Alta">Selecionar ...</option>
                       <?php 
                       $proyecto->documentaProyecto($idUrol);
                       ?>
                     </select>
                     </div>
                     <br>
                     <div class="form-group">
                     <input type="submit" id="disenoStart"  name ="disenoStart" value="Seleccionar" class="btn btn-block btn-primary ">
                     </div> 
                    </form>
                       <button id="cancelaDiseno" class="btn btn-block btn-danger">Ya he Seleccionado un Proyecto</button>
                       <a href="VistaProyecto.php" class="btn btn-block btn-warning">Deseo Cambiar de Proyecto</a>
                </div>
              </div> 
            </div>
          </div>
       <div class="col-lg-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3>Roles del Proyecto</h3>
            </div>
        <div class="panel-body">
          <div class="col-lg-12">   
          <form role="form" id="formaRoles"  name="formaRoles" >
             <div class="form-group">
               <label>Nombre</label>
               <input class="form-control" id="nombreRol" name="nombreRol" placeholder="Inserta Rol del proyecto" required>
              </div>
              <div class="form-group">
              <label>Función que tiene en el proyecto </label>
                     <textarea class="form-control" rows="5" col="6" id="funcionRol" name="funcionRol" placeholder="Inserta la función del Rol " ></textarea>
                    </div><br>
              <div class="form-group">
               <input type ="hidden"  id="idDiseno" name="idDiseno" value="<?php echo $idDiseno; ?>" >
              </div>
              <div class="form-group">
                <input type="submit" id="roles" name ="roles" value="Crear Rol"class="btn btn-success pull-middle">
                <input type="reset" value="Borrar"class="btn btn-danger pull-middle">
              </div> 
             </form>
            </div>
          </div>
        </div>
    </div>
     <div class="col-lg-6" style="display:none" id="infoDiseno">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="panel-title">Información</h4></div>
          <div class="panel-body">
            <div class="col-lg-12">
              <div class="list-group">
                <a href="#" class="list-group-item">
                 <h3 class="list-group-item-heading"><span class="label label-default">Roles de Proyecto</span></h3><br>
                  <p class="list-group-item-text text-justify">
                  En la metodología XP se utilizan los roles para organizar a quienes
                   se encargan de cada una de las actividades que deben realizarse en el
                    transcurso del proyecto. Cada papel es desempeñado por uno o varios usuarios
                     con diferentes niveles de permisos y responsabilidades. Es necesario crear
                      roles para asignar la acción de los casos de uso a un  usuario del sistema.
                      </p>
                      <p><strong>Ejemplo: Administrador,Gestor,Operador  </strong></p>
                </a>
                <a href="#" class="list-group-item">
                <h3 class="list-group-item-heading"><span class="label label-default">Casos de Uso</span></h3><br>
                  <p class="list-group-item-text text-justify">
                  Los casos de uso al igual que las historias de
                  usuario describen el funcionamiento de un conjunto
                  de operaciones en tu proyecto. Los casos de uso describen
                  con más detalle cada operación así como el usuario involucrado
                  en ella <strong>(Para asignar un rol de usuario debes agregar roles en el panel roles de proyecto)</strong>.
                  Completa los campos con la información solicitada.
                  </p>
                </a>
                <a href="#" class="list-group-item">
                <h3 class="list-group-item-heading"><span class="label label-default">Diagramas</span></h3><br>
                  <p class="list-group-item-text text-justify">
                    Los Diagramas se  utilizan para representar de forma grafica eventos, estructuras, flujos y otro tipo
                    de información que describe el diseño del proyecto. Selecciona el tipo de diagrama que deseas ingresar y luego
                    Busca el archivo de imagen correspondiente a ese tipo de diagrama. <strong>(formatos permitidos .jpg, .png y .jpeg)</strong> 

                  </p>
                </a>
                     
              </div>
           </div>
           
         </div>
        </div>
    </div>
    <div class="col-lg-12">
           <div class="panel panel-primary">
            <div class="panel-heading"><h3>Casos de Uso</h3></div>
              <div class="panel-body"> 
                <div class="col-lg-12">
                  <form role="form" id="formaCasoUso" name="formaCasoUso">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Nombre </span>
                      <input class="form-control" id="nombreCasoUso" name="nombreCasoUso" placeholder="Inserta el nombre de la Historia de Usuario" required  >
                   </div><br>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Acción </span>
                      <textarea class="form-control" rows="5" col="6" id="accionCasoUso" name="accionCasoUso" placeholder="Inserta la Descripcion de la historia de Usuario" required></textarea>
                    </div><br>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">PreCondición </span>
                      <input class="form-control" id="preCondicion" name="preCondicion" placeholder="Inserta el nombre de la Historia de Usuario" required  >
                   </div><br>
                   <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">PostCondición </span>
                      <input class="form-control" id="postCondicion" name="postCondicion" placeholder="Inserta el nombre de la Historia de Usuario" required  >
                   </div><br>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Flujo Normal </span>
                      <textarea class="form-control" rows="5" col="6" id="flujoNormal" name="flujoNormal" placeholder="Inserta la Descripcion de la historia de Usuario" required></textarea>
                    </div><br>
                     <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Flujo Alternativo </span>
                      <textarea class="form-control" rows="5" col="6" id="flujoAlternativo" name="flujoAlternativo" placeholder="Inserta la Descripcion de la historia de Usuario" required></textarea>
                    </div><br>
                    <div class="form-group">
                      <label>Usuario(Rol) : </label>
                      <select class="form-control" id="rolCasoUso" name="rolCasoUso" required>
                        <option  name="Alta">Seleccionar ...</option>
                       <?php 
                       $queryRp = ("SELECT idRolesDeSistema, nombreRol FROM rolesdesistema WHERE idDiseno = '$idDiseno'");
                       $documentacion->selectRoles($queryRp);
                      
                       ?>
                      </select>
                      <div class="form-group">
                        <input type ="hidden"  id="idDiseno" name="idDiseno" value="<?php echo $idDiseno; ?>" >
                      </div>
                    </div><br>
                    <div class="form-group">
                      <input type="submit" id="casouso" name ="casouso" value="Crear Caso de Uso"class="btn btn-success pull-middle">
                      <input type="reset" value="Borrar"class="btn btn-danger pull-middle">
                    </div>      
                  </form>
                </div>
              </div> 
            </div>
          </div>
         <div class="col-lg-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3>Diagramas</h3>
            </div>
        <div class="panel-body">
          <div class="col-lg-12">   
          <form role="form" class="form-group" id="formaDiagrama" name="formaDiagrama"  enctype="multipart/form-data">
              <label>Tipo de Diagrama *</label>
              <select class="form-control" id="idTipoDiagrama" name="idTipoDiagrama" required>
                      <option  name="Alta">Seleccionar ...</option>
                       <?php
                     $documentacionAdmin->selectDiagrama();
                       ?>
               </select>
                 <br>
              <div class="form-group">
                <label>Insertar Diagrama *</label>
                <input type="file" name="diagramaImg" id="diagramaImg" class=" btn btn-primary" required>
              </div>
              <br>
                <div id="previewDiagrama" name="previewDiagrama"></div>
              <br>
              <div class="form-group">
                <input type ="hidden"  id="idDiseno" name="idDiseno" value="<?php echo $idDiseno; ?>" >
              </div>
             <div class="form-group">
            <input type="submit" id="diseno" name ="diseno" value="Insertar Diagrama"class="btn btn-success pull-middle">
            <input type="reset" value="Borrar"class="btn btn-danger pull-middle">
          </div> 
          </form>
          </div>
      </div>
        </div>
        </div>
        
         
          <div class="col-lg-12">
          <div class=" panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title text-center">Roles Registrados</h3>
            </div>
            <div class="panel-body">
              <table data-toggle="table">
              <thead>
              <tr>
              <th class="info">Proyecto</th>
              <th class="info">Rol</th>
              <th>Función</th>
              <!--<th class="warning">Editar</th>-->
              <th class="danger">Borrar</th>
              </tr>
              </thead>
              <tbody>
              <?php
              $documentacion->readRolesDeSistema($idProyectoActivo);
              ?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
          <div class="col-lg-12">
          <div class=" panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title text-center">Casos de Uso Registrados</h3>
            </div>
            <div class="panel-body">
              <table data-toggle="table">
              <thead>
              <tr>
              <th class="info">Proyecto</th>
              <th class="info">Caso de Uso</th>
              <th class="info">Rol</th>
              <th class="info">Acción</th>
              <th>Pre-Condición</th>
              <th>Post-Condición</th>
              <th>Flujo Normal</th>
              <th>Flujo Alternativo</th>
           <!--   <th class="warning">Editar</th>  -->
              <th class="danger">Borrar</th>
              </tr>
              </thead>
              <tbody>
              <?php
              $documentacion->readCasosDeUso($idProyectoActivo);
              ?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
         <div class="col-lg-12">
          <div class=" panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title text-center">Diagramas Registrados</h3>
            </div>
            <div class="panel-body">
              <table data-toggle="table">
              <thead>
              <tr>
              <th class="info">Proyecto</th>
              <th class="info">Tipo</th>
              <th>Diagrama</th>
            <!--  <th class="warning">Editar</th> -->
              <th class="danger">Borrar</th>
              </tr>
              </thead>
              <tbody>
              <?php
              $documentacion->readDiagrama($idProyectoActivo);
              ?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-12 text-left">
            <a href="VistaTrashDis.php" class="btn btn-info btn-lg "> Papelera <i class="fa fa-trash"></i> </a> 
          </div>
         <div class="col-lg-12 text-center">
         <form id="formaConfirmaDis" name="formaConfirmaDis">
         <div class="form-group">
           <input type ="hidden"  id="idProyecto" name="idProyecto" value="<?php echo $idProyectoActivo; ?>" ></div>
            <div class="form-group">
            <input type="submit" id="disEnd"  name ="disEnd" value="Confirmar Diseño" class="btn btn-lg btn-info ">
               </div>
            </form>
         </div>
                   
      </div>
     </div>
  </div>