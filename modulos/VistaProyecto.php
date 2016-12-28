<?php
include ('ModuloHeaderP.php');
$titulo_pagina ="Proyectos";
?>
<div id="page-wrapper">
<div class="row">
        <div class="col-lg-12">
        <h1><?php  echo $titulo_pagina;   ?> <i class="fa fa-folder"></i></h1>
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
<?php

if (isset($_POST['crear'])){

$nombreProyecto = $_POST['nombreProyecto'];
$descripcionProyecto = $_POST['descripcionProyecto'];
$categoriaProyecto =  $_POST['categoriaProyecto'];
$categoriaOtra = $_POST['categoriaOtra'];

if($proyecto->createProyecto($nombreProyecto,$descripcionProyecto,$categoriaProyecto,$categoriaOtra,$idUrol)){
echo
'<div class="row">
   <div class="col-lg-16">
   <div class="alert alert-dismissable alert-success">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong>Exito! Un nuevo Proyecto fue creado!</strong></div>
   </div></div>';

    }
else {
echo
'<div class="row">
   <div class="col-lg-16">
   <div class="alert alert-dismissable alert-danger">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong> Oops!: Un Proyecto NO puede tener el mismo nombre que otro,  intenta cambiar el nombre.</strong></div>
   </div>
</div>';

    }
}


?>
<div class="panel panel-success">
 				<div class="panel-heading">
 					<h4 class="panel-title">Crea Tu Proyecto</h4>
                </div>
 					<div class="panel-body">
 						<div class="col-lg-12">		
 							<form role="form" action="VistaProyecto.php" method="post">
 								<div class="form-group">
                            	<label>Nombre del Proyecto</label>
                            	<input class="form-control" id="nombreProyecto" name="nombreProyecto" placeholder="Inserta Nombre de Proyecto" required>
                           		</div>
                           		<div class="form-group">
                            	<label>Descripción</label>
                            	<textarea class="form-control" rows="5" col="6" id="descripcionProyecto" name="descripcionProyecto" placeholder="Insetar Descripcion del Proyecto" required></textarea>
                           		</div>
                              <div class="form-group">
                              <label>Categoria</label>
                              <select class="form-control" name="categoriaProyecto" id="categoriaProyecto">
                              <option>Selccionar...</option>
                              <?php 
                              $documentacionAdmin->selectCategorias();
                              ?>
                              </select>
                              </div>
                              <div class="form-group">
                              <label>Nombre de Otra Categoria</label>
                              <input type="text" class="form-control" name="categoriaOtra" id="categoriaOtra" placeholder="Inserta una categoria unica"  >
                              </div>
                                                     
                        		<br>
                                <input type="submit" id="crear" name ="crear" value="Crear Proyecto"class="btn btn-success pull-middle">
                                <button type="reset" class="btn btn-danger pull-right" >Borrar Datos</button>
            			</form>
               </div>
            </div>
          </div>

 		</div>
     <div class="col-lg-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="panel-title">Información</h4></div>
          <div class="panel-body">
            <div class="col-lg-12">
              <div class="list-group">
                <a href="#" class="list-group-item">
                  <h4 class="list-group-item-heading">Nombre Del Proyecto</h4>
                  <p class="list-group-item-text">Identifica tu proyecto con un nombre,se sugiere que el nombre sea alusivo a su funcionamiento</p><p>Ejemplo: Sistema Administrativo de la Empresa EnRON </p>
                </a>
                <a href="#" class="list-group-item">
                  <h4 class="list-group-item-heading">Descripcion Del Proyecto</h4>
                  <p class="list-group-item-text">Utiliza el campo de descripcion para mencionar las caracteristicas principales de tu proyecto </p>
                </a>
                <a href="#" class="list-group-item">
                  <h4 class="list-group-item-heading">Categoria Del Proyecto</h4>
                  <p class="list-group-item-text">Utiliza las etiquetas para ayudar a clasificar tu proyecto por categoria</p><p> Ejemplo: administrativo, educativo, matenimiento, etc. </p>
                </a>
                <a href="#" class="list-group-item">
                  <h4 class="list-group-item-heading">Papelera </h4>
                  <p class="list-group-item-text">Todos los proyectos que has creados se almacenan incluso si los eliminaste,en la papelera podras restaurarlos a tu
                                                  lista de proyectos activos</p>
                </a>
              </div>
           </div>
           
         </div>
        </div>
    </div>
    <div class="col-lg-12" id="MisProyectos">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">Mis Proyectos</h4>
                    </div>
                    <div class="panel-body">
                 <table data-toggle="table">
                  <thead>
                    <tr>
                      <th class="info">Proyecto</th>
                      <th>Descripción</th>
                      <th>Categoria</th>
                      <th>Categoria Unica</th>
                      <th>Fecha de Inicio</th>
                      <th>Ultima Edición</th>
                      <th class="info">Activa</th>
                       <th class="danger">Desactiva</th>
                      <th class="warning">Editar</th>
                      <th class="danger">Borrar</th>
                     </tr>
                  </thead>
                 <tbody>
                        <?php
                       
                        $proyecto->readProyecto($idUrol);
                        ?>
                  </tbody>
                  </table>
                  <br>
                   <a href="VistaProyectoTrash.php" class="btn btn-info btn-lg "> Papelera <i class="fa fa-trash"></i> </a> 
                 </div>
                
            
                </div>
              </div>

 	</div>
    
 </div>

 
<?php include ("ModuloFooterP.php"); ?>

