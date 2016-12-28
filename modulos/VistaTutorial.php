<?php
include ("ModuloHeaderP.php");
?>
<div id="page-wrapper">
<div class="row">
   <div class="col-lg-12">
                    <h1>Tutoriales <i class="fa fa-flask"></i></h1>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       Desde aquí podrás consultar los guias que te ayudarán a
                       realizar la documentación de tu proyecto y aprender sobre
                       la metodología XP, si necesitas consultar alguna guía constantemente
                       márcala como favorita.
                    </div>
                </div>
</div><hr>
 <div class="row">
  <div class="col-lg-12">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h2 class="panel-title text-center">Tutoriales</h2>
      </div>
        <div class="panel-body bg-danger">
          <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <div class="btn-group" role="group">
             <a id="pt1" type="button" class="btn btn-default btn-lg" target="1">Ver Temas de Documentación</a> 
            </div>
            <div class="btn-group" role="group">
             <a id="pt2" type="button" class="btn btn-default btn-lg" target="4">Ver Temas Generales</a> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="row">
<!--************************************************************************************Panel de selccion de tutoriales de documentacion -->
	<div class="col-lg-16" style="display:none" id="panelt1">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">Temas de documentacion</h4>
          </div>
          <div class="panel-body">
            <div class="panel-body">
                <a id="btn-td1" type="button" class="btn btn-primary btn-lg btn-block"><i class="fa fa-child"></i> Primeros Pasos</a>
                <a id="btn-td2" type="button" class="btn btn-warning btn-lg btn-block"><i class="fa fa-calendar-o"></i> Planificación del Proyecto</a>
                <a id="btn-td3" type="button" class="btn btn-info btn-lg btn-block"><i class="fa fa-sitemap"></i> Diseño del Proyecto</a>
                <a id="btn-td4" type="button" class="btn btn-success btn-lg btn-block"><i class="fa fa-code"></i> Herramientas de Codificación</a>
                <a id="btn-td5" type="button" class="btn btn-danger btn-lg btn-block"><i class="fa fa-cubes"></i> Registro de Pruebas</a>
                </div>
                <br>
                <hr>


                
           </div>
       </div>
  </div>
<!--************************************************************************************Panel de tutorial 1-->   
 <div id="tutoriald1" name="tutoriald1" class="col-lg-12" style="display:none">
<div  class="col-lg-12">
<div class="row">
  <div  class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Tutoriales </h3>
         </div>
       <div  class="panel-body">
       <div id="carouselFav" class="carousel slide" data-ride="carousel">
       <div class="row">
        <div class="col-xs-offset-3 col-xs-6 ">
            <div class="carousel-inner"  >
                <div class="item active " >
                    <div class="carousel-content">
                     <h3 class="text-center text-info">Tutoriales de Primeros Pasos </h3>
                      <p class="text-center lead">Consulta los tutoriales de los primeros pasos de la Metodología</p>
                      </div>
                </div>
                <?php
                    $sqlDoc_PP = ("SELECT * FROM tutorial WHERE categoriaTutorial = 'Documentación-Primeros Pasos' AND activoT = 1");
                   $tutorial->readTutorialUser($sqlDoc_PP);
                   ?>
                </div>
        </div>
      </div>
     <a class="left carousel-control" href="#carouselFav" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carouselFav" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
  <!--************************************************************************************Panel de tutorial Planificacion-Doc -->
<div id="tutoriald2" name="tutoriald2" class="col-lg-12" style="display:none">
<div  class="col-lg-12">
<div class="row">
  <div  class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Tutoriales </h3>
         </div>
       <div  class="panel-body">
       <div id="carouselP" class="carousel slide" data-ride="carousel">
       <div class="row">
        <div class="col-xs-offset-3 col-xs-6 ">
            <div class="carousel-inner"  >
                <div class="item active " >
                    <div class="carousel-content">
                     <h3 class="text-center text-info">Tutoriales de Planificación </h3>
                      <p class="text-center lead">Consulta los tutoriales de la Planificación la Metodología</p>
                      </div>
                </div>
                <?php
                    $sqlDoc_PL = ("SELECT * FROM tutorial WHERE categoriaTutorial = 'Documentación-Planificación' AND activoT = 1");
                   $tutorial->readTutorialUser($sqlDoc_PL);
                   ?>
                </div>
        </div>
      </div>
     <a class="left carousel-control" href="#carouselP" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carouselP" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
    <!--************************************************************************************Panel de tutorial Diseño-Doc -->
