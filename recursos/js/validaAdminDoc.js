$(document).ready(function(){

	$('#nuevoDiagrama').click(function(){
		 $('#registroDiagrama').fadeToggle("slow");
	});
	$('#nuevoLenguaje').click(function(){
		 $('#registroLenguaje').fadeToggle("slow");
	});



	$('#nuevoPrueba').click(function(){
		 $('#registroPrueba').fadeToggle("slow");
	});


	$('#nuevoTarea').click(function(){
		 $('#registroTarea').fadeToggle("slow");
	});
	
	$('#nuevoTutorial').click(function(){
		 $('#registroTutorial').fadeToggle("slow");
	});
	$('#nuevoCategoria').click(function(){
		 $('#registroCategoria').fadeToggle("slow");
	});

/////////////////// Pasando los Valores de los diagramas	
	$('#formaDiagrama').submit(function(e){
		e.preventDefault();
		
		var tipoDiagrama = $('#tipoDiagrama').val();
		var funcionDiagrama = $('#funcionDiagrama').val();
 		var postData = 'nombre='+tipoDiagrama+'&funcion='+funcionDiagrama;
 		var datos = $('#formaDiagrama').serialize();
		$.ajax({
			url: "../modulos/ModuloFormAdminD.php",
			type: "POST",
			data: datos,
			success: function(data,status, xhr){
				$("#exitoD").fadeIn();
				 console.log("Registro Exitoso: "+ data);
				$('#exito_msgD').html(data);
				$('#tipoDiagrama').val('');
        		$('#funcionDiagrama').val(''); 

			},
			error: function(jqXHR, status, errorThrown){
				$("#errorD").fadeIn();
				$('#error_msgD').html(data);
				$('#tipoDiagrama').val('');
        		$('#funcionDiagrama').val(''); 
        		
			}


		});
	
	});
/////////////////// Pasando los Valores del lenguaje
		$('#formaLenguaje').submit(function(e){
		e.preventDefault();
		
		var nombreLenguaje = $('#nombreLenguaje').val();
		var tipoLenguaje = $('#tipoLenguaje').val();
		var desLenguaje = $('#desLenguaje').val();
 		var datos = $('#formaLenguaje').serialize();
		$.ajax({
			url: "../modulos/ModuloFormAdminL.php",
			type: "POST",
			data: datos,
			success: function(data,status, xhr){
				$("#exitoL").fadeIn();
				 console.log("Registro Exitoso: "+ data);
				$('#exito_msgL').html(data);
				$('#nombreLenguaje').val('');
        		$('#tipoLenguaje').val('');
        		$('#desLenguaje').val(''); 

			},
			error: function(jqXHR, status, errorThrown){
				$("#errorL").fadeIn();
				$('#error_msgL').html(data);
				$('#nombreLenguaje').val('');
        		$('#tipoLenguaje').val('');
        		$('#desLenguaje').val('');  
        		
			},
			cache: false
		});
	
	});
/////////////////// Pasando los Valores de la prueba	
	$('#formaPrueba').submit(function(e){
		e.preventDefault();
		var datos = $('#formaPrueba').serialize();
		$.ajax({
			url: "../modulos/ModuloFormAdminP.php",
			type: "POST",

			data: datos,
			success: function(data,status, xhr){
				$("#exitoP").fadeIn();
				 console.log("Registro Exitoso: "+ data);
				$('#exito_msgP').html(data);
				$('#tipoPrueba').val('');
        		$('#desPrueba').val(''); 

			},
			error: function(jqXHR, status, errorThrown){
				$("#errorP").fadeIn();
				$('#error_msgP').html(data);
				$('#tipoPrueba').val('');
        		$('#desPrueba').val('');   
        		
			}


		});
	
	});

/////////////////// Pasando los Valores de las Tareas

	$('#formaTarea').submit(function(e){
		e.preventDefault();
		var datos = $('#formaTarea').serialize();
		$.ajax({
			url: "../modulos/ModuloFormAdminTarea.php",
			type: "POST",
			data: datos,
			success: function(data,status, xhr){
				$("#exitoT").fadeIn();
				 console.log("Registro Exitoso: "+ data);
				$('#exito_msgT').html(data);
				$('#nombreTarea').val('');
        		$('#categoriaTarea').val('');
        		$('#prioridadTarea').val('');
        		$('#desTarea').val(''); 

			},
			error: function(jqXHR, status, errorThrown){
				$("#errorT").fadeIn();
				 console.log("Registro Exitoso: "+ data);
				$('#error_msgT').html(data);
				$('#nombreTarea').val('');
        		$('#categoriaTarea').val('');
        		$('#prioridadTarea').val('');
        		$('#desTarea').val(''); 
        		
			}


		});
	
	});

	$('#formaComent').submit(function(e){
		e.preventDefault();
		var datos = $('#formaComent').serialize();
		$.ajax({
			url: "../modulos/ModuloFormAdminComent.php",
			type: "POST",
			data: datos,
			success: function(data,status, xhr){
				 $('#exitoComent').fadeIn();
				 console.log("Registro Exitoso: "+ data);
				$('#comentario').val('');
        		        		

			},
			error: function(jqXHR, status, errorThrown){
				$('#errorComent').fadeIn();
				 console.log("Registro Exitoso: "+ data);
				$('#comentario').val(''); 
        		
			}


		});
	
	});
		
		$('#formaCategoria').submit(function(e){
		e.preventDefault();
		var datos = $('#formaCategoria').serialize();
		$.ajax({
			url: "../modulos/ModuloFormAdminCategoria.php",
			type: "POST",
			data: datos,
			success: function(data,status, xhr){
				$("#exitoCat").fadeIn();
				 console.log("Registro Exitoso: "+ data);
				$('#exito_msgCat').html(data);
				$('#nombre').val('');
        		 

			},
			error: function(jqXHR, status, errorThrown){
				$("#errorCat").fadeIn();
				 console.log("Registro Exitoso: "+ data);
				$('#error_msgCat').html(data);
				$('#nombre').val('');
        		        		
			}


		});
	
	});



});