<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Danh sách tin tức</h1>
    <div class="row">
        <?php foreach ($news as $item): ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?= $item['image'] ?>" class="card-img-top" alt="<?= $item['title'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['title'] ?></h5>
                        <a href="index.php?controller=news&action=detail&id=<?= $item['id'] ?>" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
