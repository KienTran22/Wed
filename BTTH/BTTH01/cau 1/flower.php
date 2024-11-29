<?php
session_start();

// Mảng dữ liệu ban đầu
$flowers = [
    ['name' => 'Hoa dạ yến thảo ', 'description' => 'Dạ yến thảo là lựa chọn thích hợp cho những ai yêu thích trồng hoa làm đẹp nhà ở. Hoa có thể nở rực quanh năm, kể cả tiết trời se lạnh của mùa xuân hay cả những ngày nắng nóng cao điểm của mùa hè. Dạ yến thảo được trồng ở chậu treo nơi cửa sổ hay ban công, dáng hoa mềm mại, sắc màu đa dạng nên được yêu thích vô cùng.', 'image' => 'images/img1.jpg'],
    ['name' => 'Hoa đồng tiền', 'description' => 'Hoa đồng tiền thích hợp để trồng trong mùa xuân và đầu mùa hè, khi mà cường độ ánh sáng chưa quá mạnh. Cây có hoa to, nở rộ rực rỡ, lại khá dễ trồng và chăm sóc nên sẽ là lựa chọn thích hợp của bạn trong tiết trời này. Về mặt ý nghĩa, hoa đồng tiền cũng tượng trưng cho sự sung túc, tình yêu và hạnh phúc viên mãn.', 'image' => 'images/img2.jpg'],
    ['name' => 'Hoa giấy', 'description' => 'Hoa giấy có mặt ở hầu khắp mọi nơi trên đất nước ta, thích hợp với nhiều điều kiện sống khác nhau nên rất dễ trồng, không tốn quá nhiều công chăm sóc nhưng thành quả mang lại sẽ khiến bạn vô cùng hài lòng. Hoa giấy mỏng manh nhưng rất lâu tàn, với nhiều màu như trắng, xanh, đỏ, hồng, tím, vàng… cùng nhiều sắc độ khác nhau. Vào mùa khô hanh, hoa vẫn tươi sáng trên cây khiến ngôi nhà luôn luôn bừng sáng.', 'image' => 'images/img3.jpg'],
    ['name' => 'Hoa thanh tú', 'description' => 'Mang dáng hình tao nhã, màu sắc thiên thanh dịu dàng của hoa thanh tú có thể khiến bạn cảm thấy vô cùng nhẹ nhàng khi nhìn ngắm. Cây khá dễ trồng, lại nở nhiều hoa cùng một lúc, từ một bụi nhỏ có thể đâm nhánh, tạo nên những cây con phát triển sum suê. Thanh tú trồng ở nơi có nắng sẽ ra hoa nhiều, vì thế thích hợp trong cả mùa xuân lẫn mùa hè, đem lại khoảng không gian xanh mát cho ngôi nhà ngày oi nóng.', 'image' => 'images/img4.jpg'],
    ['name' => 'Hoa đèn lồng', 'description' => 'Giống như tên gọi, hoa đèn lồng có vẻ đẹp giống như chiếc đèn lồng đỏ trên cao. Nếu giàu trí tưởng tượng hơn, chúng ta sẽ hình dung hoa khi nụ đổ xuống thành từng chùm, kết năm kết ba như những thiếu nữ xúng xính trong chiếc đầm dạ hội. Hoa đèn lồng còn có tên là hồng đăng hoa, trồng trong chậu treo, bồn, phên dậu,… gieo hạt vào mùa xuân và cho hoa quanh năm.', 'image' => 'images/img5.webp'],
    ['name' => 'Hoa cẩm chướng', 'description' => 'Cẩm chướng là loại hoa thích hợp trồng vào dịp xuân - hè, nếu tiết trời không quá lạnh có thể kéo dài đến tận mùa đông. Hoa có phần thân mảnh, các đốt ngắn mang lá kép cùng nhiều màu sắc như hồng, vàng, đỏ, tím,… thậm chí có thể pha lẫn màu để tạo nên đường viền xinh xắn. Đặt một chậu hoa cẩm chướng trên bàn sẽ khiến căn phòng của bạn đẹp mắt hơn rất nhiều.', 'image' => 'images/img6.jpg'],
    ['name' => 'Hoa huỳnh anh', 'description' => 'Nếu bạn đang đi tìm một loài hoa tô điểm cho khu vực ban công hoặc hàng rào ngôi nhà thì huỳnh anh là một lựa chọn thích hợp trong mùa này hơn cả. Hoa có màu vàng rực, hình dạng như chiếc kèn be bé inh xinh, lại dễ trồng, mọc nhanh, vươn cao… Huỳnh Anh rất thích nắng, ánh nắng giúp hoa tỏa sáng rực rỡ, nếu ở nơi bóng râm thì chúng sẽ nhạt màu, kém sắc.', 'image' => 'images/img7.jpg'],
    ['name' => 'Hoa Păng-xê', 'description' => 'Vào mỗi độ tháng 4 về là dịp mà loài hoa Phăng-xê nở rộ vô cùng đẹp mắt. Hoa còn được gọi tên là hay hoa bướm, hoa tử la lan, hoa tương tư,… Păng-xê thường được trồng trong chậu nhỏ, với phần cánh mỏng mượt như nhung, hình dạng cánh bướm mềm mại như đang tung tăng nhảy múa mỗi khi có làn gió thổi qua. Đây cũng là loài hoa tinh tế và sức sống bền bỉ. ', 'image' => 'images/img8.jpg'],
    ['name' => 'Hoa sen', 'description' => 'Khi những tia nắng ấm áp của mùa hè bắt đầu xuất hiện thì cũng là lúc mùa sen lại về trên những cánh đồng bạt ngàn. Hoa sen tượng trưng cho vẻ đẹp trắng trong, tao nhã của tâm hồn. Hoa có thể được trồng trong chiếc ao vườn nhà, có thể được trồng trong chậu trang trí đều đẹp cả. Những bông hoa đẹp nở rộ như báo hiệu một mùa hè tuyệt đẹp hiện hữu trong ngôi nhà của bạn.', 'image' => '   images/img9.jpg'],
    ['name' => 'Hoa dừa cạn ', 'description' => 'Hoa dừa cạn còn có các tên gọi như trường xuân hoa, dương giác, bông dừa, mỹ miều hơn thì là Hải Đằng. Hoa nở không ngừng từ mùa xuân sang mùa hè cho đến tận mùa thu. Hoa có 3 màu cơ bản là trắng, hồng nhạt và tím nhạt, lá và hoa cùng nhau vươn lên khiến cho khóm dừa cạn tuy nhỏ bé nhưng luôn tràn đầy sức sống. Loài hoa này còn tượng trưng cho sự thành đạt và có khả năng trừ tà.', 'image' => 'images/img10.jpg'],
    ['name' => 'Hoa sử quân tử', 'description' => 'Sử quân tử là loài cây leo, hoa có cánh nhỏ xinh, màu hồng pha trắng hoặc đỏ tươi, mọc thành từng chùm khoe sắc trong nắng sớm, rung rinh trong gió. Hoa toát lên một vẻ đẹp vô cùng giản dị kèm theo mùi hương nồng đượm. Tuy nhẹ nhàng là thế nhưng sử quân tử lại có khả năng chịu được nắng nóng khắc nghiệt nên có thể trồng trong cả mùa hè.', 'image' => 'images/img11.jpg'],
    ['name' => 'Cúc lá nho', 'description' => 'Cúc lá nho thuộc họ nhà Cúc, được biết đến với những bông hoa nhiều màu sắc phong phú, tươi sáng: nào là trắng, hồng cho đến tím, xanh dương,… và những chiếc lá to với hình dáng răng cưa độc đáo. Hạt cúc lá nho nảy mầm nhanh vào mùa xuân, nở hoa sang tận mùa hè lẫn mùa thu. Đây là loại hoa biểu trưng cho sự giàu có và trường thọ..', 'image' => 'images/img12.jpg'],
    ['name' => 'Hoa cúc dại', 'description' => 'Với phần thân mảnh mai nhưng luôn vươn lên mạnh mẽ, lại chịu được nhiệt độ cao, thậm chí là khi tiết trời hạn hán nên hoa cúc dại cực kỳ thích hợp trồng từ mùa xuân cho đến tận mùa hè nắng gắt. Hoa có màu trắng, hồng tươi sáng hay vàng cam nổi bật, không kiêu sa nhưng sức sống bền bỉ. Thậm chí khi hoa tàn, hạt rụng xuống đất lại tiếp tục phát triển vào mùa thu.', 'image' => 'images/img13.jpg'],
];

