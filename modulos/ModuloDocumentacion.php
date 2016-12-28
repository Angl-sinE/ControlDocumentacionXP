<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Documentacion{

	public $idProyecto;
	public $nombreProyecto;
	public $idPlanificacion;
	public $idDiseno;
	public $idCodificacion;
	public $idPruebas;
 
///////////////// Variables de Historias de Usuario
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
	



	public $db;
	private $conx;

	
public function __construct($db){
$this->conx = $db;
$this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
////////////////////////////////////////////////////////////// Planificacion //////////////////////////////////////////////////////////////
public function createPlanificacion(){
	try {
		$sql = ("SELECT idPlanificacion FROM planificacion WHERE idProyecto = :id ");
		$query = $this->conx->prepare($sql);
		$query->bindParam(':id',$this->idProyecto);
		$query->execute();
		if ($query->rowCount() > 0) {
			
			return false;	
		}else{
			$query2 = $this->conx->prepare("INSERT INTO planificacion SET idProyecto=:id");
			$query2->bindParam(':id',$this->idProyecto);
			if ($query2->execute()){
   					return true;
   				}
   				else{
   					return false;
   				}

		
		}
		
	} catch (Exception $e) {
		echo "Error:".$e->getMessage(); 
   		
		
	}

}

////////////////////////////// Lee la id del ultimo proyecto que fue documentado
public function getIdPlanificacion($sql){
	$query = $this->conx->prepare($sql);
	$query->execute();
	if ($query->rowCount() > 0) {
	while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
		extract($filas);
		return $idPlanificacion;
		}
	} else {
		return false;
		}

	}

//////////// HISTORIAS DE USUARIO /////////////////////////////////////

///// Crea un registro en la tabla de historias
public function createHistorias(){
try{

		$query = $this->conx->prepare("SELECT * FROM historiasusuario WHERE nombreHistoria =:nombre");
		$query->bindParam(':nombre', $this->nombreHistoria);
    	$query->execute();
    	if ($query->rowCount() > 0){
    	return false;
		}
    	else {

    		$query2 = $this->conx->prepare("INSERT INTO
   			historiasusuario SET nombreHistoria=:nh,descripcionHistoria=:dh,iteracion=:ih,
   			prioridad=:ph,observacion=:oh,idPlanificacion =:id");
   				$query2->bindparam(':nh',$this->nombreHistoria);
   				$query2->bindparam(':dh',$this->descripcionHistoria);
   				$query2->bindparam(':ph',$this->prioridad);
   				$query2->bindparam(':ih',$this->iteracion);
   				$query2->bindparam(':oh',$this->observacion);
   				$query2->bindparam(':id',$this->idPlanificacion); 
   			if ($query2->execute()){
   					return true;
   				}
   				else{
   					return false;
   				}
    		}	
	} catch(PDOException $e){
		 echo $e->getMessage(); 
   		 return false;
	}	
}

public function readHistorias($id){
$sql = ("SELECT
            proyecto.idProyecto,
            proyecto.nombreProyecto,
            planificacion.idPlanificacion,
            planificacion.idProyecto,
            planificacion.confirmada,
            historiasusuario.nombreHistoria,
            historiasusuario.descripcionHistoria,
            historiasusuario.prioridad,
            historiasusuario.observacion,
            historiasusuario.iteracion,
            historiasusuario.idHistoriasUsuario,
            historiasusuario.activoH,
            historiasusuario.idPlanificacion
            FROM historiasusuario
            INNER JOIN planificacion
            ON planificacion.idPlanificacion = historiasusuario.idPlanificacion
            INNER JOIN proyecto
            ON proyecto.idProyecto = planificacion.idProyecto
            WHERE planificacion.confirmada = 'no' AND proyecto.idProyecto =:activo AND historiasusuario.activoH = 1" );
           $query = $this->conx->prepare($sql);
           $query->bindParam(':activo',$id);
          
           $query->execute();
      if ($query->rowCount()>0){
      while ($filas= $query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);
        echo'<tr>';
        echo'   
              <td>'.$nombreProyecto.'</td>
              <td>'.$nombreHistoria.'</td>
              <td>'.$descripcionHistoria.'</td>
              <td>'.$prioridad.'</td>
              <td>'.$iteracion.'</td>
              <td>'.$observacion.'</td>';
             /* echo '<td>';
              echo '<a href = "VistaHistoriaEdit.php?id='.$idHistoriasUsuario.'"class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
              echo '</td>';*/
              echo'<td>';
              echo '<a href = "ModuloPlanDelete.php?id='.$idHistoriasUsuario.'&a='.$activoH.'&p='.$idPlanificacion.'"class="btn btn-danger delete-object"><i class="fa fa-times"></i></a>';
              echo '</td>';
              echo'</tr>';
              
                   }
              
        }
        else{
          echo '<tr><td>No Hay Historias de Usuario Registradas</td></tr>';
      }
}

public function readHistoriasTrash($id){
  $sql = ("SELECT
            proyecto.idProyecto,
            proyecto.nombreProyecto,
            planificacion.idPlanificacion,
            planificacion.idProyecto,
            planificacion.confirmada,
            historiasusuario.nombreHistoria,
            historiasusuario.descripcionHistoria,
            historiasusuario.prioridad,
            historiasusuario.observacion,
            historiasusuario.iteracion,
            historiasusuario.idHistoriasUsuario,
            historiasusuario.activoH,
            historiasusuario.idPlanificacion
            FROM historiasusuario
            INNER JOIN planificacion
            ON planificacion.idPlanificacion = historiasusuario.idPlanificacion
            INNER JOIN proyecto
            ON proyecto.idProyecto = planificacion.idProyecto
            WHERE planificacion.confirmada = 'no' AND proyecto.idProyecto =:activo  AND historiasusuario.activoH = 2" );
           $query = $this->conx->prepare($sql);
           $query->bindParam(':activo',$id);
           $query->execute();
           if ($query->rowCount()>0){
             while ($filas= $query->fetch(PDO::FETCH_ASSOC)) {
               extract($filas);
               echo'<tr>';
               echo'   
              <td>'.$nombreProyecto.'</td>
              <td>'.$nombreHistoria.'</td>
              <td>'.$descripcionHistoria.'</td>
              <td>'.$prioridad.'</td>
              <td>'.$iteracion.'</td>
              <td>'.$observacion.'</td>';
               echo'<td>';
              echo '<a href = "ModuloPlanDelete.php?id='.$idHistoriasUsuario.'&a='.$activoH.'&p='.$idPlanificacion.'"class="btn btn-info delete-object"><i class="fa fa-check"></i></a>';
              echo '</td>';
              echo'</tr>';
              
                   }
              
        }
        else{
          echo '<tr><td>No Hay Historias de Usuario En la Papelera</td></tr>';
      }



}

//////////////////////////////////////////// Borrar Historias
public function deleteHistorias($activo,$idPlanificacion,$idHistoria){
 
  switch ($activo) {
    case 1:

    $sql = ("UPDATE historiasusuario 
           
            INNER JOIN planificacion
            ON    planificacion.idPlanificacion = historiasusuario.idPlanificacion 
            SET historiasusuario.activoH = 2
            WHERE   historiasusuario.idHistoriasUsuario= '$idHistoria' AND planificacion.confirmada = 'no'  AND planificacion.idPlanificacion='$idPlanificacion' ");
         $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Historia Borrada');</script>";
       echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Borrar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>"; 
      }

      break;
    case 2:
     $sql = ("UPDATE historiasusuario 
            INNER JOIN planificacion
            ON    planificacion.idPlanificacion = historiasusuario.idPlanificacion 
            SET historiasusuario.activoH = 1
            WHERE   historiasusuario.idHistoriasUsuario= '$idHistoria' AND planificacion.confirmada = 'no'  AND planificacion.idPlanificacion='$idPlanificacion' ");
         $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Historia Restaurada');</script>";
       echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Activar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>"; 
      }
      break;
    default:
        break;
  }
      
  }


//////////// Requerimientos /////////////////////////////////////
public function createRequisitos($id){
	try{
    $query = $this->conx->prepare("SELECT idRequerimientos FROM requerimientos WHERE idPlanificacion =:id");
    $query->bindParam(':id', $id);
      $query->execute();
      if ($query->rowCount() > 0){
      return false;
    }
      else {
          $query = $this->conx->prepare("INSERT INTO requerimientos SET funcionales=:fu,noFuncionales=:nf,idPlanificacion=:id");
          $query->bindparam(':fu',$this->funcionales);
          $query->bindparam(':nf',$this->noFuncionales);
          $query->bindparam(':id',$this->idPlanificacion);
          if ($query->execute()){
            return true;
          }
          else{
            return false;
          }

      }
	} catch(PDOException $e){
		echo $e->getMessage(); 
   		return false;

	}	

}
////////////////////////////////////////////////// Leer Requerimientos
public function readRequerimientos($id){
$sql = ("SELECT
            proyecto.idProyecto,
            proyecto.nombreProyecto,
            planificacion.idPlanificacion,
            planificacion.idProyecto,
            planificacion.confirmada,
            requerimientos.idRequerimientos,
            requerimientos.idPlanificacion,
            requerimientos.funcionales,
            requerimientos.noFuncionales,
            requerimientos.activoReq
            FROM requerimientos
            INNER JOIN planificacion
            ON planificacion.idPlanificacion = requerimientos.idPlanificacion
            INNER JOIN proyecto
            ON proyecto.idProyecto = planificacion.idProyecto
            WHERE confirmada = 'no' AND proyecto.idProyecto =:activo AND requerimientos.activoReq = 1 ");
     
      $query = $this->conx->prepare($sql);
      $query->bindParam(':activo',$id);
      $query->execute();
      if ($query->rowCount()>0){
      while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);
        echo'<tr>';
        echo'   
              <td>'.$nombreProyecto.'</td>
              <td>'.$funcionales.'</td>
              <td>'.$noFuncionales.'</td>';
            /*echo '<td>';
              echo '<a href = "VistaReqEdit.php?id='.$idRequerimientos.'"class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
              echo '</td>';*/
              echo'<td>';
              echo '<a href = "ModuloDeleteReq.php?idr='.$idRequerimientos.'&ar='.$activoReq.'"class="btn btn-danger delete-object"><i class="fa fa-times"></i></a>';
              echo '</td>';
              echo'</tr>';
                   }
              
        }
        else{
          echo '<tr><td>No Hay Requerimientos Registrados</td></tr>';
      }
}
public function readRequerimientosTrash($id){
$sql = ("SELECT
            proyecto.idProyecto,
            proyecto.nombreProyecto,
            planificacion.idPlanificacion,
            planificacion.idProyecto,
            planificacion.confirmada,
            requerimientos.idRequerimientos,
            requerimientos.idPlanificacion,
            requerimientos.funcionales,
            requerimientos.noFuncionales,
            requerimientos.activoReq
            FROM requerimientos
            INNER JOIN planificacion
            ON planificacion.idPlanificacion = requerimientos.idPlanificacion
            INNER JOIN proyecto
            ON proyecto.idProyecto = planificacion.idProyecto
            WHERE confirmada = 'no' AND proyecto.idProyecto =:activo  AND requerimientos.activoReq = 2 ");
          $query = $this->conx->prepare($sql);
           $query->bindParam(':activo',$id);
          $query->execute();
        if ($query->rowCount()>0){
      while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);
        echo'<tr>';
        echo'   
              <td>'.$nombreProyecto.'</td>
              <td>'.$funcionales.'</td>
              <td>'.$noFuncionales.'</td>';
              echo'<td>';
              echo '<a href = "ModuloDeleteReq.php?idr='.$idRequerimientos.'&ar='.$activoReq.'"class="btn btn-info"><i class="fa fa-check"></i></a>';
              echo '</td>';
              echo'</tr>';
                   }
              
        }
        else{
          echo '<tr><td>No Hay Requerimientos en la Papelera</td></tr>';
      }
}

/////////////////////////////// Borrar Requerimientos
public function deleteRequerimientos($activo,$idRequerimientos){
 
  switch ($activo) {
    case 1:

    $sql = ("UPDATE requerimientos 
            INNER JOIN planificacion
            ON planificacion.idPlanificacion = requerimientos.idPlanificacion 
            SET requerimientos.activoReq = 2
            WHERE requerimientos.idRequerimientos= '$idRequerimientos' AND planificacion.confirmada = 'no'  ");
         $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Requerimientos Borrados');</script>";
       echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Borrar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>"; 
      }

      break;
    case 2:
     $sql = ("UPDATE requerimientos 
            INNER JOIN planificacion
            ON  planificacion.idPlanificacion = requerimientos.idPlanificacion 
            SET requerimientos.activoReq = 1
            WHERE requerimientos.idRequerimientos= '$idRequerimientos' AND planificacion.confirmada = 'no'   ");
         $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Requerimientos Restaurados');</script>";
       echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Activar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>"; 
      }
      break;
    default:
        break;
  }
      
  }


////////////////////////// Selecciona la Historia de usuario para asociarla a una prueba
public function selectHistoria($sql){
	$query =$this->conx->prepare($sql);
	$query->execute();
	if($query->rowCount()> 0){
		while($filas = $query->fetch(PDO::FETCH_ASSOC)){
		extract($filas);
		echo'<option  value="'.$idHistoriasUsuario.'">'.$nombreHistoria.'</option>';
		}

	} else{
		echo'<option>No hay Historias de Usuario  para este Proyecto </option>';
	}
}



////////////////////////////////////////////////////////////// DISEÑO //////////////////////////////////////////////////////////////
public function createDiseno(){
	try {
		$sql = ("SELECT idDiseno FROM diseño WHERE idProyecto = :id ");
		$query = $this->conx->prepare($sql);
		$query->bindParam(':id',$this->idProyecto);
		$query->execute();
		if ($query->rowCount() > 0) {
			
			return false;	
		}else{
			$query2 = $this->conx->prepare("INSERT INTO diseño SET idProyecto=:id");
			$query2->bindParam(':id',$this->idProyecto);
			if ($query2->execute()){
   					return true;
   				}
   				else{
   					return false;
   				}

		
		}
		
	} catch (Exception $e) {
		echo "Error:".$e->getMessage(); 
   		
		
	}

}

public function getIdDiseno($sql){
	$query = $this->conx->prepare($sql);
	$query->execute();
	if ($query->rowCount() > 0) {
	while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
		extract($filas);
		return $idDiseno;
		}
	} else {
		return false;
		}

	}


