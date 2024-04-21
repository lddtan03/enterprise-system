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

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $arr[] = $row; 
    }
}else{
    $arr = [];
}


$data['result']= $arr;

echo json_encode($data);