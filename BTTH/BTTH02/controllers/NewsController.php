<?php
require_once "models/News.php";
require_once "models/Category.php";

class NewsController {
    // Trang chủ hiển thị danh sách tin tức
    public function index() {
        $news = News::getAll();
        include "views/home/index.php";
    }

    // Chi tiết tin tức
    public function detail($id) {
        $news = News::getById($id);
        include "views/news/detail.php";
    }

    // Admin - danh sách tin tức
    public function adminIndex() {
        $news = News::getAllWithCategory();
        include "views/admin/news/index.php";
    }

    // Admin - thêm tin tức
    public function add() {
        $categories = Category::getAll();
        include "views/admin/news/add.php";
    }

    public function save() {
        if ($_POST) {
            $data = [
                "title" => $_POST["title"],
                "content" => $_POST["content"],
                "image" => $_POST["image"],
                "category_id" => $_POST["category_id"]
            ];
            News::create($data);
            header("Location: index.php?controller=news&action=adminIndex");
        }
    }
}
?>
