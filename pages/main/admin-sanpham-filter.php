<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/action.php');

if (!isset($_GET['reset'])) {
    $minPrice = NULL;
    $maxPrice = NULL;
    $category = NULL;
    if (isset($_GET['minPrice']) && !empty($_GET['minPrice'])) {
        $minPrice = $_GET['minPrice'];
    }
    if (isset($_GET['maxPrice']) && !empty($_GET['maxPrice'])) {
        $maxPrice = $_GET['maxPrice'];
    }
    
    $price = "";
    if ($minPrice != NULL && $maxPrice != NULL) {
        $price = "AND giaMoi BETWEEN $minPrice AND $maxPrice";
    } else if ($minPrice != NULL && $maxPrice == NULL) {
        $price = "AND giaMoi >= $minPrice";
    } else if ($minPrice == NULL && $maxPrice != NULL) {
        $price = "AND giaMoi <= $maxPrice";
    } else {
        $price = "";
    }
    
    $db = new Database();
    $sql = "SELECT * FROM `sanpham` WHERE tinhTrang = 1 ";
    if (isset($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        $sql .= "AND LOWER(tenSanPham) LIKE LOWER('%$keyword%') ";
    }
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        if ($category != "all")
            $sql .= "AND maNhanHieu = '$category' ";
    }
    $sql .= $price;
    
    $kq = mysqli_query($db->getConnection(), $sql);
    $productArr = array();
    while ($row = mysqli_fetch_assoc($kq)) {
        $sanPham = new SanPham(
            $row['maSanPham'],
            $row['tenSanPham'],
            $row['giaCu'],
            $row['giaMoi'],
            $row['moTa'],
            $row['hinhAnh'],
            $row['maNhanHieu'],
            $row['sanPhamMoi'],
            $row['sanPhamHot'],
            $row['tinhTrang']
        );
        $productArr[] = $sanPham;
    }
    $db->disconnect();    
    $data = hienThiSanPhamAdmin($productArr);    
    echo $data;    
} else {
    echo hienThiSanPhamAdmin(null);
}