$(document).ready(function(){

	  $('#pt1').click(function() {
        $('#panelt2').hide();
        $('#tutoriald1').hide();
        $('#tutoriald2').hide();
        $('#tutoriald3').hide();
        $('#tutoriald4').hide();
        $('#tutoriald5').hide();
        $('#tutoriald6').hide();
        $('#tutoriald7').hide();
        $('#tutoriald8').hide();
        $('#tutoriald9').hide();
        $('#panelt1').fadeToggle("slow");
    });
    $('#pt2').click(function() {
        $('#panelt1').hide();
        $('#tutoriald1').hide();
        $('#tutoriald2').hide();
        $('#tutoriald3').hide();
        $('#tutoriald4').hide();
        $('#tutoriald5').hide();
        $('#tutoriald6').hide();
        $('#tutoriald7').hide();
        $('#tutoriald8').hide();
        $('#tutoriald9').hide();
        $('#panelt2').fadeToggle("slow");
    });

    $('#btn-td1').click(function(){
        $('#tutoriald2').hide();
        $('#tutoriald3').hide();
        $('#tutoriald4').hide();
        $('#tutoriald5').hide();
        $('#tutoriald6').hide();
        $('#tutoriald7').hide();
        $('#tutoriald8').hide();
        $('#tutoriald9').hide();
        $('#tutoriald1').fadeToggle("slow");
    });
     $('#btn-td2').click(function(){
        $('#tutoriald1').hide();
        $('#tutoriald3').hide();
        $('#tutoriald4').hide();
        $('#tutoriald5').hide();
        $('#tutoriald6').hide();
        $('#tutoriald7').hide();
        $('#tutoriald8').hide();
        $('#tutoriald9').hide();
        $('#tutoriald2').fadeToggle("slow");
    });
      $('#btn-td3').click(function(){
        $('#tutoriald1').hide();
        $('#tutoriald2').hide();
        $('#tutoriald4').hide();
        $('#tutoriald5').hide();
        $('#tutoriald6').hide();
        $('#tutoriald7').hide();
        $('#tutoriald8').hide();
        $('#tutoriald9').hide();
        $('#tutoriald3').fadeToggle("slow");
    });
       $('#btn-td4').click(function(){
        $('#tutoriald1').hide();
        $('#tutoriald2').hide();
        $('#tutoriald3').hide();
        $('#tutoriald5').hide();
        $('#tutoriald6').hide();
        $('#tutoriald7').hide();
        $('#tutoriald8').hide();
        $('#tutoriald9').hide();
        $('#tutoriald4').fadeToggle("slow");
    });
        $('#btn-td5').click(function(){
        $('#tutoriald1').hide();
        $('#tutoriald2').hide();
        $('#tutoriald3').hide();
        $('#tutoriald4').hide();
        $('#tutoriald6').hide();
        $('#tutoriald7').hide();
        $('#tutoriald8').hide();
        $('#tutoriald9').hide();
        $('#tutoriald5').fadeToggle("slow");
    });

         $('#btn-td6').click(function(){
        $('#tutoriald1').hide();
        $('#tutoriald2').hide();
        $('#tutoriald3').hide();
        $('#tutoriald4').hide();
        $('#tutoriald5').hide();
        $('#tutoriald7').hide();
        $('#tutoriald8').hide();
        $('#tutoriald9').hide();
        $('#tutoriald6').fadeToggle("slow");
    });
        $('#btn-td7').click(function(){
        $('#tutoriald1').hide();
        $('#tutoriald2').hide();
        $('#tutoriald3').hide();
        $('#tutoriald4').hide();
        $('#tutoriald5').hide();
        $('#tutoriald6').hide();
        $('#tutoriald8').hide();
        $('#tutoriald9').hide();
        $('#tutoriald7').fadeToggle("slow");
    });
        $('#btn-td8').click(function(){
        $('#tutoriald1').hide();
        $('#tutoriald2').hide();
        $('#tutoriald3').hide();
        $('#tutoriald4').hide();
        $('#tutoriald5').hide();
        $('#tutoriald6').hide();
        $('#tutoriald7').hide();
        $('#tutoriald9').hide();
        $('#tutoriald8').fadeToggle("slow");
    });
        $('#btn-td9').click(function(){
        $('#tutoriald1').hide();
        $('#tutoriald2').hide();
        $('#tutoriald3').hide();
        $('#tutoriald4').hide();
        $('#tutoriald5').hide();
        $('#tutoriald6').hide();
        $('#tutoriald7').hide();
        $('#tutoriald8').hide();
       $('#tutoriald9').fadeToggle("slow");
    });

        $('#DOC1').click(function(){
        $('#panelDOC2').hide();
        $('#panelDOC3').hide();
        $('#panelDOC1').fadeToggle("slow");
    });
        $('#DOC2').click(function(){
        $('#panelDOC1').hide();
        $('#panelDOC3').hide();
        $('#panelDOC2').fadeToggle("slow");
    });
        $('#DOC3').click(function(){
        $('#panelDOC1').hide();
        $('#panelDOC2').hide();
        $('#panelDOC3').fadeToggle("slow");
    });

        $('#btn-fav').click(function(){
        $('#favTut').fadeToggle("slow");
        
    });
});