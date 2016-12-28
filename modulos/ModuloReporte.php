<?php

class Reporte
{
	public $db;
	private $conx;

////////// Resultado
	public $idPlan;
	public $idDis;
	public $idCode;
	public $idPrueba;
	public $edicionFinalProyecto;
///////// Proyecto 
	public $idProyecto;
	public $nombreProyecto;
	public $descripcionProyecto;
	public $categoriaOtro;
	public $categoriaProyecto;
	public $fechaProyecto;
/////// Categorias
	public $idCategorias;
	public $categoriaNombre;
/////////// Historias de Usuario
	public $idHistoriasUsuario;
	public $nombreHistoria;
	public $descripcionHistoria;
	public $prioridad;
	public $iteracion;
	public $observacion;
 	public $activoH;
//////////// Variables de Requisitos
	public $idRequerimientos;
	public $funcionales;
	public $noFuncionales;
    public $activoReq;
///////////// Variables de Roles de Proyecto
	public $idRolesDeSistema;
	public $nombreRol;
	public $funcionRol;
  public $activoRs;
//////////// Variables de Caso de Uso
	public $idCasoDeUso;
  public $nombreCasoUso;
	public $accionCasoUso;
	public $preCondicion;
	public $postCondicion;
	public $flujoNormal;
	public $flujoAlternativo;
	public $rolCasoUso;
  public $activoCu;
///////// Variables de Diagrama
  public $idDiagrama;
  public $idTipoDiagrama;
  public $diagrama;
  public $activoDd;
  public $nombreDiagrama;
/////// Variables de Codificacion
  public $idLenguaje;
  public $lenguajeNombre;
  public $lenguajeTipo;
  public $activoL;
  ///////// Variables de Pruebas
	public $idPruebasUsuario;
	public $nombrePrueba;
	public $revisiones;
	public $resultadoEsperado;
	public $resultadoObtenido;
	public $pruebaNombre;
  public $activoPu;



