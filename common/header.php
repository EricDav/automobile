<?php
	if ($_SERVER['HTTP_HOST'] == 'localhost:8888') {
		$subFolder = '\automobile';
	} else {
		$subFolder = '';
	}
?>
<div class="header-w3l-agile">
		<div class="header_left">
			<ul>
				<li><a href="mailto:info@example.com"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>info@automobilemarketingplace.com</a></li>
				<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>+447 7700 61512, +447 4384 26176</li>
			</ul>
		</div>
		<div class="header_right">
		      <div class="w3ls-social-icons">
					<a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
					<a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
					<a class="pinterest" href="#"><i class="fa fa-google-plus"></i></a>
					<a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
				</div>

		</div>
		<div class="clearfix"></div>
</div>
<div class="container">
		<div class="header-nav">
			<nav class="navbar navbar-default">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a  href=<?=$subFolder?>><span class="logo-c">A</span><i class="fa fa-car" aria-hidden="true"></i>Marketplace</a><p class="sub-cap">Buy from Any where</p></h1>
					</div>
					<!-- navbar-header -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li><a href=<?=$subFolder?> . '/'>Home</a></li>
							<li><a href=<?=$subFolder."/about.php"?>>About Us</a></li>
							<li><a href=<?=$subFolder."/testimonials.php"?>>Testimonials</a></li>
							<li><a href=<?=$subFolder."/team.php"?>>Team</a></li>
							<li><a href=<?=$subFolder."/privacy-policy.php"?>>Privacy</a></li>
							<li><a href=<?=$subFolder."/contact.php"?>>Contact Us</a></li>
						</ul>
					</div>
					<div class="clearfix"> </div>	
				</nav>

		</div>
		<div class="clearfix"></div>
		<h2></h2>
		<h3>We are ready to serve you better</h3>
			<!--timer-->
						<div class="agileits-timer">
							<div class="main-title">
						     <!--<div class="demo2"></div>-->
						</div>
						</div>
						
						<!--//timer-->       
						<div class="callbacks_container">
						<ul class="rslides" id="slider3">
							<li>
								<div class="w3l_banner_info">
									 <h4>Find Best Car that suits you</h4>
								</div>
							</li>
							<li>
								<div class="w3l_banner_info">
									<h4>A Reliable way to purchase your new or used cars!</h4>
									
								</div>
							</li>
							<li>
								<div class="w3l_banner_info">
									 <h4>Save time we deliver to your door step!</h4>	
								</div>
							</li>
							<li>
								<div class="w3l_banner_info">
									<h4>. Save £70!</h4>
								</div>
							</li>
						</ul>
					</div>
				</div>
    </div>
    