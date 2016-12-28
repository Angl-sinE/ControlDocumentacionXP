<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" contet="widt=device-width, intial-scale=1">
	<title>Sistema de Gestion de Proyectos</title>
	
	<link href="../recursos/css/bootstrap.min.css" rel="stylesheet">
	<link href="../recursos/css/estilo.css" rel="stylesheet">
	
   <link href="../recursos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>

	<header class="navbar navbar-inverse bs-docs-nav" role="banner">
        <div class="container ">
            <div class="navbar-header">
                <a href="../index.php" class="navbar-brand scroll-link" data-id="carousel1"><i class="glyphicon glyphicon-backward"></i>  Regresar al Inicio
                </a>
                
               
            </div>
            
        </div>
   </header>
<div class="container"><br>

<?php
include('ModuloLogin.php');
include ('datos/Config.php');


$basedatos = new Configuracion();
$db = $basedatos->conectaBD();

$usuario = new Usuario($db);
$rol = 'usuario';

if ($_POST){
 
    $usuario->username = $_POST['username'];
    $usuario->uname = $_POST['firstName'];
    $usuario->ulastname = $_POST['lastName'];
    $usuario->uemail = $_POST['email'];
    $usuario->upassword = $_POST['password'];

    if($usuario->registerUsuario()){
     echo'<br>
    <div class="col-lg-8">
    <div class="alert alert-dismissable alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Registro Exitoso!</strong></div>
    </div>';
       // header("location:../index.php");
    } else{
        echo'<br>
        <div class="col-lg-8">
        <div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error en el Registro intentalo mas tarde!</strong></div>
        </div>';
       
    }

}

?>      
<div class="col-lg-8">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Registro de Usuario </h3>
		</div>
		<div class="panel-body">
			<div class="row">
        <form  name="formulario" id="formulario" method="post" action="VistaRegistro.php">
            <div class="col-lg-8">
                <div class="form-group">
                    <label for="InputName">Usuario</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Usuario">
                        <span class="input-group-addon"></span>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
               
                <div class="form-group">
                    <label for="InputName">Nombre</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Introduce tu nombre">
                        <span class="input-group-addon"></span>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputLastName">Apellido</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Introduce Apellido" >
                        <span class="input-group-addon"></span>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Contraseña</label>
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
                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Introduce tu Email" >
                        <span class="input-group-addon"></span>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div class="form-group">
                	<input type="submit" name="registro" class="btn btn-primary pull-middle" value="registrar" >
                	<button type="reset" class="btn btn-warning pull-right" >Borrar</button>
            	</div>
            </div>
        </form>
    </div>
		</div>
	</div>
    </div>
</div>
  <!-- /Container -->
<!-- Footer -->
<footer class="text-center">
    <div class="footer-below">
        <div class="container">
         <div class="col-lg-12">
          &copy; Desarrollado por:  Angel Flores 2015</div>
                    </div>
    </div>

</footer>
<!-- /Footer -->
	<!-- jQuery -->
    <script type="text/javascript" src="../recursos/js/jquery-1.10.2.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script type="text/javascript" src="../recursos/js/bootstrap.min.js"></script>
    <!-- Validacion  -->
    <script type="text/javascript" src="../recursos/js/formvalidator/dist/js/bootstrapValidator.min.js"></script>
    <script type="text/javascript" src="../recursos/js/formvalidator/dist/js/language/es_ES.js"></script>
    <script type="text/javascript" src="../recursos/js/validator.js"></script> 
</body>
</html>