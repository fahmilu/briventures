$(document).ready(function() {
	$('.modal').on('shown.bs.modal', function(){
		$('body').getNiceScroll().hide();
		// console.log('test');	
	});
	$('.modal').on('hidden.bs.modal', function(){
		$('body').getNiceScroll().resize();
	});

	// avoiding nice scroll when resizing window
	$(window).resize(function(event) {
		if($('.modal').hasClass('show')){
			$('body').getNiceScroll().hide();
		}
	});

    $('a.scrollto').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });

    $('#navbarNav').on('show.bs.collapse', function() {
	  $('header').addClass('nav-collapse');
	}).on('hide.bs.collapse', function() {
	  $('header').removeClass('nav-collapse');
	});

	$('#navbarNav .nav-link').click(function(event) {
		$('.navbar-toggler:visible').click();
	});

// $('#preloader').fadeIn();
});
