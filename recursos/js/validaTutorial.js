$(document).ready(function(){


 $("#imagen").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; 
 
        if (/^image/.test( files[0].type)){ 
            var reader = new FileReader(); 
            reader.readAsDataURL(files[0]); 
 
            reader.onloadend = function(e){ 
                $("#previewImg").html('<img height="500" width="500" class="thumbnail img-responsive" src="'+e.target.result+'" alt="imagen">');
            }
        }
    });
 
$('#formaTutorial').submit(function(e){
 e.preventDefault();
var datos = $('#formaTutorial').serialize();
var formData = new FormData($(this)[0]);

$.ajax({
	url: "../modulos/ModuloFormAdminTutorial.php",
	type: "POST",
	data: formData,
	success:function(data,status,xhr){
		$('#exitoTut').fadeIn();
		$('#exito_msgTut').html(data);
		console.log("Datos: "+ data);
		  $('#formaTutorial').bootstrapValidator('resetForm', true);
	},
	error: function(jqXHR,status,errorThrown){
		$('#errorTut').fadeIn();
		$('#error_msgTut').html(data);
		console.log("Datos: "+ data);
		  $('#formaTutorial').bootstrapValidator('resetForm', true);

	},
	processData: false, 
	contentType: false
	
	
	});

});




});
