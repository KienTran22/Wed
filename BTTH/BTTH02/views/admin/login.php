<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập Quản Trị</title>
</head>
<body>
    <h1>Đăng Nhập</h1>
    <form action="index.php?controller=admin&action=dashboard" method="post">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>
