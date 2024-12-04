<?php
// Tự động tải các Controller
$controller = $_GET['controller'] ?? 'news';
$action = $_GET['action'] ?? 'index';

require_once "controllers/" . ucfirst($controller) . "Controller.php";
$controllerClass = ucfirst($controller) . "Controller";

if (class_exists($controllerClass)) {
    $controllerObj = new $controllerClass();
    if (method_exists($controllerObj, $action)) {
        if (isset($_GET['id'])) {
            $controllerObj->$action($_GET['id']);
        } else {
            $controllerObj->$action();
        }
    } else {
        echo "Phương thức không tồn tại.";
    }
} else {
    echo "Controller không tồn tại.";
}
?>
