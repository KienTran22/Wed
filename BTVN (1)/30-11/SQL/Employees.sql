-- SQL/Employees.sql
-- Create Database
CREATE DATABASE IF NOT EXISTS php_employee_management;

-- Use the Database
USE php_employee_management;

-- Create Employee Table
CREATE TABLE IF NOT EXISTS employee (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Optional: Insert some initial data (for testing)
INSERT INTO employee (name, email, phone, address) VALUES
('John Doe', 'john.doe@example.com', '1234567890', '123 Elm Street'),
('Jane Smith', 'jane.smith@example.com', '0987654321', '456 Oak Avenue');
