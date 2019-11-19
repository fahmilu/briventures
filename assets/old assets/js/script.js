/*!
 * Start Bootstrap - Agnecy Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    startPulseScrollTeaser();
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });

    $(window).scroll(function(event) {
        if ($(window).scrollTop() == 0){
            $('#left-menu').fadeIn();
            $('#hambmenu').fadeOut();
        }else{
            $('#hambmenu').fadeIn();
            $('#left-menu').fadeOut();
        }
    });

    $('#hambmenu').click(function(event) {
        $('#m-menu').show();
    });

    $('#m-menu .close').click(function(event) {
        event.preventDefault();
        $('#m-menu').hide();
    });

    $('#placeholder .close').click(function(event) {
        event.preventDefault();
        $('#placeholder').fadeOut();
    });

    $('.tnc').click(function(event) {
        event.preventDefault();
        $('#placeholder').fadeIn();
    });

    $('ul.evonav li').click(function(event) {
        var id = $(this).attr('data-id');
        var img = $(this).attr('data-img');
        $('.ev').fadeOut().delay(500);
        $('.ev .img').attr('src', '');
        $('ul.evonav li .round').removeClass('active');
        $(this).children('.round').addClass('active');
        var image = new Image();
        image.src = img+'?'+Math.random();
        $('.evo'+id).fadeIn('400', function() {
            $('.evo'+id+' .img').attr('src', image.src);
        });
    });

    $('a#backtotop').bind('click', function(event) {
        // var $anchor = $(this);
        $('html, body').stop().animate({scrollTop: 0 }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });

    var pulseScrollTeaserRunning = true;

    function runPulseScrollTeaser() {
        if (!pulseScrollTeaserRunning) {
          $('#scroll').hide();
          return;
        }
        var pulseSpeed = 500;
        $('#scroll-down1').fadeIn(pulseSpeed).delay(0).fadeOut(pulseSpeed);
        $('#scroll-down2').delay(300).fadeIn(pulseSpeed).delay(0).fadeOut(pulseSpeed);
        $('#scroll-down3').delay(500).fadeIn(pulseSpeed).delay(0).fadeOut(pulseSpeed,runPulseScrollTeaser);
    }

    function startPulseScrollTeaser() {
            // if (pulseScrollTeaserRunning==true)
            //   return false;
        pulseScrollTeaserRunning = true;
        $('#scroll').show();
        runPulseScrollTeaser();
        return true;
    }

    function stopPulseScrollTeaser() {
        pulseScrollTeaserRunning = false;
    }

    $('.testimoni').slick({
        dots: false,
        infinite: true,
        speed: 500,
        adaptiveHeight: true
        // fade: true,
        // cssEase: 'linear'
    });

    $('.newslist').slick({
        slidesToShow: 3,
        slidesToScroll: 2,
        dots: false,
        infinite: true,
        speed: 500,
        responsive: [
            {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                  }
                }
        ]
        // fade: true,
        // cssEase: 'linear'
    });
});

// Highlight the top nav as scrolling occurs
// $('body').scrollspy({
//     target: '.navbar-fixed-top'
// })

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});

var wow = new WOW(
  {
    boxClass:     'wowload',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true        // act on asynchronously loaded content (default is true)
  }
);
wow.init();

$('.nav li a').click(function(event) {
   $('.nav li a').removeClass('active');
   $(this).addClass('active');
});

$(document).ready(function() {
    var pos = 1;
    $('.next-evo').click(function(event) {
        if(pos+1 > 5){
            pos = 1;
        }else{
            pos += 1;
        }

        var id = pos;
        var img = $('.evonav li[data-id="'+pos+'"]').attr('data-img');
        $('.ev').fadeOut().delay(500);
        $('.ev .img').attr('src', '');
        var image = new Image();
        image.src = img+'?'+Math.random();
        $('.evo'+id).fadeIn('400', function() {
            $('.evo'+id+' .img').attr('src', image.src);
        });

    });
    $('.prev-evo').click(function(event) {
        if(pos-1 == 0){
            pos = 5;
        }else{
            pos -= 1;
        }

        var id = pos;
        var img = $('.evonav li[data-id="'+pos+'"]').attr('data-img');
        $('.ev').fadeOut().delay(500);
        $('.ev .img').attr('src', '');
        var image = new Image();
        image.src = img+'?'+Math.random();
        $('.evo'+id).fadeIn('400', function() {
            $('.evo'+id+' .img').attr('src', image.src);
        });

    });
});