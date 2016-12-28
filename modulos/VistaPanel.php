<?php
include ("ModuloHeaderP.php");
?>
        <div id="page-wrapper" >
            <div class="row">
                <div class="col-lg-12">
                    <h1>Bienvenido <?php echo $nombre ?></h1>
                    <div class="panel panel-default">
                        <div class= "panel-body bg-primary">
                        <p class="text-center lead">Bienvenido al Sistema de control de Documentación<p>
                     </div>
                   </div>
                </div>
            </div>
              <!-- /#row -->

            <div class="row ">
                <ul class="timeline">
                    <li>
                    <div class="timeline-badge info">1</div>
                    <div class="timeline-panel bg-info">
                        <div class="timeline-heading">
                            <h4 class="timeline-title lead">Crear Proyecto</h4>                            
                           
                            <hr />
                        </div>
                        <div class="timeline-body">
                            <p class="text-left lead">Antes de iniciar la documentación debes crear un <strong><a href="VistaProyecto.php">Proyecto</a></strong>,
                             describe sus características en Los campos requeridos. Si
                             es la primera vez que utilizas una <strong>Metodología de Desarrollo</strong>
                             lo más recomendable es que visites los <strong><a href="VistaTutorial.php">Tutoriales</a></strong>. Una vez
                             creado tu proyecto puedes editarlo para hacer cualquier cambio
                             necesario. Cuando estés a gusto con los datos de tu proyecto
                             actívalo para empezar a documentarlo</p>
                        </div>
                    </div>
                </li>
                 <li class="timeline-inverted">
                    <div class="timeline-badge warning">2</div>
                    <div class="timeline-panel bg-success">
                        <div class="timeline-heading">
                            <h4 class="timeline-title lead">Documentación del Proyecto</h4>                  
                            <hr />
                        </div>
                        <div class="timeline-body">
                            <p class="text-right lead">La Documentación del proyecto se divide en 4 fases, según la <strong>Metodología XP</strong>
                            estas  son: planificación, diseño, codificación y pruebas. Cada fase contiene
                            sus respectivos campos los cuales debes completar, utiliza las <strong><a href="VistaTarea.php">Tareas</a></strong> para
                            mantener el orden de las actividades que debes realizar. Una vez que
                            completes los campos confirma tu documentación.  
                           </p>
                        </div>
                    </div>
                </li>
                  <li>
                    <div class="timeline-badge success ">3</div>
                    <div class="timeline-panel bg-info">
                        <div class="timeline-heading">
                            <h4 class="timeline-title lead">Reporte </h4>                            
                           
                            <hr />
                        </div>
                        <div class="timeline-body">
                            <p class="text-left lead"><strong>Completa y confirma</strong> tu documentación para  generar un reporte
                             que indica todos los datos registrados en tu proyecto,
                             utiliza estos datos para mejorar tus próximos proyectos,presentar la información de una forma facil de entender, crear estimados de tiempo y
                             simplificar el proceso de documentación
                                </p>
                        </div>
                    </div>
                </li>

                <li class="timeline-inverted">
                    <div class="timeline-badge info ">4</div>
                    <div class="timeline-panel bg-success">
                        <div class="timeline-heading">
                            <h4 class="timeline-title lead">Tareas y Tutoriales </h4>                            
                           
                            <hr />
                        </div>
                        <div class="timeline-body">
                            <p class="text-right lead">Usa los <strong><a href="VistaTutorial.php">Tutoriales</a></strong> para aprender todo lo necesario
                           sobre la metodologia XP, temas relacionados y como se aplica a la documentación de tu proyecto, si no tienes experiencia documentando sistemas
                           de información, <strong><a href="VistaTarea.php">Activa Tareas</a></strong> y sigue sus instrucciones en orden.
                                </p>
                        </div>
                    </div>
                </li>
                </ul>
                
            </div>
             <!-- /#row -->
        <div>
         <!-- /#page_wrapper -->
    <?php include ("ModuloFooterP.php"); ?>
