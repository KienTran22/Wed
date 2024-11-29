<?php

$filename = "KTPM2.csv";
$sinhvien = [];

// Kiểm tra tệp có tồn tại không
if (!file_exists($filename)) {
    die("Không tìm thấy tệp CSV!");
}

// Mở tệp CSV
if (($handle = fopen($filename, "r")) !== FALSE) {
    // Đọc dòng đầu tiên
    $line = fgets($handle);

    // Xóa BOM nếu tồn tại
    $bom = pack('CCC', 0xEF, 0xBB, 0xBF);
    if (strncmp($line, $bom, 3) === 0) {
        $line = substr($line, 3);
    }

    // Lấy tiêu đề
    $headers = str_getcsv($line, ",");


    // Đọc từng dòng dữ liệu
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $sinhvien[] = array_combine($headers, $data);
    }

    // Đóng tệp
    fclose($handle);
}
