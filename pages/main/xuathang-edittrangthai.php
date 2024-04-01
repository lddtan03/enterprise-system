<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/action.php');

if (isset($_GET['maPhieuXuat']) && isset($_GET['trangThai'])) {
    $maPhieuXuat = $_GET['maPhieuXuat'];
    $trangThai = $_GET['trangThai'];

    $phieuXuat = getPhieuXuatById($maPhieuXuat);
    if ($phieuXuat->getTrangThai() == $trangThai) {
        echo "
        <script>
            sessionStorage.setItem('editTrangThaiPhieuXuat', 'same" . $trangThai . "');
            window.location = '/HTTT-DN/index.php?page=xuathang';     
        </script>";
    } else {
        $db = new Database();
        $query = "UPDATE `phieuXuat` SET trangThai = '$trangThai' WHERE maPhieuXuat = '$maPhieuXuat'";
        if($db->insert_update_delete($query)) {
            echo "
            <script>
                sessionStorage.setItem('editTrangThaiPhieuXuat', 'success');
                window.location = '/HTTT-DN/index.php?page=xuathang'; 
            </script>";
        } else {
            echo "
            <script>
                sessionStorage.setItem('editTrangThaiPhieuXuat', 'fail');
                window.location = '/HTTT-DN/index.php?page=xuathang'; 
            </script>";
        }
    }
}

?>