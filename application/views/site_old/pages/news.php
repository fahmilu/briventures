<section id="hero-banner" class="news">
    <div class="text">Get to know us more <br />with our updated stories</div>
</section>
<section id="News">
    <div class="container">
        <div class="col-md-10 content">
            <?php foreach ($news->result() as $news) {  ?>
            <div class="list">
                <a href="<?php echo site_url('news/detail/'.$news->id.'/'.rawurlencode($news->title))?>"><div class="image-thumb" style="background:url(<?php echo base_url('uploads/news/'.$news->picture); ?>);"></div></a>
                <?php $date = strtotime($news->date); ?>
                <span class="date"><?php echo date(' M j, Y', $date)?></span>
                <a href="<?php echo site_url('news/detail/'.$news->id.'/'.rawurlencode($news->title))?>" class="title"><?php echo $news->title; ?></a>
                <div class="short-desc"><?php echo $news->short_desc; ?></div>
                <a href="<?php echo site_url('news/detail/'.$news->id.'/'.rawurlencode($news->title))?>" class="readmore">Read More ></a>
            </div>
            <?php } echo $pagination; ?>
            <div class="loader"></div>
        </div>
        <div class="col-md-2 archived">
            <span class="title">News Archive</span>
            <?php 
                foreach ($archived->result() as $archived) {
                    echo '<span class="year">>&nbsp;&nbsp;&nbsp;<a href="'.site_url('news/archived/'.$archived->YEAR).'">'.$archived->YEAR.'</a> ('.$archived->TOTAL.')</span>';
                }
            ?>
        </div>
    </div>
</section>
<script src="<?php echo base_url(); ?>assets/js/enquire.min.js"></script>

<script>
    var xhr;
    var finish = <?php echo $total_rows; ?>;
    $(document).ready(function() {
        enquire.register("screen and (max-width:480px)", {

            match : function() {
            $(window).scroll(function () {    
                    if ($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
                        // alert($(window).scrollTop());      
                        // console.log($(document).height());      
                        // console.log($(window).height());      
                        var total = $('.content .list').length;
                        if(total < finish){                        
                            $('.loader').show();
                            xhr = $.ajax({
                                url: '<?php echo site_url('news/addlist');?>/'+total,
                                success: function(response){
                                    $(response).insertBefore('.loader');
                                    $('.loader').hide();
                                }   
                            });
                        }
                    }
                });
            },
            unmatch : function(){
                $(window).scroll(function () {  
                    xhr.abort();
                });
                // console.log('unmatch');              
            },
            deferSetup : true 
        });

        function load_more(){


            
        }
    });
</script>