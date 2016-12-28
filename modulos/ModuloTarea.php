<?php
class Tarea{
	public $db;
  public $idTareas;
	public $nombreTarea;
	public $descripcionTarea;
  public $prioridadTarea;
  public $categoriaTarea;
  public $activoD;
	private $conx;
////////////// Conexion con la Base de Datos
public function __construct($db){
		$this->conx = $db;
		$this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

////////////////////////////// Lee el registro de tareas dado el query en la clase Vista
public function readTarea(){
   $sql= ("SELECT *  FROM tareas WHERE activoD = 1 AND activo = 1  ");
		$query = $this->conx->prepare($sql);
    $query->execute();

    if ($query->rowCount()>0){
      while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);
        echo' 
        <tr>
              <td>'.$nombreTarea.'</td>
              <td>'.$categoriaTarea.'</td>
              <td>';
              echo '<a href = "VistaTareaDelete.php?activo='.$activo.'&id='.$idTareas.'"class="btn btn-danger"><i class="fa fa-times"></i></a>';
              echo '</td></tr>';
                   }
              
        }
        else{
          echo '<tr><td>No hay Tareas disponibles</td></tr>';

      }
	}
////////////////////////////// Lee las tareas en el menu  
public function readTareaM(){
   $sql= ("SELECT *  FROM tareas WHERE  activoD = 1 AND activo = 1 ORDER BY prioridadTarea  ");
    $query = $this->conx->prepare($sql);
    $query->execute();
    if ($query->rowCount()>0){
      while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);
        
        echo '
              <li class="bg-warning"><a>'.$nombreTarea.'</a></li>';
             }
          }
        else{
         echo' <li role="presentation" class="divider"></li>';
         echo '<li class="bg-danger"><a>No hay Tareas Activas</a></li>';

      }
  }
//////////////////////////////////////// Lee el registro de tareas desactivadas dado el query en la clase Vista
public function readTarea2(){
   $sql= ("SELECT *  FROM tareas WHERE  activoD=1  AND activo = 2  ");
    $query = $this->conx->prepare($sql);
    $query->execute();

    if ($query->rowCount()>0){
      while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);
        echo' 
        <tr>
              <td>'.$nombreTarea.'</td>
              <td>'.$categoriaTarea.'</td>
              <td>'.$descripcionTarea.'</td>
              <td>';
              echo '<a href = "VistaTareaDelete.php?activo='.$activo.'&id='.$idTareas.'"class="btn btn-primary "><i class="fa fa-check"></i></a>';
              echo '</td></tr>';
                   }
              
        }
        else{
          echo '<tr><td>No hay Tareas Inactivas</td></tr>';

      }
  }
