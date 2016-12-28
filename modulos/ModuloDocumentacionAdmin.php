<?php
class DocumentacionAdmin{

	/////////// Variables de Diseño
	////////// Tipo de Diagrama
	public $idDiagramaTipo;
	public $nombreDiagrama;
	public $funcionDiagrama;
	public $activoDt;
	////////// Variables de Codificacion
	////////// Tipo de Lenguaje
	public $idLenguajeTipo;
	public $lenguajeNombre;
	public $lenguajeTipo;
	public $lenguajeDescripcion;
	public $activoLt;
	/////////// Variables de Prueba
	////////// Tipo de Prueba
	public $idPruebaTipo;
	public $pruebaNombre;
	public $pruebaDescripcion;
	public $activoPt;
	public $categoria;
	public $idCategorias;
	public $db;
	private $conx;
	////////////////Conexion con la Base de Datos
public function __construct($db){
		$this->conx = $db;
		$this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

public function createDiagramaTipo(){
	try {
		$query = $this->conx->prepare("SELECT * FROM diagramatipo WHERE nombreDiagrama=:nombreD");
		$query->bindParam(':nombreD', $this->nombreDiagrama);
    	$query->execute();
    	if ($query->rowCount() > 0){
    		return false;
    		
    		}
			else {
			$query2 = $this->conx->prepare("INSERT INTO diagramatipo (nombreDiagrama,funcionDiagrama) VALUES (:nombreD,:funcionD) ");
    		$query2->bindParam(':nombreD',$this->nombreDiagrama);
    		$query2->bindParam(':funcionD',$this->funcionDiagrama);
    		if ($query2->execute()) {
    			return true;
    			 
    		}else {
    			
    			return false;
    		}
    						
    		}
		    	
	} catch (Exception $e) {
		 //echo $e->getMessage(); 
   		 return false;
		
	}


}
public function createLenguajeTipo(){
	try {

		$query = $this->conx->prepare("SELECT * FROM lenguajetipo WHERE lenguajeNombre=:nombreL");
		$query->bindParam(':nombreL', $this->lenguajeNombre);
    	$query->execute();
    	if ($query->rowCount() > 0){
    		return false;
    		}
			else {
			$query2 = $this->conx->prepare("INSERT INTO lenguajetipo (lenguajeNombre,lenguajeTipo,lenguajeDescripcion) VALUES (:nombreL,:tipoL,:descripcionL) ");
    		$query2->bindParam(':nombreL',$this->lenguajeNombre);
    		$query2->bindParam(':tipoL',$this->lenguajeTipo);
    		$query2->bindParam(':descripcionL',$this->lenguajeDescripcion);
    		if ($query2->execute()) {
    			return true;
    			
    		}else {
    			
    			return false;
    		}
    						
    		}
		    	
	} catch (Exception $e) {
		//echo $e->getMessage(); 
   		 return false;
		
	}
}
public function createPruebaTipo(){
	try {

		$query = $this->conx->prepare("SELECT * FROM pruebaTipo WHERE pruebaNombre=:nombreP");
		$query->bindParam(':nombreP', $this->pruebaNombre);
    	$query->execute();
    	if ($query->rowCount() > 0){
    		return false;
    		}
			else {
			$query2 = $this->conx->prepare("INSERT INTO pruebatipo (pruebaNombre,pruebaDescripcion) VALUES (:nombreP,:descripcionP) ");
    		$query2->bindParam(':nombreP',$this->pruebaNombre);
    		$query2->bindParam(':descripcionP',$this->pruebaDescripcion);
    		if ($query2->execute()) {
    			return true;
    			
    		}else {
    			
    			return false;
    		}
    						
    		}
		    	
	} catch (Exception $e) {
		echo $e->getMessage(); 
   		 return false;
		
	}


}

public function readDiagramas(){
	$query = ("SELECT  * FROM diagramatipo WHERE activoDt = 1 ORDER BY nombreDiagrama");
		$q = $this->conx->prepare($query);
		$q->execute();

		if ($q->rowCount()>0){
			while ($filas=$q->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'<tr>';
				echo'<td >';
				echo $nombreDiagrama = $filas['nombreDiagrama'];
				echo'</td>';
				echo'<td>';
				echo $funcionDiagrama = $filas['funcionDiagrama'];
				echo'</td>';
				echo'<td>';
                echo '<a href = "../modulos/ModuloDeleteDTipo.php?id='.$idDiagramaTipo.'&a='.$activoDt.'"class="btn btn-danger delete-object"><i class="fa fa-times"></i></a>';
                echo '</td>';
				echo '</tr>';
            	
            	 }
             	
				}
			 	else{
					echo '<tr><td>No Hay Diagramas Registrados</td></tr>';
			}
	}



/////////////////////////////////////




	public function readDiagramasTrash(){
	$query = ("SELECT  * FROM diagramatipo WHERE activoDt = 2 ORDER BY nombreDiagrama");
		$q = $this->conx->prepare($query);
		$q->execute();

		if ($q->rowCount()>0){
			while ($filas=$q->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'<tr>';
				echo'<td >';
				echo $nombreDiagrama = $filas['nombreDiagrama'];
				echo'</td>';
				echo'<td>';
				echo $funcionDiagrama = $filas['funcionDiagrama'];
				echo'</td>';
				echo'<td>';
                echo '<a href = "../modulos/ModuloDeleteDTipo.php?id='.$idDiagramaTipo.'&a='.$activoDt.'"class="btn btn-info "><i class="fa fa-check"></i></a>';
                echo '</td>';
				echo '</tr>';
            	
            	 }
             	
				}
			 	else{
					echo '<tr><td>No Hay Diagramas En la Palera</td></tr>';
			}
	}				
public function readLenguajes(){
		$query= ("SELECT * FROM lenguajetipo WHERE activoLt = 1 ORDER BY lenguajeTipo");
		$q = $this->conx->prepare($query);
		$q->execute();
		if ($q->rowCount()> 0) {
			while ($filas= $q->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'<tr>';
				echo'<td>';
				echo $lenguajeNombre;
				echo'</td>';
				echo'<td>';
				echo $lenguajeTipo;
				echo'</td>';
				echo'<td>';
				echo $lenguajeDescripcion;
				echo'</td>';
				echo'<td>';
                echo '<a href = "../modulos/ModuloDeleteLTipo.php?id='.$idLenguajeTipo.'&a='.$activoLt.'"class="btn btn-danger delete-object"><i class="fa fa-times"></i></a>';
                echo '</td>';
				echo '</tr>';
				
			}
		
		}
		else{
			echo '<tr><td>No Hay Lenguajes Registrados</td></tr>';
	}

}
public function readLenguajesTrash(){
		$query= ("SELECT * FROM lenguajetipo WHERE activoLt = 2 ORDER BY lenguajeTipo");
		$q = $this->conx->prepare($query);
		$q->execute();
		if ($q->rowCount()> 0) {
			while ($filas= $q->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'<tr>';
				echo'<td>';
				echo $lenguajeNombre;
				echo'</td>';
				echo'<td>';
				echo $lenguajeTipo;
				echo'</td>';
				echo'<td>';
				echo $lenguajeDescripcion;
				echo'</td>';
				echo'<td>';
                echo '<a href = "../modulos/ModuloDeleteLTipo.php?id='.$idLenguajeTipo.'&a='.$activoLt.'"class="btn btn-info"><i class="fa fa-check"></i></a>';
                echo '</td>';
				echo '</tr>';
				
			}
		
		}
		else{
			echo '<tr><td>No Hay Lenguajes En la Papelera</td></tr>';
	}

}

public function readPruebaTipo(){
		$query= ("SELECT * FROM pruebatipo WHERE activoPt = 1 ORDER BY pruebaNombre");
		$q = $this->conx->prepare($query);
		$q->execute();
		if ($q->rowCount()> 0) {
			while ($filas= $q->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'<tr>';
				echo'<td >';
				echo $pruebaNombre;
				echo'</td>';
				echo'<td>';
				echo $pruebaDescripcion;
				echo'</td>';
				echo'<td>';
                echo '<a href = "../modulos/ModuloDeletePTipo.php?id='.$idPruebaTipo.'&a='.$activoPt.'"class="btn btn-danger delete-object"><i class="fa fa-times"></i></a>';
                echo '</td>';
				echo '</tr>';
			
			}
		
		}
		else{
			echo '<tr><td>No hay Pruebas Registadas</td></tr>';
		}
	
}
public function readPruebasTrash(){
		$query= ("SELECT * FROM pruebatipo WHERE activoPt = 2 ORDER BY pruebaNombre");
		$q = $this->conx->prepare($query);
		$q->execute();
		if ($q->rowCount()> 0) {
			while ($filas= $q->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'<tr>';
				echo'<td >';
				echo $pruebaNombre;
				echo'</td>';
				echo'<td>';
				echo $pruebaDescripcion;
				echo'</td>';
				echo'<td>';
                echo '<a href = "../modulos/ModuloDeletePTipo.php?id='.$idPruebaTipo.'&a='.$activoPt.'"class="btn btn-info delete-object"><i class="fa fa-check"></i></a>';
                echo '</td>';
				echo '</tr>';
			
			}
		
		}
		else{
			echo '<tr><td>No hay Pruebas En la papelera</td></tr>';
		}
	
}


public function readDiagramasUser(){
	$query = ("SELECT  nombreDiagrama,funcionDiagrama FROM diagramatipo WHERE activoDt = 1 ORDER BY nombreDiagrama");
		$q = $this->conx->prepare($query);
		$q->execute();
		if ($q->rowCount()>0){
			while ($filas=$q->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);

            echo'<a href="#" class="list-group-item">';
            echo'<h4 class="list-group-item-heading">'.$nombreDiagrama.'</h4>';
            echo'<p class="list-group-item-text text-justify">'.$funcionDiagrama.'</p>
                </a>';
               
			}
		}else{
			echo'<a href="#" class="list-group-item">';
            echo'<h4 class="list-group-item-heading">No Hay Diagramas Registrados</h4>';
            echo'<p class="list-group-item-text"></p>
                </a>';

		}

}	
public function readLenguajesUser(){
	$query = ("SELECT  lenguajeNombre,lenguajeTipo,lenguajeDescripcion FROM lenguajetipo WHERE activoLt = 1 ORDER BY lenguajeTipo");
		$q = $this->conx->prepare($query);
		$q->execute();
		if ($q->rowCount()>0){
			while ($filas=$q->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);

            echo'<a href="#" class="list-group-item">';
            echo'<h3 class="list-group-item-heading">'.$lenguajeNombre.'</h3>';
             echo'<h4 class="list-group-item-heading">'.$lenguajeTipo.'</h4>';
            echo'<p class="list-group-item-text text-justify">'.$lenguajeDescripcion.'</p></a>';
               
			}
		}else{
			echo'<a href="#" class="list-group-item">';
            echo'<h4 class="list-group-item-heading">No Hay Lenguajes Registrados</h4>';
            echo'<p class="list-group-item-text"></p>
                </a>';

		}

}	
public function readPruebasUser(){
	$query = ("SELECT  pruebaNombre,pruebaDescripcion FROM pruebatipo WHERE activoPt = 1 ORDER BY pruebaNombre");
		$q = $this->conx->prepare($query);
		$q->execute();
		if ($q->rowCount()>0){
			while ($filas=$q->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);

            echo'<a href="#" class="list-group-item">';
            echo'<h3 class="list-group-item-heading">'.$pruebaNombre.'</h3>';
             
            echo'<p class="list-group-item-text text-justify">'.$pruebaDescripcion.'</p>
                </a>';
               
			}
		}else{
			echo'<a href="#" class="list-group-item">';
            echo'<h4 class="list-group-item-heading">No hay Pruebas Registradas</h4>';
            echo'<p class="list-group-item-text"></p>
                </a>';

		}

}	

