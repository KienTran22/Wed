<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh Sửa Tin Tức</title>
</head>
<body>
    <h1>Chỉnh Sửa Tin Tức</h1>
    <form action="index.php?controller=news&action=update&id=<?= $news['id'] ?>" method="post">
        <label for="title">Tiêu đề:</label>
        <input type="text" id="title" name="title" value="<?= $news['title'] ?>" required>
        <br>
        <label for="content">Nội dung:</label>
        <textarea id="content" name="content" required><?= $news['content'] ?></textarea>
        <br>
        <label for="category">Danh mục:</label>
        <select id="category" name="category_id">
            <!-- Thêm danh mục từ cơ sở dữ liệu -->
        </select>
        <br>
        <label for="image">Ảnh:</label>
        <input type="text" id="image" name="image" value="<?= $news['image'] ?>">
        <br>
        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
