<?php
	if ($_SERVER['HTTP_HOST'] == 'localhost:8888') {
		$subFolder = '\automobile';
	} else {
		$subFolder = '';
	}
?>
<!-- //contact -->
<div class="w3_agile_address">
		<div class="container">
				
			<div class="w3ls_footer_grid">
				<div class="col-md-4 w3ls_footer_grid_left">
					<div style="height: 112px;" class="w3ls_footer_grid_leftl">
						<i class="fa fa-map-marker" aria-hidden="true"></i>
					</div>
					<div class="w3ls_footer_grid_leftr">
						<h4>Find Us On:</h4>
						<a style="font-size: 12px;">2 Garden St, Derby DE1 3JG United Kingdom</a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 w3ls_footer_grid_left">
					<div style="height: 112px;" class="w3ls_footer_grid_leftl email">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</div>
					<div style="height: 112px;" class="w3ls_footer_grid_leftr ">
						<h4>Email Us On:</h4>
						<a style="font-size: 12px;" href="mailto:iinfo@automobilemarketingplace.com">info@automobilemarketingplace.com</a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 w3ls_footer_grid_left">
					<div style="height: 112px;" class="w3ls_footer_grid_leftl">
						<i class="fa fa-phone" aria-hidden="true"></i>
					</div>
					<div style="height: 112px;" class="w3ls_footer_grid_leftr">
						<h4>Call Us On:</h4>
						<p>+447 7700 61512, +447 4384 26176</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		</div>
<!-- footer -->
	<div class="newsletter">
		<div class="container">
			<div style="margin-top: 9px;" class="col-md-3 footer-grid" style="">
				<h3>About us</h3>
				<p>Auto Marketplace is an online trading platform where we sell used left hand drive vehicle and right hand drive vehicles belonging a group of verified auto dealers in he United Kingdom....<a style="display: inline;" href="/web/about.php">view more</a></p>
				<div class="w3ls_newsletter_social">
				<ul class="agileits_social_list">
					<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
					
				</ul>
			</div>				
			</div>
			<div class="footer-grids col-lg-2 col-sm-6 mb-lg-0 mb-sm-5 mb-4">
				<h4 class="mb-4">Quick Links</h4>
				<ul>
					<li><a href=<?=$subFolder."/about.php"?>>About</a></li>
					<li><a href=<?=$subFolder."/team.php"?>>Team</a></li>
					<li><a href=<?=$subFolder."/contact.php"?>>Contact</a></li>
					<li><a href=<?=$subFolder."/privacy-policy.php"?>>Privacy Policy</a></li>
					<li><a href=<?=$subFolder."/testimonials.php"?>>Testimonials</a></li>
				</ul>
			</div>
			<div class="footer-grids col-lg-6 col-sm-6">
					<h4 class="mb-4">Subscribe Us</h4>
					<p style="margin-bottom: 10px;" class="mb-3">Subscribe to our newsletter</p>
					<form action="#" method="post" class="d-flex">
						<input type="email" id="email" name="EMAIL" placeholder="Enter your email here" required="">
						<button type="submit" class="btn">Subscribe</button>
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
	
	</div>
<div class="w3l_footer_agile">
<p>© 2019 Auto Marketplace. All Rights Reserved</p>		
</div>
