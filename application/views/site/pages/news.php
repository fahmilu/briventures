<!-- this is portofio page -->
<section id="IndexNews" class="default" data-color="color">
    <div class="archive">
        <a href="<?php echo site_url('news'); ?>" class="active">ALL (<?php echo $total_rows ?>)</a>
        <?php 
            foreach ($archived->result() as $archived) {
                echo '<a href="'.site_url('news/archived/'.$archived->YEAR).'">'.$archived->YEAR.' ('.$archived->TOTAL.')</a>';
            }
        ?>
    </div>
    <div class="container default">
        <div class="title">Latest News</div>
        <div class="row row-20 list-news"></div>
    </div>
</section>

<!-- list menggunakan ajax, bisa di lihat di js untuk implementasinya -->
<script type="text/javascript">
     var finish = <?php echo $total_rows; ?>;
     var total;
    function loadResults() {
        $.ajax({
            url: '<?php echo site_url('news/addlist');?>/'+total,
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

            }
        });     
    }

    $(function() {
        loadResults();

        $(window).scroll(function() {
            total = $('.newslist').length;
            var $this = $(this);
            var $results = $("#IndexNews .list-news");

            if (!$results.data("loading") && finish != total) {    

                var position = $(window).scrollTop();
                var bottom = $(document).height() - $(window).height();

                if( position == bottom ){
                    loadResults();
                }
            }
        });
    });    
</script>