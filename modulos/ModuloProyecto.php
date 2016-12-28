<?php 
class Proyecto {
//////////////Variables Globables
	public $db;
	public $idProyecto;
	public $nombreProyecto;
	public $descripcionProyecto;
	public $categoriaOtro;
	public $categoriaProyecto;
	

	
	public $idUsuario;
	public $activoProyecto;
	public $selectProyecto;
	public $idUrol;
	public $username;
	public $idCategorias;
	public $categoriaNombre;
	

	private $conx;
/////////////////////  constructor
	public function __construct($db){
		$this->conx = $db;
		$this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

/////////////////////////// Funcion Insertar Proyecto, toma 4 parametros
public  function createProyecto($nombreProyecto,$descripcionProyecto,$idCategorias,$categoriaOtro,$idUrol){
	try{
		$query = $this->conx->prepare("SELECT * FROM proyecto WHERE  nombreProyecto =:nombrePro AND idUsuario =:idU ");
		$query->bindParam(':nombrePro', $this->nombreProyecto);
		$query->bindParam(':idU', $this->idUrol);
		$query->execute();
    	    	
    	if ($query->rowCount() > 0){
    		
			return false;
		}
    	else {
	
    		$query2 = $this->conx->prepare("INSERT INTO
   			proyecto SET nombreProyecto=?,descripcionProyecto=?,categoriaProyecto=?,categoriaOtro=?,idUsuario=?");
   				$query2->bindparam(1,$nombreProyecto);
   				$query2->bindparam(2,$descripcionProyecto);
   				$query2->bindparam(3,$idCategorias);
   				$query2->bindparam(4,$categoriaOtro);
   				$query2->bindparam(5,$idUrol);
  
   			if ($query2->execute()){
   					return true;
   				}
   				else{
   					return false;
   				}

    		}	
	} catch(PDOException $e){

		// echo $e->getMessage(); 
   		 return false;

	}
 
}
public  function createCategoria($categoriaNombre){
	try{
		$query = $this->conx->prepare("SELECT idCategorias FROM categoriasproyecto WHERE  categoriaNombre =:nombreC");
		$query->bindParam(':nombreC', $this->categoriaNombre);
		$query->execute();
    	  	
    	if ($query->rowCount() > 0){
    		
			return false;
		}
    	else {
	
    		$query2 = $this->conx->prepare("INSERT INTO
   			categoriasproyecto SET categoriaNombre=?");
   				$query2->bindparam(1,$categoriaNombre);
   			  
   			if ($query2->execute()){
   					return true;
   				}
   				else{
   					return false;
   				}

    		}	
	} catch(PDOException $e){

		// echo $e->getMessage(); 
   		 return false;

	}
 
}

public function readCategorias(){
   $sql= ("SELECT *  FROM categoriasproyecto WHERE activoCp = 1   ");
	$query = $this->conx->prepare($sql);
    $query->execute();

    if ($query->rowCount()>0){
      while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);
        echo' 
        <tr>
              <td>'.$categoriaNombre.'</td>
             </tr>';
                   }
              
        }
        else{
          echo '<tr><td>No hay Categorias Disponibles </td></tr>';

      }
	}
///////////////// Funcion de Leer datos del proyecto, toma argumento query , lee todos los proyectos activos


public function readProyecto($id){

	 $sql= ("SELECT
             categoriasproyecto.idCategorias,
             categoriasproyecto.categoriaNombre,
             categoriasproyecto.activoCp,
             proyecto.idProyecto,
             proyecto.nombreProyecto,
             proyecto.descripcionProyecto,
             proyecto.categoriaProyecto,
             proyecto.categoriaOtro,
             proyecto.fechaProyecto,
             proyecto.ultimaEdicionProyecto,
             proyecto.selectProyecto,
             proyecto.activoProyecto,
             proyecto.idUsuario
             FROM proyecto
             INNER JOIN categoriasproyecto
             ON categoriasproyecto.idCategorias = proyecto.categoriaProyecto
             WHERE proyecto.idUsuario = '$id' AND proyecto.activoProyecto = 1");
		$query = $this->conx->prepare($sql);
		$query->execute();

		if ($query->rowCount()>0){
			while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'<tr>';
				echo' 	
            	<td>'.$nombreProyecto.'</td>
            	<td>'.$descripcionProyecto.'</td>
            	<td>'.$categoriaNombre.'</td>
            	<td>'.$categoriaOtro.'</td>
            	<td>'.$fechaProyecto.'</td>
            	<td>'.$ultimaEdicionProyecto.'</td>';
            	echo'<td> ';
				echo '<a href="ModuloProyectoActiva.php?id='.$idProyecto.'&ready='.$selectProyecto.'&u='.$idUsuario.'" class="btn btn-info"><i class="fa fa-thumbs-up"></i></button>';
				echo'</td>';
				echo'<td> ';
				echo '<a href="ModuloProyectoDesactiva.php?id='.$idProyecto.'&ready='.$selectProyecto.'&u='.$idUsuario.'" class="btn btn-danger"><i class="fa fa-thumbs-down"></i></button>';
				echo'</td>';
				echo '<td>';
            	echo '<a href = "VistaProyectoEdit.php?id='.$idProyecto.'"class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
            	echo '</td>';
            	echo '<td>';
            	echo '<a href = "VistaProyectoDelete.php?activo='.$activoProyecto.'&id='.$idProyecto.'"class="btn btn-danger delete-object"><i class="fa fa-times"></i></a>';
            	echo'</td>';
            	echo '</tr>';
                   }
             	
				}
			 	else{
					echo '<tr><td>No hay Proyectos</td></tr>';

			}

}	

////////////////////////////////////////////////////// Lee todo los proyectos borrados	
public function readProyectot($id){
	 $sql= ("SELECT
             categoriasproyecto.idCategorias,
             categoriasproyecto.categoriaNombre,
             categoriasproyecto.activoCp,
             proyecto.idProyecto,
             proyecto.nombreProyecto,
             proyecto.descripcionProyecto,
             proyecto.categoriaProyecto,
             proyecto.categoriaOtro,
             proyecto.fechaProyecto,
             proyecto.ultimaEdicionProyecto,
             proyecto.selectProyecto,
             proyecto.activoProyecto,
             proyecto.idUsuario
             FROM proyecto
             INNER JOIN categoriasproyecto
             ON categoriasproyecto.idCategorias = proyecto.categoriaProyecto
             WHERE proyecto.idUsuario = '$id' AND proyecto.activoProyecto = 2");
		$query = $this->conx->prepare($sql);
		$query->execute();

		if ($query->rowCount()>0){
			while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'<tr>';
				echo' 	
            	<td>'.$nombreProyecto.'</td>
            	<td>'.$descripcionProyecto.'</td>
            	<td>'.$categoriaNombre.'</td>
            	<td>'.$categoriaOtro.'</td>
            	<td>'.$fechaProyecto.'</td>
            	<td>'.$ultimaEdicionProyecto.'</td>';
            	echo '<td>';
            	echo '<a href = "VistaProyectoDelete.php?activo='.$activoProyecto.'&id='.$idProyecto.'"class="btn btn-info"><i class="fa fa-check"></i></a>';
            	echo'</td>';
            	echo '</tr>';
                   }
             	
				}
			 	else{
					echo '<tr><td>No hay Proyectos en Papelera</td></tr>';

			}
		
	}

public function readProyectoAdmin(){
	$sql= ("SELECT
             categoriasproyecto.idCategorias,
             categoriasproyecto.categoriaNombre,
             categoriasproyecto.activoCp,
             proyecto.idProyecto,
             proyecto.nombreProyecto,
             proyecto.descripcionProyecto,
             proyecto.categoriaProyecto,
             proyecto.categoriaOtro,
             proyecto.fechaProyecto,
             proyecto.ultimaEdicionProyecto,
             proyecto.selectProyecto,
             proyecto.activoProyecto,
             proyecto.idUsuario,
             usuario.idUsuario,	
			 usuario.username,
			 usuariorol.idUsuario
             FROM proyecto
             INNER JOIN categoriasproyecto
             ON categoriasproyecto.idCategorias = proyecto.categoriaProyecto
             INNER JOIN usuariorol
			 ON usuariorol.idRolUser = proyecto.idUsuario
		 	 INNER JOIN usuario
		 	 ON usuario.idUsuario = usuariorol.idRolUser
             ORDER BY usuario.idusuario
             ");
		$query = $this->conx->prepare($sql);
		$query->execute();
		if ($query->rowCount()>0){
			while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'<tr>';
				echo' 
				<td class="success">'.$username.'</td>	
            	<td class="warning">'.$nombreProyecto.'</td>
            	<td>'.$descripcionProyecto.'</td>
            	<td>'.$categoriaNombre.'</td>
            	<td>'.$categoriaOtro.'</td>
            	<td class="danger">'.$fechaProyecto.'</td>
            	<td class="danger">'.$ultimaEdicionProyecto.'</td>';
                 echo '</tr>';
                   }
             	
				}
			 	else{
					echo '<tr><td>No hay Proyectos Registrados</td></tr>';

			}

		


}


////////////////////// Actualiza los registros del proyecto	
public function updateProyecto(){
	try {
		$query =$this->conx->prepare("UPDATE proyecto SET 
			nombreProyecto=:np,
			descripcionProyecto=:dp,
			categoriaProyecto=cp,
			categoriaOtro=co
			WHERE idProyecto=:idp");
		$query->bindParam(':np', $this->nombreProyecto);
		$query->bindParam(':dp', $this->descripcionProyecto);
		$query->bindParam(':cp', $this->categoriaProyecto);
		$query->bindParam(':co', $this->categoriaOtro);
		$query->bindParam(':idp', $this->categoriaOtro);
			if ($query->execute())
			{
				echo"<script language ='javascript'>alert(' inserto');</script>";	
				return true;
			}
			else 
			{
				echo"<script language ='javascript'>alert('No inserto');</script>";
				return false;
			}
		
	} catch (Exception $e) {
		echo $e->getMessage(); 
   		 return false;
		
	}

		
	
		
	}
/////////////////////// Remueve el proyecto de la tabla de proyectos creados
public function deleteProyecto($activoProyecto,$idp){
	switch ($activoProyecto) {
		case 1:
		$sql = ("UPDATE proyecto SET activoProyecto = 2  WHERE idProyecto ='$idp'  ");
		$query= $this->conx->prepare($sql);
		if ($query->execute()) {
  		 echo "<script language='javascript'> window.location.href ='VistaProyecto.php' </script>";  		
  		return true;
  		  			}
  		else{
  		return false; 		}

			break;
		case 2:
		$sql = ("UPDATE proyecto SET activoProyecto = 1  WHERE idProyecto = '$idp' ");
		$query= $this->conx->prepare($sql);
   	

  	if ($query->execute()) {
  		 echo "<script language='javascript'> window.location.href ='VistaProyecto.php' </script>"; 		
  		return true; 
  		 	}
  	else{
  		return false; 	}
			break;
		default:
				break;
	}
	    
  }	
//////////////////////////// Leer Todos los datos para el update
public function proyectoParaUpdate(){
	$query = ("SELECT nombreProyecto,descripcionProyecto,categoriaOtro FROM proyecto WHERE idProyecto=:id");
	$query= $this->conx->prepare($query);
	$query->bindParam(':id',$this->idProyecto);
	$query->execute();
	$fila = $query->fetch(PDO::FETCH_ASSOC);

	$this->nombreProyecto = $fila['nombreProyecto'];
	$this->descripcionProyecto =$fila['descripcionProyecto'];
	$this->categoriaOtro = $fila['categoriaOtro'];
	


}

	

////////////////////////////// trae el nombre de los proyectos para mostrar en el Header
public function getNombreHeader($sql){
	$query = $this->conx->prepare($sql);
	$query->execute();
	if ($query->rowCount() > 0) {
	while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
		extract($filas);
		echo'<li>'.$nombreProyecto.'</li>'; 
		}
	} else {
		echo '<li><a href="VistaProyecto.php">No hay Proyecto Activo </a></li>';
		}

}
////////////////////////////// trae el nombre del proyecto activo dado la id para mostrar en los paneles Doc
public function getNombreActivoDoc($sql){
	$query = $this->conx->prepare($sql);
	$query->execute();
	if ($query->rowCount() > 0) {
	while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
		extract($filas);
		echo $nombreProyecto;
		}
	} else {
		echo 'No Hay un Proyecto Activo.';
		}

}

public function getProyectoIdActivo($query){
	$query = $this->conx->prepare($query);
	$query->execute();
	if ($query->rowCount() > 0) {
	while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
		extract($filas);
		return $idProyecto;
		}
	} else {
		return false;
		}
}