public function deleteDiagrama($activo,$idDiagramaTipo){
 
  switch ($activo) {
    case 1:

    $sql = ("UPDATE diagramatipo SET activoDt = 2 WHERE idDiagramaTipo= '$idDiagramaTipo'   ");
          $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Diagrama Borrado');</script>";
       echo "<script language='javascript'> window.location.href ='../vistas/VistaDocAdmin.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Borrar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='../vistas/VistaDocAdmin.php' </script>"; 
      }

      break;
    case 2:
    $sql= ("UPDATE diagramatipo SET activoDt = 1 WHERE idDiagramaTipo= '$idDiagramaTipo'   ");
         $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Diagrama Restaurado');</script>";
       echo "<script language='javascript'> window.location.href ='../vistas/VistaTrashDocAdmin.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Activar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='../vistas/VistaDocAdmin.php' </script>"; 
      }
      break;
    default:
        break;
  }
      
  }

public function deleteLenguaje($activo,$idLenguajeTipo){
 
  switch ($activo) {
    case 1:

    $sql = ("UPDATE lenguajetipo SET activoLt = 2 WHERE idLenguajeTipo= '$idLenguajeTipo'   ");
          $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Lenguaje Borrado');</script>";
       echo "<script language='javascript'> window.location.href ='../vistas/VistaDocAdmin.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Borrar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='../vistas/VistaDocAdmin.php' </script>"; 
      }

      break;
    case 2:
   $sql = ("UPDATE lenguajetipo SET activoLt = 1 WHERE idLenguajeTipo= '$idLenguajeTipo'   ");
         $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Lenguaje Restaurado');</script>";
       echo "<script language='javascript'> window.location.href ='../vistas/VistaTrashDocAdmin.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Activar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='../vistas/VistaDocAdmin.php' </script>"; 
      }
      break;
    default:
        break;
  }
      
  }

