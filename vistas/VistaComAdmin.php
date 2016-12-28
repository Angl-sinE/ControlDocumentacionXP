<?php include('VistaHeaderAdmin.php');
 ?>
<div id="page-wrapper">

<div class="row">
   <div class="col-lg-16" id="exitoComent" style="display:none">
   <div class="alert alert-dismissable alert-success">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong >Exito! Comentario Enviado </strong></div>
</div></div>
<div class="row" id="errorComent" style="display:none">
   <div class="col-lg-16">
   <div class="alert alert-dismissable alert-danger">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong >Oops! No puedes repetir los comentarios</strong></div>
   </div>
</div>

	<div class="col-lg-12">
    		<h1> Comentarios </h1>
    	</div>

    	<div class="row">
    		<div class="col-lg-12">

    			 <div class="well">
                        <h4>Deja un Comentario de sugerencia o recomendación para los Usuarios:</h4>
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
                    </div>
                     <a  href="VistaComAdmin.php" type="button" class="btn btn-primary "><i class="fa fa-refresh"></i> Cargar Comentarios </a>  
                                                    
                 <br><br>
    		</div>
    	</div>
      <div class="row">
         <div class="container">
            <ul class="timeline">
            <li >
                    <div class="timeline-badge info"><i class="fa fa-comment"></i></div>
                    <div class="timeline-panel bg-info">
                      <?php $comentarios->readComentarioAdmin(); ?>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-badge warning"><i class="fa fa-comment"></i></div>
                    <div class="timeline-panel bg-warning">
                      <?php $comentarios->readComentarioUser(); ?>
                    </div>
                </li>
                                             
            </ul>
        </div>
      </div>



<?php 
include('VistaFooterAdmin.php');
?>