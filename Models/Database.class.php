<?php
class DB {
    private static $host = "localhost";
    private static $dbname = "elitefort_auth";
    private static $username = "root";
    private static $password = "adcO3Cxdj19w0sx";
    private static $connection = null;

    public static function connect() {
        if(!self::$connection) {
            try {
                self::$connection = new PDO(
                    "mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8mb4",
                    self::$username,
                    self::$password,
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );
            } catch(PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
        }
        return self::$connection;
    }

}