// Xử lý chế độ
if (isset($_GET['admin'])) {
    $_SESSION['mode'] = 'admin';
} elseif (isset($_GET['user'])) {
    $_SESSION['mode'] = 'user';
}

// Dữ liệu session
if (!isset($_SESSION['flowers'])) {
    $_SESSION['flowers'] = $flowers;
}
$flowers = $_SESSION['flowers'];

// Xử lý thêm hoa
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    
    // Kiểm tra và lưu ảnh
    if (!empty($_FILES['image']['name'])) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/webp'];
        if (in_array($_FILES['image']['type'], $allowed_types)) {
            $image = 'images/' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $image);
        } else {
            die("Chỉ cho phép các tệp JPG, PNG, WEBP.");
        }
    } else {
        die("Vui lòng tải lên hình ảnh.");
    }

    // Thêm vào danh sách
    $flowers[] = ['name' => $name, 'description' => $description, 'image' => $image];
    $_SESSION['flowers'] = $flowers;
    header("Location: ?admin=true");
    exit;
}

// Xử lý sửa hoa
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $id = intval($_POST['id']);
    if (isset($flowers[$id])) {
        $name = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);
        $image = $flowers[$id]['image']; // giữ nguyên ảnh nếu không thay

        if (!empty($_FILES['image']['name'])) {
            $allowed_types = ['image/jpeg', 'image/png', 'image/webp'];
            if (in_array($_FILES['image']['type'], $allowed_types)) {
                $image = 'images/' . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $image);
            } else {
                die("Chỉ cho phép các tệp JPG, PNG, WEBP.");
            }
        }

        // Cập nhật
        $flowers[$id] = ['name' => $name, 'description' => $description, 'image' => $image];
        $_SESSION['flowers'] = $flowers;
        header("Location: ?admin=true");
        exit;
    }
}

