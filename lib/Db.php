<?php
class Db
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=classmanager', 'root', '');
        } catch (PDOException $e) {
            die("Could not connect to the database: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Db();
        }

        return self::$instance;
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function lastInsertId()
    {
        return $this->conn->lastInsertId();
    }

    public function prepare($sql)
    {
        return $this->conn->prepare($sql);
    }
}
