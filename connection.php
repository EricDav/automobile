<?php
include_once 'DBconfig.php';
include_once 'enviroment.php';

class setUpPDO {
    public static function getPDO() {
        $dbConfig = DBConfig::dbConfig[Enviroment::getEnv()];

        try {
            $options = [
                PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
            ];

            $pdo = new PDO('mysql:host=' . $dbConfig['host'] . ";port=" . $dbConfig['port'] . ';dbname=' . $dbConfig['database'], 
            $dbConfig['user'], $dbConfig['password'], $options);

           // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(Exception $e) {
            var_dump($e);
        }
    }
}

?>