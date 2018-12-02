$(document).ready(function () {
    $('.close-popup').bind('click',function () {
        $(this).parent().parent().fadeOut();
    });
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items:3,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:1000,
        autoplayHoverPause:true
    });
})
setTimeout(function () {
    $('.message').fadeOut();
},5000);
