<?php
include('VistaHeaderAdmin.php');
include ('../modulos/ModuloPerfil.php');
$perfil = new Perfil($db);
$titulo_pagina = "Perfil de Usuario";
?>
<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">
        <h1>Perfil de Usuario <i class="fa fa-user"></i></h1>
        </div>
</div><hr>

<div class="row">
 <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">Editar Perfil</h4>
                    </div>
                    <div class="panel-body">
                   <table data-toggle="table">
                    <thead>
                        <tr>
                        <th>Usuario</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                       $query=("SELECT * FROM usuario WHERE idUsuario ='$id'");
                        $perfil->readPerfil($query);
                        ?>
                  </div>
                </div>
            </div>

	
</div>
<?php
include('VistaFooterAdmin.php');
?>