$(document).ready(function(){
    
    $('#slider').bxSlider({
        mode: 'horizontal',
        infiniteLoop: true,
        startingSlide: 0,
        speed: 2000,
        pause: 8000,
        auto: true,
        pager: false,
        //controls: true,
        /*prevImage: './img/flecha_dr.png',
        nextImage: './img/flecha_iz.png'*/
        //prevText: ' ',
        //nextText: ' '
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
            //form.submit();
            var nombre = $("#nombre").val();
            var apellido = $("#apellido").val();
            var email = $("#email").val();
            var comentario = $("#comentario").val();
            $.post('form.php',{
                'nombre'     : nombre,
                'apellido'   : apellido,
                'email'      :email,
                'comentario' :comentario},
                function(data){
                    if(data == 1){
                        $("#msg").removeClass("error");
                        $("#msg").addClass("success");
                        $("#msg").html("Nos contactaremos con usted");
                        $("#msg").fadeIn(1000, function(){
                            setTimeout("$(location).attr('href','.')",2000);
                        });
                }
            })
        }
        
    });
});