///////////////////////////////////////////// Cambia Estado de tarea (usuario)
public function deleteTarea($activo,$idt){
 switch ($activo) {
    case 1:
    $sql = ("UPDATE tareas SET activo = 2  WHERE idTareas ='$idt'  ");
    $query= $this->conx->prepare($sql);
    if ($query->execute()) {
       echo "<script language='javascript'> window.location.href ='VistaTarea.php' </script>";     
      return true;
              }
      else{
      return false;     }

      break;
    case 2:
    $sql = ("UPDATE tareas SET activo = 1  WHERE idTareas = '$idt' ");
    $query= $this->conx->prepare($sql);
    

    if ($query->execute()) {
       echo "<script language='javascript'> window.location.href ='VistaTarea.php' </script>";     
      return true; 
        }
    else{
      return false;   }
      break;
    default:
        break;
  }

}
/////////////////////////////Crea una tarea, recibe el nombre y la descripcion como parametros
	public  function createTarea(){
	  $query = $this->conx->prepare("SELECT * FROM tareas WHERE nombreTarea =:nombreTarea");
		$query->bindParam(':nombreTarea', $this->nombreTarea);
    $query->execute();
      	if ($query->rowCount() > 0){
    		return false;
		}
    	else {
	    	$query2 = $this->conx->prepare("INSERT INTO 	tareas(nombreTarea,categoriaTarea,descripcionTarea,prioridadTarea)
   			VALUES(:nombre,:categoria, :descripcion,:prioridad)");
   			$query2->bindparam(':nombre',$this->nombreTarea);
   			$query2->bindparam(':categoria',$this->categoriaTarea);
        $query2->bindparam(':descripcion',$this->descripcionTarea);
        $query2->bindparam(':prioridad',$this->prioridadTarea);

   				if ($query2->execute()){
   					return true;
   				}
   				else{
   					return false;
   				}

    		}	
}
///////////////////////////// Lee Tareas para el Admin
public function readTareasAdmin(){
   $sql= ("SELECT * FROM tareas WHERE activoD=1 ORDER BY categoriaTarea");
   $query = $this->conx->prepare($sql);
   $query->execute();
    if ($query->rowCount()>0){
      while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);
        echo' 
        <tr>
              <td>'.$nombreTarea.'</td>
              <td>'.$categoriaTarea.'</td>
              <td>'.$prioridadTarea.'</td>
              <td>'.$descripcionTarea.'</td>';
             /* echo'<td>';
              echo '<a href = "VistaEditTarea.php?id='.$idTareas.'"class="btn btn-warning "><i class="fa fa-pencil"></i></a>';
              echo '</td>';*/
              echo '<td>';
              echo '<a href = "../modulos/ModuloDeleteTarea.php?id='.$idTareas.'&a='.$activoD.'"class="btn btn-danger "><i class="fa fa-times"></i></a>';
              echo '</td></tr>';
                   }
              
        }
        else{
          echo '<tr><td>No hay Tareas Registradas</td></tr>';

      }

}
public function readTareasAdminTrash(){
   $sql= ("SELECT * FROM tareas WHERE activoD=2 ORDER BY categoriaTarea");
   $query = $this->conx->prepare($sql);
   $query->execute();
    if ($query->rowCount()>0){
      while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
        extract($filas);
        echo' 
        <tr>
              <td>'.$nombreTarea.'</td>
              <td>'.$categoriaTarea.'</td>
              <td>'.$prioridadTarea.'</td>
              <td>'.$descripcionTarea.'</td>';
              echo '<td>';
              echo '<a href = "../modulos/ModuloDeleteTarea.php?id='.$idTareas.'&a='.$activoD.'"class="btn btn-info "><i class="fa fa-check"></i></a>';
              echo '</td></tr>';
                   }
              
        }
        else{
          echo '<tr><td>No hay Tareas En la Papelara</td></tr>';

      }

}
////////////////////////////////// Desactiva Tarea (Admin)
public function tareaTrash($activoD,$idTareas){
 
  switch ($activoD) {
    case 1:

    $sql = ("UPDATE tareas SET activoD = 2 WHERE idTareas= '$idTareas'   ");
          $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Tarea Borrada');</script>";
       echo "<script language='javascript'> window.location.href ='../vistas/VistaTareaAdmin.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Borrar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='../vistas/VistaTareaAdmin.php' </script>"; 
      }

      break;
    case 2:
    $sql= ("UPDATE tareas SET activoD = 1 WHERE idTareas= '$idTareas'   ");
         $query= $this->conx->prepare($sql);
               
    if ($query->execute()) {
       echo"<script language ='javascript'>alert('Tarea Restaurada');</script>";
       echo "<script language='javascript'> window.location.href ='../vistas/VistaTrashTarea.php' </script>";     
    
              }
      else{
     echo"<script language ='javascript'>alert('Intenta Activar Mas Tarde');</script>";
     echo "<script language='javascript'> window.location.href ='../vistas/VistaTareaAdmin.php' </script>"; 
      }
      break;
    default:
        break;
  }
      
  }

public function countTareas(){
  $query = $this->conx->prepare ("SELECT * FROM tareas");
  $query->execute();
   return $cuenta = $query->rowCount();


}

	
} 
?>

