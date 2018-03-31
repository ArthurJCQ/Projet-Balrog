$(document).ready(function(){

    $(".bar-1 .bar").progress();
    $(".bar-2 .bar").progress();
    $(".bar-3 .bar").progress();
    $(".bar-hero .bar").progress();
});

var degat=100;
$(document).ready(function(){




    $("#animEn1").click(function(){


        $("#animAl").animate({bottom: '30vh'}, "slow").animate({bottom: '70vh', left: '35%'},"fast").animate({bottom: '5vh', left: '50%'});

        $("#msg").text(degat).fadeIn('slow',5000);
        window.setTimeout(function(){


            blink(1000, 200, "#animEn1");

            var percent =  $(".bar-1 .bar").data("health") - degat;
            $(".bar-1 .bar").data("health", percent);
            $(".bar-1 .bar").progress();
            $("#msg").text("").fadeIn('slow',5000);
        }, 700);



    });


    $("#animEn2").click(function(){


        $("#animAl").animate({bottom: '30vh'}, "slow").animate({bottom: '75vh'},"fast").animate({bottom: '5vh'});

        $("#msg").text(degat).fadeIn('slow',5000);

        window.setTimeout(function(){
            blink(1000, 200, "#animEn2");
            var percent =  $(".bar-2 .bar").data("health") - degat;
            $(".bar-2 .bar").data("health",percent);
            $(".bar-2 .bar").progress();

            $("#msg").text("").fadeIn('slow',5000);

        }, 700);
    });
    $("#animEn3").click(function(){


        $("#animAl").animate({bottom: '30vh'}, "slow").animate({bottom: '70vh', left:'65%'},"fast").animate({bottom: '5vh', left:'50%'});

        $("#msg").text(degat).fadeIn('slow',5000);

        window.setTimeout(function(){
            blink(1000, 200, "#animEn3");
            var percent =  $(".bar-3 .bar").data("health") - degat;
            $(".bar-3 .bar").data("health",percent);
            $(".bar-3 .bar").progress();

            $("#msg").text("").fadeIn('slow',5000);

        }, 700);
    });
});


//Gestion de la barre de vie
(function ( $ ) {
    $.fn.progress = function() {
        var percent = this.data("health");

        this.css("width", percent+"%");
        if (percent<=0){
            this.parent().parent().css("filter", "invert(100%)");
            this.parent().parent().data("isalive",0);
        }
        else if(percent<25){
            this.css("background-color", "red");
        }else if(percent<50){
            this.css("background-color", "orange");
        }else{
            this.css("background-color", "#03AB70");
        }


        if($(".bar-1 .bar").data("health")+$(".bar-2 .bar").data("health")+$(".bar-3 .bar").data("health")<=0){
            $(".next").css("visibility","visible");

        }

    };
}( jQuery ));

//Clignotement des personnages après degats
function blink(time, interval, enm){
    var timer =
        window.setInterval(function(){$(enm).css("opacity", "0.1");
            window.setTimeout(function(){
                $(enm).css("opacity", "1");
            }, 100);
        }, interval);
    window.setTimeout(function(){clearInterval(timer);}, time);
}


//Partie à remplacer
//definit les degats du hero
