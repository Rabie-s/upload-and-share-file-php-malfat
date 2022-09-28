<?php
class connect
{

    private static $DB_HOST = 'localhost';
    private static $DB_USER = 'root';
    private static $DB_PASS = '';
    private static $DB_NAME = 'malfat';
    public static $db;



    public function __construct(){

        try {
            self::$db = new PDO("mysql:host=" . self::$DB_HOST . ";dbname=" . self::$DB_NAME, self::$DB_USER, self::$DB_PASS);
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
        
    }
}
