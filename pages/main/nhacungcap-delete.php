<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/action.php');

$id = $_POST['id'];
$db = new Database();
$sql = "UPDATE `nhacungcap` SET tinhTrang = 0 WHERE maNCC = $id";
if ($db->insert_update_delete($sql)) {
    $db->disconnect();
    echo "
        <script>
            sessionStorage.setItem('deleteNhaCungCap', 'success');
            window.location = '/HTTT-DN/index.php?page=nhacungcap'; 
        </script>";
} else {
    $db->disconnect();
    echo "
        <script>
            sessionStorage.setItem('deleteNhaCungCap', 'fail');
            window.location = '/HTTT-DN/index.php?page=nhacungcap'; 
        </script>";
}