<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/database.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/donnghiphep.php');
    if($_GET['maDon']){
        $maDon=$_GET['maDon'];
        $db = new Database();
        $sql = "DELETE FROM donnghiphep WHERE maDon = '$maDon'";
        $kq = mysqli_query($db->getConnection(),$sql);
        $db->disconnect();
        header('location:../../index.php?page=donnghiphep');
    }
    if (isset($_POST['NopDonNghiPhep'])) {
        // Get the form data
        $lyDo = $_POST['lyDo'];
        $ngayBatDauNghi = date('Y-m-d', strtotime($_POST['ngayBatDauNghi']));
        $ngayKetThucNghi = date('Y-m-d', strtotime($_POST['ngayKetThucNghi']));
        
        // Số ngày nghỉ
        $startDate = new DateTime($ngayBatDauNghi);
        $endDate = new DateTime($ngayKetThucNghi);
        $interval = $startDate->diff($endDate);
        $days = $interval->days+1;
        
        echo $lyDo . "<br>";
        echo $ngayBatDauNghi . "<br>";
        echo $ngayKetThucNghi . "<br>";
        echo $days . "<br>";    
        session_start(); // Start the session

        echo $_SESSION['taiKhoan'];
        
        
        $db = new Database();
        $sql= "INSERT INTO donnghiphep(maNhanVien, ngayBatDauNghi, ngayKetThucNghi, soNgayNghi, lyDo, nguoiPheDuyet, ngayPheDuyet, trangThai) VALUES ('".$_SESSION['taiKhoan']."', '".$ngayBatDauNghi."', '".$ngayKetThucNghi."', '".$days."', '".$lyDo."', NULL, NULL, 0)";
        $kq = mysqli_query($db->getConnection(),$sql);
        $db->disconnect();
        // Redirect to a success page
        header('location:../../index.php?page=donnghiphep');
    }
?>