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