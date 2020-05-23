<?php
session_start();
class Controller {
    const MIN_PRICE = '0';
    const MAX_PRICE = '100000000';
    const DEFAULT_MAKE = 'Any Make';
    const DEFAULT_FUEL_TYPE = 'Any fuel';
    const DEFAULT_TRANSMISSION = 'Any Transmission';

    const COMMON = array(
        self::DEFAULT_MAKE,
        self::DEFAULT_FUEL_TYPE,
        self::DEFAULT_TRANSMISSION
    );

    public static function createCar($make, $categoryId, $color, $doors, $engineSize, $mileage, $transmission, $type, $imagePath, $imagePath2,
    $imagePath3, $description, $price, $year, $model, $fuelType, $imagePath4, $imagePath5, $imagePath6) {
        
        $con = setUpPDO::getPDO();

        try {
            $sql = 'INSERT INTO cars (make, category_id, color, doors, engine_size, mileage, transmission, description, type, image_path, image_path1, image_path2, price, year, model, fuel_type, image_path4, image_path5, image_path6) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, ?,?,?,?)';
            $stmt= $con->prepare($sql);
            $result = $stmt->execute([$make, $categoryId, $color, $doors, $engineSize, $mileage, $transmission, $description, $type, $imagePath, $imagePath2, $imagePath3, $price, $year, $model, $fuelType, $imagePath4, $imagePath5, $imagePath6]);
            return $result;
        } catch(Exception $e) {
            return false;
        }  
    }

    public static function adminLogin($email, $password) {
        $con = setUpPDO::getPDO();
        try {
            $sql = 'SELECT * from users where email = ? AND password=?';
            $stmt= $con->prepare($sql);
            $stmt->execute([$email, $password]);
            $result = $stmt->fetch();

            if (!$result) {
                return array('success' => false, 'message' => 'Invalid username or password');
            } 
            return array('success' => true);
        } catch(\Exception $e) {
            return array('success' => false, 'message' => 'Server error');
        }
    }
    public static function getTopDeals($param = null) {
        $con = setUpPDO::getPDO();
        $searchParams = ['make', 'fuel_type', 'transmission'];

        try {
            if ($param) {
                $sql = 'SELECT * from cars WHERE';
                $sql = $sql . ' price >' . $param['min_price'] . ' AND ';
                $sql = $sql . ' price <' . $param['max_price'];

                foreach($searchParams as $s) {
                    if (!in_array($param[$s], self::COMMON)) {
                        $sql.= ' AND ' . $s . '=' . "'" . $param[$s] . "'";
                    }
                }
            } else {
                $sql = 'SELECT * from cars';
            }
            
            $stm = $con->query($sql);
            $result = $stm->fetchAll();
            return array('success' => true, 'message' => $result);
        } catch(\Exception $e) {
            var_dump($sql); exit;
            var_dump($e); exit;
            return array('success' => false, 'message' => 'Server error');
        }
    }

    public static function getCar($carId) {
        $con = setUpPDO::getPDO();
        try {
            $sql = 'SELECT * from cars WHERE cars.id =' . $carId;
            $stm = $con->query($sql);
            $result = $stm->fetchAll();
            return array('success' => true, 'message' => $result);
        } catch(\Exception $e) {
            var_dump($e); exit;
            return array('success' => false, 'message' => 'Server error');
        }
    }

}