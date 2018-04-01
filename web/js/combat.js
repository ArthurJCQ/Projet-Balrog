$(document).ready(function(){

    $(".bar-1 .bar").progress();
    $(".bar-2 .bar").progress();
    $(".bar-3 .bar").progress();
    $(".bar-hero .bar").progress();



});

var degat=$("#myContainer #animAl").data("dmg");

var dmgEn1=$("#monster #animEn1").data("dmg");
var dmgEn2=$("#monster #animEn2").data("dmg");
var dmgEn3=$("#monster #animEn3").data("dmg");



var total = $(".bar-1 .bar").data("health")+$(".bar-2 .bar").data("health")+$(".bar-3 .bar").data("health");

$(document).ready(function(){

if($(".bar-hero .bar").data("health")<=0){
    alert("Vous avez perdu ...")
}
});


$("#animAl").click(function () {
    healAl();
});



        $("#animEn1").click(function () {
            total = total - degat;

            attAl1();

            $("#msg").text(degat).fadeIn('slow', 5000);


        });


        $("#animEn2").click(function () {
            total = total - degat;

            attAl2();
            $("#msg").text(degat).fadeIn('slow', 5000);


        });


        $("#animEn3").click(function () {
            total = total - degat;

            attAl3();
            $("#msg").text(degat).fadeIn('slow', 5000);




        });


function roundEn() {
if($(".bar-1 .bar").data("health")>0) {
    window.setTimeout(function () {
        attEn1();
    }, 700);
}
if ($(".bar-2 .bar").data("health")>0) {
    window.setTimeout(function () {
        attEn2();

    }, 1400);
}
if($(".bar-3 .bar").data("health")>0) {
    window.setTimeout(function () {
        attEn3();
    }, 2100);
}
      }





//Gestion de la barre de vie
(function ( $ ) {
    $.fn.progress = function() {
        var percent = this.data("health");

        this.css("width", percent+"%");
        if (percent<=0){
            this.parent().parent().css("filter", "invert(100%)");
        }
        else if(percent<25){
            this.css("background-color", "red");
        }else if(percent<50){
            this.css("background-color", "orange");
        }else{
            this.css("background-color", "#03AB70");
        }


        if(total<=0){
            $(".next").css("visibility","visible");

        }

        if($(".bar-hero .bar").data("health")<=0){

            $(".loss").css("visibility","visible");
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


//attaque En1
function attAl1() {
    $("#animAl").animate({bottom: '30vh'}, "slow").animate({
        bottom: '70vh',
        left: '35%'
    }, "fast").animate({bottom: '5vh', left: '50%'});


    window.setTimeout(function () {


        blink(1000, 200, "#animEn1");

        var percent = $(".bar-1 .bar").data("health") - degat;
        $(".bar-1 .bar").data("health", percent);
        $(".bar-1 .bar").progress();
        $("#msg").text("").fadeIn('slow', 5000);
    }, 700);
    window.setTimeout(function () {
        roundEn();
    }, 1400);
}


function attAl2() {
    $("#animAl").animate({bottom: '30vh'}, "slow").animate({bottom: '75vh'}, "fast").animate({bottom: '5vh'});


    window.setTimeout(function () {
        blink(1000, 200, "#animEn2");
        var percent = $(".bar-2 .bar").data("health") - degat;
        $(".bar-2 .bar").data("health", percent);
        $(".bar-2 .bar").progress();

        $("#msg").text("").fadeIn('slow', 5000);

    }, 700);
    window.setTimeout(function () {
        roundEn();
    }, 1400);
}


function attAl3() {

    $("#animAl").animate({bottom: '30vh'}, "slow").animate({
        bottom: '70vh',
        left: '65%'
    }, "fast").animate({bottom: '5vh', left: '50%'});


    window.setTimeout(function () {
        blink(1000, 200, "#animEn3");
        var percent = $(".bar-3 .bar").data("health") - degat;

        $(".bar-3 .bar").data("health", percent);
        $(".bar-3 .bar").progress();

        $("#msg").text("").fadeIn('slow', 5000);

    }, 700);
    window.setTimeout(function () {
        roundEn();
    }, 1400);
}





function attEn1() {
    $("#animEn1").animate({top: '30vh'}, "slow").animate({
        top: '70vh',
        right: '35%'
    }, "fast").animate({top: '5vh', right: '50%'});


    window.setTimeout(function () {


        blink(1000, 200, "#animAl");

        var percent = $(".bar-hero .bar").data("health") - dmgEn1;
        $(".bar-hero .bar").data("health", percent);
        $(".heal").text(percent);
        $(".bar-hero .bar").progress();
        $("#msg").text("").fadeIn('slow', 5000);
    }, 700);

}


function attEn2() {
    $("#animEn2").animate({top: '30vh'}, "slow").animate({top: '75vh'}, "fast").animate({top: '5vh'});


    window.setTimeout(function () {
        blink(1000, 200, "#animAl");
        var percent = $(".bar-hero .bar").data("health") - dmgEn2;
        $(".bar-hero .bar").data("health", percent);
        $(".heal").text(percent);

        $(".bar-hero .bar").progress();

        $("#msg").text("").fadeIn('slow', 5000);

    }, 700);
}


function attEn3() {

    $("#animEn3").animate({top: '30vh'}, "slow").animate({
        top: '70vh',
        right: '65%'
    }, "fast").animate({top: '5vh', right: '50%'});


    window.setTimeout(function () {
        blink(1000, 200, "#animAl");
        var percent = $(".bar-hero .bar").data("health") - dmgEn3;

        $(".bar-hero .bar").data("health", percent);
        $(".heal").text(percent);

        $(".bar-hero .bar").progress();

        $("#msg").text("").fadeIn('slow', 5000);

    }, 700);

}



function healAl() {

    var percent=$(".bar-hero .bar").data("health");
    percent=percent+50;
    $(".bar-hero .bar").data("health",percent);
    $(".heal").text(percent);

    $(".bar-hero .bar").progress();

    roundEn();
}