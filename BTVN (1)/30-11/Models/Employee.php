<?php
// models/Employee.php
class Employee
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', '', 'php_employee_management');
        if ($this->db->connect_error) {
            die('Connection failed: ' . $this->db->connect_error);
        }
    }

    // Lấy tất cả nhân viên
    public function getAllEmployees()
    {
        $query = "SELECT * FROM employee";
        return $this->db->query($query);
    }

    // Lấy thông tin nhân viên theo ID
    public function getEmployeeById($id)
    {
        $query = "SELECT * FROM employee WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Thêm nhân viên mới
    public function addEmployee($data)
    {
        $query = "INSERT INTO employee (name, email, phone, address) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssss', $data['name'], $data['email'], $data['phone'], $data['address']);
        return $stmt->execute();
    }

    // Cập nhật thông tin nhân viên
    public function updateEmployee($id, $data)
    {
        $query = "UPDATE employee SET name = ?, email = ?, phone = ?, address = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssi', $data['name'], $data['email'], $data['phone'], $data['address'], $id);
        return $stmt->execute();
    }

    // Xóa nhân viên
    public function deleteEmployee($id)
    {
        $query = "DELETE FROM employee WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
