<?php 
include ('ModuloHeaderP.php');


?>
<div id="page-wrapper">
<div class="row">
   <div class="col-lg-12">
                    <h1>Comentarios y Sugerencias <i class="fa fa-comment"></i></h1>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       Desde aquí podrás ver y responder a  comentarios, consejos y recomendaciones  del Administrador/Tutor/Jefe de Proyectos para mejorar y continuar aprendiendo sobre
                       la documentación.
                    </div>
                </div>
                </div><hr>

         <div class="row">
        <div class="col-lg-12">

   <div class="row">
   <div class="col-lg-12" id="exitoComent" style="display:none">
   <div class="alert alert-dismissable alert-success">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong >Exito! Comentario Enviado </strong></div>
    </div>
    </div>
   <div class="row" id="errorComent" style="display:none">
   <div class="col-lg-12">
   <div class="alert alert-dismissable alert-danger">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong >Oops! No puedes repetir los comentarios</strong></div>
   </div>
</div>

           <div class="well">
                        <h4>Agrega Tu Comentario </h4>
                        <form role="form"  id="formaComent" name="formaComent">
                            <div class="form-group">
                                <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                            <input type="hidden"   id="idUsuario" name="idUsuario" value="<?php echo $idUrol; ?>" >
                            </div>
                             <input type="submit" id="comentar" name ="comentar" value="Agregar" class="btn btn-success pull-middle">
                             <button type="reset" class="btn btn-danger pull-right" >Borrar </button>
                        </form>
                    </div><br><br>
                     <a  href="VistaComents.php" type="button" class="btn btn-primary "><i class="fa fa-refresh"></i> Cargar Comentarios </a>  
                    </div>

                        </div> 

                  
    <div class="container">
            <ul class="timeline">
            <li >
                    <div class="timeline-badge warning"><i class="fa fa-comment"></i></div>
                    <div class="timeline-panel bg-info">
                      <?php $comentarios->readComentarioUser(); ?>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-badge info"><i class="fa fa-comment"></i></div>
                    <div class="timeline-panel bg-warning">
                      <?php $comentarios->readComentarioAdmin(); ?>
                    </div>
                </li>
                 
                              
            </ul>
        </div>               
<?php 
include ('ModuloFooterP.php');

?>