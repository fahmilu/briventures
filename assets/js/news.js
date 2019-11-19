var i = 0;
function loadResults() {
	if(i < 5){
	    $.ajax({
	        url: window.location.origin + '/' +window.location.pathname + "partials/pages/news-ajax-list.php",
	        // type: "post",
	        // data: {
	        //     html: result,
	        //     delay: 3
	        // },
	        beforeSend: function(xhr) {
	            $("#IndexNews .list-news").append($("<div class='loading'></div>").fadeIn('slow')).data("loading", true);
	        },
	        success: function(response) {
		        var $results = $("#IndexNews .list-news");
		        $("#IndexNews .list-news .loading").fadeOut('fast', function() {
		            $(this).remove();
		        });
		        var $data = $(response);
		        $data.hide();
		        $("#IndexNews .list-news .loading").before($data);
		        $data.fadeIn();
		        $results.removeData('loading');
				$(".dtdt").dotdotdot();
				$('body').getNiceScroll().resize();

				i++;
	        }
	    });		
	}
};

$(function() {
    loadResults();

    $(window).scroll(function() {
        var $this = $(this);
        var $results = $("#IndexNews .list-news");

        if (!$results.data("loading")) {	

			var position = $(window).scrollTop();
		  	var bottom = $(document).height() - $(window).height();

		  	if( position == bottom ){
                loadResults();
            }
        }
    });
});