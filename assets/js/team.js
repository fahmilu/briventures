$(document).ready(function() {
	$('a.employee').click(function(event) {
		event.preventDefault();
		// $('#preloader').show();
		// $.ajax({url: window.location.origin + '/' +window.location.pathname + "partials/pages/team-detail-ajax.php", success: function(result){
		// 	$(".modal.team-detail .modal-content").html(result);
		// 	// setTimeout(function(){
		// 	// 	$('#preloader').hide();
		// 		$(".modal.team-detail").modal('show');
		// 	// }, 1000);
		// 	if($(window).width() < 576){
		// 		$(".modal.team-detail .modal-content").niceScroll({
		// 			cursorcolor:"rgba(20,20,20,0.7)",
		// 		  	cursorwidth:"3px",
		// 		  	background:"rgba(20,20,20,0.3)",
		// 		  	cursorborder:"1px solid rgba(20,20,20,0.7)",
		// 		  	cursorborderradius:0
		// 		});				
		// 	}
			
		// }});
		var id = $(this).attr('data-id');
		$("#TeamDetail"+ id).modal('show');
	});

	$('.modal').on('shown.bs.modal', function(){
		if($(window).width() > 576){
			var H = $('.modal.show .content').outerHeight();
			var HTop = $('.modal.show .content .top-content').outerHeight();
			var HBottom = $('.modal.show .content .bottom-content').outerHeight();
			var HCustombar = H - HTop - HBottom;
			$('.modal.show .content .custom-bar').css('max-height', HCustombar+'px');
		}
	});

	$(window).resize(function(event) {
		if($(window).width() > 576){
			var H = $('.modal.show .content').outerHeight();
			var HTop = $('.modal.show .content .top-content').outerHeight();
			var HBottom = $('.modal.show .content .bottom-content').outerHeight();
			var HCustombar = H - HTop - HBottom;
			$('.modal.show .content .custom-bar').css('max-height', HCustombar+'px');
		}
	});
});