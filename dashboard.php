<?php
    require_once './connection.php';
    require_once './helpers.php';
    require_once './controller.php';
    require_once './Data.php';

    function milliseconds() {
        $mt = explode(' ', microtime());
        return (string)((int)$mt[1]) * 1000 + ((int)round($mt[0] * 1000));
    }

    if (!isset($_SESSION['email'])) {
        if ($_SERVER['HTTP_HOST'] == 'localhost:8888') {
            header('Location: /automobile/login.php');
        } else {
            header('Location: /login.php');
        }
    }

    $con = setUpPDO::getPDO();
    $categories = $con->query('select * from categories');
    $isSuccess= ["isValid" => true];
    $isPost = false;

    if (isset($_POST['make'])) {
        $isPost = true; 
        $make = $_POST['make'];
        $categoryId = $_POST['category'];
        $color = $_POST['color'];
        $doors = $_POST['doors'];
        $engineSize = $_POST['engine_size'];
        $mileage = $_POST['mileage'];
        $price = $_POST['price'];
        $year = $_POST['year'];
        $model = $_POST['model'];
        $fuelType = $_POST['fuel_type'];

        $type = $_POST['type'];
        $description = $_POST['description'];
        $transmission = $_POST['transmission'];

        /**
         * The begining of declaring Images files
         */
        $tempImage = $_FILES['image']['tmp_name'];
        $imageName =  $_FILES['image']['name'];

        $tempImage2 = $_FILES['image1']['tmp_name'];
        $imageName2 = $_FILES['image1']['name'];

        $tempImage3 = $_FILES['image2']['tmp_name'];
        $imageName3 = $_FILES['image2']['name'];

        $tempImage4 = $_FILES['extraImage1']['tmp_name'];
        $imageName4 =  $_FILES['extraImage1']['name'];

        $tempImage5 = $_FILES['extraImage2']['tmp_name'];
        $imageName5 =  $_FILES['extraImage2']['name'];

        $tempImage6 = $_FILES['extraImage3']['tmp_name'];
        $imageName6 =  $_FILES['extraImage3']['name'];

        
         /**
         * The end of declaring Images files
         */

        $isEmptyDetails = HelperClass::isEmptyCarDetails($make, $categoryId, $color, $doors, $engineSize, $mileage, $type, $description, $transmission, $year, $model, $fuelType);
        $isNumericDataValid = HelperClass::isValidCarDetails($categoryId, $doors, $price, $transmission, $type, $fuelType);

        $isImage1 = HelperClass::isValidImage($imageName, $tempImage);
        $isImage2 = HelperClass::isValidImage($imageName2, $tempImage2);
        $isImage3 = HelperClass::isValidImage($imageName3, $tempImage3);
        $isImage4 = HelperClass::isValidImage($imageName4, $tempImage4);
        $isImage5 = HelperClass::isValidImage($imageName5, $tempImage5);
        $isImage6 = HelperClass::isValidImage($imageName6, $tempImage6);

        if (!$isEmptyDetails['isValid']) {
            $isSuccess =  $isEmptyDetails;
        } else if (!$isNumericDataValid['isValid']) {
            $isSuccess = $isNumericDataValid;
        } else if (!$isImage1['isValid']) {
            $isSuccess = $isImage1;
        } else if (!$isImage2['isValid'])  {
            $isSuccess = $isImage2;
        } else if (!$isImage3['isValid']) {
            $isSuccess = $isImage3;
        } else if (!$isImage4['isValid']) {
            $isSuccess = $isImage4;
        } else if (!$isImage5['isValid'])  {
            $isSuccess = $isImage5;
        } else if (!$isImage6['isValid']) {
            $isSuccess = $isImage6;
        } else {
            $splitedName = (string)milliseconds() . '1';  // creating unique image path
            $ext = end(explode('.', $imageName));
            $file_ext = strtolower($ext);
            $imagePath = sha1($splitedName) . '.' . $file_ext;

            $splitedName2 = (string)milliseconds() . '2';  // creating unique image path
            $ext2 = end(explode('.', $imageName2));
            $file_ext2 = strtolower($ext);
            $imagePath2 = sha1($splitedName2) . $file_ext2;

            $splitedName3 = (string)milliseconds() . '3';  // creating unique image path
            $ext3 = end(explode('.', $imageName3));
            $file_ext3 = strtolower($ext3);
            $imagePath3 = sha1($splitedName3) . '.' . $file_ext3;

            $splitedName4 = (string)milliseconds() . '4'; // creating unique image path
            $ext4 = end(explode('.', $imageName4));
            $file_ext4 = strtolower($ext4);
            $imagePath4 = sha1($splitedName4) . '.' . $file_ext4;

            $splitedName5 = (string)milliseconds() . '5';  // creating unique image path
            $ext5 = end(explode('.', $imageName5));
            $file_ext5 = strtolower($ext5);
            $imagePath5 = sha1($splitedName5) . $file_ext5;

            $splitedName6 = (string)milliseconds() . '6';  // creating unique image path
            $ext6 = end(explode('.', $imageName6));
            $file_ext6 = strtolower($ext6);
            $imagePath6 = sha1($splitedName6) . '.' . $file_ext6;

            $result = Controller::createCar($make, $categoryId, $color, $doors, $engineSize, $mileage, $transmission, $type, $imagePath, $imagePath2, $imagePath3, $description, $price, $year, $model, $fuelType, $imageName4, $imageName5, $imageName6);

            if ($result) {
                move_uploaded_file($tempImage, "images/cars_r1/".$imagePath);
                move_uploaded_file($tempImage2, "images/cars_r1/".$imagePath2);
                move_uploaded_file($tempImage3, "images/cars_r1/".$imagePath3);
                $isSuccess = ['isValid' => true];
            } else {
              $isSuccess = ['isValid' => false, 'message' => "Internal server error"];
            }
        }   
    }
