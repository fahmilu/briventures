$(document).ready(function() {
	$('a.startup').click(function(event) {
		event.preventDefault();
		// $('#preloader').show();
		// $.ajax({url: window.location.origin + '/' +window.location.pathname + "partials/pages/portfolio-detail-ajax.php", success: function(result){
		// 	$(".modal.portfolio-detail .modal-content").html(result);
		// 	// setTimeout(function(){
		// 		// $('#preloader').hide();
		// 	$(".modal.portfolio-detail").modal('show');
		// 	// }, 1000);
			
		// }});
		var id = $(this).attr('data-id');
		$("#PortfolioDetail"+ id).modal('show');

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