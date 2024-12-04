<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Tin Tức</title>
</head>
<body>
    <h1>Thêm Tin Tức Mới</h1>
    <form action="index.php?controller=news&action=save" method="post">
        <label for="title">Tiêu đề:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="content">Nội dung:</label>
        <textarea id="content" name="content" required></textarea>
        <br>
        <label for="category">Danh mục:</label>
        <select id="category" name="category_id">
            <!-- Thêm danh mục từ cơ sở dữ liệu -->
        </select>
        <br>
        <label for="image">Ảnh:</label>
        <input type="text" id="image" name="image">
        <br>
        <button type="submit">Lưu</button>
    </form>
</body>
</html>