?>
<head>
	<?php include_once './common/head.php'; ?>
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
				<li><a href="info@automobilemarketingplace.com"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>info@automobilemarketingplace.com</a></li>
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
                            <a href="/">Automobile Marketing Place</a>
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
                <form action="dashboard.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                <?php
                    if (!$isSuccess['isValid']) {
                        echo  '<div class="alert alert-danger" role="alert" style="text-align: center;">' . $isSuccess['message'] . '</div>';
                            echo "<script>
                                     jQuery(document).ready(function () {
                                        $('input').focus(() => {
                                            $('.alert-danger').css('display', 'none');
                                         });
                                    });
                                </script>";
                        } else if ($isSuccess['isValid'] && $isPost) {
                           echo ' <div id = "my-alert" class="alert alert-success" role="alert" style="text-align: center;">
                                Car has been published!
                            </div>';
                            echo "<script>
                                     jQuery(document).ready(function () {
                                         setTimeout(function() {
                                             $('.alert-success').css('display', 'none');
                                         }, 3000);
                                    });
                            </script>";
                        }
                    ?>
                    <fieldset>
                        <legend class="text-center header">Create A Car</legend>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <input id="make" name="make" type="text" placeholder="Make" class="form-control" <?php $val =  $isPost ? 'value=' . $make : '';  echo $val; ?> required>
                                <label for="files">Enter Make Value</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                              <select id="category" name="category" class="dropdown-in">
                                <option>Select Category</option>
                                <?php
                                  while($row = $categories->fetch()) {
                                    echo '<option value=' .$row["id"] . '>' . $row["name"]. '</option>';
                                  }
                                ?>
                                 </ul>
                                 <label for="files">Select a Category</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <input id="color" name="color" type="text" placeholder="Color" class="form-control" <?php $val = $isPost ? 'value=' . $color : '';  echo $val; ?> required>
                                <label for="files">Enter color</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <input id="doors" name="doors" type="number" placeholder="Doors" class="form-control" value=<?php $val = $isPost ? $doors : '';  echo $val; ?> required>
                                <label for="files">Enter number of doors</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <input id="engine_size" name="engine_size" type="text" placeholder="Engine Size" class="form-control" <?php $val = $isPost ? 'value=' . $engineSize : '';  echo $val; ?> required>
                                <label for="files">Enter engine size</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <input id="engine_size" name="price" type="number" placeholder="Car price" class="form-control" <?php $val = $isPost ? 'value=' . $price : '';  echo $val; ?> required>
                                <label for="files">Enter car price</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <input id="mileage" name="mileage" type="text" placeholder="Mileage" class="form-control" <?php $val = $isPost ? 'value=' . $mileage : '';  echo $val; ?> required>
                                <label for="files">Enter mileage</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <select id="category" name="transmission" class="dropdown-in">
                                  <option>Select Transmission</option>
                                  <?php foreach(Data::TRANSMISSION as $trans): ?>
										<option><?=$trans?></option>
								<?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <input id="transmission" name="model" type="text" placeholder="Car Model" class="form-control" <?php $val = $isPost ? 'value=' . $model : '';  echo $val; ?> required>
                                <label for="files">Enter model</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <input id="transmission" name="year" type="text" placeholder="Car Year" class="form-control" <?php $val = $isPost ? 'value=' . $year : '';  echo $val; ?> required>
                                <label for="files">Enter year</label>
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <select id="category" name="type" class="dropdown-in">
                                  <option>Select Type</option>
                                  <option>New</option>
                                  <option>Used</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <select id="category" name="fuel_type" class="dropdown-in">
                                  <option>Select Fuel Type</option>
                                  <?php foreach(Data::FUEL_TYPE as $fuelType): ?>
										<option><?=$fuelType?></option>
								<?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <input id="phone" name="image" type="file" placeholder="Image" class="form-control" accept="image/*">
                                <label for="files">Select front Image file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <input id="phone" name="image1" type="file" placeholder="Image" class="form-control" accept="image/*">
                                <label for="files">Select side Image file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <input id="phone" name="image2" type="file" placeholder="Image" class="form-control" accept="image/*">
                                <label for="files">Select back image file</label>
                            </div>
                        </div>


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <input id="phone" name="extraImage1" type="file" placeholder="Image" class="form-control" accept="image/*">
                                <label for="files">Select Extra Image 1</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <input id="phone" name="extraImage2" type="file" placeholder="Image" class="form-control" accept="image/*">
                                <label for="files">Select Extra Image 2</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <input id="phone" name="extraImage3" type="file" placeholder="Image" class="form-control" accept="image/*">
                                <label for="files">Select Extra Image 3</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="message" name="description" placeholder="Description" rows="7" value=<?php $val = $isPost ? $description : '';  echo $val; ?>></textarea>
                            </div>
                        </div>

                        <div class="contact-form">
                            <div id="button-wrapper" class="col-md-12 text-center">
                               <input id='submit-input' type="submit" value="Submit">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
     <script src=<?=$subF .'/js/jquery-2.1.4.min.js'?>></script>
    <script>
        jQuery(document).ready(function () {
            
            $('#category').click(() => {
                $('.my-dropdown-content').css('display', 'block');
            });

            $('.my-dropdown-content').mouseleave(() => {
                $('.my-dropdown-content').css('display', 'none');
            });

            $('.my-dropdown-content li').click((e) => {
                $('#category').val(e.target.textContent);
                $('#categoryName').val(e.target.id);
                $('.my-dropdown-content').css('display', 'none');
            })
        });
    </script>
</body>