<?php foreach ($team->result() as $row) {  ?>
<div class="modal modal-fullscreen animate fade team-detail" id="TeamDetail<?php echo $row->id; ?>" role="dialog" id="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="" class="close-modal" data-dismiss="modal"><i></i>Meet The Team</a>
            <div class="row no-padding h-100">
                <div class="col-md-auto logo-area order-sm-12 h-100" style="background-image: url(<?php echo base_url('uploads/team/'.$row->picture); ?>);">
                </div>
                <div class="col order-sm-1 h-100 detail-content">
                    <div class="content float-md-right">
                        <div class="top-content">
                            <div class="backto d-none d-md-block" data-dismiss="modal"></div>
                            <div class="main-title">Meet The Team</div>
                            <div class="name"><?php echo $row->name; ?></div>
                            <div class="category"><?php echo $row->position; ?></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="text-area custom-bar">
                            <?php echo $row->description; ?>
                        </div>
                        <div class="bottom-content">
                            <div class="social-area">
                                <?php if ($row->linkedin) {
                                    echo '<a href="'.$row->linkedin.'" target="_blank"><i class="fa fa-linkedin"></i></a>';
                                }?>
                                <?php if ($row->twitter) {
                                    echo '<a href="'.$row->twitter.'" target="_blank"><i class="fa fa-twitter"></i></a>';
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