<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/database.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/sanpham.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/size.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/soluong.php');

const DA_XOA = 0;
const CON_HANG = 1;
const HET_HANG = 2;

// Lấy mảng tất cả sản phẩm
function getProductList()
{
	$db = new Database();
	$kq = mysqli_query($db->getConnection(), "SELECT * FROM sanpham");
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
	return $productArr;
}

function getTenProductList()
{
	$db = new Database();
	$kq = mysqli_query($db->getConnection(), "SELECT tenSanPham FROM sanpham");
	$name = array();
	while ($row = mysqli_fetch_assoc($kq)) {
		$name[] = $row['tenSanPham'];
	}
	$db->disconnect();
	return $name;
}

function getSoLuongSanPham($maSanPham)
{
	if (!isExistMaSanPham($maSanPham)) {
		return 0;
	}
	$db = new Database();
	$sql = "SELECT SUM(soLuong) as `SoLuong` FROM soluong WHERE maSanPham = '" . $maSanPham . "'";
	$kq = mysqli_query($db->getConnection(), $sql);
	$row = mysqli_fetch_assoc($kq);
	return $row['SoLuong'];
}

function isExistMaSanPham($maSanPham)
{
	$db = new Database();
	$sql = "SELECT * FROM sanpham WHERE maSanPham ='" . $maSanPham . "'";
	$kq = mysqli_query($db->getConnection(), $sql);
	$row = mysqli_fetch_assoc($kq);
	if (is_null($row))
		return false;
	else
		return true;
}

function getChiTietSoLuong($maSanPham) {
	$db = new Database();
	$sql = "SELECT * FROM soluong WHERE maSanPham = '" . $maSanPham . "'";
	$kq = mysqli_query($db->getConnection(), $sql);
	$soLuongArr = array();
	while ($row = mysqli_fetch_assoc($kq)) {
		$soLuong = new SoLuong(
			$row['maSanPham'],
			$row['soLuong'],
			$row['maSize']
		);
		$soLuongArr[] = $soLuong;
	}
	$db->disconnect();
	return $soLuongArr;
}

/*
	Hàm chuyển đỗi chuỗi số thành tiền
	VD: 3000000
	Result => 3.000.000
*/
function changeMoney($moneyIn)
{
	$arr = array();
	$arr = str_split($moneyIn, 1);
	$count = 0;
	$temp = "";
	for ($i = count($arr) - 1; $i >= 0; $i--) {
		++$count;
		if ($count % 3 == 0 && $i > 0) {
			$temp .= $arr[$i];
			$temp .= ".";
			continue;
		}
		$temp .= $arr[$i];
	}
	// Đảo ngược chuỗi
	$moneyOut = "";
	$count = 0;
	$arr = str_split($temp, 1);
	for ($i = count($arr) - 1; $i >= 0; --$i) {
		$moneyOut .= $arr[$i];
		$count++;
	}
	return $moneyOut;
}