<div id="tutoriald3" name="tutoriald3" class="col-lg-12" style="display:none">
<div  class="col-lg-12">
<div class="row">

  <div  class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Tutoriales </h3>
         </div>
       <div  class="panel-body">
       <div id="carouselD" class="carousel slide" data-ride="carousel">
       <div class="row">
        <div class="col-xs-offset-3 col-xs-6 ">
            <div class="carousel-inner"  >
                <div class="item active " >
                    <div class="carousel-content">
                     <h3 class="text-center text-info">Tutoriales de Diseño </h3>
                      <p class="text-center lead">Consulta los tutoriales de Diseño la Metodología</p>
                      </div>
                </div>
                <?php
                    $sqlDoc_D = ("SELECT * FROM tutorial WHERE categoriaTutorial = 'Documentación-Diseño' AND activoT = 1");
                   $tutorial->readTutorialUser($sqlDoc_D);
                   ?>
                </div>
        </div>
      </div>
     <a class="left carousel-control" href="#carouselD" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carouselD" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

  <!--************************************************************************************Panel de tutorial Codificación-Doc -->
 <div id="tutoriald4" name="tutoriald4" class="col-lg-12" style="display:none">
<div  class="col-lg-12">
<div class="row">
  <div  class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Tutoriales </h3>
         </div>
       <div  class="panel-body">
       <div id="carouselC" class="carousel slide" data-ride="carousel">
       <div class="row">
        <div class="col-xs-offset-3 col-xs-6 ">
            <div class="carousel-inner"  >
                <div class="item active " >
                    <div class="carousel-content">
                     <h3 class="text-center text-info">Tutoriales de Codificación </h3>
                      <p class="text-center lead">Consulta los tutoriales de la Codificación de la Metodología</p>
                      </div>
                </div>
                <?php
                    $sqlDoc_CD = ("SELECT * FROM tutorial WHERE categoriaTutorial = 'Documentación-Codificación' AND activoT = 1");
                   $tutorial->readTutorialUser($sqlDoc_CD);
                   ?>
                </div>
        </div>
      </div>
     <a class="left carousel-control" href="#carouselC" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carouselC" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
  

    <!--************************************************************************************Panel de tutorial Pruebas-Doc -->
<div id="tutoriald5" name="tutoriald5" class="col-lg-12" style="display:none">
<div  class="col-lg-12">
<div class="row">
  <div  class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Tutoriales </h3>
         </div>
       <div  class="panel-body">
       <div id="carouselPU" class="carousel slide" data-ride="carousel">
       <div class="row">
        <div class="col-xs-offset-3 col-xs-6 ">
            <div class="carousel-inner"  >
                <div class="item active " >
                    <div class="carousel-content">
                     <h3 class="text-center text-info">Tutoriales de Planificación </h3>
                      <p class="text-center lead">Consulta los tutoriales de las Pruebas la Metodología</p>
                      </div>
                </div>
                <?php
                    $sqlDoc_PU = ("SELECT * FROM tutorial WHERE categoriaTutorial = 'Documentación-Pruebas' AND activoT = 1");
                   $tutorial->readTutorialUser($sqlDoc_PU);
                   ?>
                </div>
        </div>
      </div>
     <a class="left carousel-control" href="#carouselPU" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carouselPU" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<div class="col-lg-16" style="display:none" id="panelt2">
   <!-- Panel de selccion de tutoriales de documentacion -->
      <div class="panel panel-primary">
          <div class="panel-heading">
              <h4 class="panel-title">Temas de metodologia</h4>
                 </div>
                    <div class="panel-body">
                      <a id="btn-td6" type="button" class="btn btn-primary btn-lg btn-block"><i class="fa fa-child"></i> Metodología XP</a>
                      <a id="btn-td7" type="button" class="btn btn-success btn-lg btn-block"><i class="fa fa-bolt"></i> Metodologías Ágiles</a>
                      <a id="btn-td8" type="button" class="btn btn-info btn-lg btn-block"><i class="fa fa-language"></i> Lenguaje UML</a>
                      <a id="btn-td9" type="button" class="btn btn-warning btn-lg btn-block"><i class="fa fa-globe"></i> Generales</a>
                
                
          </div>
      </div>
</div>
  <!--************************************************************************************Panel de tutorial MEtodologia XP -->
