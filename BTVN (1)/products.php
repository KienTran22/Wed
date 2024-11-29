<?php
// Khởi tạo mảng sản phẩm (bạn có thể thay thế phần này bằng cơ sở dữ liệu trong thực tế)
$products = [
    ['id' => 1, 'name' => 'Sản phẩm 1',  'price' => 500],
    ['id' => 2, 'name' => 'Sản phẩm 2',  'price' => 300],
    ['id' => 3, 'name' => 'Sản phẩm 3',  'price' => 150],
    ['id' => 4, 'name' => 'Sản phẩm 4',  'price' => 1200],
    ['id' => 5, 'name' => 'Sản phẩm 5',  'price' => 800],
];

// Thêm sản phẩm
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addProduct'])) {
    $newProduct = [
        'id' => count($products) + 1, // Tự động tăng id
        'name' => $_POST['name'],
        'price' => $_POST['price'],
    ];
    $products[] = $newProduct;
}

// Chỉnh sửa sản phẩm
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editProduct'])) {
    $id = $_POST['id'];
    foreach ($products as &$product) {
        if ($product['id'] == $id) {
            $product['name'] = $_POST['name'];
            $product['price'] = $_POST['price'];
        }
    }
}

// Xóa sản phẩm
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteProduct'])) {
    $id = $_POST['id'];
    foreach ($products as $key => $product) {
        if ($product['id'] == $id) {
            unset($products[$key]);
        }
    }
}
?>
