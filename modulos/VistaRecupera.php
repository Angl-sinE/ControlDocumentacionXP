<?php include("ModuloLogin.php");
include('datos/Config.php');
$database = new Configuracion();
$db= $database->conectaBD();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" contet="widt=device-width, intial-scale=1">
    <title>Sistema de Gestion de Proyectos</title>
    <!-- CSS -->
    <link href="../recursos/css/bootstrap.min.css" rel="stylesheet">
    <link href="../recursos/css/estilo.css" rel="stylesheet">
    <!-- Fonts -->
   <link href="../recursos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- Header -->
    <header class="navbar navbar-inverse bs-docs-nav" role="banner">
        <div class="container ">
            <div class="navbar-header">
                <a href="../index.php" class="navbar-brand scroll-link" data-id="carousel1"> Regresa a la Pagina Principal</a>
            </div>
            
        </div>
    </header>
    <!-- /Header -->
      <!-- Container -->
      <br>
<div class="container">
    <div class="col-lg-6">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Recupera tu contraseña</h3>
        </div>
        <div class="panel-body">
            <div class="row">
        <form   method="post" action="#">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="InputName">Confirma Tu correo</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="emailusername" id="emailusername" placeholder="Correo o Nombre de Usuario">
                        <span class="input-group-addon"></span>
                        <p class="help-block text-danger"></p>
                    </div>
                     <br>
                     <input type="submit" name="submit" class="btn btn-primary pull-middle" value="Confirmar" >
                    <button type="reset" class="btn btn-warning pull-right" >Borrar</button>
                </div>
                          
                    </div>
                </form>
       
                
            </div>
     
        </div>
    </div>
</div>
    <div class="col-lg-4">
        <div class="panel panel-success">
                    <div class="panel-heading"><h2 class="panel-title">Tu contraseña</h2></div>
                        <div class="panel-body">
                            <?php 
                            $usuario = new Usuario($db);
                            if (isset($_POST['submit'])){
                                $emailusername = $_POST['emailusername'];
                                $comprobar = $usuario->recuperar_pass($emailusername);

                            }
                            
                             ?>
                        </div>
        </div>
    </div>

</div>
<!-- /Container -->
<!-- Footer -->
<?php include ("../Footer.php"); ?>
