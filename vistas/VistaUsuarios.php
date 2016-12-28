<?php
include ("VistaHeaderAdmin.php");

?>
<div id="page-wrapper">
	<div class="col-lg-12">
    		<h1>Ver Usuarios Registrados </h1>
    	</div>
    	 <div class="col-sm-9 col-md-9">
            <div class="panel panel-default ">
                <div class="panel-heading">
                    <h3 class="panel-title"> Usuarios  <i class="fa fa-users"></i></h3>
                </div>
                <div class="panel-body ">
                 <a  href="VistaUsuarios.php" type="button" class="btn btn-primary "><i class="fa fa-refresh"></i> </a>
                 <br><br>                     
                  <table data-toggle="table" class="bg-info">
                  <thead>
                    <tr>
                      <th>Usuario</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Correo</th>
                      <th>Tipo</th>
                      </tr>
                  </thead>
                 <tbody>
                        <?php
                        $usuario->readUsuarios();
                        ?>
                  </tbody>
                  </table>
                    
                </div>
            </div>
        </div>
   
</div>
<?php
include ("VistaFooterAdmin.php");
?>