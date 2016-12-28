<?php
Class Perfil {
	//////////////////////Variables Globales
	public $username;
	public $uname;
	public $ulastname;
	public $uemail;
	public $upassword;
	public $idUsuario;

	private $conx;
    ////////////////////// Constructor
	public function __construct($db){
		$this->conx = $db;
	}
	////////////////////////// Funcion de Leer los datos de la tabla Perfil 
	///////////////////////// Se pasa idUsuario en link para usar Get en la funcion Update

	public function readPerfil($sql){
		$query = $this->conx->prepare($sql);
		$query->execute();

		if ($query->rowCount()>0){
			while ($filas=$query->fetch(PDO::FETCH_ASSOC)) {
				extract($filas);
				echo'	
				<tr class="info">
            	<td>'.$username.'</td>
            	<td>'.$ulastname.'</td>
            	<td>'.$uemail.'</td>
            	<td>';
            	echo '<a href = "VistaPerfilEdit.php?id='.$idUsuario.'"class="btn btn-warning">Editar <i class="fa fa-pencil"></i></a>';
            	echo '</td></tr>';
                   }
             	echo '</tbody></table>';

				}
			 	else{
					echo '<tr><td>No hay Registros</td></tr>';

			}
	}

    //////////////////////// Funcion de actualizar datos (contraseña) recibe 2 argumentos id y password
		public function updatePerfil($idUsuario,$upassword){
			$sql = ("UPDATE usuario SET upassword=:password WHERE idUsuario=:id");
			$query=$this->conx->prepare($sql);
			$query->bindParam(":password",$upassword);
			$query->bindParam(":id",$idUsuario);
			
			if ($query->execute())
			{
				return true;
			}
			else 
			{
				return false;
			}

			
		}

		         

	}
?>