$(document).ready(function(){
  // Variables generales 
  var progreso = 0;

   $('#p1').click(function() {
        $('#panel2').hide();
        $('#panel3').hide();
        $('#panel4').hide();
        $('#panel1').fadeToggle("slow");
    });
    $('#p2').click(function() {
        $('#panel1').hide();
        $('#panel3').hide();
        $('#panel4').hide();
        $('#panel2').fadeToggle("slow");
    });

    $('#p3').click(function() {
        $('#panel1').hide();
        $('#panel2').hide();
        $('#panel4').hide();
        $('#panel3').fadeToggle("slow");
    });

    $('#p4').click(function() {
        $('#panel1').hide();
        $('#panel2').hide();
        $('#panel3').hide();
        $('#panel4').fadeToggle("slow");
    });



//////////////// Proyecto 

$('#activaProyecto').click(function(){

});
/////////////// Planificacion //////////////////////////////////////////////////////////
$('#cancelaPlan').click(function(){
  $('#selectPlan').fadeOut("slow");
   $('#infoPlan').fadeIn("slow");
});

 $('#planificaIni').submit(function(e){
    
    e.preventDefault();
  
    $('#selectPlan').fadeOut("slow");
    $('#infoPlan').fadeIn("slow");
    var datos =$('#planificaIni').serialize();
   
     $.ajax({
      url: "ModuloFormPlan.php",
      type:"POST",
      data: datos,
      success: function(data,status,xhr)
      {
        $("#res_exito").fadeIn();
        $('#exito_msgPlan').html(data);
        console.log("Datos: "+ data);
       setTimeout(function(){
                       window.location.reload();
                   }, 2000); 

    },
      error: function(jqXHR,status,errorThrown)
      {
         $("#res_error").fadeIn();
         $('#error_msgPlan').html(data);
         
      }
    });


  });

/////////////////////////// Historias
  $('#formaHistoria').submit(function(e){
       e.preventDefault();
       var datos =$('#formaHistoria').serialize();
      
     $.ajax({
      url: "ModuloFormHistoria.php",
      type:"POST",
      data: datos,
      success: function(data,status,xhr)
      {
        $("#res_exito").fadeIn();
        $('#exito_msgPlan').html(data);
        console.log("Datos: "+ data);
        $('#formaHistoria').bootstrapValidator('resetForm', true);
         setTimeout(function(){
                       window.location.reload();
                   }, 3000);

        
      
      },
      error: function(jqXHR,status,errorThrown)
      {
         $("#res_error").fadeIn();
         $('#error_msgPlan').html(data);
         $('#formaHistoria').bootstrapValidator('resetForm', true);
          setTimeout(function(){
                       window.location.reload();
                   }, 7000);
      }
    });


  });
 /////////////////////////// Requisitos
  $('#formaRequisitos').submit(function(e){
       e.preventDefault();
       var datos =$('#formaRequisitos').serialize();
      
     $.ajax({
      url: "ModuloFormRequisitos.php",
      type:"POST",
      data: datos,
      success: function(data,status,xhr)
      {
        $("#res_exito").fadeIn();
        $('#exito_msgPlan').html(data);
        console.log("Datos: "+ data);
        $('#noFuncionales').val(''); 
        $('#funcionales').val('');
         setTimeout(function(){
                       window.location.reload();
                   }, 3000); 
            
      },
      error: function(jqXHR,status,errorThrown)
      {
         $("#res_error").fadeIn();
         $('#error_msgPlan').html(data);
         $('#formaRequisitos').bootstrapValidator('resetForm', true);
          setTimeout(function(){
                       window.location.reload();
                   }, 10000);
      }
    });


  }); 
/////////////// Diseño ///////////////////////////////////////////////////////////////
 $('#cancelaDiseno').click(function(){
  $('#selectDiseno').fadeOut("slow");
   $('#infoDiseno').fadeIn("slow");
});


 $('#disenoIni').submit(function(e){
      e.preventDefault();
    $('#selectDiseno').fadeOut("slow");
    $('#infoDiseno').fadeIn("slow");
    var datos =$('#disenoIni').serialize();
   
     $.ajax({
      url: "ModuloFormDiseno.php",
      type:"POST",
      data: datos,
      success: function(data,status,xhr)
      {
        $("#res_exito").fadeIn();
        $('#exito_msgPlan').html(data);
        console.log("Datos: "+ data);
         setTimeout(function(){
                       window.location.reload();
                    }, 2000);
       
       

      },
      error: function(jqXHR,status,errorThrown)
      {
         $("#res_error").fadeIn();
         $('#error_msgPlan').html(data);
         
      }
    });


  });
 /////////////////////////// Roles 
 $('#formaRoles').submit(function(e){
       e.preventDefault();
       var datos =$('#formaRoles').serialize();
      
     $.ajax({
      url: "ModuloFormRoles.php",
      type:"POST",
      data: datos,
      success: function(data,status,xhr)
      {
        $("#res_exito").fadeIn();
        $('#exito_msgPlan').html(data);
        console.log("Datos: "+ data);
        $('#formaRoles').bootstrapValidator('resetForm', true);
         setTimeout(function(){
                       window.location.reload();
                    }, 2000); 
            
      },
      error: function(jqXHR,status,errorThrown)
      {
         $("#res_error").fadeIn();
         $('#error_msgPlan').html(data);
         $('#formaRoles').bootstrapValidator('resetForm', true);
          setTimeout(function(){
                       window.location.reload();
                    }, 3000);
      }
    });


  }); 
/////////////////////////// Caso de Uso
$('#formaCasoUso').submit(function(e){
       e.preventDefault();
       var datos =$('#formaCasoUso').serialize();
      
     $.ajax({
      url: "ModuloFormCasoUso.php",
      type:"POST",
      data: datos,
      success: function(data,status,xhr)
      {
        $("#res_exito").fadeIn();
        $('#exito_msgPlan').html(data);
        console.log("Datos: "+ data);
        $('#formaCasoUso').bootstrapValidator('resetForm', true);
        setTimeout(function(){
                       window.location.reload();
                    }, 2000);    
      },
      error: function(jqXHR,status,errorThrown)
      {
         $("#res_error").fadeIn();
         $('#error_msgPlan').html(data);
         $('#formaCasoUso').bootstrapValidator('resetForm', true);
          setTimeout(function(){
                       window.location.reload();
                    }, 3000);
      }
    });


  });

/////////////////////////// Diagramas

 $("#diagramaImg").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; 
 
        if (/^image/.test( files[0].type)){ 
            var reader = new FileReader(); 
            reader.readAsDataURL(files[0]); 
 
            reader.onloadend = function(e){ 
                $("#previewDiagrama").html('<img height="500" width="500" class="thumbnail img-responsive" src="'+e.target.result+'" alt="imagen">');
            }
        }
    });




