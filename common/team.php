<?php
	require_once './helpers.php';
?>
<!-- team -->
<section class="team py-5" id="team">
	<div class="container py-md-5 py-3">
		<div style="margin-top: 30px;" class="title-desc text-center">
			<h5 class="heading heading1 mb-2"> Our Team</h5>
				<h3 class="heading heading1 mb-sm-5 mb-3">Our Expert Minds</h3>
		</div>
		<div style="margin-bottom: 20px;" class="row team-grid">
			<?=HelperClass::getTeamHtml()?>
		</div>
	</div>
</section>
<!-- //team -->
