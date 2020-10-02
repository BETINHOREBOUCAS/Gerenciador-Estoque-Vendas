<?php
namespace core;

use PDO;
use PDOException;
use src\Config;

class Model {

    public $pdo;
       
    public function __construct() {
        
            try {
                $pdo = new PDO(Config::DB_DRIVER.":dbname=".Config::DB_DATABASE.";host=".Config::DB_HOST, Config::DB_USER, Config::DB_PASS);
                $this->pdo = $pdo;
            } catch (PDOException $e) {
                echo "Falhou: ".$e->getMessage();
            }
        
    }
   

}