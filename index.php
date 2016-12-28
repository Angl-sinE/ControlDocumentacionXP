<!--Header -->
<?php
include ('Header.php');
 ?>
<!--Carousel-->
    <div id="carousel1" class="carousel slide" data-ride="carousel">
        
        <ol class="carousel-indicators">
            <li data-target="#carousel1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel1" data-slide-to="1"></li>
            <li data-target="#carousel1" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item  active " style="background-color:indigo">
                <div class="container">
                   <div class="carousel-caption">
                        <h1>Control de Documentación de Sistemas</h1>
                        <p class="lead text-success">Documenta, Aprende, Simplifica, Mejora</p>
                    </div>
                </div>
            </div>
            <div class="item" style="background-color:LimeGreen">
                <div class="container">
             
                    <div class="carousel-caption">
                        <h1>Registro</h1>
                        <p class="lead ">Registrate como usuario del sistema </p>
                        <p><a href="modulos/VistaRegistro.php" class="btn btn-lg btn-primary scroll-link" data-id="registro" role="button">Registro</a></p>
                    </div>
                </div>
            </div>
            <div class="item" style="background-color:SteelBlue">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>¿Como Funciona?</h1>
                        <p class="lead "> Aprende el funcionamiento del sistema en solo unos pasos </p>
                         <p><a href="vistas/VistaFunciona.php" class="btn btn-lg btn-primary scroll-link" data-id=funciona role="button">Ver Funcionamiento</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#carousel1" data-slide="prev" role="button"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#carousel1" data-slide="next" role="button"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>

   
    <!-- /Carousel -->

<!-- Footer -->
<?php include ("Footer.php"); ?>
