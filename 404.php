<?php
	if ($_SERVER['HTTP_HOST'] == 'localhost:8888') {
		$subFolder = '\automobile';
	} else {
		$subFolder = '/';
	}
?>
<head>
	<?php include_once './common/head.php'; ?>
</head>
<body>
    <div class="banner-w3ls" id="home">
        <!-- header -->
        <?php include_once './common/header.php'; ?>
        <div style="display: flex; justify-content: center; margin-top: 100px;">
            <h2 style="font-size: 7.0em; font-weight: 700;">404</h2>
        </div>
        <div style="display: flex; justify-content: center;">
            <span><b>Oops! This page couldn't be found</b></span>
        </div>
        
        <div style="display: flex; justify-content: center; margin-bottom: 100px;">
            <a href=<?=$subFolder?>><button style="margin-top: 10px; background: #0064d2;" type="button" class="btn btn-primary">Go To Home Page</button></a>
        </div>
    </div>
    <!-- footer -->
    <?php require_once './common/footer.php'; ?>
    <!-- //footer -->
   <?php include_once './common/script.php'; ?>
<!-- //smooth scrolling -->
</body>
