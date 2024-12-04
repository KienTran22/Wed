<?php
require_once "models/Database.php";

class News {
    public static function getAll() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM news");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getAllWithCategory() {
        $db = Database::connect();
        $stmt = $db->query("SELECT news.*, categories.name as category_name FROM news JOIN categories ON news.category_id = categories.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO news (title, content, image, created_at, category_id) VALUES (?, ?, ?, NOW(), ?)");
        return $stmt->execute([$data["title"], $data["content"], $data["image"], $data["category_id"]]);
    }
}
?>