/////////////////////////////////////////////////// trae el nombre y la ID para seleccionar proyecto 
public function getProyectoActivo($query){
	$query = $this->conx->prepare($query);
	$resultado = $query->execute();
	while ($filasProyecto =$query->fetch(PDO::FETCH_ASSOC) ) {
		
		 echo $nombrePro= $filasProyecto['idProyecto'];
		
		
	}

}

////////////////////////////////////// Selecciona el proyecto a documentar 
public function DocumentaProyecto($id){
	$query=("SELECT idProyecto, nombreProyecto, idUsuario FROM proyecto WHERE activoProyecto = 1 AND selectProyecto= 's' AND idUsuario = '$id' ");
	$q =$this->conx->prepare($query);
	$q->execute();
	if($q->rowCount()> 0){
		while($filas = $q->fetch(PDO::FETCH_ASSOC)){
			
		echo'<option value='.$this->idPruebaTipo=$filas['idProyecto'].'>'.$this->nombreProyecto=$filas['nombreProyecto'].'</option>';
					}
	} else{
		echo'<label>No hay proyectos activos, Crea un proyecto</label>';
	}

}


//// Desactiva el proyecto para que no pueda ser agregado a planificacion mas de una vez


public function selectProyectoActiva($ready,$idp,$idU){
$sql = ("SELECT * from Proyecto WHERE selectProyecto = 's' AND idUsuario = '$idU' ");
$queryA = $this->conx->prepare($sql);
$queryA->execute();
if ($queryA->rowCount() > 0) {
	echo"<script language ='javascript'>alert('Oops!: Ya hay un proyecto activo, No puedes activar 2 a la vez');</script>";
	echo "<script language='javascript'> window.location.href ='VistaProyecto.php' </script>";  
	return false;
	}
else{
	switch ($ready) {
	case 'n':
	$sql3 = ("UPDATE proyecto SET selectProyecto ='s'  WHERE idProyecto = '$idp' AND idUsuario='$idU' ");
		$query= $this->conx->prepare($sql3);
   	
  	if ($query->execute()) {
  			
  		return true; 
  		 	}
  	else{
  		return false;
  		}
	
		break;
	case 's':
	echo"<script language ='javascript'>alert('Este Proyecto ya esta activo!');</script>";
	echo "<script language='javascript'> window.location.href ='VistaProyecto.php' </script>"; 
	break;
	default:
		
		break;
}

	
}


 
}

public function selectProyectoDesactiva($ready,$idp,$idU){

switch ($ready) {
	case 's':
	$sql3 = ("UPDATE proyecto SET selectProyecto ='n'  WHERE idProyecto = '$idp' AND idUsuario='$idU' ");
		$query= $this->conx->prepare($sql3);
   	
  	if ($query->execute()) {
  			
  		return true; 
  		 	}
  	else{
  		return false;
  		}
	
		break;
	case 'n':
	echo"<script language ='javascript'>alert('Primero debes Activar este proyecto');</script>";
	echo "<script language='javascript'> window.location.href ='VistaProyecto.php' </script>"; 
	break;
	default:
		
		break;
}
 
}



/////////////// Cuenta la cant de proyectos creados
public function countProyectos(){
	$query = $this->conx->prepare ("SELECT * FROM proyecto");
	$query->execute();
	 return $cuenta = $query->rowCount();


}

}

?>