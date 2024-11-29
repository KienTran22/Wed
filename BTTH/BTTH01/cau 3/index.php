<!DOCTYPE html>
<html lang="en">
<?php include("getsv.php")
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách sinh viên</h1>
        <table class="table table-bordered table-striped thead-light">
            <thead class="table-dark">
                <tr>
                    <th>USER NAME</th>
                    <th>PASSWORD</th>
                    <th>LAST NAME</th>
                    <th>FIRTS NAME</th>
                    <th>CITY</th>
                    <th>EMAIL</th>
                    <th>COURSE1</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($sinhvien)) {
                    foreach ($sinhvien as $sv) {
                        echo "<tr>";
                        echo "<td>{$sv['name']}</td>";
                        echo "<td>{$sv['password']}</td>";
                        echo "<td>{$sv['lastname']}</td>";
                        echo "<td>{$sv['firstname']}</td>";
                        echo "<td>{$sv['city']}</td>";
                        echo "<td>{$sv['email']}</td>";
                        echo "<td>{$sv['course1']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Không có dữ liệu để hiển thị.</td></tr>";
                }
                ?>
            </tbody>


        </table>
    </div>
</body>

</html>