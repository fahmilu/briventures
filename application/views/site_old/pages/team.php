<section id="hero-banner" class="team">

    <div class="text">Together we build,<br /> together we achieve</div>

</section>

<section id="Team">

    <div class="container">

        <?php //if(count($tags) != 0){?>

            <div class="tabing">

                <a href="<?php echo site_url('team/index/keyteam');?>" <?php echo ($category == 'keyteam') ? 'class="active"' : '' ;?>>Key Team</a>

                <a href="<?php echo site_url('team/index/commissioner');?>" <?php echo ($category == 'commissioner') ? 'class="active"' : '' ;?>>Board of Commissioner</a>

                <hr />

            </div>

            <div class="select">

              <select id="TagOpt" onchange="changeOpt();" name="tag">

                <option value="keyteam" <?php echo ($category == 'keyteam') ? 'selected="selected"' : '' ;?>>Key Team</option>

                <option value="commissioner" <?php echo ($category == 'commissioner') ? 'selected="selected"' : '' ;?>>Board of Commissioner</option>

              </select>

              <hr />

            </div>

        <?php //} ?>

        <div class="content">

            <?php foreach ($team->result() as $row) {  ?>

            <div class="col-lg-4">

                <a href="<?php echo site_url('team/detail/'.$row->id.'/'.rawurlencode($row->name))?>">

                    <div class="list" style="background-image:url('<?php echo base_url('uploads/team/'.$row->picture); ?>');">

                        <div class="name"><?php echo $row->name; ?><br /><span style="font-size: 12px; display: block; margin-top: 10px;"><?php echo $row->position; ?></span></div>

                        <div class="text">

                            <div class="name"><?php echo $row->name; ?></div>

                            <div class="job-title"><?php echo $row->position; ?></div>

                            <div class="content">                                

                                <?php $desc = $row->description; 

                                    $desc = str_replace('<p>', '', $desc); 

                                    $desc = str_replace('</p>', '', $desc);  

                                    $desc = preg_replace("/<img[^>]+\>/i", "", $desc); 

                                    echo substr($desc, 0, 130).'...';

                                ?> 

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

            window.location = '<?php echo site_url('team/index');?>/'+v ;

        }

</script>