	function __construct($db)
	{
		$this->conx = $db;
		$this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}



public function createReporte(){
	try {
		$queryr = $this->conx->prepare("INSERT INTO resultado SET idPlan=?, idDis =?, idCode =?, idPruebas=? ");
			$queryr->bindParam(1,$this->idPlan);
			$queryr->bindParam(2,$this->idDis);
			$queryr->bindParam(3,$this->idCode);
			$queryr->bindParam(4,$this->idPrueba);
			if ($queryr->execute()){
				//echo"<script language ='javascript'>alert('Inserto');</script>";
				return true;
				
			}else{
				//echo"<script language ='javascript'>alert('No inserto');</script>";
			return false;
				
			}

			
		
		
	} catch (Exception $e) {
	   echo $e->getMessage(); 
       return false;
		
	}
	
}

public function readProyectoFinal($idProyecto){
	$sql=("SELECT
			proyecto.idProyecto,
			proyecto.nombreProyecto,
			proyecto.descripcionProyecto,
			proyecto.categoriaProyecto,
			proyecto.categoriaOtro,
			proyecto.fechaProyecto,
			
			categoriasproyecto.idCategorias,
			categoriasproyecto.categoriaNombre,
			
			planificacion.idPlanificacion,
			planificacion.confirmada,
			
			diseño.idDiseno,
			diseño.confirmada,
			
			codificacion.idCodificacion,
			codificacion.confirmada,
			
			pruebas.idPruebas,
			pruebas.confirmada,
			
			resultado.idPlan,
			resultado.idDis,
			resultado.idCode,
			resultado.idPruebas,
			resultado.edicionFinalProyecto
			FROM resultado
			INNER JOIN planificacion
			ON planificacion.idPlanificacion = resultado.idPlan
			INNER JOIN diseño
			ON diseño.idDiseno =resultado.idDis
			INNER JOIN codificacion
			ON codificacion.idCodificacion = resultado.idCode
			INNER JOIN pruebas
			ON pruebas.idPruebas = resultado.idPruebas
			INNER JOIN proyecto
			ON proyecto.idProyecto = planificacion.idProyecto
			INNER JOIN categoriasproyecto 
			ON categoriasproyecto.idCategorias = proyecto.categoriaProyecto
			WHERE proyecto.idProyecto= '$idProyecto' AND
			planificacion.confirmada = 'si' AND diseño.confirmada = 'si' AND
			codificacion.confirmada = 'si' AND pruebas.confirmada = 'si' ");
	$query = $this->conx->prepare($sql);
		$query->execute();

		if ($query->rowCount()>0){
			while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'
					<div class="panel panel-default">

  					<div class="panel-heading">
  					<h1 class="text-center">'.$nombreProyecto.' </h1></div>
  					<div class="panel-body">
   					<div class="col-lg-6">
   					<h3 class="text-center"><span class=" label label-info">Descripción</span></h3>
    				<div class="panel panel-default">
       				<div class="panel-body bg-primary">
       				<p class="text-center lead">'.$descripcionProyecto.'</p>
       				</div>
       				</div>
  					</div>
  					<div class="col-lg-6">
   					<h3 class="text-center"><span class=" label label-info">Categoria</span></h3>
    				<div class="panel panel-default">
       				<div class="panel-body bg-primary">
       				<p class="text-center lead">
         			'.$categoriaNombre.'    '.$categoriaOtro.'
       				</p>
       				</div>
       				</div>
  					</div>
  					<div class="col-lg-12">
   					<div class="col-lg-6">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-info">
                            <div class="col-xs-3">
                                <i class="fa fa-clock-o fa-4x"></i>
                            </div>
                            <div class="col-xs-6 text-center">
                                <p class="alerts-heading text-center">Inicio</p>
                                <p class="alerts-text">'.$fechaProyecto.'</p>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-6">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-success">
                            <div class="col-xs-3">
                                <i class="fa fa-flag-checkered fa-4x"></i>
                            </div>
                            <div class="col-xs-6 text-center">
                                <p class="alerts-heading text-center">Fin</p>
                                <p class="alerts-text">'.$edicionFinalProyecto.'</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                </div>';

					}
			}else{
					echo'<div class="panel panel-default">
  					<div class="panel-heading">
  					<h1 class="text-center">Debes Confirmar la Documentación del Proyecto Activo para ver los resultados </h1>
  					</div>';

			}


}
public function readHistoriasFinal($idProyecto){
	$sql=("SELECT
			
			historiasusuario.idHistoriasUsuario,
			historiasusuario.nombreHistoria,
			historiasusuario.descripcionHistoria,
			historiasusuario.iteracion,
			historiasusuario.prioridad,
			historiasusuario.observacion,
			historiasusuario.idPlanificacion,
			historiasusuario.activoH,

			planificacion.idPlanificacion,
			planificacion.confirmada,
			
			diseño.idDiseno,
			diseño.confirmada,
			
			codificacion.idCodificacion,
			codificacion.confirmada,
			
			pruebas.idPruebas,
			pruebas.confirmada,
			
			resultado.idPlan,
			resultado.idDis,
			resultado.idCode,
			resultado.idPruebas,
			resultado.edicionFinalProyecto
			FROM resultado
			INNER JOIN planificacion
			ON planificacion.idPlanificacion = resultado.idPlan
			INNER JOIN diseño
			ON diseño.idDiseno =resultado.idDis
			INNER JOIN codificacion
			ON codificacion.idCodificacion = resultado.idCode
			INNER JOIN pruebas
			ON pruebas.idPruebas = resultado.idPruebas
			INNER JOIN proyecto
			ON proyecto.idProyecto = planificacion.idProyecto
			INNER JOIN historiasusuario
			ON historiasusuario.idPlanificacion = planificacion.idPlanificacion 
			WHERE proyecto.idProyecto= '$idProyecto' AND
			planificacion.confirmada = 'si' AND diseño.confirmada = 'si' AND
			codificacion.confirmada = 'si' AND pruebas.confirmada = 'si'
			AND historiasusuario.activoH = 1 ");
		$query = $this->conx->prepare($sql);
		$query->execute();
		if ($query->rowCount()>0){
			echo'<div class="col-xs-12 .col-sm-6 .col-md-8">
				<div class="list-group"><br>	';
			while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'
					
					<a class="list-group-item active">
					<h4 class="list-group-item-heading text-center ">Nombre Historia de Usuario</h4>
					<p class="list-group-item-text text-center lead">'.$nombreHistoria.'</p>
					 </a>
					 <a class="list-group-item list-group-item-success">
					<h4 class="list-group-item-heading">Descripción</h4>
					<p class="list-group-item-text">'.$descripcionHistoria.'</p>
					 </a>
					 <a class="list-group-item">
					<h4 class="list-group-item-heading">Prioridad</h4>
					<p class="list-group-item-text">'.$prioridad.'</p>
					 </a>
					 <a class="list-group-item">
					<h4 class="list-group-item-heading">Iteración</h4>
					<p class="list-group-item-text">'.$iteracion.'</p>
					 </a>
					 <a class="list-group-item">
					<h4 class="list-group-item-heading">Observaciones</h4>
					<p class="list-group-item-text">'.$observacion.'</p>
					 </a><br>
					';

					}
				echo '</div></div>';	
			}else{
					echo'<div class="panel panel-default">
  					<div class="panel">
  					<h1 class="text-center"> - </h1>
  					</div>';

			}

}

public function readRequisitosFFinal($idProyecto){
	$sql=("SELECT
			
			requerimientos.idRequerimientos,
			requerimientos.funcionales,
			requerimientos.noFuncionales,
			requerimientos.idPlanificacion,
			requerimientos.activoReq,


			planificacion.idPlanificacion,
			planificacion.confirmada,
			
			diseño.idDiseno,
			diseño.confirmada,
			
			codificacion.idCodificacion,
			codificacion.confirmada,
			
			pruebas.idPruebas,
			pruebas.confirmada,
			
			resultado.idPlan,
			resultado.idDis,
			resultado.idCode,
			resultado.idPruebas,
			resultado.edicionFinalProyecto
			FROM resultado
			INNER JOIN planificacion
			ON planificacion.idPlanificacion = resultado.idPlan
			INNER JOIN diseño
			ON diseño.idDiseno =resultado.idDis
			INNER JOIN codificacion
			ON codificacion.idCodificacion = resultado.idCode
			INNER JOIN pruebas
			ON pruebas.idPruebas = resultado.idPruebas
			INNER JOIN proyecto
			ON proyecto.idProyecto = planificacion.idProyecto
			INNER JOIN requerimientos
			ON requerimientos.idPlanificacion = planificacion.idPlanificacion 
			WHERE proyecto.idProyecto= '$idProyecto' AND
			planificacion.confirmada = 'si' AND diseño.confirmada = 'si' AND
			codificacion.confirmada = 'si' AND pruebas.confirmada = 'si'
			AND requerimientos.activoReq = 1 ");
		$query = $this->conx->prepare($sql);
		$query->execute();
		if ($query->rowCount()>0){
			
			while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'<div class="panel panel-default">
				<div class="panel-body bg-info">
				<p class="text-justify lead">'.$funcionales.'</p>
				</div>
				</div>';
					}
					
			}else{
					echo'
					
					<div class="panel panel-default">
  					<div class="panel">
  					<h1 class="text-center"> - </h1>
  					</div>';

			}
}

public function readRequisitosNFFinal($idProyecto){
	$sql=("SELECT
			
			requerimientos.idRequerimientos,
			requerimientos.funcionales,
			requerimientos.noFuncionales,
			requerimientos.idPlanificacion,
			requerimientos.activoReq,


			planificacion.idPlanificacion,
			planificacion.confirmada,
			
			diseño.idDiseno,
			diseño.confirmada,
			
			codificacion.idCodificacion,
			codificacion.confirmada,
			
			pruebas.idPruebas,
			pruebas.confirmada,
			
			resultado.idPlan,
			resultado.idDis,
			resultado.idCode,
			resultado.idPruebas,
			resultado.edicionFinalProyecto
			FROM resultado
			INNER JOIN planificacion
			ON planificacion.idPlanificacion = resultado.idPlan
			INNER JOIN diseño
			ON diseño.idDiseno =resultado.idDis
			INNER JOIN codificacion
			ON codificacion.idCodificacion = resultado.idCode
			INNER JOIN pruebas
			ON pruebas.idPruebas = resultado.idPruebas
			INNER JOIN proyecto
			ON proyecto.idProyecto = planificacion.idProyecto
			INNER JOIN requerimientos
			ON requerimientos.idPlanificacion = planificacion.idPlanificacion 
			WHERE proyecto.idProyecto= '$idProyecto' AND
			planificacion.confirmada = 'si' AND diseño.confirmada = 'si' AND
			codificacion.confirmada = 'si' AND pruebas.confirmada = 'si'
			AND requerimientos.activoReq = 1 ");
		$query = $this->conx->prepare($sql);
		$query->execute();
		if ($query->rowCount()>0){
			
			while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'
				<div class="panel panel-default">
				<div class="panel-body bg-info">
				<p class="text-justify lead">'.$noFuncionales.'</p>
				</div>
				</div>';
					}
					
			}else{
					echo'
					<div class="panel panel-default">
  					<div class="panel">
  					<h1 class="text-center"> - </h1>
  					</div>';

			}


}
public function readRolesFinal($idProyecto){
	$sql=("SELECT
			
			rolesdesistema.idRolesDeSistema,
			rolesdesistema.nombreRol,
			rolesdesistema.funcionRol,
			rolesdesistema.idDiseno,
			rolesdesistema.activoRs,


			planificacion.idPlanificacion,
			planificacion.confirmada,
			
			diseño.idDiseno,
			diseño.confirmada,
			
			codificacion.idCodificacion,
			codificacion.confirmada,
			
			pruebas.idPruebas,
			pruebas.confirmada,
			
			resultado.idPlan,
			resultado.idDis,
			resultado.idCode,
			resultado.idPruebas,
			resultado.edicionFinalProyecto
			FROM resultado
			INNER JOIN planificacion
			ON planificacion.idPlanificacion = resultado.idPlan
			INNER JOIN diseño
			ON diseño.idDiseno =resultado.idDis
			INNER JOIN codificacion
			ON codificacion.idCodificacion = resultado.idCode
			INNER JOIN pruebas
			ON pruebas.idPruebas = resultado.idPruebas
			INNER JOIN proyecto
			ON proyecto.idProyecto = planificacion.idProyecto
			INNER JOIN rolesdesistema
			ON rolesdesistema.idDiseno = diseño.idDiseno
			WHERE proyecto.idProyecto= '$idProyecto' AND
			planificacion.confirmada = 'si' AND diseño.confirmada = 'si' AND
			codificacion.confirmada = 'si' AND pruebas.confirmada = 'si'
			AND rolesdesistema.activoRs = 1 ");
		$query = $this->conx->prepare($sql);
		$query->execute();
		if ($query->rowCount()>0){
			
			while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'
				<div class="panel panel-default text-center">
				<div class="panel-body bg-warning">
				<p class="text-center lead">'.$nombreRol.'</p>
				<p class="text-center lead ">'.$funcionRol.'</p>
				</div>
				</div>';

					}
					
					
			}else{
					echo'<div class="panel panel-default">
  					<div class="panel">
  					<h1 class="text-center"> - </h1>
  					</div>';

			}




}
public function readCasoDeUsoFinal($idProyecto){
	$sql=("SELECT
			casosdeuso.idCasoDeUso,
			casosdeuso.nombreCasoUso,
			casosdeuso.accionCasoUso,
			casosdeuso.preCondicion,
			casosdeuso.postCondicion,
			casosdeuso.flujoNormal,
			casosdeuso.flujoAlternativo,
			casosdeuso.idRs,
			casosdeuso.idDiseno,
			casosdeuso.activoCu,
			
			rolesdesistema.idRolesDeSistema,
			rolesdesistema.nombreRol,
			rolesdesistema.activoRs,

			planificacion.idPlanificacion,
			planificacion.confirmada,
			
			diseño.idDiseno,
			diseño.confirmada,
			
			codificacion.idCodificacion,
			codificacion.confirmada,
			
			pruebas.idPruebas,
			pruebas.confirmada,
			
			resultado.idPlan,
			resultado.idDis,
			resultado.idCode,
			resultado.idPruebas,
			resultado.edicionFinalProyecto
			FROM resultado
			INNER JOIN planificacion
			ON planificacion.idPlanificacion = resultado.idPlan
			INNER JOIN diseño
			ON diseño.idDiseno =resultado.idDis
			INNER JOIN codificacion
			ON codificacion.idCodificacion = resultado.idCode
			INNER JOIN pruebas
			ON pruebas.idPruebas = resultado.idPruebas
			INNER JOIN proyecto
			ON proyecto.idProyecto = planificacion.idProyecto
			INNER JOIN casosdeuso
			ON casosdeuso.idDiseno = diseño.idDiseno
			INNER JOIN rolesdesistema
			ON rolesdesistema.idRolesDeSistema = casosdeuso.idRs
			WHERE proyecto.idProyecto= '$idProyecto' AND
			planificacion.confirmada = 'si' AND diseño.confirmada = 'si' AND
			codificacion.confirmada = 'si' AND pruebas.confirmada = 'si'
			AND casosdeuso.activoCu = 1 AND rolesdesistema.activoRs= 1 ");
		$query = $this->conx->prepare($sql);
		$query->execute();
		if ($query->rowCount()>0){
			echo'<div class="col-xs-12 .col-sm-6 .col-md-8">
				<div class="list-group"><br>	';
			while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'
					
					<a class="list-group-item active ">
					<h4 class="list-group-item-heading text-center ">Nombre Caso de Uso</h4>
					<p class="list-group-item-text lead">'.$nombreCasoUso.'</p>
					 </a>
					  <a class="list-group-item list-group-item-warning">
					<h4 class="list-group-item-heading">Rol Asignado</h4>
					<p class="list-group-item-text">'.$nombreRol.'</p>
					 </a>
					 <a class="list-group-item active " >
					<h4 class="list-group-item-heading">Acción</h4>
					<p class="list-group-item-text">'.$accionCasoUso.'</p>
					 </a>
					 <a class="list-group-item ">
					<h4 class="list-group-item-heading">Pre-Condicación</h4>
					<p class="list-group-item-text">'.$preCondicion.'</p>
					 </a>
					 <a class="list-group-item">
					<h4 class="list-group-item-heading ">Post-Condición</h4>
					<p class="list-group-item-text">'.$postCondicion.'</p>
					 </a>
					 <a class="list-group-item">
					<h4 class="list-group-item-heading">Flujo Normal</h4>
					<p class="list-group-item-text">'.$flujoNormal.'</p>
					 </a>
					 <a class="list-group-item">
					<h4 class="list-group-item-heading">Flujo Alternativo</h4>
					<p class="list-group-item-text">'.$flujoAlternativo.'</p>
					 </a><br>
					';

					}
				echo '</div></div>';	
			}else{
					echo'<div class="panel panel-default">
  					<div class="panel">
  					<h1 class="text-center"> - </h1>
  					</div>';

			}

}

public function readDiagramasFinal($idProyecto){
	$sql=("SELECT
			
			diagramadiseno.idDiagrama,
			diagramadiseno.idTipoDiagrama,
			diagramadiseno.diagrama,
			diagramadiseno.idDiseno,
			diagramadiseno.activoDd,

			diagramatipo.idDiagramaTipo,
			diagramatipo.nombreDiagrama,
			diagramatipo.activoDt,


			planificacion.idPlanificacion,
			planificacion.confirmada,
			
			diseño.idDiseno,
			diseño.confirmada,
			
			codificacion.idCodificacion,
			codificacion.confirmada,
			
			pruebas.idPruebas,
			pruebas.confirmada,
			
			resultado.idPlan,
			resultado.idDis,
			resultado.idCode,
			resultado.idPruebas,
			resultado.edicionFinalProyecto
			FROM resultado
			INNER JOIN planificacion
			ON planificacion.idPlanificacion = resultado.idPlan
			INNER JOIN diseño
			ON diseño.idDiseno =resultado.idDis
			INNER JOIN codificacion
			ON codificacion.idCodificacion = resultado.idCode
			INNER JOIN pruebas
			ON pruebas.idPruebas = resultado.idPruebas
			INNER JOIN proyecto
			ON proyecto.idProyecto = planificacion.idProyecto
			INNER JOIN diagramadiseno
			ON diagramadiseno.idDiseno = diseño.idDiseno
			INNER JOIN diagramatipo
			ON diagramatipo.idDiagramaTipo = diagramadiseno.idTipoDiagrama

			WHERE proyecto.idProyecto= '$idProyecto' AND
			planificacion.confirmada = 'si' AND diseño.confirmada = 'si' AND
			codificacion.confirmada = 'si' AND pruebas.confirmada = 'si'
			 AND diagramadiseno.idDiagrama AND diagramatipo.activoDt = 1 ");
		$query = $this->conx->prepare($sql);
		$query->execute();
		$directorio = "../imagenesUsuario";
		if ($query->rowCount()>0){
			echo'<div class="col-md-12">';
			while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				$archivo = $directorio.'/'.$diagrama;
				echo'<div class="well">
                            <img class="thumbnail img-responsive" alt="Bootstrap template" src="'.$archivo.'" />
                            <span class="lead">
                              '.$nombreDiagrama.'
                            </span>
                        </div>';
				

					}
					
			echo '</div>';		
			}else{
					echo'<div class="panel panel-default">
  					<div class="panel">
  					<h1 class="text-center"> - </h1>
  					</div>';

			}

}

public function readHerramientasFinal($idProyecto){
	$sql=("SELECT
			
			lenguajecodificacion.idLenguaje,
			lenguajecodificacion.idCodificacion,
			lenguajecodificacion.lenguajes,
			lenguajecodificacion.activoL,
			planificacion.idPlanificacion,
			planificacion.confirmada,
			
			diseño.idDiseno,
			diseño.confirmada,
			
			codificacion.idCodificacion,
			codificacion.confirmada,
			
			pruebas.idPruebas,
			pruebas.confirmada,
			
			resultado.idPlan,
			resultado.idDis,
			resultado.idCode,
			resultado.idPruebas,
			resultado.edicionFinalProyecto
			FROM resultado
			INNER JOIN planificacion
			ON planificacion.idPlanificacion = resultado.idPlan
			INNER JOIN diseño
			ON diseño.idDiseno =resultado.idDis
			INNER JOIN codificacion
			ON codificacion.idCodificacion = resultado.idCode
			INNER JOIN pruebas
			ON pruebas.idPruebas = resultado.idPruebas
			INNER JOIN proyecto
			ON proyecto.idProyecto = planificacion.idProyecto
			INNER JOIN lenguajecodificacion
			ON lenguajecodificacion.idCodificacion = codificacion.idCodificacion 
			WHERE proyecto.idProyecto= '$idProyecto' AND
			planificacion.confirmada = 'si' AND diseño.confirmada = 'si' AND
			codificacion.confirmada = 'si' AND pruebas.confirmada = 'si'
			AND lenguajecodificacion.activoL = 1 ");
		
		$query = $this->conx->prepare($sql);
		$query->execute();
		if ($query->rowCount()>0){
			echo'<div class="col-xs-12 .col-sm-6 .col-md-8">
				<div class="list-group"><br>	';
			while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'
					
					<a class="list-group-item active">
					<h4 class="list-group-item-heading text-center ">Herramientas de Programación</h4>
					<p class="list-group-item-text text-center lead">'.$lenguajes.'</p>
					</a>
					
					';

					}
				echo '</div></div>';	
			}else{
					echo'<div class="panel panel-default">
  					<div class="panel">
  					<h1 class="text-center"> - </h1>
  					</div>';

			}

}

public function readPruebasFinal($idProyecto){
	$sql=("SELECT
			
			pruebasusuario.idPruebasUsuario,
			pruebasusuario.idHistoriaUsuario,
			pruebasusuario.tipoPrueba,
			pruebasusuario.revisiones,
			pruebasusuario.resultadoEsperado,
			pruebasusuario.resultadoObtenido,
			pruebasusuario.idPruebas,
			pruebasusuario.activoPu,

			pruebatipo.idPruebaTipo,
			pruebatipo.pruebaNombre,
			pruebatipo.activoPt,

			historiasusuario.idHistoriasUsuario,
			historiasusuario.nombreHistoria,

			planificacion.idPlanificacion,
			planificacion.confirmada,
			
			diseño.idDiseno,
			diseño.confirmada,
			
			codificacion.idCodificacion,
			codificacion.confirmada,
			
			pruebas.idPruebas,
			pruebas.confirmada,
			
			resultado.idPlan,
			resultado.idDis,
			resultado.idCode,
			resultado.idPruebas,
			resultado.edicionFinalProyecto
			FROM resultado
			INNER JOIN planificacion
			ON planificacion.idPlanificacion = resultado.idPlan
			INNER JOIN diseño
			ON diseño.idDiseno =resultado.idDis
			INNER JOIN codificacion
			ON codificacion.idCodificacion = resultado.idCode
			INNER JOIN pruebas
			ON pruebas.idPruebas = resultado.idPruebas
			INNER JOIN proyecto
			ON proyecto.idProyecto = planificacion.idProyecto
			INNER JOIN pruebasusuario
			ON pruebasusuario.idPruebas = pruebas.idPruebas
			INNER JOIN pruebatipo
			ON pruebatipo.idPruebaTipo =pruebasusuario.tipoPrueba
			INNER JOIN historiasusuario
			ON historiasusuario.idHistoriasUsuario = pruebasusuario.idHistoriaUsuario

			WHERE proyecto.idProyecto= '$idProyecto' AND
			planificacion.confirmada = 'si' AND diseño.confirmada = 'si' AND
			codificacion.confirmada = 'si' AND pruebas.confirmada = 'si'
			AND pruebasusuario.activoPu = 1 AND pruebatipo.activoPt = 1 AND historiasusuario.activoH = 1");
		$query = $this->conx->prepare($sql);
		$query->execute();
		if ($query->rowCount()>0){
			echo'<div class="col-xs-12 .col-sm-6 .col-md-8">
				<div class="list-group"><br>	';
			while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'
					
					<a class="list-group-item active">
					<h4 class="list-group-item-heading text-center ">Tipo de Prueba</h4>
					<p class="list-group-item-text text-center lead">'.$pruebaNombre.'</p>
					 </a>
					 <a class="list-group-item list-group-item-danger">
					<h4 class="list-group-item-heading">Historia de Usuario</h4>
					<p class="list-group-item-text">'.$nombreHistoria.'</p>
					 </a>
					 <a class="list-group-item ">
					<h4 class="list-group-item-heading">Resultado Esperado</h4>
					<p class="list-group-item-text">'.$resultadoEsperado.'</p>
					 </a>
					 <a class="list-group-item list-group-item-danger">
					<h4 class="list-group-item-heading">Resultado Obtenido</h4>
					<p class="list-group-item-text">'.$resultadoObtenido.'</p>
					 </a>
					 <a class="list-group-item ">
					<h4 class="list-group-item-heading">Revisiones</h4>
					<p class="list-group-item-text">'.$revisiones.'</p>
					 </a><br>
					';

					}
				echo '</div></div>';	
			}else{
					echo'<div class="panel panel-default">
  					<div class="panel">
  					<h1 class="text-center"> - </h1>
  					</div>';

			}

}

public function countReportes(){
	$query = $this->conx->prepare ("SELECT * FROM resultado");
	$query->execute();
	 return $cuenta = $query->rowCount();


}

}


?>