public function createRoles(){
try{

		$query = $this->conx->prepare("SELECT * FROM rolesdesistema WHERE nombreRol =:nombre");
		$query->bindParam(':nombre', $this->nombreRol);
    	$query->execute();
    	if ($query->rowCount() > 0){
    	return false;
		}
    	else {

    		$query2 = $this->conx->prepare("INSERT INTO rolesdesistema
   			 SET nombreRol=:nr,funcionRol=:fr,idDiseno=:id");
   				$query2->bindparam(':nr',$this->nombreRol);
   				$query2->bindparam(':fr',$this->funcionRol);
   				$query2->bindparam(':id',$this->idDiseno);
   			   	if ($query2->execute()){
   					return true;
   				}
   				else{
   					return false;
   				}
    		}	
	} catch(PDOException $e){
		 echo $e->getMessage(); 
   		 return false;
	}	
}

/////////////////////////// Lee los Roles de proyecto creados por el usuario
public function readRolesDeSistema($id){
$sql = ("SELECT
            proyecto.idProyecto,
            proyecto.nombreProyecto,
            diseño.idDiseno,
            diseño.idProyecto,
            diseño.confirmada,
            rolesdesistema.idRolesDeSistema,
            rolesdesistema.nombreRol,
            rolesdesistema.funcionRol,
            rolesdesistema.idDiseno,
            rolesdesistema.activoRs
            FROM rolesdesistema
            INNER JOIN diseño
            ON diseño.idDiseno = rolesdesistema.idDiseno
            INNER JOIN proyecto
            ON proyecto.idProyecto = diseño.idProyecto
            WHERE confirmada = 'no' AND proyecto.idProyecto =:activo AND rolesdesistema.activoRs=1 "); 

      $query = $this->conx->prepare($sql);
      $query->bindparam(':activo',$id);
      $query->execute();
      if ($query->rowCount()>0){
      while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);
        echo'<tr>';
        echo'   
              <td>'.$nombreProyecto.'</td>
              <td>'.$nombreRol.'</td>
              <td>'.$funcionRol.'</td>';
            /*  echo '<td>';
              echo '<a href = "VistaHistoriaEdit.php?id='.$idRolesDeSistema.'"class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
              echo '</td>'; */
              echo'<td>';
              echo '<a href = "ModuloDeleteRols.php?id='.$idRolesDeSistema.'&a='.$activoRs.'"class="btn btn-danger delete-object"><i class="fa fa-times"></i></a>';
              echo '</td>';
              echo'</tr>';
                   }
              
        }
        else{
          echo '<tr><td>No Hay Roles Registrados</td></tr>';
      }
}
public function readRolesDeSistemaTrash($id){
$sql = ("SELECT
            proyecto.idProyecto,
            proyecto.nombreProyecto,
            diseño.idDiseno,
            diseño.idProyecto,
            diseño.confirmada,
            rolesdesistema.idRolesDeSistema,
            rolesdesistema.nombreRol,
            rolesdesistema.funcionRol,
            rolesdesistema.idDiseno,
            rolesdesistema.activoRs
            FROM rolesdesistema
            INNER JOIN diseño
            ON diseño.idDiseno = rolesdesistema.idDiseno
            INNER JOIN proyecto
            ON proyecto.idProyecto = diseño.idProyecto
            WHERE diseño.confirmada = 'no' AND proyecto.idProyecto =:activo AND rolesdesistema.activoRs=2 ");

      $query = $this->conx->prepare($sql);
       $query->bindparam(':activo',$id);
      $query->execute();
      if ($query->rowCount()>0){
      while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);
        echo'<tr>';
        echo'   
              <td>'.$nombreProyecto.'</td>
              <td>'.$nombreRol.'</td>
              <td>'.$funcionRol.'</td>';
              echo'<td>';
              echo '<a href = "ModuloDeleteRols.php?id='.$idRolesDeSistema.'&a='.$activoRs.'"class="btn btn-info delete-object"><i class="fa fa-check"></i></a>';
              echo '</td>';
              echo'</tr>';
                   }
              
        }
        else{
          echo '<tr><td>No Hay Roles En la papelera</td></tr>';
      }
}
/////////////////////////////// Borrar Roles de sistema
public function deleteRoles($activo,$idRolesDeSistema){
 
  switch ($activo) {
    case 1:

    $sql = ("UPDATE rolesdesistema 
            INNER JOIN diseño
            ON diseño.idDiseno = rolesdesistema.idDiseno 
            SET rolesdesistema.activoRs = 2
            WHERE rolesdesistema.idRolesDeSistema= '$idRolesDeSistema' AND diseño.confirmada = 'no'  ");
          $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Roles Borrados');</script>";
       echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Borrar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>"; 
      }

      break;
    case 2:
     $sql = ("UPDATE rolesdesistema 
            INNER JOIN diseño
            ON diseño.idDiseno = rolesdesistema.idDiseno 
            SET rolesdesistema.activoRs = 1
            WHERE rolesdesistema.idRolesDeSistema= '$idRolesDeSistema' AND diseño.confirmada = 'no'  ");
    
         $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Role Restaurado');</script>";
       echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Activar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>"; 
      }
      break;
    default:
        break;
  }
      
  }

