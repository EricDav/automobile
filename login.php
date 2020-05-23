<?php
    require_once './helpers.php';
    require_once './controller.php';
    require_once './connection.php';
    if ($_SERVER['HTTP_HOST'] == 'localhost:8888') {
        $subFolder = '/automobile';
    } else {
        $subFolder = '';
    }

    $isSuccess = true;
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        $isValidEmail = Controller::adminLogin($email, $password);
        if ($isValidEmail['success']) {
            $_SESSION['email'] = $email;
            
            header('Location: ' . $subFolder . '/dashboard.php');
            exit;
        } else {
            $isSuccess = false;
        }
    }

?>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Auto Marketplace An Auto mobile | Admin Login</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- //for-mobile-apps -->
<link href=<?=$subFolder ."/css/bootstrap.css"?> rel="stylesheet" type="text/css" media="all" />
<link href=<?=$subFolder . "/css/style.css"?> rel="stylesheet" type="text/css" media="all" />
<link href=<?=$subFolder . "/css/font-awesome.css"?> rel="stylesheet"> 
<link href="//fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Faster+One" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<link rel="stylesheet" type="text/css" href=<?=$subFolder . "/css/util.css"?>>
<link rel="stylesheet" type="text/css" href=<?=$subFolder . "/css/main.css"?>>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<style>
 .dropdown-in {
     width: 100%;
     margin-bottom: 10px;
     height: 35;
 }
</style>
    <div id="home">
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
        <!-- header --> 
        <!-- //navbar ends here -->
        <!-- breadcrumbs -->
        <div class="crumbs text-center">
            <div class="container">
                <div class="row">
                    <ul class="btn-group btn-breadcrumb bc-list">
                        <li class="btn btn1">
                            <a href="/">
                                <i class="glyphicon glyphicon-home"></i>
                            </a>
                        </li>
                        <li style="margin-bottom: 20px;" class="btn btn2">
                            <a href="/">Oscar's Automobile Market Place</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!--//breadcrumbs ends here-->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 center">
            <div class="well well-sm back-color">
            <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form action="login.php" class="login100-form validate-form" method="post">
                <?php
                    if (!$isSuccess) {
                        echo  '<div class="alert alert-danger" role="alert" style="text-align: center;">Invalid email or password</div>';
                            echo "<script>
                                     jQuery(document).ready(function () {
                                        $('input').focus(() => {
                                            $('.alert-danger').css('display', 'none');
                                         });
                                    });
                                </script>";
                        }
                    ?>
					<span class="login100-form-title p-b-33">
						Admin Account Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Sign in
						</button>
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2 hov1">
							Username / Password?
						</a>
					</div>

					<div class="text-center">
						<span class="txt1">
							Create an account?
						</span>

						<a href="#" class="txt2 hov1">
							Sign up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
            </div>
        </div>
    </div>
</div>
    </div>
     <script <?php echo 'src=' . $subF . '/js/jquery-2.2.3.min.js'  ?>></script>
</body>