public function deletePrueba($activo,$idPruebaTipo){
 
  switch ($activo) {
    case 1:

$sql = ("UPDATE pruebatipo SET activoPt = 2 WHERE idPruebaTipo= '$idPruebaTipo'");
          $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Prueba Borrada');</script>";
       echo "<script language='javascript'> window.location.href ='../vistas/VistaDocAdmin.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Borrar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='../vistas/VistaDocAdmin.php' </script>"; 
      }

      break;
    case 2:
 $sql = ("UPDATE pruebatipo SET activoPt = 1 WHERE idPruebaTipo= '$idPruebaTipo'   ");
         $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Prueba Restaurada');</script>";
       echo "<script language='javascript'> window.location.href ='../vistas/VistaTrashDocAdmin.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Activar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='../vistas/VistaDocAdmin.php' </script>"; 
      }
      break;
    default:
        break;
  }
      
  }

public function selectCategorias(){
	$query=("SELECT categoriaNombre,idCategorias FROM categoriasproyecto WHERE activoCp = 1 ORDER BY categoriaNombre ");
	$q =$this->conx->prepare($query);
	$q->execute();
	if($q->rowCount()> 0){
		while($filas = $q->fetch(PDO::FETCH_ASSOC)){
			extract($filas);
		echo'<option  value='.$idCategorias.'>'.$categoriaNombre.'</option>';
					}

	} else{
		echo'<option> No hay categorias en la lista: Contacta al Administrador </option>';
	}

}