public function selectRoles($sql){
	$query =$this->conx->prepare($sql);
	$query->execute();
	if($query->rowCount()> 0){
		while($filas = $query->fetch(PDO::FETCH_ASSOC)){
		extract($filas);
		echo'<option  value="'.$idRolesDeSistema.'">'.$nombreRol.'</option>';
		}

	} else{
		echo'<option>No hay Roles de Proyecto registrados </option>';
	}

}
/////////////////////////////// Crear Casos de Uso
public function createCasoUso(){
try{
		$query = $this->conx->prepare("SELECT * FROM casosdeuso WHERE nombreCasoUso =:nombre AND preCondicion=:prec AND postCondicion=:pstc");
		$query->bindParam(':nombre', $this->nombreCasoUso);
    $query->bindParam(':prec', $this->preCondicion);
    $query->bindParam(':pstc', $this->postCondicion);
    	$query->execute();
    	if ($query->rowCount() > 0){
    	return false;
		}
    	else {
    		$query2 = $this->conx->prepare("INSERT INTO casosdeuso
   			SET
   			nombreCasoUso=:nc,accionCasoUso=:ac,preCondicion=:prec,
   			postCondicion=:pstc,flujoNormal=:fn,flujoAlternativo=:fa,
   			idRs=:rs,idDiseno=:id");
   			$query2->bindparam(':nc',$this->nombreCasoUso);
   			$query2->bindparam(':ac',$this->accionCasoUso);
   			$query2->bindparam(':prec',$this->preCondicion);
   			$query2->bindparam(':pstc',$this->postCondicion);
   			$query2->bindparam(':fn',$this->flujoNormal);
   			$query2->bindparam(':fa',$this->flujoAlternativo);
   			$query2->bindparam(':rs',$this->idRolesDeSistema);
   			$query2->bindparam(':id',$this->idDiseno);
   			   	if ($query2->execute()){
   					return true;
   				}
   				else{
   					return false;
   				}
    		}	
	} catch(PDOException $e){
		 echo $e->getMessage(); 
   		 return false;
	}	
}


/////////////////////////////// Leer Casos de Uso
public function readCasosDeUso($id){
$sql= ("SELECT 
       proyecto.idProyecto,
       proyecto.nombreProyecto,
       diseño.idDiseno,
       diseño.confirmada,
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
       rolesdesistema.idDiseno
       FROM casosdeuso
       INNER JOIN diseño
       ON diseño.idDiseno = casosdeuso.idDiseno
       INNER JOIN rolesdesistema
       ON rolesdesistema.idRolesDeSistema = casosdeuso.idRs
       INNER JOIN proyecto
       ON proyecto.idProyecto = diseño.idProyecto
       WHERE diseño.confirmada = 'no'  AND proyecto.idProyecto =:id AND casosdeuso.activoCu = 1   ");
    $query =$this->conx->prepare($sql);
    $query->bindParam(':id',$id);
    $query->execute();
    if ($query->rowCount() > 0) {
      while ($filas =$query->fetch(PDO::FETCH_ASSOC)) {
       extract($filas);
        echo'<tr>';
        echo'   
              <td>'.$nombreProyecto.'</td>
              <td>'.$nombreCasoUso.'</td>
              <td>'.$nombreRol.'</td>
              <td>'.$accionCasoUso.'</td>
              <td>'.$preCondicion.'</td>
              <td>'.$postCondicion.'</td>
              <td>'.$flujoNormal.'</td>
              <td>'.$flujoAlternativo.'</td>';
             /* echo'<td>';
              echo '<a href = "ModuloDeleteCasoU.php?id='.$idCasoDeUso.'"class="btn btn-warning "><i class="fa fa-pencil"></i></a>';
              echo '</td>'; */
              echo'<td>';
              echo '<a href = "ModuloDeleteCasoU.php?id='.$idCasoDeUso.'&a='.$activoCu.'"class="btn btn-danger "><i class="fa fa-times"></i></a>';
              echo '</td>';
              echo'</tr>';
      }
      
    } else{
       echo '<tr><td>No Hay Casos de Uso Registrados</td></tr>';
    }
}


/////////////////////////////////// Leer Casos de Uso de papelera
public function readCasosDeUsoTrash($id){
$sql = ("SELECT
        proyecto.idProyecto,
       proyecto.nombreProyecto,
       diseño.idDiseno,
       diseño.confirmada,
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
       rolesdesistema.idDiseno
       FROM casosdeuso
       INNER JOIN diseño
       ON diseño.idDiseno = casosdeuso.idDiseno
       INNER JOIN rolesdesistema
       ON rolesdesistema.idRolesDeSistema = casosdeuso.idRs
       INNER JOIN proyecto
       ON proyecto.idProyecto = diseño.idProyecto
       WHERE diseño.confirmada = 'no'  AND proyecto.idProyecto =:id AND casosdeuso.activoCu = 2 ");
      $query = $this->conx->prepare($sql);
       $query->bindParam(':id',$id);
      $query->execute();
      if ($query->rowCount()>0){
      while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);
        echo'<tr>';
        echo'   
              <td>'.$nombreProyecto.'</td>
              <td>'.$nombreCasoUso.'</td>
              <td>'.$nombreRol.'</td>
              <td>'.$accionCasoUso.'</td>
              <td>'.$preCondicion.'</td>
              <td>'.$postCondicion.'</td>
              <td>'.$flujoNormal.'</td>
              <td>'.$flujoAlternativo.'</td>';
              echo'<td>';
              echo '<a href = "ModuloDeleteCasoU.php?id='.$idCasoDeUso.'&a='.$activoCu.'"class="btn btn-info "><i class="fa fa-check"></i></a>';
              echo '</td>';
              echo'</tr>';
                   }
              
        }
        else{
          echo '<tr><td>No Hay Casos de Uso En la Papelera</td></tr>';
      }
}
/////////////////////////////// Borrar los Caso de Uso
public function deleteCasoDeUso($activo,$idCasoDeUso){
 
  switch ($activo) {
    case 1:

    $sql = ("UPDATE casosdeuso
            INNER JOIN diseño
            ON diseño.idDiseno = casosdeuso.idDiseno 
            SET casosdeuso.activoCu = 2
            WHERE casosdeuso.idCasodeUso= '$idCasoDeUso' AND diseño.confirmada = 'no'  ");
          $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Caso de Uso Borrado');</script>";
       echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Borrar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>"; 
      }

      break;
    case 2:
     $sql = ("UPDATE casosdeuso
            INNER JOIN diseño
            ON diseño.idDiseno = casosdeuso.idDiseno 
            SET casosdeuso.activoCu = 1
            WHERE casosdeuso.idCasodeUso= '$idCasoDeUso' AND diseño.confirmada = 'no'  ");
    
         $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Caso de Uso Restaurado');</script>";
       echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Activar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>"; 
      }
      break;
    default:
        break;
  }
      
  }
////////////////////////////////////////// Crea Diagramas
public function createDiagrama(){
  try {
    $query = $this->conx->prepare("SELECT idDiagrama FROM diagramadiseno WHERE idTipoDiagrama =:idt AND idDiseno =:iDis");
    $query->bindParam(':idt',$idTipoDiagrama);
    $query->bindParam(':iDis',$idDiseno);
    $query->execute();
    if ($query->rowCount() > 0) {
      return false;
    }else{
      $query2 = $this->conx->prepare("INSERT INTO diagramadiseno (idTipoDiagrama,diagrama,idDiseno) VALUES (:tipoD,:imagenD,:idD) ");
      $query2->bindParam(':tipoD',$this->idTipoDiagrama);
      $query2->bindParam(':imagenD',$this->diagrama);
      $query2->bindParam(':idD',$this->idDiseno);
            
      if ($query2->execute()) {
        return true;
        
      }else{
        return false;
      }
    }
    
  } catch (Exception $e) {
     echo $e->getMessage(); 
       return false;
    
  }
}

public function readDiagrama($id){
  
  $sql = ("SELECT
          proyecto.idProyecto,
          proyecto.nombreProyecto,
          diseño.idDiseno,
          diseño.idProyecto,
          diseño.confirmada,
          diagramatipo.idDiagramaTipo,
          diagramatipo.nombreDiagrama,
          diagramadiseno.idDiagrama,
          diagramadiseno.idTipoDiagrama,
          diagramadiseno.diagrama,
          diagramadiseno.idDiseno,
          diagramadiseno.activoDd
         
          FROM diagramadiseno
          INNER JOIN diagramatipo
          ON diagramatipo.idDiagramaTipo = diagramadiseno.idTipoDiagrama
          INNER JOIN diseño
          ON diseño.idDiseno = diagramadiseno.idDiseno
          INNER JOIN proyecto
          ON proyecto.idProyecto = diseño.idProyecto
          WHERE diseño.confirmada = 'no' AND proyecto.idProyecto =:id AND diagramadiseno.activoDd = 1 ");
    $query = $this->conx->prepare($sql);
   $query->bindparam(':id',$id); 
    $query->execute();
    
    $directorio = "../imagenesUsuario";
    if ($query->rowCount()>0){
      while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);
        $archivo = $directorio.'/'.$diagrama;
        echo'<tr>';
        echo'
              <td>'.$nombreProyecto.'</td>
              <td>'.$nombreDiagrama.'</td>
              <td><img width="200" height="150" class="thumbnail img-responsive" src="'.$archivo.'"></td>';
              /*echo  '<td>';
              echo '<a href = "VistaTutAdminEdit.php?id='.$idDiagrama.'"class="btn btn-warning "><i class="fa fa-pencil"></i></a>';
              echo '</td>';*/
              echo '<td>';
               echo '<a href = "ModuloDeleteDia.php?id='.$idDiagrama.'&a='.$activoDd.'"class="btn btn-danger delete-object"><i class="fa fa-times"></i></a>';
              echo '</td>';
              echo'</tr>';
                   }
              
        }
        else{
          echo '<tr><td>No hay Diagramas Registrados</td></tr>';

      }

  

}
public function readDiagramaTrash($id){
  $directorio = "../imagenesUsuario";
  $sql = ("SELECT
          proyecto.idProyecto,
          proyecto.nombreProyecto,
          diseño.idDiseno,
          diseño.idProyecto,
          diseño.confirmada,
          diagramatipo.idDiagramaTipo,
          diagramatipo.nombreDiagrama,
          diagramadiseno.idDiagrama,
          diagramadiseno.idTipoDiagrama,
          diagramadiseno.diagrama,
          diagramadiseno.idDiseno,
          diagramadiseno.activoDd
         
          FROM diagramadiseno
          INNER JOIN diagramatipo
          ON diagramatipo.idDiagramaTipo = diagramadiseno.idTipoDiagrama
          INNER JOIN diseño
          ON diseño.idDiseno = diagramadiseno.idDiseno
          INNER JOIN proyecto
          ON proyecto.idProyecto = diseño.idProyecto
          WHERE diseño.confirmada = 'no' AND proyecto.idProyecto =:id AND diagramadiseno.activoDd = 2 ");
    $query = $this->conx->prepare($sql);
    $query->bindParam(':id',$id); 
    $query->execute();
    if ($query->rowCount()>0){
      while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);
        $archivo = $directorio.'/'.$diagrama;
        echo'<tr>';
        echo'
              <td>'.$nombreProyecto.'</td>
              <td>'.$nombreDiagrama.'</td>
              <td><img width="200" height="150" class="thumbnail img-responsive" src="'.$archivo.'"></td>';
              echo '<td>';
              echo '<a href = "ModuloDeleteDia.php?id='.$idDiagrama.'&a='.$activoDd.'"class="btn btn-info delete-object"><i class="fa fa-check"></i></a>';
              echo '</td>';
              echo'</tr>';
                   }
              
        }
        else{
          echo '<tr><td>No hay Diagramas En la Papelera</td></tr>';

      }

  

}
///////////////////////////// Borra diagramas
public function deleteDiagrama($activo,$idDiagrama){
 
  switch ($activo) {
    case 1:

    $sql = ("UPDATE diagramadiseno 
            INNER JOIN diseño
            ON diseño.idDiseno = diagramadiseno.idDiseno 
            SET diagramadiseno.activoDd = 2
            WHERE diagramadiseno.idDiagrama= '$idDiagrama' AND diseño.confirmada = 'no'  ");
          $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Diagrama Borrado');</script>";
       echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Borrar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>"; 
      }

      break;
    case 2:
     $sql =("UPDATE diagramadiseno 
            INNER JOIN diseño
            ON diseño.idDiseno = diagramadiseno.idDiseno 
            SET diagramadiseno.activoDd = 1
            WHERE diagramadiseno.idDiagrama= '$idDiagrama' AND diseño.confirmada = 'no'  ");
    
         $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Diagrama Restaurado');</script>";
       echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Activar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>"; 
      }
      break;
    default:
        break;
  }
      
  }



