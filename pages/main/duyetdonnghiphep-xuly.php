<?php 
    require_once '../../config/config.php';
// Xử lý
    if($_GET['hanhdong']=='duyet'){
        $maDon=$_GET['maDon'];
        $ngayHienTai = date("Y-m-d");
        echo $ngayHienTai;
        $query_duyet="UPDATE donnghiphep SET trangThai = 1, ngayPheDuyet='$ngayHienTai' WHERE maDon =' $maDon'";
        mysqli_query($connect,$query_duyet);
    }
    else{
        $maDon=$_GET['maDon'];
        $ngayHienTai = NULL;
        echo $ngayHienTai;
        $query_duyet="UPDATE donnghiphep SET trangThai = 0, ngayPheDuyet='$ngayHienTai' WHERE maDon =' $maDon'";
        mysqli_query($connect,$query_duyet);
    }
    header('location:../../index.php?page=duyetdonnghiphep');
// ?>