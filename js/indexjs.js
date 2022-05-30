/*---------- JQuery ----------*/

$(document).ready(function(){

    //Menu Burger
        $('.burger').click(function() {
            $(this).toggleClass('burger-open');
            $('.menu').toggleClass('is-open');
            return false;
        });
        $('.menu ul li a').click(function(event) {
            $('.menu').toggleClass('is-open');
            $('.burger').toggleClass('burger-open');
            event.stopPropagation();
        });

});        