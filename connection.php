<?php
class setUpPDO {
    public static function getPDO() {
        $user = 'root';
        $password = 'root';
        $db = 'automobile';
        $host = 'localhost';
        $port = 8889;
        try {
            $options = [
                PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
            ];
            // $pdo = new PDO('mysql:host=localhost;port=3306;dbname=automob5_automobile', 'automob5_automobile_user', 'Iloveodunayo123', $options);
            // var_dump('mysql:host=' + $host + ';port=' + $port + ';dbname=' + $db); exit;
            $pdo = new PDO('mysql:host=' . $host . ";port=" . $port . ';dbname=' . $db, $user, $password, $options);
           // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(Exception $e) {
            var_dump($e);
        }
    }
}

?>