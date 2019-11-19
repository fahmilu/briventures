<!-- this is portofio page -->
<section id="IndexPortofolio" class="default" data-color="color">
    <div class="container default">
        <div class="title">Our Portofolio</div>
        <div class="row row-20 list-startup">
            <?php foreach ($portfolio->result() as $portfolio) {  ?>
                <div class="col-6 col-sm-4">
                    <a href="" class="startup" data-id="<?php echo $portfolio->id; ?>">
                        <img src="<?php echo base_url('uploads/portfolio/'.$portfolio->picture); ?>" />
                        <div class="detail">
                            <div class="table-lo">
                                <div class="cell">
                                    <div class="name text-light text-center"><?php echo $portfolio->name; ?></div>
                                    <div class="text text-light text-center"><?php echo $portfolio->positioning; ?></div>
                                    <div class="icon"></div>                
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/portfolio.js?v=1.2"></script>
<?php if (isset($_GET['id'])): ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#PortfolioDetail<?php echo $_GET['id']; ?>").modal('show');
        });
    </script>
<?php endif ?>
<?php echo $this->load->view('site/pages/portfolio-detail'); ?>