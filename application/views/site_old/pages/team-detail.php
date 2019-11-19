<div class="top-team-detail"></div>
<section id="TeamDetail">
    <div class="container">
        <div class="avatar" style="background-image:url('<?php echo base_url('uploads/team/'.$row->picture); ?>');"></div>
        <div class="content">
            <div class="name"><?php echo $row->name; ?></div>
            <div class="jobtitle"><?php echo $row->position; ?></div>
            <div class="social-area">
                <?php if ($row->twitter) {
                    echo '<a href="'.$row->twitter.'" class="tw" target="_blank">tw</a>';
                }?>
                <?php if ($row->linkedin) {
                    echo '<a href="'.$row->linkedin.'" class="ln" target="_blank">ln</a>';
                }?>
            </div>
            <div class="description">
                <?php echo $row->description; ?>
            </div>
        </div>
    </div>
</section>