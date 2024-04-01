<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/action.php');

if (isset($_GET['maPhieuNhap']) && isset($_GET['trangThai'])) {
    $maPhieuNhap = $_GET['maPhieuNhap'];
    $trangThai = $_GET['trangThai'];

    $phieuNhap = getPhieuNhapById($maPhieuNhap);
    if ($phieuNhap->getTrangThai() == $trangThai) {
        echo "
        <script>
            sessionStorage.setItem('editTrangThaiPhieuNhap', 'same" . $trangThai . "');
            window.location = '/HTTT-DN/index.php?page=nhaphang&id=danhsachphieunhap';     
        </script>";
    } else {
        $db = new Database();
        $query = "UPDATE `phieunhap` SET trangThai = '$trangThai' WHERE maPhieuNhap = '$maPhieuNhap'";
        if($db->insert_update_delete($query)) {
            echo "
            <script>
                sessionStorage.setItem('editTrangThaiPhieuNhap', 'success');
                window.location = '/HTTT-DN/index.php?page=nhaphang&id=danhsachphieunhap';     
            </script>";
        } else {
            echo "
            <script>
                sessionStorage.setItem('editTrangThaiPhieuNhap', 'fail');
                window.location = '/HTTT-DN/index.php?page=nhaphang&id=danhsachphieunhap';     
            </script>";
        }
    }
}

?>