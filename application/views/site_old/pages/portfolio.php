<section id="hero-banner" class="portfolio">
    <div class="text">We've made it for many times, <br />and for many more to come</div>
</section>
<section id="Portfolio">
    <div class="container">
        <?php //if(count($tags) != 0){?>
            <div class="tabing">
                <a href="#" class="active">Investment</a>
                <hr />
            </div>
<!--             <div class="select">
              <select id="TagOpt" onchange="changeOpt();" name="tag">
                <option value="all" <?php echo ($tag == '') ? 'selected="selected"' : '' ;?>>All</option>
                <?php foreach ($tags as $key => $value) { ?>
                <option value="<?php echo $value; ?>" <?php echo ($tag == $value) ? 'selected="selected"' : '' ;?>><?php echo ucwords($value); ?></option>
                <?php } ?>
              </select>
              <hr />
            </div> -->
        <?php //} ?>
        <div class="content">
            <?php foreach ($portfolio->result() as $portfolio) {  ?>
            <div class="col-lg-4">
                <a href="<?php echo site_url('portfolio/detail/'.$portfolio->id.'/'.rawurlencode($portfolio->name))?>">
                    <div class="list">
                        <div class="img">
                            <img src="<?php echo base_url('uploads/portfolio/'.$portfolio->picture); ?>" />
                            <?php
                                if ($portfolio->listed == 1) {
                                    echo '<div class="ribbon"><span>LISTED '.$portfolio->listed_by.'</span></div>';
                                }
                            ?>
                            <div class="text">
                                <div class="title"> <?php echo $portfolio->name; ?></div>
                                <hr />
                                <div class="content"> 
                                <?php $desc = strip_tags($portfolio->description); 
                                    $desc = str_replace('<p>', '', $desc); 
                                    $desc = str_replace('</p>', '', $desc);  
                                    $desc = preg_replace("/<img[^>]+\>/i", "", $desc); 
                                    echo substr($desc, 0, 130).'...';
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<script>
        function changeOpt() {
            var v = $('#TagOpt').val();
            // alert(va);
            // console.log(v);
            if(v == 'all'){
                window.location = '<?php echo site_url('portfolio');?>' ;
            }else{
                window.location = '<?php echo site_url('portfolio/tag');?>/'+v ;
            }
        }
</script>