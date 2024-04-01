<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/action.php');

$id = $_POST['id'];
$ten = $_POST['tenNCC'];
$email = $_POST['emailNCC'];
$sdt = $_POST['sdtNCC'];
$diaChi = $_POST['diaChiNCC'];

$ncc = getNhaCungCapById($id);
if (!$ncc->isDifferent($ten, $diaChi, $sdt, $email)) {
    echo "unchange";
    return;
}

$db = new Database();

$query = "UPDATE `nhacungcap` SET tenNCC = '$ten', emailNCC = '$email', sdtNCC = '$sdt', diaChiNCC = '$diaChi' WHERE maNCC = '$id'";

if ($db->insert_update_delete($query)) {
    $db->disconnect();
    echo "success";
} else {
    $db->disconnect();
    echo "fail";
}

?>