$(document).ready(function() {

	// scrollManipulation();

	// $(window).scroll(function(){
	//     scrollManipulation();
	// });

	// function scrollManipulation(){
	//     var fixedLogo = $("#logo");

	//     var fixedLogo_position = $("#logo").offset().top;
	//     var fixedLogo_height = $("#logo").height();

	//     var fixedContact = $("#ContactBtn");

	//     var fixedContact_position = $("#ContactBtn").offset().top;
	//     var fixedContact_height = $("#ContactBtn").height();

	//     $('#Content section').each(function(){

	//         var toCross_position = $(this).offset().top;
	//         var toCross_height = $(this).outerHeight();

	//         // for logo
	//         if (fixedLogo_position + fixedLogo_height  < toCross_position) {
	//         } else if (fixedLogo_position > toCross_position + toCross_height) {
	//         } else {
	//             fixedLogo.attr('data-color', $(this).attr('data-color'));
	//             fixedContact.attr('data-color', $(this).attr('data-color'));
	//         }
	//     });		

	//     $('#NavFix li a').each(function() {
	// 	    var fixedNavLink = $(this);

	// 	    var fixedNavLink_position = $(this).offset().top;
	// 	    var fixedNavLink_height = $(this).height();
	// 	    $('#Content section').each(function(){

	// 	        var toCross_position = $(this).offset().top;
	// 	        var toCross_height = $(this).outerHeight();

	// 	        // for link
	// 	        if (fixedNavLink_position + fixedNavLink_height  < toCross_position) {
	// 	        } else if (fixedNavLink_position > toCross_position + toCross_height) {
	// 	        } else {
	// 	            fixedNavLink.attr('data-color', $(this).attr('data-color'));
	// 	        }
	// 	    });		    	
	//     });
	// }

	$('header').attr('data-color', 'white');
   	// $('header #ContactBtn').attr('data-color', 'white');
   	$('#NavFix li a').attr('data-color', 'white'); 

   	if($(window).width() > 768){
	   	$('#Content').fullpage({
	   	    'verticalCentered': false,
	   	    'css3': true,
	   	    'easing': 'swing',
	   	    'scrollingSpeed': 1000,
	   	    'scrollOverflow': true,
	   	    'navigation': false,
	   	    responsiveWidth: 1100,
	   	    'anchors': ['HomeBanner-link', 'AboutUs-link', 'OurPortfolio-link', 'MeetTheTeam-link', 'LatestNews-link', 'ContactUs-link'],
	   	    'menu': '#NavFix',
	   	    // 'dragAndMove': true,
	   	    // 'fadingEffect': true,
	   	    'afterRender': function(){
	   	    	$('header').attr('data-color', 'white');
	   	    	// $('header #ContactBtn').attr('data-color', 'white');
	   	    	$('#NavFix li a').attr('data-color', 'white');

	   	    },
	   	    'afterLoad': function(anchorLink, index){},
	   	    'onLeave': function(index, nextIndex, direction){
	   	    	var ids = ['#HomeBanner', '#AboutUs', '#OurPortfolio', '#MeetTheTeam', '#LatestNews', '#ContactUs'];

	   	    	var color = $(ids[nextIndex-1]).attr('data-color');
	   	    	$('header').attr('data-color', color);
	   	    	// $('header #ContactBtn').attr('data-color', color);
	   	    	$('#NavFix li a').attr('data-color', color);

	   	    	$('#NavFix li a').attr('active', 'false');
	   	    	// console.log($('#NavFix li a[href="'+ ids[nextIndex-1] +'-link"]'));
	   	    	$('#NavFix li a[href="'+ ids[nextIndex-1] +'-link"]').attr('active', 'true');
	   	    },
	   	    afterResponsive: function(isResponsive){
	   	    	$(window).scroll(function(event) {
	   	    		if($(this).scrollTop() > 50){
	   	    			$('header').addClass('with-bg');
	   	    		}else{
	   	    			$('header').removeClass('with-bg');
	   	    		}
	   	    	});
	   	    },
	   	});   		
	}else{
	   	$(window).scroll(function(event) {
	   		if($(this).scrollTop() > 50){
	   			$('header').addClass('with-bg');
	   		}else{
	   			$('header').removeClass('with-bg');
	   		}
	   	});	   	
	}


   	function modifHeader(id){
   		// console.log($(id+ ' .fp-scroller').length);
   		if($(window).width() < 768){
	   		var matrix = $(id+ ' .fp-scroller').css('transform').replace(/[^0-9\-.,]/g, '').split(',');
			var x = matrix[12] || matrix[4];
			var y = matrix[13] || matrix[5];  		
			if(y < 0){
				// console.log('ilang');
				$('header').hide();
			}else{
				// console.log('muncul');
				$('header').show();
			}   			
   		}
   	}
	// latest news slider
	$('.latest-news .list-news').slick({
		dots: false,
		infinite: false,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 2,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 576,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true,
					arrows: false
				}
			}
		]
	});

	$(".dtdt").dotdotdot();

});
