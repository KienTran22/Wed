<!-- 3. Kết nối PHP với MySQL (PDO)
Dưới đây là cách kết nối PHP với MySQL và thực hiện các câu lệnh truy vấn như trên.

Kết nối cơ sở dữ liệu bằng PHP và PDO -->

<?php
$host = '127.0.0.1';
$db   = 'bai_tap_on_tap_sql';
$user = 'root';  // Tên người dùng MySQL
$pass = '';  // Mật khẩu MySQL
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Kết nối thành công!";
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>

<!-- 4. Thao tác lấy dữ liệu với PHP và PDO
Lấy tất cả sinh viên từ bảng sinh_vien -->

<?php
function getAllStudents() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM sinh_vien");
    return $stmt->fetchAll();
}

// Gọi hàm và hiển thị dữ liệu
$students = getAllStudents();
foreach ($students as $student) {
    echo $student['ten_sv'] . " - Tuổi: " . $student['tuoi'] . "<br>";
}
?>

<!-- Lấy sinh viên với tên địa phương -->

<?php
function getStudentsWithLocation() {
    global $pdo;
    $stmt = $pdo->query("SELECT sinh_vien.ten_sv, sinh_vien.tuoi, dia_phuong.ten_dia_phuong 
                         FROM sinh_vien
                         JOIN dia_phuong ON sinh_vien.que_quan = dia_phuong.ma_dia_phuong");
    return $stmt->fetchAll();
}

// Gọi hàm và hiển thị dữ liệu
$students = getStudentsWithLocation();
foreach ($students as $student) {
    echo $student['ten_sv'] . " - Tuổi: " . $student['tuoi'] . " - Địa phương: " . $student['ten_dia_phuong'] . "<br>";
}
?>

<!-- Lọc sinh viên với điều kiện
Ví dụ lọc sinh viên có tuổi lớn hơn 21: -->
<?php
function getStudentsByAge($age) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM sinh_vien WHERE tuoi > :age");
    $stmt->execute(['age' => $age]);
    return $stmt->fetchAll();
}

// Gọi hàm và hiển thị kết quả
$students = getStudentsByAge(21);
foreach ($students as $student) {
    echo $student['ten_sv'] . " - Tuổi: " . $student['tuoi'] . "<br>";
}
?>

<!-- Lọc sinh viên với LIKE
Ví dụ lọc sinh viên có tên bắt đầu bằng "Nguyễn": -->

<?php
function getStudentsByName($name) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM sinh_vien WHERE ten_sv LIKE :name");
    $stmt->execute(['name' => $name . '%']);
    return $stmt->fetchAll();
}

// Gọi hàm và hiển thị kết quả
$students = getStudentsByName('Nguyễn');
foreach ($students as $student) {
    echo $student['ten_sv'] . " - Tuổi: " . $student['tuoi'] . "<br>";
}
?>
