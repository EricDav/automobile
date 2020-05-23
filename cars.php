
<?php
	require_once './connection.php';
    require_once './controller.php';
	require_once './helpers.php';
	require_once './Data.php';
   
    
    if (isset($_GET['car_id']) && is_numeric($_GET['car_id'])) {
        $result = Controller::getCar($_GET['car_id']);
        if (sizeof($result['message']) == 0) {
			require_once './404.php';
			exit;
        } else {
            $car = $result['message'][0];
            $image1 = "images/cars_r1/" . $car['image_path'];
            $image2 = "images/cars_r1/" . $car['image_path1'];
            $image3 = "images/cars_r1/" . $car['image_path2'];
        }
    }§
?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include_once './common/head.php'; ?>
    <link href=<?=$subF . "/css/shop.css"?> type="text/css" rel="stylesheet" media="all">
    <link rel="stylesheet" href=<?=$subF . "/css/flexslider.css"?> type="text/css" media="screen" />
</head>

<body>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="display: inline;margin-left: -15px;" class="modal-title" id="exampleModalLabel"><strong>Ref Number:</strong></h5> <span><?= "#" . $car['id']?></span><br>
        <h5 style="display: inline;margin-left: -15px;" class="modal-title" id="exampleModalLabel"><strong>Make:</strong></h5> <span><?=$car['make']?></span><br>
        <h5 style="display: inline;margin-left: -15px;" class="modal-title" id="exampleModalLabel"><strong>Model:</strong></h5> <span><?=$car['model']?></span><br>
        <h5 style="display: inline;margin-left: -15px;" class="modal-title" id="exampleModalLabel"><strong>Year:</strong></h5> <span><?=$car['year']?></span>
      </div>
      <div class="modal-body">
        Please contact seller to get this vehicle 
        Send the vehicle <b><i>REF NUMBER</i></b><b><i>Make</i></b><b><i>Model</i></b> and <b><i>Year</i></b> to ; 
        <strong>automobilemarketingplace@gmail.com</strong>

        We will then revert to you within 24hr.<br><br>

        Thank You!<br>
        Admin
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <div class="banner-w3ls" id="home">
        <!-- header -->
        <?php include_once './common/header.php'; ?>
		<!-- Single -->
		<div  class="innerf-pages section">
			<div style="margin-top: 50px;" class="container">
				<div class="col-md-4 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider1">
							<ul class="slides">
								<li data-thumb=<?=$image1?>>
									<div class="thumb-image">
										<img style="width: 100%; height: 300px; object-fit: cover;" src=<?=$image1?> data-imagezoom="true" alt=" " class="img-responsive"> </div>
								</li>
								<li data-thumb=<?=$image2?>>
									<div class="thumb-image">
										<img  style="width: 100%; height: 300px; object-fit: cover;" src=<?=$image2?> data-imagezoom="true" alt=" " class="img-responsive"> </div>
								</li>
								<li data-thumb=<?=$image3?>>
									<div class="thumb-image">
										<img  style="width: 100%;height: 300px; object-fit: cover;" src=<?=$image3?> data-imagezoom="true" alt=" " class="img-responsive"> </div>
								</li>
							</ul>
							<ul class="slides">
								<li data-thumb=<?=$image1?>>
									<div class="thumb-image">
										<img style="width: 100%; height: 300px; object-fit: cover;" src=<?=$image1?> data-imagezoom="true" alt=" " class="img-responsive"> </div>
								</li>
								<li data-thumb=<?=$image2?>>
									<div class="thumb-image">
										<img  style="width: 100%; height: 300px; object-fit: cover;" src=<?=$image2?> data-imagezoom="true" alt=" " class="img-responsive"> </div>
								</li>
								<li data-thumb=<?=$image3?>>
									<div class="thumb-image">
										<img  style="width: 100%;height: 300px; object-fit: cover;" src=<?=$image3?> data-imagezoom="true" alt=" " class="img-responsive"> </div>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>

				</div>
				<div class="col-md-8 single-right-left simpleCart_shelfItem">
					<h3>
						<span><b>Derivative:</b> <?=$car['year'] . ' ' . $car['make'] . ',' .'<br>' . $car['model'] . ',' . '<br>' . $car['fuel_type'] . ' ' . $car['transmission']?></span>
					</h3>
                    <div class="occasional">
						<h5>Specifications</h5>
						<ul style="list-style-type: none;" class="single_specific">
                            <li><span>Make :</span><?='  ' . $car['make']?></li>
                            <li><span>Model :</span><?='  ' . $car['model']?></li>
							<li><span>Colour :</span><?='  ' . $car['color']?></li>
							<li><span>Transmission :</span><?='  ' . $car['transmission']?></li>
							<li><span>Doors :</span><?='  ' . $car['doors']?></li>
							<li><span>Engine Size :</span><?='  ' . $car['engine_size']?></li>
							<li><span>Fuel Type :</span><?='  ' . $car['fuel_type']?></li>
                            <li><span>Mileage :</span><?='  ' . $car['mileage']?></li>
						</ul>
					</div>
					<div class="caption">
						<div class="clearfix"> </div>
						<h6><?=Data::CURRENCY_SYMBOLS['euro'] . HelperClass::formatPrice(strval($car['price']))?>.00</h6>
					</div>
					<div class="desc_single">
                        <p>Description</p>
						<h5><?=$car['description']?></h5>
						<p></p>
					</div>
					<div class="clearfix"></div>
					<div class="occasion-cart">
						<div class="chr single-item single_page_b">
								<button style="height: 40px;" type="submit" class="chr-cart pchr-cart" data-toggle="modal" data-target="#exampleModal">Order Now</button>
								<a href="#" data-toggle="modal" data-target="#myModal1"></a>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
    </div>
    <!-- footer -->
    <?php require_once './common/footer.php'; ?>
    <!-- //footer -->

    <!-- js -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!--scripts--> 
<!-- Counter required files -->
		<script type="text/javascript" src="js/dscountdown.min.js"></script>
		<script src="js/demo-1.js"></script>
		<script>
			jQuery(document).ready(function($){						
				$('.demo2').dsCountDown({
					endDate: new Date("December 24, 2020 23:59:00"),
					theme: 'black'
				});								
			});
		</script>
	<!-- //Counter required files -->

	<!--//scripts--> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!--banner Slider starts Here-->
<script src="js/responsiveslides.min.js"></script>
<script>
	$(function () {
		// Slideshow 4
		$("#slider3").responsiveSlides({
			auto: true,
			pager:true,
			nav:false,
			speed: 500,
			namespace: "callbacks",
			before: function () {
			$('.events').append("<li>before event fired.</li>");
			},
			after: function () {
				$('.events').append("<li>after event fired.</li>");
			}
		});						
	});
</script>
<script src="js/modernizr.custom.js"></script>						
<script src="js/jquery.flipster.js"></script>
<script>
$(function(){ $(".flipster").flipster({ style: 'carousel', start: 0 }); });
</script>	
<!--banner Slider starts Here-->
<!-- required-js-files-->
<link href="css/owl.carousel.css" rel="stylesheet">
<script src="js/owl.carousel.js"></script>
<script>
	$(document).ready(function() {
		$("#owl-demo").owlCarousel({
			items :5,
			itemsDesktop : [768,4],
			itemsDesktopSmall : [414,3],
			lazyLoad : true,
			autoPlay : true,
			navigation :true,
			navigationText :  false,
			pagination :false,
									
		});				  
	});
</script>
<!--//required-js-files-->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/							
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
<script src="js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider1').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->

	<!-- dropdown nav -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
</body>
