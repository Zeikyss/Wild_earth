/*---------- JQuery ----------*/

$(document).ready(function(){

    //Menu Burger
        $('.burger').click(function() {
            $(this).toggleClass('burger-open');
            $('.menu').toggleClass('is-open');
        });
        $('.menu ul li a').click(function() {
            $('.menu').toggleClass('is-open');
            $('.burger').toggleClass('burger-open');
        });

});        