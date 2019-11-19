<section id="NewsDetail">
    <div class="container">
        <?php $date = strtotime($row->date); ?>
        <span class="date"><?php echo date(' M j, Y', $date)?></span>
        <h1><?php echo $row->title;?></h1>
        <div class="share-area">
            <div class="fb-share-button" data-href="<?php echo current_url(); ?>" data-layout="button_count"></div>
            <a href="https://twitter.com/share" class="twitter-share-button"{count} data-url="<?php echo site_url('news/detail/'.$row->id.'/mdiventures');?>" >Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        </div>
        <div class="content"><?php echo $row->description;?></div>
</section>