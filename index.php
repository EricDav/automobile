<?php
	require_once './connection.php';
	require_once './controller.php';
	require_once './helpers.php';
	require_once './Data.php';
	$transmission = null;
	$fuelType = null;
	// mail("alienyidavid4christ@gmail.com","My subject",'Homedaaca'); exit;

	if (isset($_POST['make'])) {
		$minPrice = HelperClass::validatePrice($_POST['min_price']);
		$maxPrice = HelperClass::validatePrice($_POST['max_price']);

		$make = empty($_POST['make']) ? Controller::DEFAULT_MAKE : $_POST['make'];
		$transmission = empty($_POST['transmission']) ? Controller::DEFAULT_TRANSMISSION : $_POST['transmission'];
		if (empty($maxPrice) || !is_numeric($maxPrice))
			$maxPrice = Controller::MAX_PRICE;

		if (empty($minPrice) || !is_numeric($minPrice))
			$minPrice = Controller::MIN_PRICE;

		$fuelType = empty($_POST['fuel_type']) ? Controller::FUEL_TYPE : $_POST['fuel_type'];
		// var_dump($minPrice, $maxPrice); exit;

		$cars =  Controller::getTopDeals(['min_price' => $minPrice, 'max_price' => $maxPrice, 'make' => $make, 'fuel_type' => $fuelType, 'transmission' => $transmission]);
	} else {
		$cars =  Controller::getTopDeals();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<?php include_once './common/head.php'; ?>
</head>
<body>
<div class="banner-w3ls" id="home">
<?php include_once './common/header.php'; ?>

	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
					       <h3 class="agileinfo_sign">BEFRIEND</h3>	
						<img src="images/g1.jpg" alt=" " class="img-responsive" />
						<p>Ut enim ad minima veniam, quis nostrum 
							exercitationem ullam corporis suscipit laboriosam, 
							nisi ut aliquid ex ea commodi consequatur.
							<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit .</i></p>
					</div>
				</section>
			</div>
		</div>
	</div>


<div class="services" id="service">
		<div class="container">
				 <div class="wthree_title_agile">
					<h3> Today <span>SPECIAL</span>  DEALS </h3>
				</div>
				<p class="sub_para">It’s time to drive</p>
				<div style="margin-top: 10px;" class="row">
					<form action="index.php" class="form-horizontal" method="post" enctype="multipart/form-data">
						<div style="height: 50px; margin-top: 10px;" class="col-md-3">
							<select name="make" style="width: 100%; height: 100%;">
								<option style="width: 100%;">Any Make</option>
								<?php foreach(Data::MAKE as $m): ?>
									<?php if ($make && $m == $make): ?>
										<option selected="selected"><?=$make?></option>
									<?php endif; ?>
									<?php if (!$make || $make != $m): ?>
										<option><?=$m?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div style="height: 50px; margin-top: 10px;" class="col-md-3">
							<select name="model" style="width: 100%; height: 100%;">
								<option style="width: 100%;">Any Model</option>
							</select>
						</div>
						<div style="height: 50px;  margin-top: 10px;" class="col-md-3">
							<select name="min_price" style="width: 100%; height: 100%;">
								<option value="0" style="width: 100%;">Min Price</option>
								<?php foreach(Data::MIN_PRICES as $min): ?>
									<?php if ($minPrice && HelperClass::validatePrice($min) == $minPrice): ?>
										<option selected="selected"><?=$min?></option>
									<?php endif; ?>
									<?php if (!$minPrice || HelperClass::validatePrice($max) != $minPrice): ?>
										<option><?=$min?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div style="height: 50px;  margin-top: 10px;" class="col-md-3">
							<select name="max_price" style="width: 100%; height: 100%;">
								<option value="1000000" style="width: 100%;">Max Price</option>
								<?php foreach(Data::MAX_PRICES as $max): ?>
									<?php if ($maxPrice && HelperClass::validatePrice($max) == $maxPrice): ?>
										<option selected="selected"><?=$max?></option>
									<?php endif; ?>
									<?php if (!$maxPrice || HelperClass::validatePrice($max) != $maxPrice): ?>
										<option><?=$max?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div style="height: 50px;  margin-top: 10px;" class="col-md-3">
							<select name="fuel_type" style="width: 100%; height: 100%;">
								<option style="width: 100%;">Any fuel</option>
								<?php foreach(Data::FUEL_TYPE as $fuel): ?>
									<?php if ($fuelType && $fuelType == $fuel): ?>
										<option selected="selected"><?=$fuel?></option>
									<?php endif; ?>
									<?php if (!$fuelType || $fuelType != $fuel): ?>
										<option><?=$fuel?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div style="height: 50px; margin-top: 10px;" class="col-md-3">
							<select name="transmission" style="width: 100%; height: 100%;">
								<option style="width: 100%;">Any Transmission</option>
								<?php foreach(Data::TRANSMISSION as $trans): ?>
									<?php if ($transmission && $trans == $transmission): ?>
										<option selected="selected"><?=$trans?></option>
									<?php endif; ?>
									<?php if (!$transmission || $transmission != $trans): ?>
										<option><?=$trans?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div style="height: 50px;  margin-top: 10px;" class="col-md-6">
							<input style="width: 100%; height: 100%;" class="btn btn-primary" id='submit-input' type="submit" value="Submit">
						</div>
					</form>
				</div>

				<div class="inner_w3l_agile_grids">
					<?php if (sizeof($cars['message']) > 0): ?>
						<?=HelperClass::getCarsHtml($cars['message'])?>
					<?php endif; ?>

					<?php if (sizeof($cars['message']) == 0): ?>
						<div style="text-align: center; font-size: 30px;">Your search did not return any data</div>
					<?php endif; ?>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

<?php require_once './common/footer.php'; ?>

<?php include_once './common/script.php'; ?>
</body>
</html>