public function selectCategoriasParaUpdate(){
	
}


public function selectLenguaje(){
	$query=("SELECT * FROM lenguajetipo WHERE activoLt = 1 ORDER BY lenguajeTipo");
	$q =$this->conx->prepare($query);
	$q->execute();
	if($q->rowCount()> 0){
		while($filas = $q->fetch(PDO::FETCH_ASSOC)){
			extract($filas);
			echo '<li class="list-group-item">';
			echo'<span class="badge">'.$lenguajeTipo.'</span>';
            echo'<div class="checkbox checkbox-success">';
            echo'<input id="lenguajes" name="lenguajes[]"  class="styled" type="checkbox" value='.$lenguajeNombre.'>';
            echo'<label>'.$lenguajeNombre.'</label>';
            echo'</div></li>';
					}

	} else{
		echo'<label>No hay Lenguajes en la lista: Contacta al Administrador </label>';
	}

}

public function selectDiagrama(){
	$query=("SELECT * FROM diagramatipo WHERE activoDt = 1 ORDER BY nombreDiagrama ");
	$q =$this->conx->prepare($query);
	$q->execute();
	if($q->rowCount()> 0){
		while($filas = $q->fetch(PDO::FETCH_ASSOC)){
			extract($filas);
		echo'<option value='.$idDiagramaTipo.'>'.$nombreDiagrama.'</option>';
					}

	} else{
		echo'<option>No hay Diagramas en la lista: Contacta al Administrador </option>';
	}

}
public function selectPrueba(){
	$query=("SELECT * FROM pruebatipo WHERE activoPt = 1 ORDER BY pruebaNombre");
	$q =$this->conx->prepare($query);
	$q->execute();
	if($q->rowCount()> 0){
		while($filas = $q->fetch(PDO::FETCH_ASSOC)){
			extract($filas);
		echo'<option  value="'.$idPruebaTipo.'">'.$pruebaNombre.'</option>';
					}

	} else{
		echo'<option>No hay Pruebas en la lista: Contacta al Administrador </option>';
	}

}

public function countDiagramas(){
	$query = $this->conx->prepare ("SELECT * FROM diagramatipo");
	$query->execute();
	 return $cuenta = $query->rowCount();


}
public function countLenguajes(){
	$query = $this->conx->prepare ("SELECT * FROM lenguajetipo");
	$query->execute();
	 return $cuenta = $query->rowCount();


}
public function countPruebas(){
	$query = $this->conx->prepare ("SELECT * FROM pruebatipo");
	$query->execute();
	 return $cuenta = $query->rowCount();


}

}


?>