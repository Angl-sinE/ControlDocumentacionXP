<?php
include ('ModuloHeaderP.php');
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
 <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<div id="page-wrapper">
<div class="row">
        <div class="col-lg-12">
        <h1>Prueba <i class="fa fa-folder"></i></h1>
        <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Desde Aquí podrás crear tu proyecto, en la ventana Mis Proyectos se indican todos los proyectos
                      que has creado, en el panel de información se indica como llenar los campos que identifican
                      el proyecto.
                    </div>
        </div>
    </div>
       <hr>
 <div class="row">
 <div class="col-lg-6">

<div class="panel panel-success">
 				<div class="panel-heading">
 					<h4 class="panel-title">Crea Tu Proyecto</h4>
                </div>
 					<div class="panel-body">
 						<div class="col-lg-12">		
 							<form role="form" action="VistaProyecto.php" method="post">
 							

                            	<label>User</label>
                            	<input id="user" name="user" placeholder="Inserta">
                       		
    			</form>
               </div>
            </div>
          </div>
</div>
<div class="col-lg-6">
<div class="panel panel-success">
 				<div class="panel-heading">
 					<h4 class="panel-title">Mostrar</h4>
                </div>
 					<div class="panel-body">
 						<div class="col-lg-12">		
 							<form role="form" action="VistaProyecto.php" method="post">
 								<div class="form-group">
                            	<label>Nombre</label>
                            	<input class="form-control" id="nombre" name="nombre" placeholder="Inserta Nombre de Proyecto" required>
                           		</div>
                           		<div class="form-group">
                            	<label>Apellido</label>
                            	<input class="form-control" id="apellido" name="apellido" placeholder="Inserta Nombre de Proyecto" required>
                           		</div>
                           
            			</form>
               </div>
            </div>
          </div>

 		</div>
          
   

 	</div>
    
 </div>
  <script>
  $(function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#user" ).autocomplete({
      source: availableTags
    });
  });
  </script>


