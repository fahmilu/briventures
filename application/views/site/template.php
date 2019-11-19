<!DOCTYPE html>
<html class="no-js">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> 

    <title>BRI Ventures <?php echo ($page != 'home') ? ' | '.$title : '' ;?></title>
    <link rel="icon" 
      type="image/png" 
      href="<?php echo base_url(); ?>/assets/images/favicon.png">
    <meta name="description" content="BRI Ventures">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.fullpage.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/default.css?v=1.3">    
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.easing.min.js"></script>
    <script src="https://use.fontawesome.com/7c017ffdda.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.nicescroll.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dotdotdot.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/script.js?v=1.2"></script>
</head>
<body>
    <?php 
        echo $this->load->view('site/partials/header');
        echo $this->load->view('site/partials/nav');
    ?>
    <div id="Content">
        <?php echo $this->load->view('site/pages/'.$content); ?>
    </div>
    <?php 
        if ($page != 'home') {
            echo $this->load->view('site/partials/footer');

        }
    ?>
    <div id="preloader"></div>
</body>
</html>