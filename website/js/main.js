$(document).ready(function(){
    
    $('#slider').bxSlider({
        auto: true,
        speed: 1000
    });
    
    var contacto = $("#contactoBtn");
    var form = $("#contact-form form");
    var contactForm = $("#contact-form");
    var contactLink = $("#last-item");

    contactLink.click(function(){
        sacarBordes();
        $("#msg").attr("style","display:none");
        contactForm.modal({
            overlayCss: {backgroundColor:"#000000"},
            overlayClose: true,
            onShow: function(){
                form[0].reset();
            }
        });
    });
    
    
    function sacarBordes(){
        $(".input", form).each(function(){
            $(this).css("border", "0");
        });
    }
    function validar(){
        /*$(".input", form).each(function(){
            var elem = $(this);
            if( elem.val() == '' ){
                return elem.attr("class");
            }
        });***/
        if($("#nombre").val() == ''){
            return  "#nombre";
        }
        if($("#apellido").val() == ''){
            return "#apellido";
        }
        if($("#email").val() == ''){
            return "#email";
        }
        if($("#comentario").val() == ''){
            return "#comentario";
        }
        return 1;
    }
    
    $("#contactoBtn").click(function(){
        sacarBordes();
        var valor = validar();
        if ( valor != 1){
            $(valor).css("border","1px solid red");                   
            $("#msg").fadeIn(1000, function(){
                setTimeout("$('#msg').fadeOut(1000)",10000);
            });
        }else{
            form.submit();
        }
        
    });
    

});