////////////////////////////////////////////////////////////// Codificación //////////////////////////////////////////////////////////////
public function createCodificacion(){
	try {
		$sql = ("SELECT idCodificacion FROM codificacion WHERE idProyecto = :id ");
		$query = $this->conx->prepare($sql);
		$query->bindParam(':id',$this->idProyecto);
		$query->execute();
		if ($query->rowCount() > 0) {
			
			return false;	
		}else{
			$query2 = $this->conx->prepare("INSERT INTO codificacion SET idProyecto=:id");
			$query2->bindParam(':id',$this->idProyecto);
			if ($query2->execute()){
   					return true;
   				}
   				else{
   					return false;
   				}

		
		}
		
	} catch (Exception $e) {
		echo "Error:".$e->getMessage(); 
   		
		
	}

}
public function getIdCodificacion($sql){
	$query = $this->conx->prepare($sql);
	$query->execute();
	if ($query->rowCount() > 0) {
	while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
		extract($filas);
		return $idCodificacion;
		}
	} else {
		return false;
		}

	}
public function createLenguajes($id){
try{
    $query = $this->conx->prepare("SELECT idLenguaje FROM lenguajecodificacion WHERE idCodificacion =:id");
    $query->bindParam(':id', $id);
      $query->execute();
      if ($query->rowCount() > 0){
      return false;
    }
      else {
         $query = $this->conx->prepare("INSERT INTO lenguajecodificacion SET idCodificacion=:id,lenguajes=:lt");
          $query->bindparam(':id',$this->idCodificacion);
          $query->bindparam(':lt',$this->lenguajes);
          if ($query->execute()){
            return true;
          }
          else{
            return false;
          }

      }
  } catch(PDOException $e){
    echo $e->getMessage(); 
      return false;

  }



}
/////////////////////////////////////////// Leer Lenguajes
public function readLenguajes($id){
$sql = ("SELECT
            proyecto.idProyecto,
            proyecto.nombreProyecto,
            codificacion.idCodificacion,
            codificacion.idProyecto,
            codificacion.confirmada,
            lenguajecodificacion.idLenguaje,
            lenguajecodificacion.activoL,
           	lenguajecodificacion.idCodificacion,
           	lenguajecodificacion.lenguajes
            FROM lenguajecodificacion
            INNER JOIN codificacion
            ON codificacion.idCodificacion = lenguajecodificacion.idCodificacion
            INNER JOIN proyecto
            ON proyecto.idProyecto = codificacion.idProyecto
            WHERE confirmada = 'no' AND proyecto.idProyecto=:activo AND lenguajecodificacion.activoL = 1");

			$query = $this->conx->prepare($sql);
       $query->bindparam(':activo',$id);
			$query->execute();
			if ($query->rowCount()>0){
			while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'<tr>';
				echo' 	
            	<td>'.$nombreProyecto.'</td>
            	<td>'.$lenguajes.'</td>';
            /*	echo '<td>';
            	echo '<a href = "VistaHistoriaEdit.php?id='.$idLenguaje.'"class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
            	echo '</td>'; */
            	echo'<td>';
            	 echo '<a href = "ModuloDeleteLen.php?id='.$idLenguaje.'&a='.$activoL.'"class="btn btn-danger "><i class="fa fa-times"></i></a>';
            	echo '</td>';
            	echo'</tr>';
                   }
             	
				}
			 	else{
					echo '<tr><td>No Hay Lenguajes Registrados </td></tr>';
			}
}
public function readLenguajesTrash($id){
$sql = ("SELECT
            proyecto.idProyecto,
            proyecto.nombreProyecto,
            codificacion.idCodificacion,
            codificacion.idProyecto,
            codificacion.confirmada,
            lenguajecodificacion.idLenguaje,
            lenguajecodificacion.idCodificacion,
            lenguajecodificacion.activoL,
            lenguajecodificacion.lenguajes
            FROM lenguajecodificacion
            INNER JOIN codificacion
            ON codificacion.idCodificacion = lenguajecodificacion.idCodificacion
            INNER JOIN proyecto
            ON proyecto.idProyecto = codificacion.idProyecto
            WHERE confirmada = 'no' AND proyecto.idProyecto=:activo AND lenguajecodificacion.activoL = 2");

      $query = $this->conx->prepare($sql);
      $query->bindparam(':activo',$id);
      $query->execute();
      if ($query->rowCount()>0){
      while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);
        echo'<tr>';
        echo'   
              <td>'.$nombreProyecto.'</td>
              <td>'.$lenguajes.'</td>';
              echo'<td>';
             echo '<a href = "ModuloDeleteLen.php?id='.$idLenguaje.'&a='.$activoL.'"class="btn btn-info delete-object"><i class="fa fa-check"></i></a>';
              echo '</td>';
              echo'</tr>';
                   }
              
        }
        else{
          echo '<tr><td>No Hay Lenguajes En la Papelera </td></tr>';
      }
}
public function deleteLenguaje($activo,$idLenguaje){
 
  switch ($activo) {
    case 1:

    $sql = ("UPDATE lenguajecodificacion 
            INNER JOIN codificacion
            ON codificacion.idCodificacion= lenguajecodificacion.idCodificacion
            SET lenguajecodificacion.activoL = 2
            WHERE lenguajecodificacion.idLenguaje= '$idLenguaje' AND codificacion.confirmada = 'no'  ");
          $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Lenguajes Borrados');</script>";
       echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Borrar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>"; 
      }

      break;
    case 2:
    $sql= ("UPDATE lenguajecodificacion 
            INNER JOIN codificacion
            ON codificacion.idCodificacion= lenguajecodificacion.idCodificacion
            SET lenguajecodificacion.activoL = 1
            WHERE lenguajecodificacion.idLenguaje= '$idLenguaje' AND codificacion.confirmada = 'no'  ");
         $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert(Lenguajes Restaurados');</script>";
       echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Activar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>"; 
      }
      break;
    default:
        break;
  }
      
  }

////////////////////////////////////////////////////////////// Pruebas //////////////////////////////////////////////////////////////
public function createPruebas(){
	try {
		$sql = ("SELECT idPruebas FROM pruebas WHERE idProyecto = :id ");
		$query = $this->conx->prepare($sql);
		$query->bindParam(':id',$this->idProyecto);
		$query->execute();
		if ($query->rowCount() > 0) {
			
			return false;	
		}else{
			$query2 = $this->conx->prepare("INSERT INTO pruebas SET idProyecto=:id");
			$query2->bindParam(':id',$this->idProyecto);
			if ($query2->execute()){
   					return true;
   				}
   				else{
   					return false;
   				}

		
		}
		
	} catch (Exception $e) {
		echo "Error:".$e->getMessage(); 
   		
		
	}

}
public function getIdPruebas($sql){
	$query = $this->conx->prepare($sql);
	$query->execute();
	if ($query->rowCount() > 0) {
	while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
		extract($filas);
		return $idPruebas;
		}
	} else {
		return false;
		}

	}
