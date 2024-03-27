<?php
session_start();
ob_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/action.php');

if (isset($_GET['maNhaCungCap'])) {
    // Lấy thông tin nhà cung cấp
    $maNhaCungCap = $_GET['maNhaCungCap'];
    $ncc = getNhaCungCapById($maNhaCungCap);
    $nhaCungCapInfo = $ncc->getTen() . '<br /> ' . $ncc->getDiaChi() . '<br />' .
        $ncc->getEmail() . '<br />' . $ncc->getSDT() . '<br />';

    // Kiểm tra có tồn tại phiếu nhập vào hôm nay, do cùng nhân viên tạo ra và có cùng nhà cung cấp    
    $taiKhoan = getTaiKhoanBy($_SESSION['taiKhoan']);
    $maNhanVien = $taiKhoan->getTaiKhoan();
    $currentDate = date("Y-m-d");

    $db = new Database();
    $sql = "SELECT * FROM `phieunhap` WHERE maNhanVien = '$maNhanVien' AND ngayNhap = '$currentDate' AND maNhaCungCap = '$maNhaCungCap'";
    $kq = mysqli_query($db->getConnection(), $sql);
    $row = mysqli_fetch_assoc($kq);
    $phieuNhap = null;
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
        $tongTien = changeMoney($phieuNhap->getTongTien());
        $chiTietList = getChiTietPhieuNhapListByMaPhieuNhap($phieuNhap->getMaPhieuNhap());
        $chiTietTable = '';
        for ($i = 0; $i < count($chiTietList); $i++) {
            $chiTiet = $chiTietList[$i];
            $thanhTien = intval($chiTiet->getSoLuong()) * intval($chiTiet->getGiaNhap());
            $chiTietTable .= '
                <tr>
                    <th scope="row">' . $i + 1 . '</th>
                    <td>' . getProductById($chiTiet->getMaSanPham())->getTenSanPham() . '</td>
                    <td>' . $chiTiet->getMaSize() . '</td>
                    <td class="text-right">' . changeMoney($chiTiet->getGiaNhap()) . '₫</td>
                    <td class="text-right">' . $chiTiet->getSoLuong() . '</td>
                    <td class="text-right">' . changeMoney($thanhTien) . '₫</td>
                </tr>';
        }
        $response = [
            'maPhieuNhap' => $phieuNhap->getMaPhieuNhap(),
            'nhaCungCapInfo' => $nhaCungCapInfo,
            'isExistPhieuNhap' => 'true',
            'chiTietTable' => $chiTietTable,
            'tongTien' => $tongTien
        ];
    } else {
        $maPhieuNhapDuKien = getNewestMaPhieuNhap();
        $response = [
            'nhaCungCapInfo' => $nhaCungCapInfo,
            'isExistPhieuNhap' => "false",
            'maPhieuNhap' => $maPhieuNhapDuKien
        ];
    }
    echo json_encode($response);
}
