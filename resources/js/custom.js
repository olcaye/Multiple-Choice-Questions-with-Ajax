// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';
import 'fullpage.js'

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: false,
    pagination: {
        el: ".survive-pagination",
        clickable: true,
        renderBullet: function (index, className) {
            if (index < 9)
             return '<span class="' + className + '">' + ('0') + (index + 1)+ "</span>";
            else {
                return '<span class="' + className + '">' + (index + 1)+ "</span>";
            }
        },
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    on: {
        slideChange: function (el) {
            $('.swiper-slide').each(function () {
                var youtubePlayer = $(this).find('iframe').get(0);
                if (youtubePlayer) {
                    youtubePlayer.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
                }
            });
        },
    },
});




$( "#searchButton" ).on( "mouseenter", function() {
        $( "#searchArea" ).stop().animate({
            opacity: 1,
            width: "300px"
            },  'fast', function() {
        });
    }) .on( "mouseleave", function() {
    $( "#searchArea" ).stop().animate({
        opacity: 0,
        width: "0"
    },  'fast', function() {
        $(this).val('');
    });
});


var lineHeight = parseInt($("#huge-slogan span").css( "line-height"),10);

let lineCount = 0, fontSize = 0;
$('.slide-huge-slogan').each(function(i, obj) {
    if($(this).outerHeight() > 500) {
        lineCount = $(this).outerHeight() / lineHeight;
        if (Math.round(lineCount) > 3) {
            do {
                lineCount = $(this).outerHeight() / lineHeight;
                fontSize = parseInt($(this).css("font-size"),10)
                $(this).css({'font-size':fontSize - 2});
            } while (Math.round(lineCount) > 3);
        }
    }

});


$.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};


