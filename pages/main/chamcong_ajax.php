<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "htttdn";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

$data = [];
if (isset($_POST['thang'])) {
    $thang = $_POST['thang'];
}

if (isset($_POST['nam'])) {
    $nam = $_POST['nam'];
}

$sql = "select * from chamcong WHERE thangChamCong = $thang and namChamCong = $nam"; 
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    $arr[] = $row; 
}

$data['result']= $arr;

echo json_encode($data);