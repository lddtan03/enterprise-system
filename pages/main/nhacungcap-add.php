<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/action.php');

$id = getNewestMaNCC();
$ten = trim($_POST['tenNCC']);
$email = trim($_POST['emailNCC']);
$sdt = trim($_POST['sdtNCC']);
$diaChi = trim($_POST['diaChiNCC']);


$db = new Database();

$query = "INSERT INTO `nhacungcap` (maNCC, tenNCC, emailNCC, sdtNCC, diaChiNCC, tinhTrang) VALUES ('$id', '$ten', '$email', '$sdt', '$diaChi', 1)";

if ($db->insert_update_delete($query)) {
    $db->disconnect();
    echo "<script>
        sessionStorage.setItem('addNCC', 'success');
        window.location = '/HTTT-DN/index.php?page=nhacungcap'; 
    </script>";
} else {
    $db->disconnect();
    echo "<script>
        sessionStorage.setItem('addNCC', 'fail');
        window.location = '/HTTT-DN/index.php?page=nhacungcap'; 
        </script>";
}

?>