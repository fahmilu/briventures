<?php foreach ($portfolio->result() as $row) {  ?>
    <div class="modal modal-fullscreen animate fade portfolio-detail" id="PortfolioDetail<?php echo $row->id; ?>" role="dialog" id="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="" class="close-modal" data-dismiss="modal"><i></i>View Full Portfolio</a>
                <div class="row no-padding h-100">
                    <div class="col-md-auto logo-area order-sm-12 h-100">
                        <img src="<?php echo base_url('uploads/portfolio/'.$row->picture); ?>" class="img-fluid img-logo" />
                    </div>
                    <div class="col order-sm-1 h-100 detail-content">
                        <div class="content float-md-right">
                            <div class="top-content">
                                <div class="backto d-none d-md-block" data-dismiss="modal"></div>
                                <div class="main-title">Our Portfolio</div>
                                <div class="name"><?php echo $row->name; ?></div>
                                <div class="category"><?php echo $row->positioning; ?></div>
                            </div>
                            <div class="text-area custom-bar"><?php echo $row->description; ?></div>
                            <div class="bottom-content">
                                <a href="<?php echo $row->url; ?>" target="_blank" class="url"><?php echo $row->url; ?></a>
                                <div class="social-area">
                                    <?php if ($row->linkedin) {
                                        echo '<a href="'.$row->linkedin.'" target="_blank"><i class="fa fa-linkedin"></i></a>';
                                    }?>
                                    <?php if ($row->twitter) {
                                        echo '<a href="'.$row->twitter.'" target="_blank"><i class="fa fa-twitter"></i></a>';
                                    }?>
                                    <?php if ($row->facebook) {
                                        echo '<a href="'.$row->facebook.'" target="_blank"><i class="fa fa-facebook"></i></a>';
                                    }?>
                                    <?php if ($row->instagram) {
                                        echo '<a href="'.$row->instagram.'" target="_blank"><i class="fa fa-instagram"></i></a>';
                                    }?>
                                    <?php if ($row->mail) {
                                        echo '<a href="mailto:'.$row->mail.'" target="_blank"><i class="fa fa-envelope"></i></a>';
                                    }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>