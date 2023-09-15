<?php 

class Server{

    public static $host="localhost";
    public static $dbName="bincomphptest"; //Database Name
    public static $username="root"; // Database Username
    public static $password=""; //Database Password


   
    public static function connect(){
        $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName,self::$username,self::$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    


}

?>