$('#formaDiagrama').submit(function(e){
       e.preventDefault();
       var formData = new FormData($(this)[0]);
      
     $.ajax({
      url: "ModuloFormDiagrama.php",
      type:"POST",
      data: formData,
      success: function(data,status,xhr)
      {
        $("#res_exito").fadeIn();
        $('#exito_msgPlan').html(data);
        console.log("Datos: "+ data);
        $('#formaDiagrama').bootstrapValidator('resetForm', true);
         setTimeout(function(){
                       window.location.reload();
                    }, 3000);
            
      },
      error: function(jqXHR,status,errorThrown)
      {
         $("#res_error").fadeIn();
         $('#error_msgPlan').html(data);
         $('#formaDiagrama').bootstrapValidator('resetForm', true);
          setTimeout(function(){
                       window.location.reload();
                    }, 3000);
      },
      processData: false, 
      contentType: false
    });


  });


/////////////// Codificacion //////////////////////////////////////////////////////////
  $('#cancelaCode').click(function(){
  $('#selectCode').fadeOut("slow");
   $('#infoCode').fadeIn("slow");
});

  $('#codificaIni').submit(function(e){
     e.preventDefault();
    $('#selectCode').fadeOut("slow");
    $('#infoCode').fadeIn("slow");
    var datos =$('#codificaIni').serialize();
   
     $.ajax({
      url: "ModuloFormCode.php",
      type:"POST",
      data: datos,
      success: function(data,status,xhr)
      {
        $("#res_exito").fadeIn();
        $('#exito_msgPlan').html(data);
        console.log("Datos: "+ data);
         setTimeout(function(){
                       window.location.reload();
                    }, 2000);
      },
      error: function(jqXHR,status,errorThrown)
      {
         $("#res_error").fadeIn();
         $('#error_msgPlan').html(data);
         alert("NADA!");
      }
    });


  });

