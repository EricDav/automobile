  <!-- js -->
  <script type="text/javascript" src=<?=$subF ."/js/jquery-2.1.4.min.js"?>></script>
<!--scripts--> 
<!-- Counter required files -->
		<script type="text/javascript" src=<?=$subF . "/js/dscountdown.min.js"?>></script>
		<script src=<?=$subF . "/js/demo-1.js"?>></script>
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
<script type="text/javascript" src= <?=$subF . "/js/move-top.js"?>></script>
<script type="text/javascript" src=<?=$subF ."/js/easing.js"?>></script>
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
<script src=<?=$subF . "/js/responsiveslides.min.js"?>></script>
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
<script src=<?=$subF ."/js/modernizr.custom.js"?>></script>						
<script src=<?=$subF ."/js/jquery.flipster.js"?>></script>
<script>
$(function(){ $(".flipster").flipster({ style: 'carousel', start: 0 }); });
</script>	
<!--banner Slider starts Here-->
<!-- required-js-files-->
<link href=<?=$subF ."/css/owl.carousel.css"?> rel="stylesheet">
<script src=<?=$subF ."/js/owl.carousel.js"?>></script>
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
    <script type="text/javascript" src=<?=$subF ."/js/bootstrap.js"?>></script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
