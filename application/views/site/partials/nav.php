    <!-- this is nav section -->
    <ul id="NavFix" class="nav-fix d-none d-md-block">
    	<li data-menuachor="AboutUs-link">
    		<a href="<?php echo ($page != 'home') ? site_url() : '' ;?>#AboutUs-link" class="nav-link" data-color="color">About Us</a>
    	</li>
    	<li>
    		<a href="<?php echo site_url('portfolio'); ?>" class="nav-link <?php echo ($page == 'portfolio') ? 'active' : '' ; ?>" data-color="color">Our Portfolio</a>
    	</li>
    	<li>
    		<a href="<?php echo site_url('team'); ?>" class="nav-link <?php echo ($page == 'team') ? 'active' : '' ; ?>"" data-color="color">Our Team</a>
    	</li>
    	<li>
    		<a href="<?php echo site_url('news'); ?>" class="nav-link <?php echo ($page == 'news' or $page == 'news-detail') ? 'active' : '' ; ?>"" data-color="color">Latest News</a>
    	</li>
    </ul>
    <!-- end of nav section -->
