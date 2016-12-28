<?php
class Usuario{
	//Variables Globales
	public $db;
	public $idUsuario;
	public $username;
	public $uname;
	public $ulastname;
	public $uemail;
	public $upassword;
	public $emailusername;
	public $rolUsuario;
	public $tipos;
	

	private $conx;
// Conexion con la Base de Datos
public function __construct($db){
		$this->conx = $db;
		$this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
// Funcion para el registro del usuario, consigue el id del rol 'usuario'
public function getIdRol($rol){
		$query = $this->conx->prepare("SELECT idRoles FROM roles WHERE tipos =:rol ");
		$query->bindParam(':rol',$rol);
		$query->execute();
		$fila =$query->fetch(PDO::FETCH_ASSOC);
		return $this->id = $fila['idRoles'];
		
	}
////////////// Verifica si el username o el email existe, registra el usuario y le asigna el rol 'usuario'
public function registerUsuario(){
		$sql = ("SELECT * FROM usuario WHERE username = :username OR uemail = :uemail ");
		$query = $this->conx->prepare($sql);
    	$query->bindParam(':username', $this->username);
    	$query->bindParam(':uemail', $this->uemail);
    	$query->execute();
    	
    	if ($query->rowCount() > 0){
    		echo"<script language ='javascript'>alert('El usuario o Correo ya existen');</script>";
				return false;
    		}
			else {
				 $query2 = $this->conx->prepare("INSERT INTO usuario(username,uname,ulastname,upassword,uemail)
    		 VALUES (:username,:uname,:ulastname,:upassword,:uemail)");
    			$query2->bindParam(':username',$this->username);
    			$query2->bindParam(':uname',$this->uname);
		    	$query2->bindParam(':ulastname',$this->ulastname);
    			$query2->bindParam(':upassword',$this->upassword);
    			$query2->bindParam(':uemail',$this->uemail);
    			
    		if($query2->execute()) {
    			$rol= 'usuario';
    			$nuevoUserId = $this->conx->lastInsertId();
    			$nuevoRolId = $this->getIdRol($rol);

    			
    			$query3 = $this->conx->prepare("INSERT INTO usuariorol(idUsuario,idRoles) VALUES (:usuario,:rol)");
    			$query3->bindParam(':usuario',$nuevoUserId);
    			$query3->bindParam(':rol',$nuevoRolId);
    			$query3->execute();
    			return true;
    		 
    		} else {
    				echo"<script language ='javascript'>alert('NO');</script>";
    				return false;
    			}
							
			}	
			return $nuevoUserid;
	}

////////////////////////// id del RolUsuario
public function getIdURol($idUsuario){
		$query = $this->conx->prepare("SELECT idRolUser FROM usuariorol  WHERE idUsuario ='$idUsuario'");
			$query->execute();
    		$fila =$query->fetch(PDO::FETCH_ASSOC);
     		return $this->idu = $fila['idRolUser'];
     		}

//////////////////////Login de Usuario	
public function checkLogin(){
		$sql=("SELECT
		 usuario.idUsuario,	
		 usuario.username,
		 usuario.uname,
		 usuario.ulastname,
		 usuario.uemail,
		 usuario.upassword,
		 roles.idRoles,
		 roles.tipos
		 FROM usuariorol
		 INNER JOIN usuario
		 ON usuario.idUsuario = usuariorol.idUsuario
		 INNER JOIN roles
		 ON roles.idRoles = usuariorol.idRoles
		 WHERE usuario.username =? AND usuario.upassword = ? ");
		
		$query = $this->conx->prepare($sql);
		$query->bindParam(1, $this->username);
		$query->bindParam(2, $this->upassword);
		$query->execute();
    	$fila = $query->fetch(PDO::FETCH_ASSOC);
    	  	if ($query->rowCount() > 0){
    	  		$_SESSION['login'] = true;
    	  		$_SESSION['id_user'] = $fila['idUsuario'];
    	  		$_SESSION['nombre'] = $fila['uname'];
    	  		$_SESSION['user'] = $fila['username'];
    	  		$_SESSION['pass'] = $fila['upassword'];
    	  		
    		return true;
    	} else{
    		return false;
    	}
	}
public function checkLoginUser(){

try{
	$sql=("SELECT
		 usuario.idUsuario,	
		 usuario.username,
		 usuario.uname,
		 usuario.ulastname,
		 usuario.uemail,
		 usuario.upassword,
		 roles.idRoles,
		 roles.tipos
		 FROM usuariorol
		 INNER JOIN usuario
		 ON usuario.idUsuario = usuariorol.idUsuario
		 INNER JOIN roles
		 ON roles.idRoles = usuariorol.idRoles
		 WHERE usuario.username =? AND usuario.upassword = ? ");
		
		$query = $this->conx->prepare($sql);
		$query->bindParam(1, $this->username);
		$query->bindParam(2, $this->upassword);
		$query->execute();
    	$fila = $query->fetch(PDO::FETCH_ASSOC);
    	  	if ($query->rowCount() > 0){
    	  		
    	  		switch ($fila['tipos']) {
    	  			case 'usuario':
    	  			$_SESSION['login'] = true;
    	  			$_SESSION['id_user'] = $fila['idUsuario'];
    	  			$_SESSION['nombre'] = $fila['uname'];
    	  			$_SESSION['user'] = $fila['username'];
    	  			$_SESSION['pass'] = $fila['upassword'];
    	  			header("location:modulos/VistaPanel.php");
    	  				
    	  			break;
    	  			case 'administrador':
    	  			$_SESSION['login'] = true;
    	  			$_SESSION['id_user'] = $fila['idUsuario'];
    	  			$_SESSION['nombre'] = $fila['uname'];
    	  			$_SESSION['user'] = $fila['username'];
    	  			$_SESSION['pass'] = $fila['upassword'];
    	  			header("location:vistas/VistaPanelAdmin.php");
    	  				
    	  			
    	  			default:
    	  				# code...
    	  				break;
    	  		}
    	  		
    		
    	} else{
    		 echo"<script language ='javascript'>alert('Usuario no encontrado');</script>";
    		return false;
    	}
		
}
catch(PDOException $e){
		 echo $e->getMessage(); 
   		 return false;
	}	
}

//////////////////////////////////////////////// Leer Usuarios Registrados (Admin)
public function readUsuarios(){
	try{
		$sql=("SELECT
		 usuario.idUsuario,	
		 usuario.username,
		 usuario.uname,
		 usuario.ulastname,
		 usuario.uemail,
		 roles.idRoles,
		 roles.tipos
		 FROM usuariorol
		 INNER JOIN usuario
		 ON usuario.idUsuario = usuariorol.idUsuario
		 INNER JOIN roles
		 ON roles.idRoles = usuariorol.idRoles
		 ORDER BY username ");
		$query = $this->conx->prepare($sql);
		$query->execute();

		if ($query->rowCount()>0){
			while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'<tr>';
				echo' 	
            	<td class="success">'.$username.'</td>
            	<td>'.$uname.'</td>
            	<td>'.$ulastname.'</td>
            	<td>'.$uemail.'</td>
            	<td>'.$tipos.'</td>
            	</tr>';
            	 }
             	
				}
			 	else{
					echo '<tr><td>No hay Usuarios Registrados</td></tr>';
			}
	}catch(PDOException $e){
		 echo $e->getMessage(); 
   		 return false;
	}
}	
////////////////////////////////////////////////// INICIANDO LA SESION
public function inicio_sesion(){
		return $_SESSION['login'];
	}
/////////////////////////////////////////////////// FIN DE LA SESION
public function fin_sesion(){
		$_SESSION['login'] = FALSE;
		session_destroy();
	}
////////////////// mostrando contraseña para recuperar
public function recuperar_pass($emailusername){
	$query= $this->conx->prepare("SELECT upassword FROM usuario WHERE uemail='$emailusername' OR  username='$emailusername'");
	$query->execute();
    $fila =$query->fetch(PDO::FETCH_ASSOC);
    //return $this->pass = $fila['upassword'];	
	echo $this->pass = $fila['upassword'];
		
	}

public function countUsuarios(){
	$query = $this->conx->prepare ("SELECT * FROM usuario");
	$query->execute();
	 return $cuenta = $query->rowCount();


}	
}	

?>