<?php
class AdminController {
    public function login() {
        require_once 'views/admin/login.php';
    }

    public function dashboard() {
        require_once 'views/admin/dashboard.php';
    }
}
