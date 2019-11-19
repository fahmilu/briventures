<!-- this is home section -->
<div id="HomeBanner" class="section full-height" data-color="white">
	<div id="particles-js">
		<!-- <img src="<?php echo base_url();?>assets/images/icons/plus-blue.svg" id="plus" class="plus1 d-none d-md-block" /> -->
		<!-- <img src="<?php echo base_url();?>assets/images/icons/plus-orange.svg" id="plus" class="plus2 d-none d-md-block" /> -->
	</div>
	<div class="container">
		<div class="table-lo">
			<div class="cell">
				<h1 class="text-light">Investing and<br /> Scaling in High-Potential<br /> Startups.</h1>
				<hr />
				<p>Accelerating Indonesia's financial inclusion and digital economy society by empowering the start-up ecosystem.</p>
			</div>
			<a href="#AboutUs-link" class="scrolldown d-none d-md-block">Scroll Down</a>
			<a href="#AboutUs" class="scrolldown d-block d-md-none scrollto	">Scroll Down</a>
			<div class="social-area text-right d-none d-md-block">
				<a href="" class="text-light"><i class="fa fa-linkedin"></i></a>
				<a href="" class="text-light"><i class="fa fa-facebook-f"></i></a>
				<a href="" class="text-light"><i class="fa fa-twitter"></i></a>
			</div>			
		</div>
	</div>
</div>
<div id="AboutUs" class="section default" data-color="color">
	<div class="container default">
		<div class="title">About Us</div>
		<div class="inner-content">
			<h2>BRI Ventures is the Corporate Venture Capital of Bank BRI. Through investments in innovative companies, we are the engine of growth for BRI Group.</h2>
			<p>We aim to be the leading regional venture capital in financial technology and set to achieve our goal with accelerating Indonesia's financial inclusion and digital economy society by empowering the start-up ecosystem.</p>
			<p>Backed by Bank BRI’s network and experience in the financial sector, BRI Ventures aim to support the entrepreneurs in accelerating Indonesia’s economic growth.</p>
		</div>
	</div>
</div>
<div id="OurPortfolio" class="section default" data-color="color">
	<div class="container default">
		<div class="title">Our Portfolio</div>
		<div class="inner-content">
			<p>We firmly believe that to accelerate Indonesia's financial inclusion and digital economy it is crucial to support the startup ecosystems that put a high value on innovation and democratic economy.</p>
			<div class="row list-startup">
				<?php foreach ($portfolio->result() as $portfolio) { ?>
					<div class="col-6 col-md-3">
						<a href="<?php echo site_url('portfolio?id='.$portfolio->id.'&name='.rawurlencode($portfolio->name));?>">
							<div class="img">
								<img src="<?php echo base_url('uploads/portfolio/thumbs/'.$portfolio->picture); ?>" />
							</div>
							<div class="name"><?php echo $portfolio->name; ?></div>
						</a>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
	<a href="<?php echo site_url('portfolio'); ?>" class="view-all">
		<div class="text">View Full Portfolio</div>
	</a>
</div>
<div id="MeetTheTeam" class="section full-height default" data-color="white">
	<div class="container default">
		<div class="title light">Our Team</div>
		<div class="inner-content">
			<h2 class="text-light">We are a team of seasoned entrepreneurs who have extensive expertise and experience in the financial sector. We believe that to accelerate Indonesia's economic growth it is crucial to bring strategic value and partnership beyond capital contribution.</p>
		</div>
	</div>
	<a href="<?php echo site_url('team'); ?>" class="view-all">
		<div class="text">Meet The Team</div>
	</a>
</div>
<div id="LatestNews" class="section default" data-color="color">
	<div class="container default title-container">
		<div class="title">Latest News</div>
	</div>
	<div class="container default latest-news">
		<div class="list-news">
				<?php foreach ($news->result() as $news) { ?>
				<a href="<?php echo site_url('news/detail/'.$news->id.'/'.rawurlencode($news->title))?>" class="news">
					<div class="content">
						<div class="img" style="background-image: url('<?php echo base_url('uploads/news/'.$news->picture); ?>');"></div>
                		<?php $date = strtotime($news->date); ?>
						<div class="date"><?php echo date('d/m/Y', $date)?></div>
						<h3 class="dtdt"><?php echo $news->title; ?></h3>
						<div class="text dtdt"><?php echo $news->short_desc; ?></div>
						<div class="read-more d-block d-md-none">Read More ></div>					
					</div>
				</a>
			<?php } ?>			
		</div>
		<div class="btn-area text-right">
			<a href="<?php echo site_url('news'); ?>">See More</a>
		</div>
	</div>
</div>
<div id="ContactUs" class="section default" data-color="white">
	<div class="container default">
		<div class="title light">Contact Us</div>
		<div class="row row-20">
			<div class="col-md-6">
				<p class="text-light"><strong>BRI Ventures</strong><br />
				Prosperity Tower 16th Floor, Unit F <br />
				SCBD, Jl. Jend. Sudirman No,52-53<br />
				Senayan, Kebayoran Baru,<br />
				Jakarta Selatan 12190</p>
				<div class="maps">
					<iframe src="https://maps.google.com/maps?q=Prosperity%20Tower&t=&z=13&ie=UTF8&iwloc=&output=embed" style="width: 100%; height: 100%;" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-md-6">
				<div class="table-lo">
					<div class="cell">
			            <?php echo form_open('contact/submit');?>
			                <input type="text" name="name" placeholder="Name" required />
			                <input type="email" name="email" placeholder="Email" required />
			                <textarea name="message" placeholder="Message" required></textarea>
							<div class="btn-area">
								<button class="solid">Submit</button>
							</div>
			            </form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ada footer karena homepage punya perlakuan khusus -->
    <?php echo $this->load->view('site/partials/footer'); ?>
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/slick.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.fullpage.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/scrolloverflow.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/home.js?v=1.2"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/particlejs-config.js"></script>

 <!-- end of home section