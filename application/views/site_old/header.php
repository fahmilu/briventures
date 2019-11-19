<!DOCTYPE html>
<html class="no-js">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>MDI Ventures <?php echo ($page != 'home') ? ' | '.$title : '' ;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"> 
    <?php if(preg_match("/news\/detail/",$_SERVER['REQUEST_URI'])) {?> 
    <meta property="og:url" content="<?php echo current_url(); ?>" />
    <meta property="og:title" content="<?php echo $row->title; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="<?php echo $row->short_desc; ?>" /> 
    <meta property="og:image" content="<?php echo base_url('/uploads/'.$page.'/thumbs/'.$row->picture); ?>" /> 
    <?php } ?>
    <link rel="icon" 
      type="image/png" 
      href="<?php echo base_url(); ?>/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/animate.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/tablet.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/mobile.css" rel="stylesheet" />
    
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap.js"></script>
    <!-- Plugin JavaScript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '895430270511551',
          xfbml      : true,
          version    : 'v2.5'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-logo" href="<?php echo site_url(); ?>">MDI</a>

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav pull-right">
                    <li <?php echo ($page == 'about') ? 'class="active"' : '' ;?>>
                        <a class="" href="<?php echo site_url('about')?>">ABOUT</a>
                    </li>
                    <li <?php echo ($page == 'portfolio' or $page == 'portfolio-detail') ? 'class="active"' : '' ;?>>
                        <a class="" href="<?php echo site_url('portfolio')?>">PORTFOLIO</a>
                    </li>
                    <li <?php echo ($page == 'team' or $page == 'team-detail') ? 'class="active"' : '' ;?>>
                        <a class="" href="<?php echo site_url('team')?>">TEAM</a>
                    </li>
<!--                     <li <?php echo ($page == 'partners') ? 'class="active"' : '' ;?>>
                        <a class="" href="<?php echo site_url('partners')?>">PARTNERS</a>
                    </li>  -->
<!--                     <li <?php echo ($page == 'indigo') ? 'class="active"' : '' ;?>>
                        <a class="" href="<?php echo site_url('indigo')?>">INDIGO</a>
                    </li> 
 -->                <!-- <li <?php echo ($page == 'indigo') ? 'class="active"' : '' ;?>>
                        <a class="" href="https://medium.com/islandcap" target="_blank">BLOG</a>
                    </li>  -->
                    <li <?php echo ($page == 'whitepaper') ? 'class="active"' : '' ;?>>
                        <a class="" href="<?php echo site_url('whitepaper')?>">WHITE PAPER</a>
                    </li> 
                    <li <?php echo ($page == 'news' or $page == 'news-detail') ? 'class="active"' : '' ;?>>
                        <a class="" href="<?php echo site_url('news')?>">NEWS</a>
                    </li> 
                    <li <?php echo ($page == 'indigo') ? 'class="active"' : '' ;?>>
                        <a class="" href="https://medium.com/islandcap" target="_blank">BLOG</a>
                    </li> 
                    <li <?php echo ($page == 'contact') ? 'class="active"' : '' ;?>>
                        <a class="" href="<?php echo site_url('contact-us')?>">CONTACT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="content" <?php echo ($page != 'home') ? 'class="top-padding"' : '' ;?>>