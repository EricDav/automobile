<?php
class HelperClass {
     const LOCAL = 'http://localhost:8888/automobile/';
     const PRODUCTION = 'https://automobilemarketingplace.com/';

     public static function isEmptyCarDetails($make, $categoryId, $color, $doors, $engineSize, $mileage, $type, $description, $transmission, $year, $model, $fuelType) {
         if (empty(trim($make))) {
             return ["isValid" => false, "message" => 'Vehicle make is required'];
         } else if (empty(trim($categoryId))) {
             return ["isValid" => false, "message" => 'Vehicle category is required'];
         } else if (empty(trim($color))) {
             return ["isValid" => false, "message" => 'Vehicle color is required'];
         } else if (empty(trim($year))) {
            return ["isValid" => false, "message" => 'Vehicle year is required'];
         } else if (empty(trim($fuelType))) {
            return ["isValid" => false, "message" => 'Fuel Type is required'];
         } else if (empty(trim($model))) {
            return ["isValid" => false, "message" => 'Vehicle model is required'];
         } else if (empty(trim($doors))) {
             return ["isValid" => false, "message" => 'Vehicle doors is required'];
         } else if (empty(trim($engineSize))) {
             return ["isValid" => false, "message" => 'vehicle engine size is required'];
         } else if (empty(trim($mileage))) {
             return ["isValid" => false, "message" => 'Vehicle mileage size is required'];
         } else if (empty(trim($type))) {
            return ["isValid" => false, "message" => 'Vehicle type is required'];
         } else if (empty(trim($description))) {
            return ["isValid" => false, "message" => 'Vehicle description is required'];
         } else if (empty(trim($transmission))) {
            return ["isValid" => false, "message" => 'Vehicle transmission is required'];
         } else {
             return ["isValid" => true];
         }
     }
     public static function isValidCarDetails($categoryId, $doors, $price, $transmission, $type, $fuelType) {
         if(!is_numeric($categoryId)) {
             if ($categoryId = 'Select Category') return ["isValid" => false, "message" => 'Select a category'];
             return ["isValid" => false, "message" => 'Unknown error occured, catgeory should be a number'];
         } else if(!is_numeric($doors)) {
             return ["isValid" => false, "message" => 'Invalid value for doors. doors should a number'];
         } else if(!is_numeric($price)) {
            return ["isValid" => false, "message" => 'Invalid value for maximum power. Maximum power should be a number'];
        } else if ($transmission == 'Select Transmission') {
            return ["isValid" => false, "message" => 'Select a transmission'];
        } else if ($type == 'Select Type') {
            return ["isValid" => false, "message" => 'Select vehicle type'];
        } else if ($fuelType == 'Select Fuel Type') {
            return ["isValid" => false, "message" => 'Select fuel type'];
        }
        else {
             return ["isValid" => true];
         }
     }
     
    public function isValidName($name) {
         if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
             return Array("isValid" => false, "message" => 'Name must contain only letters and white space');
         } else if (empty(trim($name))) {
             return Array("isValid" => false, "message" => 'Name is required');
         } else {
             return Array("isValid" => true, "message" => "");
         }
     }
    public function isValidPassword($password) {
         if (empty($password)) {
             return Array("isValid" => false, "message" => 'Password is required');
         }
         if (strlen($password) < 7) {
             return Array("isValid" => false, "message" => 'Password must be at least six characters long');
         } else {
             return Array("isValid" => true);
         }
     }
     public static function isValidImage($imageName, $image) {
         $splitedName = explode('.', $imageName);
         $ext = end($splitedName);
         $file_ext = strtolower($ext);
   
         $extensions = array("jpeg","jpg","png");
         
         if (empty($image)) {
              return ["isValid" => false, "message" => 'Image is required.'];
         }
         if(in_array($file_ext, $extensions) === false) {
             return ["isValid" => false, "message" => 'extension not allowed, please choose a JPEG or PNG file.'];
         } else {
             return Array("isValid" => true);
         }
     }
     public static function getCarsHtml($cars) {
         $baseUrl = $_SERVER['HTTP_HOST'] == 'localhost:8888' ? HelperClass::LOCAL : HelperClass::PRODUCTION;
         foreach($cars as $car) {
            $link = $baseUrl . 'cars.php?car_id=' . $car['id'];
            $imagePath = "images/cars_r1/" . $car['image_path'];
            $html .= '<div class="col-md-3 agileits_service_grid_btm_left">
                <div class="agileits_service_grid_btm_left1">
                    <div class="agileits_service_grid_btm_left2">
                        <h5>' . $car['make'] . '</h5>
                        <p><span>' . Data::CURRENCY_SYMBOLS['euro'] . '</span>' . self::formatPrice(strval($car['price'])) . '.00</p>
                        <p>' . $car['model'] . ', ' . $car['year']  . '</p>
                    </div>
                    <a href=' . $link . '><img id='. $car['id'] . ' src=' . $imagePath . ' alt=" " class="img-responsive"></a>
                </div>
            </div>';
         }

         return $html;
     }
     public static function getTeamHtml() {
         $html = '';
         foreach(self::getTeamData() as $member) {
            $html.='<div class="col-lg-3 col-sm-6 mb-4">
                    <div class="box13">
                        <img src=' . $member['img'] . ' class="img-fluid img-thumbnail" alt="" />
                        <div class="box-content">
                            <h3 class="title">' . $member['name'] . '</h3>
                            <span class="post">' . $member['role'] . '</span>
                            <ul class="social">
                                <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                            </ul>
                        </div>
                    </div>
            </div>';
         }
         return $html;

     }

     public static function getTeamData() {
         return array(
             [
                 'name' => 'Paulo Copani',
                 'img' => 'images/oscar1.jpg',
                 'role' => 'Head of Sales'
             ],
             [
                'name' => 'Greg Stuart',
                'img' => 'images/oscar2.jpg',
                'role' => 'Sales Team'
             ], 
             [
                'name' => 'Lisa Spence',
                'img' => 'images/oscar3.jpg',
                'role' => 'Customer Service Executive'
             ],
             [
                'name' => 'Vicky Donald',
                'img' => 'images/oscar4.jpg',
                'role' => 'Accounts Department'
             ],
             [
                'name' => 'Brian McNeill',
                'img' => 'images/oscar5.jpg',
                'role' => 'Head of Logistics'
             ]
        );
     }

     public static function validatePrice($price) {
         $formatedPrice = '';
         for ($i = 0; $i < strlen($price); $i++) {
             if ($price[$i] != ',' && $price[$i] != '$' ) $formatedPrice.= $price[$i];
         }

         return $formatedPrice;
     }

     public static function formatPrice($price) {
        if (strlen($price) < 3) return $price;
        $formatedPrice = '';
        $count = 0;
        for($i = strlen($price) - 1; $i >= 0; $i--) {
            $formatedPrice.=$price[$i];
            $count+=1;
            if ($count%3 == 0 && $i != 0) {
                $formatedPrice.=',';
            }
        }
        // echo $formatedPrice;
        return strrev($formatedPrice);
     }
 }
?>
