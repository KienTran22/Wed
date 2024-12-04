<?php
// controllers/EmployeeController.php
require_once __DIR__ . '/../Models/Employee.php';

class EmployeeController
{
    private $employeeModel;

    public function __construct()
    {
        $this->employeeModel = new Employee();
    }

    // Hiển thị danh sách nhân viên
    public function listEmployees()
    {
        $employees = $this->employeeModel->getAllEmployees();
        include 'Views/Partials/header.php';
        include 'Views/employees/index.php';
        include 'Views/Partials/footer.php';
    }

    // Hiển thị form thêm nhân viên
    public function createEmployeeForm()
    {
        include 'Views/Partials/header.php';
        include 'Views/employees/create.php';
        include 'Views/Partials/footer.php';
    }

    // Thêm nhân viên mới
    public function createEmployee($data)
    {
        if ($this->employeeModel->addEmployee($data)) {
            header('Location: index.php');
            exit;
        }
        echo "Error adding employee.";
    }

    // Hiển thị form chỉnh sửa nhân viên
    public function editEmployeeForm($id)
    {
        $employee = $this->employeeModel->getEmployeeById($id);
        include 'Views/Partials/header.php';
        include 'Views/employees/edit.php';
        include 'Views/Partials/footer.php';
    }

    // Cập nhật nhân viên
    public function editEmployee($id, $data)
    {
        if ($this->employeeModel->updateEmployee($id, $data)) {
            header('Location: index.php');
            exit;
        }
        echo "Error updating employee.";
    }

    // Xóa nhân viên
    public function deleteEmployee($id)
    {
        if ($this->employeeModel->deleteEmployee($id)) {
            header('Location: index.php');
            exit;
        }
        echo "Error deleting employee.";
    }
}