<div id="tutoriald6" name="tutoriald6" class="col-lg-12" style="display:none">
<div  class="col-lg-12">
<div class="row">
  <div  class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Tutoriales </h3>
         </div>
       <div  class="panel-body">
       <div id="carouselXP" class="carousel slide" data-ride="carousel">
       <div class="row">
        <div class="col-xs-offset-3 col-xs-6 ">
            <div class="carousel-inner"  >
                <div class="item active " >
                    <div class="carousel-content">
                     <h3 class="text-center text-info">Tutoriales de Metodologia XP </h3>
                      <p class="text-center lead">Consulta los tutoriales de la Metodología XP</p>
                      </div>
                </div>
                <?php
                    $sqlDoc_XP = ("SELECT * FROM tutorial WHERE categoriaTutorial = 'Metodología-XP' AND activoT = 1");
                   $tutorial->readTutorialUser($sqlDoc_XP);
                   ?>
                </div>
        </div>
      </div>
     <a class="left carousel-control" href="#carouselXP" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carouselXP" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>


  <!--************************************************************************************Panel de tutorial Metodologias Agiles -->
<div id="tutoriald7" name="tutoriald7" class="col-lg-12" style="display:none">
<div  class="col-lg-12">
<div class="row">
  <div  class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Tutoriales </h3>
         </div>
       <div  class="panel-body">
       <div id="carouselAG" class="carousel slide" data-ride="carousel">
       <div class="row">
        <div class="col-xs-offset-3 col-xs-6 ">
            <div class="carousel-inner"  >
                <div class="item active " >
                    <div class="carousel-content">
                     <h3 class="text-center text-info">Tutoriales de Metodologias Agiles </h3>
                      <p class="text-center lead">Consulta los tutoriales de  Metodologías</p>
                      </div>
                </div>
                <?php
                    $sqlDoc_AG = ("SELECT * FROM tutorial WHERE categoriaTutorial = 'Metodología-Agiles' AND activoT = 1");
                   $tutorial->readTutorialUser($sqlDoc_AG);
                   ?>
                </div>
        </div>
      </div>
     <a class="left carousel-control" href="#carouselAG" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carouselAG" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>



    <!--************************************************************************************Panel de tutorial UML -->
<div id="tutoriald8" name="tutoriald8" class="col-lg-12" style="display:none">
<div  class="col-lg-12">
<div class="row">
  <div  class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Tutoriales </h3>
         </div>
       <div  class="panel-body">
       <div id="carouselUML" class="carousel slide" data-ride="carousel">
       <div class="row">
        <div class="col-xs-offset-3 col-xs-6 ">
            <div class="carousel-inner"  >
                <div class="item active " >
                    <div class="carousel-content">
                     <h3 class="text-center text-info">Tutoriales de Metodologia XP </h3>
                      <p class="text-center lead">Consulta los tutoriales de la Metodología XP</p>
                      </div>
                </div>
                <?php
                    $sqlDoc_UML = ("SELECT * FROM tutorial WHERE categoriaTutorial = 'Metodología-UML' AND activoT = 1");
                   $tutorial->readTutorialUser($sqlDoc_UML);
                   ?>
                </div>
        </div>
      </div>
     <a class="left carousel-control" href="#carouselUML" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carouselUML" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
  <!--************************************************************************************Panel de tutorial General -->
<div id="tutoriald9" name="tutoriald9" class="col-lg-12" style="display:none">
<div  class="col-lg-12">
<div class="row">
  <div  class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Tutoriales </h3>
         </div>
       <div  class="panel-body">
       <div id="carouselGN" class="carousel slide" data-ride="carousel">
       <div class="row">
        <div class="col-xs-offset-3 col-xs-6 ">
            <div class="carousel-inner"  >
                <div class="item active " >
                    <div class="carousel-content">
                     <h3 class="text-center text-info">Tutorialess Generales </h3>
                      <p class="text-center lead">Consulta los tutoriales de Programación en General</p>
                      </div>
                </div>
                <?php
                    $sqlDoc_GN = ("SELECT * FROM tutorial WHERE categoriaTutorial = 'Metodología-General' AND activoT = 1");
                   $tutorial->readTutorialUser($sqlDoc_GN);
                   ?>
                </div>
        </div>
      </div>
     <a class="left carousel-control" href="#carouselGN" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carouselGN" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
 

  </div>
 
    




<?php include ("ModuloFooterP.php"); ?>