////////////// Lenguajes 
$('#formaLenguaje').submit(function(e){
       e.preventDefault();
       var datos =$('#formaLenguaje').serialize();
      
     $.ajax({
      url: "ModuloFormLenguaje.php",
      type:"POST",
      data: datos,
      success: function(data,status,xhr)
      {
        $("#res_exito").fadeIn();
        $('#exito_msgPlan').html(data);
        console.log("Datos: "+ data);
         $('#formaLenguaje').bootstrapValidator('resetForm', true);
           setTimeout(function(){
                       window.location.reload();
                    }, 3000);
       
            
      },
      error: function(jqXHR,status,errorThrown)
      {
         $("#res_error").fadeIn();
         $('#error_msgPlan').html(data);
         $('#formaLenguaje').bootstrapValidator('resetForm', true);
           setTimeout(function(){
                       window.location.reload();
                    }, 3000);
      }
    });


  }); 


/////////////// Pruebas //////////////////////////////////////////////////////////
  $('#cancelaPrueba').click(function(){
  $('#selectPrueba').fadeOut("slow");
   $('#infoPrueba').fadeIn("slow");
});
  $('#pruebaIni').submit(function(e){
     e.preventDefault();
    $('#selectPrueba').fadeOut("slow");
    $('#infoPrueba').fadeIn("slow");
    var datos =$('#pruebaIni').serialize();
   
     $.ajax({
      url: "ModuloFormPrueba.php",
      type:"POST",
      data: datos,
      success: function(data,status,xhr)
      {
        $("#res_exito").fadeIn();
        $('#exito_msgPlan').html(data);
        console.log("Datos: "+ data);
         setTimeout(function(){
                       window.location.reload();
                    }, 2000);
      },
      error: function(jqXHR,status,errorThrown)
      {
         $("#res_error").fadeIn();
         $('#error_msgPlan').html(data);
        
      }
    });


  });

$('#formaPrueba').submit(function(e){
       e.preventDefault();
       var datos =$('#formaPrueba').serialize();
      
     $.ajax({
      url: "ModuloFormPruebaUser.php",
      type:"POST",
      data: datos,
      success: function(data,status,xhr)
      {
        $("#res_exito").fadeIn();
        $('#exito_msgPlan').html(data);
        console.log("Datos: "+ data);
         $('#formaPrueba').bootstrapValidator('resetForm', true);
         setTimeout(function(){
                       window.location.reload();
                    }, 3000);
       
       
            
      },
      error: function(jqXHR,status,errorThrown)
      {
         $("#res_error").fadeIn();
         $('#error_msgPlan').html(data);
         $('#formaPrueba').bootstrapValidator('resetForm', true);
         setTimeout(function(){
                       window.location.reload();
                    }, 7000);
       
      }
    });


  }); 

//////////////////////////////////////// Comentarios
$('#formaComent').submit(function(e){
    e.preventDefault();
    var datos = $('#formaComent').serialize();
    $.ajax({
      url: "ModuloFormAdminComent.php",
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
    



});
