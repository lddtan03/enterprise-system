<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/database.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/sanpham.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/size.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/soluong.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/nhacungcap.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/nhanhieu.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/taikhoan.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/nhanvien.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/chucvu.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/phieunhap.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/chitietphieunhap.php');

const DA_XOA = 0;
const CON_HANG = 1;
const HET_HANG = 2;
const ADMIN = 'admin';
const NHAN_VIEN = 'nhanvien';
const QUAN_LY_KHO = 'quanlykho';
const QUAN_LY_NHAN_SU = 'quanlynhansu';
const QUAN_LY_KINH_DOANH = 'quanlykinhdoanh';
const DA_NHAN = 1;
const CHUA_NHAN = 0;

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
	$db->disconnect();
	return $row['SoLuong'];
}

function isExistMaSanPham($maSanPham)
{
	$db = new Database();
	$sql = "SELECT * FROM `sanpham` WHERE maSanPham ='" . $maSanPham . "'";
	$kq = mysqli_query($db->getConnection(), $sql);
	$row = mysqli_fetch_assoc($kq);
	if (is_null($row)) {
		$db->disconnect();
		return false;
	}
	else{
		$db->disconnect();
		return true;
	}
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
			$row['emailNCC'],
			$row['tinhTrang']
		);
		$nhaCungCapArr[] = $nhaCungCap;
	}
	$db->disconnect();
	return $nhaCungCapArr;
}

function getNhaCungCapById($id)
{
	$db = new Database();
	$kq = mysqli_query($db->getConnection(), "SELECT * FROM `nhacungcap` WHERE maNCC = '" . $id . "'");
	$row = mysqli_fetch_assoc($kq);
	if ($row) {
		$nhaCungCap = new NhaCungCap(
			$row['maNCC'],
			$row['tenNCC'],
			$row['diaChiNCC'],
			$row['sdtNCC'],
			$row['emailNCC'],
			$row['tinhTrang']
		);
		$db->disconnect();
		return $nhaCungCap;
	} else {
		$db->disconnect();
		return null;
	}
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
		$db->disconnect();
		return null;
	}
}

