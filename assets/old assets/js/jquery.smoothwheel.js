jQuery.extend(jQuery.easing, {
    easeOutQuint: function(x, t, b, c, d) {
        return c * ((t = t / d - 1) * t * t * t * t + 1) + b;
    }
});

var wheel = false,
    $docH = $(document).height() - $(window).height(),
    $scrollTop = $(window).scrollTop();

$(window).bind('scroll', function() {
    if (wheel === false) {
        $scrollTop = $(this).scrollTop();
    }
});
$(document).bind('DOMMouseScroll mousewheel', function(e, delta) {
    delta = delta || -e.originalEvent.detail / 3 || e.originalEvent.wheelDelta / 120;
    wheel = true;

    $scrollTop = Math.min($docH, Math.max(0, parseInt($scrollTop - delta * 30)));
    $('body').stop().animate({
        scrollTop: $scrollTop + 'px'
    }, 2000, 'easeOutQuint', function() {
        wheel = false;
    });
    return false;
});