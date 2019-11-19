<!-- this is portofio page -->

<section id="IndexTeam" class="default" data-color="color">
    <div class="container default">
        <div class="title">Our Team</div>
        <div class="row row-20 list-employee">
            <?php foreach ($team->result() as $team) {  ?>
                <div class="col-6 col-md-4">
                    <a href="" class="employee" data-id="<?php echo $team->id; ?>">
                        <div class="img" style="background-image: url(<?php echo base_url('uploads/team/'.$team->picture); ?>);">
                            <div class="img-caption">
                                <div class="text dtdt text-light">
                                <?php 
                                    $desc = $team->description; 
                                    $desc = str_replace('<p>', '', $desc); 
                                    $desc = str_replace('</p>', '', $desc);  
                                    $desc = preg_replace("/<img[^>]+\>/i", "", $desc); 
                                    echo substr($desc, 0, 130).'...';
                                ?> 
                                </div>
                                <div class="icon"></div>
                            </div>
                        </div>
                        <div class="name"><?php echo $team->name; ?></div>
                        <div class="role"><?php echo $team->position; ?></div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- detail menggunakan ajax, bisa di lihat di js untuk implementasinya -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/team.js?v=1.2"></script>

<!-- ambil modal detail -->
<?php echo $this->load->view('site/pages/team-detail'); ?>
