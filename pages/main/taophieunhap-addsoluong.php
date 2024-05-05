<?php
session_start();
ob_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/action.php');

// Nhận dữ liệu JSON được gửi từ client
$jsonData = file_get_contents('php://input');
$response = null;

// Kiểm tra xem dữ liệu có hợp lệ không
if ($jsonData) {
    // Giải mã chuỗi JSON thành một mảng kết hợp trong PHP
    $data = json_decode($jsonData, true);

    // Kiểm tra xem mảng kết hợp đã được giải mã thành công hay không
    if ($data !== null) {
        // Xử lý dữ liệu ở đây
        // Ví dụ:
        $maSanPham = $data['id'];
        $giaNhap = $data['giaNhap'];
        $maPhieuNhap = $data['maPhieuNhap'];
        $maNhanVien = $_SESSION['taiKhoan'];
        $ngayNhap = date("Y-m-d");
        $maNCC = $data['maNCC'];

        //Kiểm tra và tạo ra phiếu nhập mới nếu chưa tồn tại mã phiếu nhập được gửi đến
        $db = new Database();
        $sqlTaoPhieuNhap = "";
        if (!isExistMaPhieuNhap($maPhieuNhap)) {
            $sqlTaoPhieuNhap = "INSERT INTO `phieunhap` (maPhieuNhap, maNhanVien, ngayNhap, maNhaCungCap, tongTien, tongSoLuong, trangThai)
            VALUES ('$maPhieuNhap', '$maNhanVien', '$ngayNhap', '$maNCC', 0, 0, 0)";
            if (!$db->insert_update_delete($sqlTaoPhieuNhap)) {
                $response = [
                    'error' => 'Không thể tạo phiêú nhập mới'
                ];
                echo json_encode($response);
                return;
            }
        }

        foreach ($data as $key => $value) {
            if (
                strcmp($key, 'id') == 0 || strcmp($key, 'giaNhap') == 0 ||
                strcmp($key, 'maPhieuNhap') == 0 || strcmp($key, 'maNCC') == 0
            )
                continue;

            $maSize = $key;
            $soLuong = $value;
            $query = "";

            // Tạo chi tiết phiếu nhập mới
            $maChiTietPhieuNhapMoi = getNewestMaChiTietPhieuNhap();
            $sqlChiTietPhieuNhap = "INSERT INTO `chitietphieunhap` (maChiTietPhieuNhap, maPhieuNhap, maSanPham, soLuong, giaNhap, maSize)
            VALUES ($maChiTietPhieuNhapMoi, $maPhieuNhap, $maSanPham, $soLuong, $giaNhap, $maSize)";
            $db->insert_update_delete($sqlChiTietPhieuNhap);

            // Cập nhật số lượng và tổng tiền của phiếu nhập
            $soTien = $giaNhap * $soLuong;
            $sqlEditPhieuNhap = "UPDATE `phieunhap` SET tongSoLuong = tongSoLuong + $soLuong, tongTien = tongTien + $soTien
            WHERE maPhieuNhap = $maPhieuNhap";
            $db->insert_update_delete($sqlEditPhieuNhap);
        }
        $phieuNhap = getPhieuNhapById($maPhieuNhap);
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
            'chiTietTable' => $chiTietTable,
            'tongTien' => $tongTien,
            'error' => 'None'
        ];
        $db->disconnect();
    } else {
        // Nếu không thể giải mã JSON, trả về một thông báo lỗi
        $response = [
            'error' => "Error decoding JSON data"
        ];
    }
} else {
    // Nếu không có dữ liệu JSON, trả về một thông báo lỗi
    $response = [
        'error' => "No JSON data received"
    ];
}
echo json_encode($response);
