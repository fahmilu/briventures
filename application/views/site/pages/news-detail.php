<section id="NewsDetail" class="default" data-color="color">
    <div class="archive">
        <a href="<?php echo site_url('news'); ?>">ALL (<?php echo $total_rows ?>)</a>
        <?php 
            foreach ($archived->result() as $archived) {
                echo '<a href="'.site_url('news/archived/'.$archived->YEAR).'">'.$archived->YEAR.' ('.$archived->TOTAL.')</a>';
            }
        ?>
    </div>
    <div class="container default">
        <a href="<?php echo site_url('news'); ?>" class="main-title d-none d-md-block"> <div class="backto"></div>Back to All News</a>
        <a  href="<?php echo site_url('news'); ?>" class="d-block d-md-none backtonews" ><i></i>View All News</a>
        <?php $date = strtotime($row->date); ?>
        <div class="date"><?php echo date('d/m/Y', $date)?></div>
        <h3><?php echo $row->title;?></h3>
        <img src="<?php echo base_url('uploads/news/'.$row->picture); ?>" class="main-image img-fluid" />
        <div class="wysiwyg-content"><?php echo $row->description;?></div>
    </div>
</section>