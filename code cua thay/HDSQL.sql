CREATE DATABASE bai_tap_on_tap_sql;

USE bai_tap_on_tap_sql;

-- Tạo bảng dia_phuong
CREATE TABLE dia_phuong (
  ma_dia_phuong INT NOT NULL PRIMARY KEY,
  ten_dia_phuong VARCHAR(50)
);

-- Chèn dữ liệu vào bảng dia_phuong
INSERT INTO dia_phuong (ma_dia_phuong, ten_dia_phuong) 
VALUES
(1, 'Hà Nội'),
(2, 'Thành phố Hồ Chí Minh'),
(3, 'Đà Nẵng');

-- Tạo bảng sinh_vien
CREATE TABLE sinh_vien (
  ma_sv INT NOT NULL PRIMARY KEY,
  ten_sv VARCHAR(50) NOT NULL,
  tuoi INT,
  que_quan INT,
  FOREIGN KEY (que_quan) REFERENCES dia_phuong (ma_dia_phuong) ON DELETE CASCADE
);

-- Chèn dữ liệu vào bảng sinh_vien
INSERT INTO sinh_vien (ma_sv, ten_sv, tuoi, que_quan)
VALUES
(1, 'Nguyễn Văn A', 20, 1),
(2, 'Trần Thị B', 21, 2),
(3, 'Lê Quang C', 22, 3);


/*Dưới đây là các ví dụ lấy dữ liệu với các câu lệnh truy vấn SQL.

Lấy tất cả dữ liệu từ bảng "sinh_vien"*/

SELECT * FROM sinh_vien;

/*Lấy dữ liệu từ nhiều bảng với liên kết khóa ngoại
Bạn có thể lấy thông tin sinh viên cùng với tên địa phương của họ bằng cách kết nối bảng sinh_vien và dia_phuong qua khóa ngoại que_quan:*/

SELECT sinh_vien.ten_sv, sinh_vien.tuoi, dia_phuong.ten_dia_phuong 
FROM sinh_vien
JOIN dia_phuong ON sinh_vien.que_quan = dia_phuong.ma_dia_phuong;
 /*Lọc dữ liệu bằng điều kiện (WHERE)
Ví dụ: lấy dữ liệu của sinh viên có tuổi lớn hơn 21:*/

SELECT * FROM sinh_vien
WHERE tuoi > 21;

/*Lọc dữ liệu với điều kiện "LIKE" và ký tự đại diện (WILDCARD)
Ví dụ: lấy dữ liệu sinh viên có tên bắt đầu bằng "Nguyễn":
*/
SELECT * FROM sinh_vien
WHERE ten_sv LIKE 'Nguyễn%';
/*Lấy dữ liệu từ nhiều bảng (JOIN)
Ví dụ: lấy dữ liệu từ nhiều bảng sinh_vien và dia_phuong, kết hợp thông tin về sinh viên và địa phương:*/
SELECT sinh_vien.ten_sv, sinh_vien.tuoi, dia_phuong.ten_dia_phuong 
FROM sinh_vien
JOIN dia_phuong ON sinh_vien.que_quan = dia_phuong.ma_dia_phuong;
