<?php
include('ModuloHeaderP.php');
include ('ModuloPerfil.php');
$titulo_pagina ="Perfil de Usuario";
?>

<div id="page-wrapper">

<?php

if(isset($_GET["edit_id"])){

$idPerfil= $_GET['edit_id'];
} esle{
    header("location:VistaPerfil.php");
}



$perfil = new Perfil($db);

if (isset($_POST['registro'])){

$idUsuario = $_GET['edit_id'];
$upassword = $_POST['password'];
if ($perfil->updatePerfil($idUsuario,$upassword)){

echo'
<div class="row">
<div class="col-lg-8">
<div class="alert alert-dismissable alert-success">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>Cambio Exitoso!</strong></div>
</div></div><hr>';
}
else {
echo '
<div class="row">
<div class="col-lg-8">
<div class="alert alert-dismissable alert-danger">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>Error en la actualización</strong></div>
</div></div><hr>';

    }


}

?>


    <div class="row">
        <div class="col-lg-12">
        <h1><?php echo $titulo_pagina;?> <i class="fa fa-edit"></i></h1>
        </div>
    </div>
    <hr>
	<div class="row">
		<div class="col-lg-8">
			<div class="panel panel-success">
			<div class="panel-heading">
				<h4 class="panel-title">Editar Perfil</h4>
			</div>
			<div class="panel-body">
				<form method="post" name="formulario" role="form">
				  <div class="form-group">
                    <label for="InputEmail">Nueva Contraseña</label>
                    <div class="input-group">
                    	<div class="controls">
                        <input type="password" class="form-control" name="password" id="password"  placeholder="Introduce tu contraseña" >
                        </div>
                        <span class="input-group-addon"></span>
                        <p class="help-block"></p>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="InputEmail">Confirma Contraseña</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="cofirmPassword" name="confirmPassword" placeholder="Confirma tu contraseña" >
                        <span class="input-group-addon"></span>
                        <p class="help-block"></p>
                    </div>
                </div>
               
                <br>
                <div class="form-group">
                	<input type="submit" name="registro" class="btn btn-success pull-middle" value="Actualizar" >
                	<button type="reset" class="btn btn-danger pull-right" >Borrar Datos</button>
            	</div>
				</form>

				
			
			</div>
		</div>
		</div>
	</div>

</div>
<?php
include ('ModuloFooterP.php');
?>