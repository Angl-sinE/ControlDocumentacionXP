$(document).ready(function(){
var progreso = 0;

///////////////////////////////// planificacion
  $('#formaConfirmaPlan').submit(function(e){
    	e.preventDefault();
    	
    	
    		progreso +=25;
   			$('.progress-bar').width(progreso +'%');
   			var datos =$('#formaConfirmaPlan').serialize();
    	  $.ajax({
    	  	url:"ModuloConfirmaPlan.php",
    	  	type:"POST",
    	  	data:datos,
    	  	beforeSend:function(request){
    	  		mensaje= "Una vez que confirmes la planificación no podrias editar de los registros, ¿Deseas confirmar la Planificación?";
    	  		if (confirm(mensaje)) {
    	  			return true;
    	  		}
    	  		else{
    	  			return false;
    	  		}
    	  	},
    	  	success:function(data,status,xhr){
    	  		$('#panel1').fadeOut();
    	  		console.log("datos:"+ data);
    	  		$("#res_exito").fadeIn();
        		$('#exito_msgPlan').html(data);

    	  	},
    	  	 error: function(jqXHR,status,errorThrown){
    	  	 	$("#res_error").fadeIn();
        		$('#error_msgPlan').html(data);
        		console.log("datos:"+ data);

    	  	 }
     
    	  });
   	  
    });

///////////////////////////////// diseño
$('#formaConfirmaDis').submit(function(e){
    	e.preventDefault();
    	
    	
    		progreso +=25;
   			$('.progress-bar').width(progreso +'%');
   			
   			var datos =$('#formaConfirmaDis').serialize();
    	  $.ajax({
    	  	url:"ModuloConfirmaDis.php",
    	  	type:"POST",
    	  	data:datos,
    	  	beforeSend:function(request){
    	  		mensaje= "Una vez que confirmes el Diseño no podrias editar de los registros, ¿Deseas confirmar el Diseño?";
    	  		if (confirm(mensaje)) {
    	  			return true;
    	  		}
    	  		else{
    	  			return false;
    	  		}
    	  	},
    	  	success:function(data,status,xhr){
    	  		$('#panel2').fadeOut();
    	  		console.log("datos:"+ data);
    	  		$("#res_exito").fadeIn();
        		$('#exito_msgPlan').html(data);

    	  	},
    	  	 error: function(jqXHR,status,errorThrown){
    	  	 	$("#res_error").fadeIn();
        		$('#error_msgPlan').html(data);
        		console.log("datos:"+ data);

    	  	 }
     
    	  });
   	  
    });
    ///////////////////////////////// codificacion
$('#formaConfirmaCode').submit(function(e){
    	e.preventDefault();
    	
    	
    		progreso +=25;
   			$('.progress-bar').width(progreso +'%');
   			
   			var datos =$('#formaConfirmaCode').serialize();
    	  $.ajax({
    	  	url:"ModuloConfirmaCode.php",
    	  	type:"POST",
    	  	data:datos,
    	  	beforeSend:function(request){
    	  		mensaje= "Una vez que confirmes la Codificación no podrias editar de los registros, ¿Deseas confirmar la Codificación?";
    	  		if (confirm(mensaje)) {
    	  			return true;
    	  		}
    	  		else{
    	  			return false;
    	  		}
    	  	},
    	  	success:function(data,status,xhr){
    	  		$('#panel3').fadeOut();
    	  		console.log("datos:"+ data);
    	  		$("#res_exito").fadeIn();
        		$('#exito_msgPlan').html(data);

    	  	},
    	  	 error: function(jqXHR,status,errorThrown){
    	  	 	$("#res_error").fadeIn();
        		$('#error_msgPlan').html(data);
        		console.log("datos:"+ data);

    	  	 }
     
    	  });
   	  
    });
///////////////////////////////// pruebas
$('#formaConfirmaPrueba').submit(function(e){
    	e.preventDefault();
    	
    	
    		progreso +=25;
   			$('.progress-bar').width(progreso +'%');
   			/*if (progreso = 100) {
   				$('#finalizado').fadeIn();
   			};*/
   			var datos =$('#formaConfirmaPrueba').serialize();
    	  $.ajax({
    	  	url:"ModuloConfirmaPrueba.php",
    	  	type:"POST",
    	  	data:datos,
    	  	beforeSend:function(request){
    	  		mensaje= "Una vez que confirmes las pruebas no podras editar de los registros, ¿Deseas confirmar las Pruebas?";
    	  		if (confirm(mensaje)) {
    	  			return true;
    	  		}
    	  		else{
    	  			return false;
    	  		}
    	  	},
    	  	success:function(data,status,xhr){
    	  		$('#panel4').fadeOut();
    	  		console.log("datos:"+ data);
    	  		$("#res_exito").fadeIn();
        		$('#exito_msgPlan').html(data);
                $('#conD').fadeIn("slow");
                 

    	  	},
    	  	 error: function(jqXHR,status,errorThrown){
    	  	 	$("#res_error").fadeIn();
        		$('#error_msgPlan').html(data);
        		console.log("datos:"+ data);

    	  	 }
     
    	  });
   	  
    });

$('#formaConfirmaDoc').submit(function(e){
    e.preventDefault();
    var datos = $('#formaConfirmaDoc').serialize();
    $.ajax({
        url:"ModuloConfirmaDoc.php",
        type:"POST",
        data:datos,
        success: function(data,status,xhr){
                console.log("datos:"+ data);
                $("#res_exito").fadeIn();
                $('#exito_msgPlan').html(data);
                $('#finalizado').fadeIn();
        },
        error: function (jqXHR,status,errorThrown){
            $("#res_error").fadeIn();
            $('#error_msgPlan').html(data);
            console.log("datos:"+ data);

        }

    });
});


  

});