public function createPruebasUsuario(){
try{
		$query = $this->conx->prepare("SELECT idPruebasUsuario FROM pruebasusuario WHERE idHistoriaUsuario =:id");
		$query->bindParam(':id', $this->idHistoriasUsuario);
      
    	$query->execute();
    	if ($query->rowCount() > 0){
    	return false;
		}
    	else {

    		$query2 = $this->conx->prepare("INSERT INTO
   			pruebasusuario SET idHistoriaUsuario=:idhu,tipoPrueba=:tp,revisiones=:rv,
   			resultadoEsperado=:re,resultadoObtenido=:ro,idPruebas =:idp");
   				$query2->bindparam(':idhu',$this->idHistoriasUsuario);
   				$query2->bindparam(':tp',$this->tipoPrueba);
   				$query2->bindparam(':rv',$this->revisiones);
   				$query2->bindparam(':re',$this->resultadoEsperado);
   				$query2->bindparam(':ro',$this->resultadoObtenido);
   				$query2->bindparam(':idp',$this->idPruebas); 
   			if ($query2->execute()){
   					return true;
   				}
   				else{
   					return false;
   				}
    		}	
	} catch(PDOException $e){
		 //echo $e->getMessage(); 
   		 return false;
	}	
}


public function readPruebasUsuario($id){
$sql=("SELECT
    proyecto.idProyecto,
    proyecto.nombreProyecto,
    pruebatipo.idPruebaTipo,
    pruebatipo.pruebaNombre,
    historiasusuario.idHistoriasUsuario,
    historiasusuario.nombreHistoria,
    pruebas.idPruebas,
    pruebas.idProyecto,
    pruebas.confirmada,
    pruebasusuario.idPruebasUsuario,
    pruebasusuario.tipoPrueba,
    pruebasusuario.idPruebas,
    pruebasusuario.activoPu,
    pruebasusuario.idHistoriaUsuario,
    pruebasusuario.resultadoObtenido,
    pruebasusuario.resultadoEsperado,
    pruebasusuario.revisiones
    FROM pruebasusuario
    INNER JOIN pruebatipo
    ON pruebatipo.idPruebaTipo =pruebasusuario.tipoPrueba
    INNER JOIN historiasusuario
    ON historiasusuario.idHistoriasUsuario = pruebasusuario.idHistoriaUsuario
    INNER JOIN pruebas
    ON pruebas.idPruebas = pruebasusuario.idPruebas
    INNER JOIN proyecto
    ON proyecto.idProyecto = pruebas.idProyecto
    WHERE confirmada = 'no' AND proyecto.idProyecto=:activo  AND pruebasusuario.activoPu = 1 "); 
    $query = $this->conx->prepare($sql);
     $query->bindparam(':activo',$id);
      $query->execute();
      if ($query->rowCount()>0){
      while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);
        echo'<tr>';
        echo'   
              <td>'.$nombreProyecto.'</td>
              <td>'.$pruebaNombre.'</td>
              <td>'.$nombreHistoria.'</td>
              <td>'.$resultadoEsperado.'</td>
              <td>'.$resultadoObtenido.'</td>
              <td>'.$revisiones.'</td>';
             /* echo '<td>';
              echo '<a href = "VistaHistoriaEdit.php?id='.$idPruebasUsuario.'"class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
              echo '</td>'; */
              echo'<td>';
              echo '<a href = "ModuloDeletePrueba.php?id='.$idPruebasUsuario.'&a='.$activoPu.'"class="btn btn-danger delete-object"><i class="fa fa-times"></i></a>';
              echo '</td>';
              echo'</tr>';
                   }
              
        }
        else{
          echo '<tr><td>No Hay Pruebas Registradas </td></tr>';
      }
} 

