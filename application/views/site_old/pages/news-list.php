            <?php foreach ($news->result() as $news) {  ?>
            <div class="list">
                <a href="<?php echo site_url('news/detail/'.$news->id.'/'.rawurlencode($news->title))?>"><div class="image-thumb" style="background:url(<?php echo base_url('uploads/news/'.$news->picture); ?>);"></div></a>
                <?php $date = strtotime($news->date); ?>
                <span class="date"><?php echo date(' M j, Y', $date)?></span>
                <a href="<?php echo site_url('news/detail/'.$news->id.'/'.rawurlencode($news->title))?>" class="title"><?php echo $news->title; ?></a>
                <div class="short-desc"><?php echo $news->short_desc; ?></div>
                <a href="<?php echo site_url('news/detail/'.$news->id.'/'.rawurlencode($news->title))?>" class="readmore">Read More ></a>
            </div>
            <?php } ?>