function getNhanHieuList()
{
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
function getNewestMaSanPham()
{
	$db = new Database();
	$sql = "SELECT max(maSanPham) + 1 as 'maSanPham' FROM `sanpham`";
	$kq = mysqli_query($db->getConnection(), $sql);
	$row = mysqli_fetch_assoc($kq);
	$maSanPham = $row['maSanPham'];
	$db->disconnect();
	return $maSanPham;
}

function getNewestMaNCC()
{
	$db = new Database();
	$sql = "SELECT max(maNCC) + 1 as 'maNCC' FROM `nhacungcap`";
	$kq = mysqli_query($db->getConnection(), $sql);
	$row = mysqli_fetch_assoc($kq);
	$maNCC = $row['maNCC'];
	$db->disconnect();
	return $maNCC;
}

function getNewestMaPhieuNhap()
{
	$db = new Database();
	$sql = "SELECT max(maPhieuNhap) + 1 as 'maPhieuNhap' FROM `phieunhap`";
	$kq = mysqli_query($db->getConnection(), $sql);
	$row = mysqli_fetch_assoc($kq);
	$maPhieuNhap = $row['maPhieuNhap'];
	$db->disconnect();
	return $maPhieuNhap;
}

function getNewestMaChiTietPhieuNhap()
{
	$db = new Database();
	$sql = "SELECT max(maChiTietPhieuNhap) + 1 as 'maChiTietPhieuNhap' FROM `chitietphieunhap`";
	$kq = mysqli_query($db->getConnection(), $sql);
	$row = mysqli_fetch_assoc($kq);
	$maChiTietPhieuNhap = $row['maChiTietPhieuNhap'];
	$db->disconnect();
	return $maChiTietPhieuNhap;
}

function getTaiKhoanBy($taiKhoan)
{
	$db = new Database();
	$kq = mysqli_query($db->getConnection(), "SELECT * FROM `taikhoan` WHERE taiKhoan = '$taiKhoan'");
	$row = mysqli_fetch_assoc($kq);
	if ($row) {
		$taiKhoan = new TaiKhoan(
			$row['taiKhoan'],
			$row['matKhau'],
			$row['maNhomQuyen']
		);
		$db->disconnect();
		return $taiKhoan;
	} else {
		$db->disconnect();
		return null;
	}
}

function getNhanVienById($id)
{
	$db = new Database();
	$kq = mysqli_query($db->getConnection(), "SELECT * FROM `nhanvien` WHERE maNhanVien = '$id'");
	$row = mysqli_fetch_assoc($kq);
	if ($row) {
		$nhanVien = new NhanVien(
			$row['maNhanVien'],
			$row['cmnd'],
			$row['hoTen'],
			$row['gioiTinh'],
			$row['ngaySinh'],
			$row['diaChi'],
			$row['sdt'],
			$row['danToc'],
			$row['email'],
			$row['maChucVu'],
			$row['maPhong'],
			$row['avatar']
		);
		$db->disconnect();
		return $nhanVien;
	} else {
		$db->disconnect();
		return null;
	}
}

function getChucVuById($id)
{
	$db = new Database();
	$kq = mysqli_query($db->getConnection(), "SELECT * FROM `chucvu` WHERE maChucVu = '$id'");
	$row = mysqli_fetch_assoc($kq);
	if ($row) {
		$chucVu = new ChucVu(
			$row['maChucVu'],
			$row['tenChucVu']
		);
		$db->disconnect();
		return $chucVu;
	} else {
		$db->disconnect();
		return null;
	}
}

function tonTaiPhieuNhapCuaNhanVienTrongNgay($maNhanVien, $ngayNhap)
{
	$db = new Database();
	$kq = mysqli_query($db->getConnection(), "SELECT * FROM `phieunhap` WHERE maNhanVien = $maNhanVien AND ngayNhap = '$ngayNhap'");
	$row = mysqli_fetch_assoc($kq);
	if ($row) {
		$phieuNhap = new PhieuNhap(
			$row['maPhieuNhap'],
			$row['maNhanVien'],
			$row['ngayNhap'],
			$row['maNhaCungCap'],
			$row['tongTien'],
			$row['tongSoLuong'],
			$row['trangThai']
		);
		$db->disconnect();
		return $phieuNhap;
	} else {
		$db->disconnect();
		return null;
	}
}

function getPhieuNhapById($id)
{
	$db = new Database();
	$kq = mysqli_query($db->getConnection(), "SELECT * FROM `phieunhap` WHERE maPhieuNhap = $id");
	$row = mysqli_fetch_assoc($kq);
	if ($row) {
		$phieuNhap = new PhieuNhap(
			$row['maPhieuNhap'],
			$row['maNhanVien'],
			$row['ngayNhap'],
			$row['maNhaCungCap'],
			$row['tongTien'],
			$row['tongSoLuong'],
			$row['trangThai']
		);
		$db->disconnect();
		return $phieuNhap;
	} else {
		$db->disconnect();
		return null;
	}
}

function getPhieuNhapList()
{
	$db = new Database();
	$kq = mysqli_query($db->getConnection(), "SELECT * FROM `phieunhap`");
	$phieuNhapList = array();
	while($row = mysqli_fetch_assoc($kq)){	
		$phieuNhap = new PhieuNhap(
			$row['maPhieuNhap'],
			$row['maNhanVien'],
			$row['ngayNhap'],
			$row['maNhaCungCap'],
			$row['tongTien'],
			$row['tongSoLuong'],
			$row['trangThai']
		);
		$phieuNhapList[] = $phieuNhap;
	} 
	$db->disconnect();
	return $phieuNhapList;
}

function isExistMaPhieuNhap($maPhieuNhap) {
	$db = new Database();
	$kq = mysqli_query($db->getConnection(), "SELECT * FROM `phieunhap` WHERE maPhieuNhap = $maPhieuNhap");
	$row = mysqli_fetch_assoc($kq);
	if ($row) {
		$db->disconnect();		
		return true;
	} else {
		$db->disconnect();		
		return false;
	}
}

function isExistMaSizeOfMaSanPham($maSanPham, $maSize) {
	$db = new Database();
	$kq = mysqli_query($db->getConnection(), "SELECT * FROM `soluong` WHERE maSanPham = '$maSanPham' AND maSize = '$maSize'");
	$row = mysqli_fetch_assoc($kq);
	if ($row) {
		$db->disconnect();		
		return true;
	} else {
		$db->disconnect();		
		return false;
	}
}

function getChiTietPhieuNhapListByMaPhieuNhap($maPhieuNhap)
{
	$db = new Database();
	$kq = mysqli_query($db->getConnection(), "SELECT * FROM `chitietphieunhap` WHERE maPhieuNhap = '$maPhieuNhap'");
	$chiTietList = array();
	while ($row = mysqli_fetch_assoc($kq)) {
		$chiTiet = new ChiTietPhieuNhap(
			$row['maChiTietPhieuNhap'],
			$row['maPhieuNhap'],
			$row['maSanPham'],
			$row['soLuong'],
			$row['giaNhap'],
			$row['maSize']
		);
		$chiTietList[] = $chiTiet;
	}
	$db->disconnect();
	return $chiTietList;
}

function getChiTietPhieuNhapByMaChiTietPhieuNhap($maChiTietPhieuNhap)
{
	$db = new Database();
	$kq = mysqli_query($db->getConnection(), "SELECT * FROM `chitietphieunhap` WHERE maChiTietPhieuNhap = '$maChiTietPhieuNhap'");
	$row = mysqli_fetch_assoc($kq);
	if ($row) {
		$chiTiet = new ChiTietPhieuNhap(
			$row['maChiTietPhieuNhap'],
			$row['maPhieuNhap'],
			$row['maSanPham'],
			$row['soLuong'],
			$row['giaNhap'],
			$row['maSize']
		);
		$db->disconnect();
		return $chiTiet;
	} else
		return null;
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
