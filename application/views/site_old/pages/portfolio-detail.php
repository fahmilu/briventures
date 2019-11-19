<section id="hero-banner" class="portfolio-detail">
    <div class="img"> <img src="<?php echo base_url('uploads/portfolio/'.$row->picture); ?>" /> </div>
</section>
<section id="PortfolioDetail">
    <div class="container">
        <div class="col-md-3 back-link"><a href="<?php echo $referer; ?>">< BACK TO OVERVIEW</a></div>
        <div class="col-md-9 content">
            <h1><?php echo $row->name; ?></h1>
            <p><?php echo $row->positioning; ?></p>
            <hr />
            <?php echo $row->description; ?>
            <a href="<?php echo $row->url; ?>" class="urllink" target="_blank"><?php echo $row->url; ?></a>
            <div class="social-area">
                <?php if ($row->twitter) {
                    echo '<a href="'.$row->twitter.'" class="tw" target="_blank">tw</a>';
                }?>
                <?php if ($row->facebook) {
                    echo '<a href="'.$row->facebook.'" class="fb" target="_blank">fb</a>';
                }?>
                <?php if ($row->linkedin) {
                    echo '<a href="'.$row->linkedin.'" class="ln" target="_blank">ln</a>';
                }?>
                <?php if ($row->instagram) {
                    echo '<a href="'.$row->instagram.'" class="ig" target="_blank">ig</a>';
                }?>
                <?php if ($row->mail) {
                    echo '<a href="mailto:'.$row->mail.'" class="mail" target="_blank">mail</a>';
                }?>
                
            </div>
        </div>
    </div>
</section>