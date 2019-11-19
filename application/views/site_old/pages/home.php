<link href="<?php echo base_url(); ?>assets/plugins/slick/slick.css" rel="stylesheet">

<section id="MainHome">

	<div class="content">

		<div class="text">BUILDING STRONG<br />COMPANIES</div>

		<a href="<?php echo site_url('about');?>" class="btn solid-red">DISCOVER</a>

		<a href="#HomeOurFocus" class="page-scroll arrow"><img src="<?php echo base_url(); ?>assets/images/arrow.png"></a>

	</div>

</section>

<section id="HomeOurFocus">

	<div class="container">

		<h1>Our Focus</h1>

		<p>Focusing on early and mid stage companies in the Southeast Asia region and global. <br />MDI Ventures aims to maximize the VC portfolio value within the Telkom Group, empowering the growth of digital entrepreneurship and helps to build the region's startup ecosystem.</p>

		<a href="<?php echo site_url('partners');?>" class="btn white upper">learn more</a>

	</div>

</section>

<section id="HomePortfolio">

	<div class="container">

		<h1>Our existing portfolio companies</h1>

		<div class="row">

			<?php foreach ($portfolio->result() as $portfolio) { ?>

			<div class="col-sm-2">

				<a href="<?php echo site_url('portfolio/detail/'.$portfolio->id.'/'.rawurlencode($portfolio->name))?>" class="portolist" style="background: #f0f0f0 url('<?php echo base_url('uploads/portfolio/thumbs/'.$portfolio->picture); ?>');"></a>

			</div>

			<?php }?>

		</div>

		<a href="<?php echo site_url('portfolio');?>" class="btn red upper">view more</a>

	</div>

</section>

<section id="HomeNews">

	<div class="container">

		<h1>LATEST NEWS</h1>

		<div class="latest-news">

			<?php foreach($news->result() as $news) { ?>

			<div class="news-list">

				<a href="<?php echo site_url('news/detail/'.$news->id.'/'.rawurlencode($news->title))?>" class="title"><?php echo $news->title; ?></a>

				<p><?php echo $news->short_desc; ?></p>

				<a href="<?php echo site_url('news/detail/'.$news->id.'/'.rawurlencode($news->title))?>" class="btn red upper">read more</a>

			</div>

			<?php }?>

		</div>

	</div>

</section>

<section id="HomeContact">

	<div class="container">

		<h1>CONTACT</h1>

		<div class="content">

			<div class="info">

				<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> -->

				<div class="maps">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2521244802174!2d106.81575405111154!3d-6.230455662730499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f158843078e3%3A0xce64d3c98a332ab0!2sTelkom+Landmark+Tower%2C+The+Telkom+Hub!5e0!3m2!1sen!2sid!4v1546506111166" style="width: 100%; height: 100%;" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>

				<!-- <script type="text/javascript"> function init_map(){var myOptions = {zoom:15,center:new google.maps.LatLng(-6.2293631,106.8251506),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-6.2293631,106.8251506)});infowindow = new google.maps.InfoWindow({content:"<b>Metra Digital Inovasi</b><br/> The East Tower . 36th Floor<br /> Phone:  +6221 5795 8055" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});}google.maps.event.addDomListener(window, 'load', init_map);

				</script> -->

				<div class="address">

					<strong>Metra Digital Innovation</strong><br />

					Telkom Landmark Tower . 21st Floor<br />

					Jl. Jendral Gatot Subroto Kav. 52<br />

					Jakarta 12710 . Indonesia<br /><br />

					Phone:  +6221 2793 7910

				</div>

			</div>

			<?php echo form_open('contact/submit');?>

				<input type="text" name="name" placeholder="Name" required />

				<input type="email" name="email" placeholder="Email" required />

				<textarea name="message" placeholder="Message" required></textarea>

				<button class="btn">SUBMIT</button>

			</form>

		</div>

	</div>	

</section>



<script src="<?php echo base_url(); ?>assets/plugins/slick/slick.js"></script>

<script>

	$(document).ready(function() {

		$('.latest-news').slick({

		  dots: false,

		  infinite: true,

		  speed: 300,

		  autoplay: true,

          autoplaySpeed: 5000,

		  slidesToShow: 1,

		  slidesToScroll: 1,

		  responsive: [

		    {

		      breakpoint: 480,

		      settings: {

		        dots: true,

		        arrows: false,

		      }

		    }

		    // You can unslick at a given breakpoint now by adding:

		    // settings: "unslick"

		    // instead of a settings object

		  ]

		});

	});

</script>