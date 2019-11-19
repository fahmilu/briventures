<section id="IndexNews" class="default" data-color="color">
    <div class="archive">
        <a href="<?php echo site_url('news'); ?>">ALL (<?php echo $total_rows ?>)</a>
        <?php 
            foreach ($archived->result() as $archived) {
                if($archived->YEAR  == $year){
                    echo '<a class="active" href="'.site_url('news/archived/'.$archived->YEAR).'">'.$archived->YEAR.' ('.$archived->TOTAL.')</a>';
                }else{
                    echo '<a href="'.site_url('news/archived/'.$archived->YEAR).'">'.$archived->YEAR.' ('.$archived->TOTAL.')</a>';
                }
            }
        ?>
    </div>
    <div class="container default">
        <div class="title"><?php echo $year; ?> News Archived</div>
        <div class="row row-20 list-news">
            <?php foreach ($news->result() as $news) {  ?>
                <div class="col-12 newslist">
                    <a href="<?php echo site_url('news/detail/'.$news->id.'/'.rawurlencode($news->title))?>" class="startup">
                        <div class="img" style="background-image: url('<?php echo base_url('uploads/news/'.$news->picture); ?>');"></div>
                        <?php $date = strtotime($news->date); ?>
                        <div class="date"><?php echo date('d/m/Y', $date)?></div>
                        <h3><?php echo $news->title; ?></h3>
                        <div class="lead-text dtdt"><?php echo $news->short_desc; ?></div>
                        <div class="read-more">Read More ></div>
                    </a>
                </div>
            <?php } ?>           
        </div>
    </div>
</section>