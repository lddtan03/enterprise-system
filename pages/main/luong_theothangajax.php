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
if (isset($_POST['thang'])) {
    $thang = $_POST['thang'];
}

if (isset($_POST['nam'])) {
    $nam = $_POST['nam'];
}

$manv = $_SESSION['taiKhoan'];

$sql = "select * from chamcong cc join nhanvien nv on cc.maNhanVien = nv.maNhanVien  join hopdong hd on hd.maNhanVien = nv.maNhanVien where nv.maNhanVien = $manv and thangChamCong = $thang and namChamCong = $nam"; 
$getNgayNghiTheoMa = "select nv.maNhanVien, SUM(soNgayNghi) soNgayNghiCoPhep from nhanvien nv join donnghiphep dnp on nv.maNhanVien = dnp.maNhanVien where nv.maNhanVien = $manv and MONTH(ngayBatDauNghi) = $thang  group by nv.maNhanVien";


$result = $conn->query($sql);
$result2 = $conn->query($getNgayNghiTheoMa);


if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $arr[] = $row; 
    }
}else{
    $arr = [];
}




if($result2->num_rows > 0){
    while($row2 = $result2->fetch_assoc()){
        $arr2[] = $row2; 
    }
    $data['result2'] = $arr2;
}else{
    $data['result2'] = [];
}


$data['result']= $arr;


echo json_encode($data);