public function readPruebasUsuarioTrash($id){
$sql=("SELECT
    proyecto.idProyecto,
    proyecto.nombreProyecto,
    pruebatipo.idPruebaTipo,
    pruebatipo.pruebaNombre,
    historiasusuario.idHistoriasUsuario,
    historiasusuario.nombreHistoria,
    pruebas.idPruebas,
    pruebas.idProyecto,
    pruebas.confirmada,
    pruebasusuario.idPruebasUsuario,
    pruebasusuario.tipoPrueba,
    pruebasusuario.idPruebas,
    pruebasusuario.activoPu,
    pruebasusuario.idHistoriaUsuario,
    pruebasusuario.resultadoObtenido,
    pruebasusuario.resultadoEsperado,
    pruebasusuario.revisiones
    FROM pruebasusuario
    INNER JOIN pruebatipo
    ON pruebatipo.idPruebaTipo =pruebasusuario.tipoPrueba
    INNER JOIN historiasusuario
    ON historiasusuario.idHistoriasUsuario = pruebasusuario.idHistoriaUsuario
    INNER JOIN pruebas
    ON pruebas.idPruebas = pruebasusuario.idPruebas
    INNER JOIN proyecto
    ON proyecto.idProyecto = pruebas.idProyecto
    WHERE confirmada = 'no' AND proyecto.idProyecto=:activo AND pruebasusuario.activoPu = 2 "); 
    $query = $this->conx->prepare($sql);
     $query->bindparam(':activo',$id);
      $query->execute();
      if ($query->rowCount()>0){
      while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);
        echo'<tr>';
        echo'   
              <td>'.$nombreProyecto.'</td>
              <td>'.$pruebaNombre.'</td>
              <td>'.$nombreHistoria.'</td>
              <td>'.$resultadoEsperado.'</td>
              <td>'.$resultadoObtenido.'</td>
              <td>'.$revisiones.'</td>';
             echo'<td>';
             echo '<a href = "ModuloDeletePrueba.php?id='.$idPruebasUsuario.'&a='.$activoPu.'"class="btn btn-info"><i class="fa fa-check"></i></a>';
             echo '</td>';
              echo'</tr>';
                   }
              
        }
        else{
          echo '<tr><td>No Hay Pruebas en la Papelera </td></tr>';
      }
} 


