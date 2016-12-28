<?php
class Comentario{

	public $idUsuario;
	public $username;
	public $comentarioFecha;
	public $comentarioContenido;
	public $db;
	private $conx;
	////////////////Conexion con la Base de Datos
public function __construct($db){
		$this->conx = $db;
		$this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}


public function createComent(){
	try {
		$query = $this->conx->prepare("SELECT idComentarios FROM comentarios WHERE  comentarioContenido =:com ");
		$query->bindParam(':com', $this->comentarioContenido);
		$query->execute();
    	    	
    	if ($query->rowCount() > 0){
    		
			return false;
		} else{
		
			$query2 = $this->conx->prepare("INSERT INTO comentarios SET idUsuario=:id,comentarioContenido=:coment ");
    		$query2->bindParam(':id',$this->idUsuario);
    		$query2->bindParam(':coment',$this->comentarioContenido);
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

public function  createComentUser(){

}


public function readComentarioUser(){

	$query = ("SELECT
	  comentarios.comentarioContenido,
	  comentarios.idComentarios,
	  comentarios.comentarioFecha,
	  comentarios.idUsuario,
	  usuario.idUsuario,
	  usuario.username,
	  usuariorol.idUsuario,
	  usuariorol.idRolUser,
	  roles.idRoles,
	  roles.tipos
	  FROM comentarios
	  INNER JOIN usuariorol
	  ON usuariorol.idRolUser = comentarios.idUsuario
	  INNER JOIN usuario
	  ON usuario.idUsuario = usuariorol.idRolUser
	  INNER JOIN roles
	  ON roles.IdRoles = usuariorol.idRoles
	  WHERE roles.tipos = 'usuario'
	  ORDER BY  comentarios.comentarioFecha ");
		$q = $this->conx->prepare($query);
		$q->execute();
		if ($q->rowCount()>0){
			while ($filas=$q->fetch(PDO::FETCH_ASSOC)) {
			extract($filas);
			echo' <div class="timeline-heading">
             <h4 class="timeline-title">Mensaje De: '.$username.' </h4>';
            echo'<span><i class="fa fa-clock-o fa-2x"></i>    '.  $comentarioFecha.'</span>';
           echo'</div><br>
                <div class="timeline-body ">
                 <p class="text-center lead">'.$comentarioContenido .'</p>
                        </div><hr>';
		}

	}else{
		echo' <div class="timeline-heading">';
         echo'<span><i class="fa fa-clock-o fa-2x"></i></span>';
         echo'</div><br>
         <div class="timeline-body">
         <p class="text-center lead">No se han realizado Comentarios</p>
           </div><hr>';


	}

}	

public function readComentarioAdmin(){

	$query = ("SELECT
	  comentarios.comentarioContenido,
	  comentarios.idComentarios,
	  comentarios.comentarioFecha,
	  comentarios.idUsuario,
	  usuario.idUsuario,
	  usuario.username,
	  usuariorol.idUsuario,
	  usuariorol.idRolUser,
	  roles.idRoles,
	  roles.tipos
	  FROM comentarios
	  INNER JOIN usuariorol
	  ON usuariorol.idRolUser = comentarios.idUsuario
	  INNER JOIN usuario
	  ON usuario.idUsuario = usuariorol.idRolUser
	  INNER JOIN roles
	   ON roles.IdRoles = usuariorol.idRoles
	  WHERE roles.tipos = 'administrador'
	  ORDER BY  comentarios.comentarioFecha ");
		$q = $this->conx->prepare($query);
		$q->execute();
		if ($q->rowCount()>0){
			while ($filas=$q->fetch(PDO::FETCH_ASSOC)) {
			extract($filas);
			echo' <div class="timeline-heading">
             <h4 class="timeline-title">Mensaje De: '.$username.' </h4>';
            echo'<span><i class="fa fa-clock-o fa-2x"></i>    '.  $comentarioFecha.'</span>';
           echo'</div><br>
                <div class="timeline-body">
                 <p class="text-center lead">'.$comentarioContenido .'</p>
                        </div><hr>';
		}

	}else{
		echo' <div class="timeline-heading">';
         echo'<span><i class="fa fa-clock-o fa-2x"></i></span>';
         echo'</div><br>
         <div class="timeline-body">
         <p class="text-center lead">El Administrador no ha Realizado Comentarios</p>
           </div><hr>';


	}

}	

public function countComentarios(){
	$query = $this->conx->prepare ("SELECT * FROM comentarios");
	$query->execute();
	 return $cuenta = $query->rowCount();


}


}		


