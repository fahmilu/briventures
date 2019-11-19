<section id="hero-banner" class="indigo">
    <div class="text">Building Indonesia’s <br />Startup Ecosystem.</div>
</section>
<section id="About">
    <div class="container" style="padding-bottom: 0px;">
        <div class="col-lg-3 title"><img src="<?php echo base_url(); ?>assets/images/indie.png" /></div>
        <div class="col-lg-9" style="font-size: 14px;">
            <p>Indigo is an accelerator program managed by MDI. In the program, startups will receive 6 months of incubation support and features like access to market, business, and technical consultancies, as well as starting funds up to IDR 2 Bn (US$ 180k) with the chance of receiving follow on funding</p>
            <p>Equipping companies with strong fundamentals and scalable growth engine is the main goal of the program, with a vision to build stronger startup ecosystem in Indonesia.</p>
            <p>To learn more about, please visit <a href="http://www.indigo.id/" target="_blank">http://indigo.id</a></p>

        </div>
    </div>
</section>
<section id="Portfolio">
    <div class="container" style="padding-top: 0px;">
        <?php //if(count($tags) != 0){?>
            <div class="tabing col-lg-12">
                <a href="#" class="active">Indigo Portfolio Currently at MDI Ventures</a>
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
        <div class="content col-lg-12">
            <?php foreach ($portfolio->result() as $portfolio) {  ?>
            <div class="col-lg-4">
                <a href="<?php echo site_url('indigo/detail/'.$portfolio->id.'/'.rawurlencode($portfolio->name))?>">
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
                                <?php $desc = $portfolio->description; 
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