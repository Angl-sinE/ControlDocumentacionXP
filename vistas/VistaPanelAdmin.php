<?php
include ("VistaHeaderAdmin.php");
// Contadores de Registros 
$cuentaProyectos=$proyecto->countProyectos();
$cuentaUsuarios=$usuario->countUsuarios();
$cuentaTareas=$tareas->countTareas();
$cuentaTutoriales=$tutorial->countTutoriales();
$cuentaPruebas=$docAdmin->countPruebas();
$cuentaDiagramas=$docAdmin->countDiagramas();
$cuentaLenguajes=$docAdmin->countLenguajes();
$cuentaComentarios=$comentarios->countComentarios();
$cuentaReportes=$reportes->countReportes();
?>

<div id="page-header">
	<div class="col-lg-12">
    		 <h1>Bienvenido Administrador</h1>
    	</div>
    	<div class="col-lg-12">
    		<h2><small>Datos de Interés</small></h2>
    	</div>
   	    <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-info">
                            <div class="col-xs-5">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading"><?php print_r($cuentaUsuarios); ?></p>
                                <p class="alerts-text">Usuarios Registrados</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-info">
                            <div class="col-xs-5">
                                <i class="fa fa-folder-open fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading"><?php print_r($cuentaProyectos); ?></p>
                                <p class="alerts-text">Proyectos Creados</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-info">
                            <div class="col-xs-5">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading"><?php print_r($cuentaTareas); ?></p>
                                <p class="alerts-text">Tareas Registradas</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-info">
                            <div class="col-xs-5">
                                <i class="fa fa-flask fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading"><?php print_r($cuentaTutoriales); ?></p>
                                <p class="alerts-text">Tutoriales Registrados</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-success">
                            <div class="col-xs-5">
                                <i class="fa fa-tachometer fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading"><?php print_r($cuentaReportes); ?></p>
                                <p class="alerts-text">Reportes Generados</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-warning">
                            <div class="col-xs-5">
                                <i class="fa fa-sitemap fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading"><?php print_r($cuentaDiagramas); ?></p>
                                <p class="alerts-text">Diagramas Registrados</p>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-warning">
                            <div class="col-xs-5">
                                <i class="fa fa-code fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading"><?php print_r($cuentaLenguajes); ?></p>
                                <p class="alerts-text">Lenguajes Registrados</p>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-warning">
                            <div class="col-xs-5">
                                <i class="fa fa-list fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading"><?php print_r($cuentaPruebas); ?></p>
                                <p class="alerts-text">Pruebas Registradas</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3" >
                    <div class="panel panel-default ">
                        <div class="panel-body alert-success">
                            <div class="col-xs-5">
                                <i class="fa fa-comment fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading"><?php print_r($cuentaComentarios); ?></p>
                                <p class="alerts-text">Comentarios Registrados</p>
                            </div>
                        </div>
                    </div>
                </div>
                  
</div>    	
<?php
include ("VistaFooterAdmin.php");
?>