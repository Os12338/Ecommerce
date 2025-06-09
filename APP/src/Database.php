<?php

namespace APP\src;

use PDO;
use PDOException;

// obey singleton pattern
class Database
{

    private static $instance = null ; // public ?Database $connect = null;  (must be) 
    private $pdo;

    private function __construct($db_info)
    {
        try{
            $dns = "mysql:host={$db_info['DATABASE_HOST']};dbname={$db_info['DATABASE_NAME']}";
            $this->pdo = new PDO($dns,$db_info['DATABASE_USER_NAME'],$db_info['DATABASE_PASS']);
        }catch(PDOException $e){
            die($e->getmessage());
        }
    }

    public static function Instance($db_info) : Database
    {
        if(self::$instance === null){
            return new Database($db_info);
        }else{
            return self::$instance;
        }
    }

    public function pdo()
    {
        return $this->pdo;
    }

}