//////////////////////////// Borrar Pruebas
public function deletePruebasUsuario($activo,$idPruebasUsuario){
 
  switch ($activo) {
    case 1:

    $sql = ("UPDATE pruebasusuario 
            INNER JOIN pruebas
            ON pruebas.idPruebas = pruebasusuario.idPruebas 
            SET pruebasusuario.activoPu = 2
            WHERE pruebasusuario.idPruebasUsuario= '$idPruebasUsuario' AND pruebas.confirmada = 'no'  ");
         $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Prueba Borrada');</script>";
       echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Borrar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>"; 
      }

      break;
    case 2:
     $sql = ("UPDATE pruebasusuario 
            INNER JOIN pruebas
            ON pruebas.idPruebas = pruebasusuario.idPruebas 
            SET pruebasusuario.activoPu = 1
            WHERE pruebasusuario.idPruebasUsuario= '$idPruebasUsuario' AND pruebas.confirmada = 'no'  ");
         $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Prueba Restaurada');</script>";
       echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Activar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='VistaDocumentacion.php' </script>"; 
      }
      break;
    default:
        break;
  }
      
  }
//////////////////////////////////////////CONFIRMA PROYECTO///////////////////////////////////////////////////////////////////////////////////////////// 
public function confirmaPlanificacion($id){
  try {
    $sql = ("UPDATE planificacion SET confirmada = 'si' WHERE idProyecto =:id ");
    $query = $this->conx->prepare($sql);
    $query->bindParam(':id',$id);
    if ($query->execute()) {
      return true;
      
    }else {
      return false;
    }
    

  } catch (Exception $e) {
    echo $e->getMessage(); 
      return false;
    
  }

}
public function confirmaDiseno($id){
  try {
    $sql = ("UPDATE diseño SET confirmada = 'si' WHERE idProyecto =:id ");
    $query = $this->conx->prepare($sql);
    $query->bindParam(':id',$id);
    if ($query->execute()) {
      return true;
      
    }else {
      return false;
    }
    

  } catch (Exception $e) {
    echo $e->getMessage(); 
      return false;
    
  }

}
public function confirmaCodificacion($id){
  try {
    $sql = ("UPDATE codificacion SET confirmada = 'si' WHERE idProyecto =:id ");
    $query = $this->conx->prepare($sql);
    $query->bindParam(':id',$id);
    if ($query->execute()) {
      return true;
      
    }else {
      return false;
    }
    

  } catch (Exception $e) {
    echo $e->getMessage(); 
      return false;
    
  }

}
public function confirmaPrueba($id){
  try {
    $sql = ("UPDATE pruebas SET confirmada = 'si' WHERE idProyecto =:id ");
    $query = $this->conx->prepare($sql);
    $query->bindParam(':id',$id);
    if ($query->execute()) {
      return true;
      
    }else {
      return false;
    }
    

  } catch (Exception $e) {
    echo $e->getMessage(); 
      return false;
    
  }

}






}
?>