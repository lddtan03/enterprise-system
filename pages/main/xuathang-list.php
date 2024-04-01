<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/action.php');

if (isset($_GET['maPhieuXuat'])) {
    $maPhieuXuat = $_GET['maPhieuXuat'];
    $phieuXuat = getPhieuXuatById($maPhieuXuat);
    $nhanVien = getNhanVienById($phieuXuat->getMaNhanVien());
    $chucVu = getChucVuById($nhanVien->getMaChucVu());
    $chiTietPhieuXuatList = getChiTietPhieuXuatListByMaPhieuXuat($maPhieuXuat);

    $data = '
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 800px;">
            <div class="modal-header">
                <h5 class="modal-title" id="varyModalLabel">Chi tiết phiếu xuất</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-8">
                <div class="card shadow mb-8">
                    <form class="needs-validation" novalidate>
                        <div class="card shadow">
                            <table class="table datatables" id="dataTable-1">
                                <thead>
                                    <tr>
                                        <th style="width: 300px;">Tên SP</th>
                                        <th>Size</th>
                                        <th>Số lượng</th>
                                        <th>Giá bán</th>
                                    </tr>
                                </thead>
                                <tbody>';
    for ($i = 0; $i < count($chiTietPhieuXuatList); $i++) {
        $chiTiet = $chiTietPhieuXuatList[$i];
        $sanPham = getProductById($chiTiet->getMaSanPham());        
        $data .= '                                            
            <tr>
                <td>' . $sanPham->getTenSanPham() . '</td>
                <td>' . $chiTiet->getMaSize() . '</td>
                <td>' . $chiTiet->getSoLuong() . '</td>
                <td>' . changeMoney($chiTiet->getgiaBan()) . '₫</td>
            </tr>';
    }
    $data .=                    '</tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>';    
    echo $data;
}
