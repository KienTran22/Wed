<?php
class Database {
    private static $instance = null;

    public static function connect() {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO("mysql:host=localhost;dbname=tintuc;charset=utf8", "root", "");
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Lỗi kết nối CSDL: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
?>
