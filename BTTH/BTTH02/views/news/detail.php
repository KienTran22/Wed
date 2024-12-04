<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi Tiết Tin Tức</title>
</head>
<body>
    <h1><?= $newsItem['title'] ?></h1>
    <p><?= $newsItem['content'] ?></p>
    <img src="<?= $newsItem['image'] ?>" alt="<?= $newsItem['title'] ?>">
    <p>Ngày tạo: <?= $newsItem['created_at'] ?></p>
</body>
</html>