// Xử lý xóa hoa
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    if (isset($flowers[$id])) {
        unset($flowers[$id]);
        $_SESSION['flowers'] = array_values($flowers); // Reset lại chỉ mục
        header("Location: ?admin=true");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Hoa</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: center; }
        img { max-width: 100px; height: auto; }
        form { margin-bottom: 20px; }
        #addFlowerForm { display: none; margin-top: 20px; }
    </style>
    <script>
        function toggleAddForm() {
            var form = document.getElementById('addFlowerForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</head>
<body>
    <?php if ($_SESSION['mode'] === 'admin'): ?>
        <!-- Giao diện quản trị -->
        <h1>Quản Trị Danh Sách Hoa</h1>
        <a href="?user=true">Chuyển Sang Chế Độ Người Dùng</a> <!-- Link chuyển chế độ -->

        <!-- Nút Thêm Hoa Mới (Bấm vào để hiện form thêm hoa mới) -->
        <button onclick="toggleAddForm()">Thêm Hoa Mới</button>

        <!-- Form Thêm Hoa Mới (Sẽ ẩn đi cho đến khi bấm nút) -->
        <div id="addFlowerForm">
            <h2>Thêm Hoa Mới</h2>
            <form method="POST" enctype="multipart/form-data">
                <label>Tên Hoa:</label><br>
                <input type="text" name="name" required><br><br>
                <label>Mô Tả:</label><br>
                <textarea name="description" required></textarea><br><br>
                <label>Hình Ảnh:</label><br>
                <input type="file" name="image" required><br><br>
                <button type="submit" name="add">Thêm</button>
            </form>
        </div>

        <!-- Bảng Thông Tin Hoa -->
        <table>
            <tr>
                <th>Tên Hoa</th>
                <th>Mô Tả</th>
                <th>Hình Ảnh</th>
                <th>Chức Năng</th>
            </tr>
            <?php foreach ($flowers as $index => $flower): ?>
                <tr>
                    <td><?= $flower['name'] ?></td>
                    <td><?= $flower['description'] ?></td>
                    <td><img src="<?= $flower['image'] ?>" alt="<?= $flower['name'] ?>"></td>
                    <td>
                        <a href="?admin=true&edit=<?= $index ?>">Sửa</a> | 
                        <a href="?admin=true&delete=<?= $index ?>" onclick="return confirm('Bạn có chắc muốn xóa hoa này?');">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <?php if (isset($_GET['edit'])): 
            $index = intval($_GET['edit']);
            $flower = $flowers[$index];
        ?>
            <!-- Form Sửa Hoa -->
            <h2>Sửa Hoa: <?= $flower['name'] ?></h2>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $index ?>">
                <label>Tên Hoa:</label><br>
                <input type="text" name="name" value="<?= $flower['name'] ?>" required><br><br>
                <label>Mô Tả:</label><br>
                <textarea name="description" required><?= $flower['description'] ?></textarea><br><br>
                <label>Hình Ảnh:</label><br>
                <input type="file" name="image"><br><br>
                <button type="submit" name="edit">Lưu</button>
            </form>
        <?php endif; ?>

    <?php else: ?>
        <!-- Giao diện người dùng -->
        <h1>Danh Sách Hoa</h1>
        <a href="?admin=true">Chuyển Sang Chế Độ Quản Trị</a> <!-- Link chuyển chế độ -->
        <br><br>
        <table>
            <tr>
                <th>Tên Hoa</th>
                <th>Mô Tả</th>
                <th>Hình Ảnh</th>
            </tr>
            <?php foreach ($flowers as $flower): ?>
                <tr>
                    <td><?= $flower['name'] ?></td>
                    <td><?= $flower['description'] ?></td>
                    <td><img src="<?= $flower['image'] ?>" alt="<?= $flower['name'] ?>"></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
