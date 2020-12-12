<?php

class Database {

    public static $host = 'localhost';
    public static $dbName = 'mvc';
    public static $userName = 'root';
    public static $password = 'password';

    private static function connect() {
        try {
            $pdo = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$dbName, self::$userName,  self::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function query($query, $params = []) {
        $statement = self::connect()->prepare($query);
        $data = [];
        try {
            $result = $statement->execute($params);
        } catch (PDOException $e) {
            $result = "Failed: " . $e->getMessage();
        }
        if(explode(' ', $query)[0] == 'SELECT') {
            $data = $statement->fetchAll();
            return $data;
        } elseif (explode(' ', $query)[0] == 'INSERT'
                    || explode(' ', $query)[0] == 'UPDATE'
        ) {
            return $result;
        }
    }
}
