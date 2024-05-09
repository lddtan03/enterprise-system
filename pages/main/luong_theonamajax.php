<?php
// Kết nối đến cơ sở dữ liệu
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "htttdn";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);
// $manv = $_SESSION['taiKhoan'];

$data = [];

if (isset($_POST['nam'])) {
    $nam = $_POST['nam'];
}

$manv = $_SESSION['taiKhoan'];


$sql = "select * from chamcong cc join nhanvien nv on cc.maNhanVien = nv.maNhanVien join hopdong hd on hd.maNhanVien = nv.maNhanVien where nv.maNhanVien = $manv and namChamCong = $nam ORDER BY thangChamCong ASC";
$sql2 = "select SUM(thucLanh) as tongLuongNam from chamcong WHERE namChamCong = $nam and  maNhanVien = $manv";

$sql3 = "select MONTH(ngayBatDauNghi) as thang, SUM(soNgayNghi) as soNgayNghi from donnghiphep dnp where maNhanVien = $manv group by MONTH(ngayBatDauNghi)";


$result = $conn->query($sql);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $arr[] = $row;
    }
    $data['result'] = $arr;
} else {
    $arr = [];
}

if ($result2->num_rows > 0) {
    while ($row2 = $result2->fetch_assoc()) {
        $arr2[] = $row2;
    }
    $data['result2'] = $arr2;
} else {
    $arr2 = [];
}

if ($result3->num_rows > 0) {
    while ($row3 = $result3->fetch_assoc()) {
        $arr3[] = $row3;
    }
    $data['result3'] = $arr3;
} else {
    $arr3 = [];
}


echo json_encode($data);
