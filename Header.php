<?php
session_start();
    include ('modulos/ModuloLogin.php');
    include ('modulos/datos/Config.php');
    $basedatos = new Configuracion();
    $db = $basedatos->conectaBD();
    
    if($_POST){
        $usuario = new Usuario($db);
        $u = $_POST['emailusername'];
        $p = $_POST['upassword'];
        $usuario->username =trim($u);
        $usuario->upassword = trim($p);
        
        if ($usuario->checkLoginUser()){
            
        }
        else {
             echo"<script language ='javascript'>alert('Datos de Ingreso Incorrectos');</script>";
            
        }

    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" contet="widt=device-width, intial-scale=1">
    <title>Sistema de Control de Documentación</title>
    <!-- CSS -->
    <link href="recursos/css/bootstrap.min.css" rel="stylesheet">
    <link href="recursos/css/estilo.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="recursos/lib/carousel/dist/css/bootstrap-modal-carousel.css" />
   <!-- Fonts -->
    <link href="recursos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
</head>
<body>  
    <!-- Header -->
    <header class="navbar navbar-inverse bs-docs-nav" role="banner">
        <div class="container ">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="navbar-brand scroll-link" data-id="carousel1">Control de Documentación</a>
            </div>
            <nav class="collapse navbar-collapse bs-navbar-collapse pull-right" role="navigation">
                <ul class="nav navbar-nav">
                        <form name="login" action="" method="post" class="navbar-form navbar-right">
                        <div class="form-group">
                        <input type="text" class="form-control" id="emailusername" name="emailusername" placeholder="Nombre de Usuario" required>
                        </div>
                        <div class="form-group">
                        <input type="password" class="form-control" id="upassword" name="upassword" placeholder="Contraseña" required>
                        </div>
                        <input  value="Ingresa" name="submit" type="submit"class="btn btn-default">

                    </form>
                    <li><a href="modulos/VistaRecupera.php" class="scroll-link" data-id="registro">¿Olvidaste la contraseña?</a></li> 
                  </ul> 
            </nav>
        </div>
    </header>
    <!-- /Header -->