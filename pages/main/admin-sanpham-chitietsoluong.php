<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/action.php');

if (isset($_GET['maSanPham'])) {
  $maSanPham = $_GET['maSanPham'];
  $soLuongList = getChiTietSoLuong($maSanPham);
  for ($i = 0; $i < count($soLuongList); $i++) {
    $soLuong = $soLuongList[$i];
    echo '<tr><td>' . $soLuong->getMaSize() . '</td><td>' . $soLuong->getSoLuong() . '</td></tr>';
  }
}
?>