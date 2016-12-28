<div class="col-lg-16" style="display:none" id="panel1">
  	<div class="panel panel-info">
			<div class="panel-heading">
				<h2 class="panel-title text-center"><?php echo $tituloPanel1; ?></h2>
			</div>
      <div class="panel-body">
          <div class="col-lg-6" id="selectPlan" >
           <div class="panel panel-warning">
            <div class="panel-heading"><h3>Seleccionar Proyecto</h3></div>
              <div class="panel-body"> 
                <div class="col-lg-12">
                   <label>Confirma El Proyecto para Documentar:</label>
                
                  <form  id="planificaIni" name="planificaIni" role="form">
                   <div class="form-group">
                      <select class="form-control" name="pID" id="pID" required>
                        <option  name="Alta">Selecionar ...</option>
                       <?php 
                       $proyecto->documentaProyecto($idUrol);
                       ?>
                     </select>
                     </div>
                     <br>
                     <div class="form-group">
                     <input type="submit" id="planificacionStart"  name ="planificacionStart" value="Inicia Planificación" class="btn btn-block btn-primary ">
                     </div> 
                    </form>
                      <button id="cancelaPlan" class="btn btn-block btn-danger">Ya he Seleccionado un Proyecto</button>
                       <a href="VistaProyecto.php" class="btn btn-block btn-warning">Deseo Cambiar de Proyecto</a>
                </div>
              </div> 
            </div>
           
          </div>
          <div class="col-lg-6">
					 <div class="panel panel-primary">
            <div class="panel-heading"><h3>Historias de Usuario</h3></div>
              <div class="panel-body"> 
              	<div class="col-lg-12">
              		<form role="form" id="formaHistoria" name="formaHistoria">
              			<div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Nombre </span>
              				<input type="text" class="form-control" id="nombreHistoria" name="nombreHistoria" placeholder="Inserta el nombre de la Historia de Usuario" required  >
                   </div><br>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Descripción </span>
              				<textarea class="form-control" rows="5" col="6" id="descripcionHistoria" name="descripcionHistoria" placeholder="Inserta la Descripcion de la historia de Usuario" required></textarea>
                    </div><br>
                    <div class="form-group">
                      <label>Prioridad: </label>
                      <select class="form-control" id="prioridad" name="prioridad" required>
                        <option  name="Alta" value="Alta">Alta</option>
                        <option  name="Media"value="Media">Media</option>
                        <option  name="Baja" value="Baja">Baja</option>
                      </select>
                    </div><br>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Orden de Entrega (Iteración): </span>
                      <input type="number" min="1" class="form-control" id="iteracion" name="iteracion" required >
                    </div><br>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Observación</span>
                      <textarea class="form-control" rows="5" col="6" id="observacion" name="observacion" placeholder="Inserta alguna observación sobre la historia" ></textarea>
                    </div><br>
                    <div class="form-group">
                    <input type ="hidden"  id="idPlanificacion" name="idPlanificacion" value="<?php echo $idPlan; ?>" >
                    </div>         
                    <div class="form-group">
                      <input type="submit" id="historia" name ="historia" value="Crear Historia"class="btn btn-success pull-middle">
                      <input type="reset" value="Borrar"class="btn btn-danger pull-middle">
                    </div>   	  
              	  </form>
                </div>
              </div> 
            </div>
				  </div>
        <div class="col-lg-6" style="display:none" id="infoPlan">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="panel-title">Información</h4></div>
          <div class="panel-body">
            <div class="col-lg-12">
              <div class="list-group">
                <a href="#" class="list-group-item">
                  <h3 class="list-group-item-heading"><span class="label label-default">Historia de Usuario</span></h3>
                  <br>
                  <p class="list-group-item-text text-justify">
                    Crear Las historias de usuario  es uno de los primeros pasos
                    de la planificación de la metodología XP. El <strong>nombre</strong> identifica la historia,
                    la <strong>descripción</strong> la función que realiza en tu proyecto. El <strong> orden de entrega o
                   iteración</strong> permite ordenar las historias entre las categorías de <strong>prioridad</strong> y por
                    ultimo la <strong>observación</strong> es un campo opcional que puedes llenar si necesitas agregar
                    información no esencial sobre la historia.
                  </p>
                  <p>Ejemplo: Sistema Administrativo de la Empresa EnRON </p>
                </a>
                <a href="#" class="list-group-item">
                  <h3 class="list-group-item-heading"><span class="label label-default">Requisitos Funcionales</span></h3>
                  <br>
                  <p class="list-group-item-text text-justify">
                    Los requisitos funcionales del sistema definen una o varias funciones
                     exclusivas de tu proyecto, completa el campo con una o varias descripciones
                    <strong>especificas</strong> y necesarias para tu proyecto.
                   </p>
                </a>
                <a href="#" class="list-group-item">
                  <h3 class="list-group-item-heading"><span class="label label-default">Requisitos No Funcionales</span></h3>
                  <br>
                  <p class="list-group-item-text text-justify">
                  Especifican criterios para evaluar la operación de un sistema a diferencia de un
                  comportamiento especifico , es decir que <strong>no describen información esencial o
                  funciones a realizar</strong>, selecciona el o los requisitos no funcionales que consideres
                  para tu proyecto.
                  </p><p> Ejemplo: administrativo, educativo, matenimiento, etc. </p>
                </a>
                
              </div>
           </div>
           
         </div>
        </div>
    </div>
          
				  <div class="col-lg-12">
					 <div class="panel panel-primary">
            <div class="panel-heading">
              <h3>Requisitos</h3></div>
              	<div class="panel-body">
              		<div class="col-lg-12">
              		  <form role="form" id="formaRequisitos" name="formaRequisitos">
              			  <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Funcionales</span>
              				  <textarea class="form-control" rows="5" col="6" id="funcionales" name="funcionales" placeholder="Inserta los Requisitos funcionales de tu Proyecto" ></textarea>
                      </div><br>
                      <div class="form-group">
                      <label>No Funcionales</label>
                        <div class="checkbox checkbox-success">
                          <input id="noFuncionales" class="styled" type="checkbox" name="noFuncionales[]" value="Portabilidad">
                        <label>Portabilidad</label>
                        </div>
                        <div class="checkbox checkbox-success">
                          <input id="noFuncionales" class="styled" type="checkbox" name="noFuncionales[]" value="Flexibilidad">
                        <label>Flexibilidad</label>
                        </div>
                        <div class="checkbox checkbox-success">
                          <input id="noFuncionales" class="styled" type="checkbox" name="noFuncionales[]" value="Estabilidad">
                        <label>Estabilidad</label>
                        </div>
                        <div class="checkbox checkbox-success">
                          <input id="noFuncionales" class="styled" type="checkbox" name="noFuncionales[]" value="Mantenibilidad">
                        <label>Mantenibilidad</label>
                        </div>
                        <div class="checkbox checkbox-success">
                          <input id="noFuncionales" class="styled" type="checkbox" name="noFuncionales[]" value="Manejo de Error">
                        <label>Manejo de Error</label>
                        </div>
                        <div class="checkbox checkbox-success">
                          <input id="noFuncionales" class="styled" type="checkbox" name="noFuncionales[]" value="Descripcion de Error">
                        <label>Descripcion de Error</label>
                        </div>
                        <div class="checkbox checkbox-success">
                          <input id="noFuncionales" class="styled" type="checkbox" name="noFuncionales[]" value="Internacionalidad">
                        <label>Internacionalidad</label>
                        </div>
                        <div class="checkbox checkbox-success">
                          <input id="noFuncionales" class="styled" type="checkbox" name="noFuncionales[]" value="Accesibilidad">
                        <label>Accesibilidad</label>
                        </div>
                        <div class="checkbox checkbox-success">
                          <input id="noFuncionales" class="styled" type="checkbox" name="noFuncionales[]" value="Seguridad">
                        <label>Seguridad</label>
                        </div>
                        <div class="checkbox checkbox-success">
                          <input id="noFuncionales" class="styled" type="checkbox" name="noFuncionales[]" value="Rendimiento">
                        <label>Rendimiento</label>
                        </div>
                        <div class="checkbox checkbox-success">
                          <input id="noFuncionales" class="styled" type="checkbox" name="noFuncionales[]" value="Concurrencia">
                        <label>Concurrencia</label>
                        </div>
                       </div>
                     <br>
                     <div class="form-group">
                    <input type ="hidden"  id="idPlanificacion" name="idPlanificacion" value="<?php echo $idPlan; ?>" >
                    </div> 
                     <div class="form-group">
                        <input type="submit" id="requisitos" name ="requisitos" value="Crear Requerimientos"class="btn btn-success pull-middle">
                        <input type="reset" value="Borrar"class="btn btn-danger pull-middle">
                      </div>   	  
              			</form>
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
               <h3 class="panel-title text-center">Historias Registradas</h3></div>
                <div class="panel-body">
                 <table data-toggle="table">
                  <thead>
                   <tr>
                   <th class="info">Proyecto</th>
                   <th class="info">Historia</th>
                   <th>Descripcion</th>
                   <th>Prioridad</th>
                   <th>Iteracion</th>
                   <th>Observaciones</th>
                 <!--  <th class="warning">Editar</th>-->
                   <th class="danger">Borrar</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $documentacion->readHistorias($idProyectoActivo);
                  ?>             
                  </tbody>
                 </table>
                </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class=" panel panel-success">
              <div class="panel-heading">
               <h3 class="panel-title text-center">Requisitos Registrados</h3></div>
                <div class="panel-body">
                 <table data-toggle="table">
                  <thead>
                   <tr>
                   <th class="info">Proyecto</th>
                   <th>Funcionales</th>
                   <th>No-Funcionales</th>
                 <!--  <th class="warning">Editar</th>-->
                   <th class="danger">Borrar</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $documentacion->readRequerimientos($idProyectoActivo);
                   
                  ?>             
                  </tbody>
                 </table>
                </div>
            </div>
          </div>
          <div class="col-lg-12 text-left">
            <a href="VistaTrashPlan.php" class="btn btn-info btn-lg "> Papelera <i class="fa fa-trash"></i> </a> 
          </div>
         <div class="col-lg-12 text-center">
         <form id="formaConfirmaPlan" name="formaConfirmaPlan">
         <div class="form-group">
           <input type ="hidden"  id="idProyecto" name="idProyecto" value="<?php echo $idProyectoActivo; ?>" ></div>
            <div class="form-group">
            <input type="submit" id="planificacionEnd"  name ="planificacionEnd" value="Confirmar Planificación" class="btn btn-lg btn-info ">
               </div>
            </form>
         </div>
		  </div>
	  </div>
	</div>