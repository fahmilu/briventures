<!-- this is header section -->
	<header class="<?php echo ($page != 'home') ? 'with-bg' : '' ; ?>" data-color="color">
		<div class="container full-width">
		    <a href="<?php echo site_url(); ?>" id="logo" class="logo white fix startLogo"></a>		
	    	<a href="<?php echo ($page != 'home') ? site_url() : '' ;?>#ContactUs-link" class="d-none d-md-block contact text-center" id="ContactBtn">Contact Us</a>
			<button class="navbar-toggler collapsed d-block d-md-none" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icon-bar top-bar"></span>
				<span class="icon-bar middle-bar"></span>
				<span class="icon-bar bottom-bar"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul id="navSection" class="navbar-nav ml-auto">
					<div class="container">
	    				<li class="nav-item">
				    		<a href="<?php echo ($page != 'home') ? site_url() : '' ;?>#AboutUs" class="nav-link scrollto">About Us</a>
				    	</li>
				    	<li class="nav-item">
				    		<a href="<?php echo site_url('portfolio'); ?>" class="nav-link <?php echo ($page == 'portfolio') ? 'active' : '' ; ?>">Our Portfolio</a>
				    	</li>
				    	<li class="nav-item">
				    		<a href="<?php echo site_url('team'); ?>" class="nav-link <?php echo ($page == 'team') ? 'active' : '' ; ?>">Our Team</a>
				    	</li>
				    	<li class="nav-item">
				    		<a href="<?php echo site_url('news'); ?>" class="nav-link <?php echo ($page == 'news' or $page == 'news-detail') ? 'active' : '' ; ?>">Latest News</a>
				    	</li>
				    	<li class="nav-item">
				    		<a href="<?php echo ($page != 'home') ? site_url() : '' ;?>#ContactUs" class="nav-link contactus scrollto">CONTACT US</a>
				    	</li>						
					</div>
				</ul>
			</div>
		</div>
	</header>
<!-- end of header section -->