<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/database.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/sanpham.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/size.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/soluong.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/nhacungcap.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/nhanhieu.php');

const DA_XOA = 0;
const CON_HANG = 1;
const HET_HANG = 2;

// Lấy mảng tất cả sản phẩm
function getProductList()
{
	$db = new Database();
	$kq = mysqli_query($db->getConnection(), "SELECT * FROM `sanpham`");
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
	$sql = "SELECT * FROM `sanpham` WHERE maSanPham ='" . $maSanPham . "'";
	$kq = mysqli_query($db->getConnection(), $sql);
	$row = mysqli_fetch_assoc($kq);
	if (is_null($row))
		return false;
	else
		return true;
}

function getChiTietSoLuong($maSanPham)
{
	$db = new Database();
	$sql = "SELECT * FROM `soluong` WHERE maSanPham = '" . $maSanPham . "'";
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

function getNhaCungCapList()
{
	$db = new Database();
	$kq = mysqli_query($db->getConnection(), "SELECT * FROM `nhacungcap`");
	$nhaCungCapArr = array();
	while ($row = mysqli_fetch_assoc($kq)) {
		$nhaCungCap = new NhaCungCap(
			$row['maNCC'],
			$row['tenNCC'],
			$row['diaChiNCC'],
			$row['sdtNCC'],
			$row['emailNCC']
		);
		$nhaCungCapArr[] = $nhaCungCap;
	}
	$db->disconnect();
	return $nhaCungCapArr;
}

function getProductById($id)
{
	$db = new Database();
	$kq = mysqli_query($db->getConnection(), "SELECT * FROM `sanpham` WHERE maSanPham = '" . $id . "'");
	$row = mysqli_fetch_assoc($kq);
	if ($row) {
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
		$db->disconnect();
		return $sanPham;
	} else {
		return null;
	}
}

function getNhanHieuList() {
	$db = new Database();
	$sql = "SELECT * FROM `nhanhieu`";
	$kq = mysqli_query($db->getConnection(), $sql);
	$arr = array();
	while ($row = mysqli_fetch_assoc($kq)) {
		$nhanHieu = new NhanHieu(
			$row['maNhanHieu'],
			$row['tenNhanHieu']
		);
		$arr[] = $nhanHieu;
	}
	$db->disconnect();
	return $arr;
}

// Lấy mã sản phẩm dự kiến của sản phẩm sắp tạo
function getNewestMaSanPham() {
	$db = new Database();
	$sql = "SELECT max(maSanPham) + 1 as 'maSanPham' FROM `sanpham`";
	$kq = mysqli_query($db->getConnection(), $sql);	
	$row = mysqli_fetch_assoc($kq);
	$maSanPham = $row['maSanPham'];
	$db->disconnect();
	return $maSanPham;
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

function hienThiSanPham()
{
  
  $productList = getProductList();
  for ($i = 0; $i < count($productList); $i++) {    
    $product = $productList[$i];
    if ($product->getTinhTrang() == DA_XOA)
      continue;
    echo '
    <tr>
      <td>' . $product->getMaSanPham() . '</td>' .
      '<td>' .
      '<img src="' . $product->getHinhAnh() . '" alt="" style="width: 50px; height: 50px; border-radius: 1000px;">' .
      '</td>' .
      '<td>' . $product->getTenSanPham() . '</td>' .
      '<td>' . changeMoney($product->getGiaCu()) . '₫</td>' .
      '<td>' . changeMoney($product->getGiaMoi()) . '₫</td>' .
      '<td>' . $product->getMaNhanHieu() . '</td>' .
      '<td>Nam, thể thao</td>' .
      '<td>' .
      '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#chitietsoluong" 
      onclick="getChiTietSoLuong(' . $product->getMaSanPham() . ')"></span>'
      . getSoLuongSanPham($product->getMaSanPham()) . '</button>' .
      '</td>' .
      '<td>
        <div style="display: flex; align-items: center; justify-content: start; gap: 10px;">
          <button type="button" class="btn mb-2 btn-warning" onclick="window.location.href = \'index.php?page=sanpham&action=edit&masanpham=' . $product->getMaSanPham() . '\'">Sửa</button>
          <button type="button" class="btn mb-2 btn-danger" onclick="displayDelete(\'product\', ' . $product->getMaSanPham() . ')">Xóa</button>
        </div>
      </td>
    </tr>';
  }
}