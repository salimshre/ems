<?php
// config/db.php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ems');

class Database {
    private static $instance = null;
    private $conn;

    private function __construct() {
        $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$this->conn) {
            die(json_encode(['success' => false, 'message' => 'Database connection failed: ' . mysqli_connect_error()]));
        }
        mysqli_set_charset($this->conn, 'utf8mb4');
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }

    public function prepare($sql) {
        return mysqli_prepare($this->conn, $sql);
    }

    public function escape($string) {
        return mysqli_real_escape_string($this->conn, $string);
    }

    public function lastInsertId() {
        return mysqli_insert_id($this->conn);
    }
}

function getConn() {
    return Database::getInstance()->getConnection();
}