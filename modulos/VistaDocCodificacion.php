<div class="col-lg-16" style="display:none" id="panel3">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h2 class="panel-title text-center"><?php echo $tituloPanel3; ?></h2>
      </div>
        <div class="panel-body">
        <div class="col-lg-6" id="selectCode">
           <div class="panel panel-warning">
            <div class="panel-heading"><h3>Seleccionar Proyecto</h3></div>
              <div class="panel-body"> 
               <div class="col-lg-12">
                   <label>Selecciona Un Proyecto para Documentar:</label>
                    <form  id="codificaIni" name="codificaIni" role="form">
                      <div class="form-group">
                      <select class="form-control" name="cID" id="cID" required>
                        <option  name="Alta">Selecionar ...</option>
                         <?php 
                          $proyecto->documentaProyecto($idUrol);
                         ?>
                     </select>
                     </div>
                     <br>
                     <div class="form-group">
                     <input type="submit" id="codificacionStart"  name ="codificaionStart" value="Inicia Codificación" class="btn btn-block btn-primary ">
                     </div> 
                    </form>
                       <button id="cancelaCode" class="btn btn-block btn-danger">Ya he Seleccionado un Proyecto</button>
                       <a href="VistaProyecto.php" class="btn btn-block btn-warning">Deseo Cambiar de Proyecto</a>
                </div>
              </div> 
            </div>
          </div>
           <div class="col-lg-6">
           <div class="panel panel-primary">
            <div class="panel-heading">
              <h3>Herramientas de Programación</h3></div>
                <div class="panel-body">
                  <div class="col-lg-12">
                    <form role="form" id="formaLenguaje" name="formaLenguaje">
                     <div class="form-group">
                    
                      <div class="col-lg-12">
                        <div class="bs-example">
                          <ul class="list-group">
                           <?php
                           $documentacionAdmin->selectLenguaje();
                           ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                      <br>
                      <div class="form-group">
                    <input type="hidden"  id="idCodificacion" name="idCodificacion" value="<?php echo $idCode; ?>" >
                    </div>
                    <div class="form-group">
                        <input type="submit" id="lenguaje" name ="lenguaje" value="Registrar Lenguajes"class="btn btn-success pull-middle">
                        <input type="reset" value="Borrar Datos"class="btn btn-danger pull-middle">
                      </div>      
                    </form>
                  </div>
                </div>
              </div>
          </div>
          
      <div class="col-lg-6" style="display:none" id="infoCode">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="panel-title">Información</h4></div>
          <div class="panel-body">
            <div class="col-lg-12">
              <div class="list-group">
                <a href="#" class="list-group-item">
                  <h3 class="list-group-item-heading"><span class="label label-default">Herramientas de Programación</span></h3><br>
                  <p class="list-group-item-text text-justify">
                Las herramientas de programación describen los diferentes tipos de lenguajes
                 de programación que utiliza   el sistema de información para crear las operaciones,
                  vistas y base de datos del proyecto.  A continuación se describen la clasificación de lenguajes
                   de programación de esta herramienta.</p>
                </a>
                <a href="#" class="list-group-item">
                 <h3 class="list-group-item-heading"><span class="label label-default">Lenguajes Front-End</span></h3><br>
                  <p class="list-group-item-text text-justify">
                    FrontEnd son todas aquellas herramientas de programación que corren del lado del cliente,
                    es decir del lado del navegador web. Los lenguajes de FrontEnd se encargan de darle estilo y
                    presentación a la pagina para que el usuario pueda tener una experiencia cómoda en el sistema.
                  </p>
                </a>
                <a href="#" class="list-group-item">
                   <h3 class="list-group-item-heading"><span class="label label-default">Lenguajes Back-End</span></h3><br>
                  <p class="list-group-item-text text-justify">
                  Son las herramientas que corresponden al lado del servidor y las que interactúan
                   con la base de datos, también manejan las sesiones de usuarios, montan el sistema al servidor,
                    servir las vistas del FrontEnd entre otras operaciones vinculadas al servidor.</p> 
                </a>
                <a href="#" class="list-group-item">
                 <h3 class="list-group-item-heading"><span class="label label-default">Motores de Base de Datos</span></h3><br>
                  <p class="list-group-item-text text-justify">
                  Es el servicio que se encarga de almacenar, procesar y proteger los datos,
                   los motores de base de datos ofrecen acceso controlado y procesamiento de transacciones,
                   además con el motor de base de datos se pueden crear tablas, objetos de base de datos como índices
                    y vistas y procedimientos para administrar  bases de datos relacionales.</p>
                </a>
                <a href="#" class="list-group-item">
                   <h3 class="list-group-item-heading"><span class="label label-default">Framework</span></h3><br>
                  <p class="list-group-item-text text-justify">
                    Los Frameworks para sistemas son estructuras de software compuestas de componentes
                    personalizables e intercambiables como un rompecabezas, con el fin de facilitar
                    el desarrollo de una aplicación y sistema, acelerar el proceso reutilizando código
                    existente y promover una filosofía de uso de patrones. 
                  </p>
                </a>
                <a href="#" class="list-group-item">
                  <h3 class="list-group-item-heading"><span class="label label-default">Otros</span></h3><br>
                  <p class="list-group-item-text text-justify">
                    Son aquellas tecnologías, lenguajes, librerías o funciones ejecutables
                    que cumplen con tareas especificas y no tienen clasificación dentro del
                    sistema de gestión de proyectos.
                  </p>
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
             
            </div>-->
         
    <div class="col-lg-12">
            <div class=" panel panel-success">
              <div class="panel-heading">
               <h3 class="panel-title text-center">Herramientas de Programación Registradas</h3></div>
                <div class="panel-body">
                 <table data-toggle="table">
                  <thead>
                   <tr>
                   <th class="info">Proyecto</th>
                   <th>Herramientas de Codificación</th>
                 <!--  <th class="warning">Editar</th> -->
                   <th class="danger">Borrar</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $documentacion->readLenguajes($idProyectoActivo);
                  ?>             
                  </tbody>
                 </table>
                </div>
            </div>
          </div>
          <div class="col-lg-12 text-left">
            <a href="VistaTrashCode.php" class="btn btn-info btn-lg "> Papelera <i class="fa fa-trash"></i> </a> 
          </div>
          <div class="col-lg-12 text-center">
         <form id="formaConfirmaCode" name="formaConfirmaCode">
         <div class="form-group">
           <input type ="hidden"  id="idProyecto" name="idProyecto" value="<?php echo $idProyectoActivo; ?>" ></div>
            <div class="form-group">
            <input type="submit" id="codeEnd"  name ="codeEnd" value="Confirmar Codificación" class="btn btn-lg btn-info ">
               </div>
            </form>
         </div>
     
          
      </div>
     </div>
     
  </div>