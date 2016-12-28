<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
class Tutorial {
///////////////////// Variables de la tabla tutorial	
	public $idTutorial;
	public $nombreTutorial;
	public $contenidoTutorial;
	public $categoriaTutorial;
	public $fuenteTutorial;
	public $imagenTutorial;
	public $favorito;
	public $activoT;

///////////////// Variables de conexion de Base de Datos
	public $db;
	private $conx;
/////////////////////  constructor
	public function __construct($db){
		$this->conx = $db;
		$this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}	

public function createTutorial(){
	try {
		$query = $this->conx->prepare("SELECT * FROM tutorial WHERE nombreTutorial =:nombre ");
		$query->bindParam(':nombre',$nombreTutorial);
		$query->execute();
		if ($query->rowCount() > 0) {
			return false;
		}else{
			$query2 = $this->conx->prepare("INSERT INTO tutorial (nombreTutorial,categoriaTutorial,contenidoTutorial,fuenteTutorial,imagenTutorial)
			VALUES (:nombre,:categoria,:contenido,:fuente,:img)");
			$query2->bindParam(':nombre',$this->nombreTutorial);
			$query2->bindParam(':contenido',$this->contenidoTutorial);
			$query2->bindParam(':categoria',$this->categoriaTutorial);
			$query2->bindParam(':fuente',$this->fuenteTutorial);
			$query2->bindParam(':img',$this->imagenTutorial);
			
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

public function createTutorialFav($idTutorial,$idUser){
	$sql= ("SELECT 
			usuariorol.idRolUser,
			tutorial.idTutorial,
			tutorialfavorito.idTutorialFav
			FROM tutorialfavorito
			INNER JOIN tutorial
			ON tutorial.idTutorial = tutorialfavorito.idTutorial
			INNER JOIN usuariorol
			ON usuariorol.idRolUser = tutorialfavorito.idUsuario
			WHERE usuariorol.idRolUser = '$idUser' AND tutorial.idTutorial = '$idTutorial'
			");
	$query =$this->conx->prepare($sql);
	$query->execute();
	if ($query->rowCount() > 0) {
		
		return false;
	}
	else{
		$query2 = $this->conx->prepare("INSERT INTO tutorialfavorito SET idTutorial=:idt,idUsuario=:idU");
		$query2->bindParam(':idt',$idTutorial);
		$query2->bindParam('idU',$idUser);

		if ($query2->execute()) {
			return true;
			
		}else {
			return false;
		}

	}
}

public function readTutorialFav($idUser){
	$directorio = "../imagenesTutorial";
	$sql=("SELECT 
			usuariorol.idRolUser,
			tutorial.idTutorial,
			tutorial.contenidoTutorial,
			tutorial.nombreTutorial,
			tutorial.categoriaTutorial,
			tutorial.fuenteTutorial,
			tutorial.imagenTutorial,
			tutorial.activoT,
			tutorialfavorito.idTutorial,
			tutorialfavorito.idUsuario
			FROM tutorialfavorito
			INNER JOIN tutorial
			ON tutorial.idTutorial = tutorialfavorito.idTutorial
			INNER JOIN usuariorol
			ON usuariorol.idRolUser = tutorialfavorito.idUsuario
			WHERE usuariorol.idRolUser = '$idUser'  	");
			$query = $this->conx->prepare($sql);
			$query->execute();
			$contador = 1;
			if ($query->rowCount() > 0) {
				while ($filas = $query->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				$archivo = $directorio.'/'.$imagenTutorial;
								
					echo '
					<div class="item">
                 	<div class="carousel-content" >
                        <div >
                         <h3 class="text-center">'.$nombreTutorial.'</h3>
                         <p class="text-justify">'.$contenidoTutorial.'</p>
                            <div class="well well-sm bg-danger">Fuente: '.$fuenteTutorial.'</div>
                            <img  width="350" height="350"src="'.$archivo.'" class="img-responsive center-block" alt="Sin Imagen">
                            <br><br>
                           
                        </div>
                    </div>
                    </div>';
					}
			}else {
				echo'<div class="item">
				<h3 class="text-center">No Hay Tutoriales Marcados Como Favoritos</h3>
				</div>';
			}

}


public function readTutorialUser($sql){
	$directorio = "../imagenesTutorial";
		$query = $this->conx->prepare($sql);
		$query->execute();
		if ($query->rowCount()>0){
			
			while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
			extract($filas);
			$archivo = $directorio.'/'.$imagenTutorial;
			echo '
					<div class="item">
                 	<div class="carousel-content" >
                         <h3 class="text-center">'.$nombreTutorial.'</h3>
                         <p class="text-justify">'.$contenidoTutorial.'</p>
                            <div class="well well-sm bg-danger">Fuente: '.$fuenteTutorial.'</div>
                            <img  width="350" height="350"src="'.$archivo.'" class="img-responsive center-block" alt="Sin Imagen">
                            <br><br>
                             <a href ="ModuloTutorialFavOn.php?id='.$idTutorial.'"class="btn btn-success "><i class="fa fa-star"></i> Favorito</a>
                                        
                    </div>
                    </div>';
			
                   }
             	
				} 
			 	else{
				echo'<div class="item">
				<h3 class="text-center">No Hay Tutoriales De esta Categoria</h3>
				</div>';

			}

}

public function readTutorialAdmin(){
   $directorio = "../imagenesTutorial";
   $sql= ("SELECT * FROM tutorial WHERE activoT = 1");
   $query = $this->conx->prepare($sql);
   $query->execute();
    if ($query->rowCount()>0){
      while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);

        $archivo = $directorio.'/'.$imagenTutorial;
        echo' 
        <tr>
              <td>'.$nombreTutorial.'</td>
              <td>'.$categoriaTutorial.'</td>
              <td>'.$contenidoTutorial.'</td>
              <td>'.$fuenteTutorial.'</td>
              <td><img width="200" height="150" class="thumbnail img-responsive" src="'.$archivo.'"></td> ';
              /*echo'<td>';
              echo '<a href = "VistaTutAdminEdit.php?id='.$idTutorial.'"class="btn btn-warning "><i class="fa fa-pencil"></i></a>';
              echo '</td>';*/
              echo '<td>';
             echo '<a href = "../modulos/ModuloDeleteTutorial.php?id='.$idTutorial.'&a='.$activoT.'"class="btn btn-danger "><i class="fa fa-times"></i></a>';
              echo '</td></tr>';
                   }
              
        }
        else{
          echo '<tr><td>No hay Tutoriales Registrasdos</td></tr>';

      }

}

public function readTutorialTrash(){
   $directorio = "../imagenesTutorial";
   $sql= ("SELECT * FROM tutorial WHERE activoT = 2");
   $query = $this->conx->prepare($sql);
   $query->execute();
    if ($query->rowCount()>0){
      while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);

        $archivo = $directorio.'/'.$imagenTutorial;
        echo' 
        <tr>
              <td>'.$nombreTutorial.'</td>
              <td>'.$categoriaTutorial.'</td>
              <td>'.$contenidoTutorial.'</td>
              <td>'.$fuenteTutorial.'</td>
              <td><img width="200" height="150" class="thumbnail img-responsive" src="'.$archivo.'"></td>';
              echo '<td>';
                echo '<a href = "../modulos/ModuloDeleteTutorial.php?id='.$idTutorial.'&a='.$activoT.'"class="btn btn-info "><i class="fa fa-check"></i></a>';
                           echo '</td></tr>';
                   }
              
        }
        else{
          echo '<tr><td>No hay Tutoriales Registrasdos</td></tr>';

      }

}
public function updateTutorial($idTutorial,$nombreTutorial,$contenidoTutorial,$fuenteTutorial){
	try {
		$sql = ("UPDATE tutorial SET 
			nombreTutorial=:nombre,contenidoTutorial=:contenido,fuenteTutorial=:fuente
			WHERE idTutorial=:tutorial");
			$query=$this->conx->prepare($sql);
			$query->bindParam(":nombre",$nombreTutorial);
			$query->bindParam(":contenido",$contenidoTutorial);
			$query->bindParam(":fuente",$fuenteTutorial);
			$query->bindParam(":id",$idTutorial);
			
			if ($query->execute())
			{
				return true;
			}
			else 
			{
				return false;
			}
		
	} catch (Exception $e) {
		 echo $e->getMessage(); 
   		 return false;
   		 }

}

public function tutorialTrash($activoT,$idTutorial){
 
  switch ($activoT) {
    case 1:

    $sql = ("UPDATE tutorial SET activoT = 2 WHERE idTutorial= '$idTutorial'   ");
          $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Tutorial Borrado');</script>";
       echo "<script language='javascript'> window.location.href ='../vistas/VistaTutorialAdmin.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Borrar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='../vistas/VistaTutorialAdmin.php' </script>"; 
      }

      break;
    case 2:
    $sql= ("UPDATE tutorial SET activoT = 1 WHERE idTutorial= '$idTutorial'   ");
         $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Tutorial Restaurado');</script>";
       echo "<script language='javascript'> window.location.href ='../vistas/VistaTrashTutorial.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Activar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='../vistas/VistaTutorialAdmin.php' </script>"; 
      }
      break;
    default:
        break;
  }
      
  }




public function countTutoriales(){
	$query = $this->conx->prepare ("SELECT * FROM tutorial");
	$query->execute();
	 return $cuenta = $query->rowCount();


}
}
?>