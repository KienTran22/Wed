<?php
// index.php
require_once 'controllers/EmployeeController.php';

// Khởi tạo controller
$controller = new EmployeeController();

// Lấy action từ URL, mặc định là 'list' nếu không có action
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?: 'list';

// Tùy vào action, gọi phương thức tương ứng của controller
switch ($action) {
    case 'list':
        // Hiển thị danh sách nhân viên
        $controller->listEmployees();
        break;

    case 'create':
        // Nếu yêu cầu là POST, xử lý dữ liệu gửi lên
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $data = filter_input_array(INPUT_POST, [
                'name' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'email' => FILTER_VALIDATE_EMAIL,
                'phone' => FILTER_SANITIZE_NUMBER_INT,
                'address' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            ]);

            // Kiểm tra dữ liệu hợp lệ
            if (!empty($data['name']) && $data['email']) {
                $controller->createEmployee($data);
            } else {
                echo "Dữ liệu không hợp lệ. Vui lòng kiểm tra lại!";
            }
        } else {
            // Hiển thị form tạo mới nhân viên
            $controller->createEmployeeForm();
        }
        break;

    case 'edit':
        // Nếu yêu cầu là POST, xử lý dữ liệu gửi lên
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = filter_input_array(INPUT_POST, [
                'name' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'email' => FILTER_VALIDATE_EMAIL,
                'phone' => FILTER_SANITIZE_NUMBER_INT,
                'address' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            ]);

            // Lấy ID từ URL
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

            // Kiểm tra dữ liệu hợp lệ
            if (!empty($id) && !empty($data['name']) && $data['email']) {
                $controller->editEmployee($id, $data);
            } else {
                echo "Dữ liệu không hợp lệ hoặc ID không hợp lệ!";
            }
        } else {
            // Hiển thị form chỉnh sửa nhân viên
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            if (!empty($id)) {
                $controller->editEmployeeForm($id);
            } else {
                echo "ID không hợp lệ!";
            }
        }
        break;

    case 'delete':
        // Lấy ID từ URL
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if (!empty($id)) {
            if ($controller->deleteEmployee($id)) {
                echo "Xóa nhân viên thành công!";
            } else {
                echo "Không thể xóa nhân viên. Vui lòng thử lại!";
            }
        } else {
            echo "ID không hợp lệ!";
        }
        break;

    default:
        // Action không hợp lệ
        echo "Hành động không hợp lệ!";
        break;
}
