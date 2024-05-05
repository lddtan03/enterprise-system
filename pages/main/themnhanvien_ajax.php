<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "htttdn";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

$data = [];
$error = [];
if (isset($_POST['cmnd'])) {
    $cmnd = $_POST['cmnd'];
    $sql_cmnd = "select * from nhanvien WHERE cmnd = '$cmnd'";
    $result_cmnd = $conn->query($sql_cmnd);

    if ($result_cmnd->num_rows > 0) {
        $error['cmnd'] = "CMND/CCCD đã tồn tại trong hệ thống";
    } else {
        $error['cmnd'] = "";
    }
}

if (isset($_POST['sdt'])) {
    $sdt = $_POST['sdt'];
    $sql_sdt = "select * from nhanvien WHERE sdt = '$sdt'";
    $result_sdt = $conn->query($sql_sdt);

    if ($result_sdt->num_rows > 0) {
        $error['sdt'] = "Số điện thoại đã tồn tại trong hệ thống";
    } else {
        $error['sdt'] = "";
    }
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $sql_email = "select * from nhanvien WHERE email = '$email'";
    $result_email = $conn->query($sql_email);

    if ($result_email->num_rows > 0) {
        $error['email'] = "Email đã tồn tại trong hệ thống";
    } else {
        $error['email'] = "";
    }
}



$data['error'] = $error;

echo json_encode($data);
