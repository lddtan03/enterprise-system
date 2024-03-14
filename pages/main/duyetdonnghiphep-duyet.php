<?php 
    require_once '../../config/config.php';
// Xử lý
    $maDon=$_GET['maDon'];
    $ngayHienTai = date("Y-m-d");
    echo $ngayHienTai;
    $query_duyet="UPDATE donnghiphep SET trangThai = 1, ngayPheDuyet='$ngayHienTai' WHERE maDon =' $maDon'";
    mysqli_query($connect,$query_duyet);
    header('location:../../index.php?page=duyetdonnghiphep');

?>