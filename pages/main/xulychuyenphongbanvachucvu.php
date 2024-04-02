<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "htttdn";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

$data = [];
if (isset($_POST['tenphong'])) {
    $tenphong = $_POST['tenphong'];
    $data['tenphong'] = $tenphong;
}

$sql = "SELECT cv.maChucVu, cv.tenChucVu FROM chucvu cv WHERE cv.maChucVu not in (select nv.maChucVu from nhanvien nv join phongban pb on nv.maPhong = pb.maPhong WHERE nv.maPhong = '$tenphong' and nv.maChucVu = 'TP')"; // Thay đổi điều kiện truy vấn tùy thuộc vào cấu trúc của cơ sở dữ liệu của bạn
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    $arr[] = $row; 
}
$data['resultChucVu'] = $arr;

echo json_encode($data);
