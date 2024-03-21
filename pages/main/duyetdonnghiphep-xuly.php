<?php 
    require_once '../../config/config.php';
    session_start();
    // Xử lý
    if($_GET['hanhdong']=='duyet'){
        $maDon=$_GET['maDon'];
        $ngayHienTai = date("Y-m-d");
        echo $ngayHienTai;
        $query_duyet="UPDATE donnghiphep SET trangThai = 1, ngayPheDuyet='".$ngayHienTai."' , nguoiPheDuyet='".$_SESSION['taiKhoan']."' WHERE maDon ='".$maDon."'";
        mysqli_query($connect,$query_duyet);
    }
    else{
        $maDon=$_GET['maDon'];
        $ngayHienTai = NULL;
        echo $ngayHienTai;
        $query_duyet="UPDATE donnghiphep SET trangThai = 0, ngayPheDuyet=null,  nguoiPheDuyet=null WHERE maDon =' $maDon'";
        mysqli_query($connect,$query_duyet);
    }
    header('location:../../index.php?page=duyetdonnghiphep');
// ?>