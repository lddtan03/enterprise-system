<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/action.php');

if (isset($_GET['maPhieuNhap'])) {
    $maPhieuNhap = $_GET['maPhieuNhap'];
    $phieuNhap = getPhieuNhapById($maPhieuNhap);
    $nhanVien = getNhanVienById($phieuNhap->getMaNhanVien());
    $nhaCungCap = getNhaCungCapById($phieuNhap->getMaNhaCungCap());
    $chucVu = getChucVuById($nhanVien->getMaChucVu());
    $chiTietPhieuNhapList = getChiTietPhieuNhapListByMaPhieuNhap($maPhieuNhap);
    $data = '
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 800px;">
            <div class="modal-header">
                <h5 class="modal-title" id="varyModalLabel">Chi tiết phiếu nhập</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-8">
                <div class="card shadow mb-8">
                    <form class="needs-validation" novalidate>
                        <div class="card shadow">
                            <div class="card-body p-5">
                                <div class="row mb-5">
                                    <div class="col-12 text-center mb-4">
                                        <img src="./assets/images/logo.svg" class="navbar-brand-img brand-sm mx-auto mb-4" alt="...">
                                        <h2 class="mb-0 text-uppercase">Phiếu nhập</h2>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="small text-muted text-uppercase mb-2">Người nhập hàng</p>
                                        <p class="mb-4">
                                            <strong>Mã NV: ' . $nhanVien->getMaNhanVien() . '</strong><br /> ' . $nhanVien->getHoTen() . ' <br /> ' . $chucVu->getTenChucVu() .' <br />' .
                                            $nhanVien->getEmail() . '<br /> ' . $nhanVien->getSDT() . '<br />
                                        </p>
                                        <p>
                                            <span class="small text-muted text-uppercase">Mã phiêu nhập
                                            #</span><br />
                                            <strong>' . $maPhieuNhap . '</strong>
                                        </p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="small text-muted text-uppercase mb-2">Nhà cung cấp</p>
                                        <p class="mb-4">
                                            <strong>Mã NCC: ' . $nhaCungCap->getId() . '</strong><br />' . $nhaCungCap->getTen() . ' <br />' . $nhaCungCap->getDiaChi() .'<br />
                                            ' . $nhaCungCap->getEmail() . '<br /> ' . $nhaCungCap->getSDT() . '<br />
                                        </p>
                                        <p>
                                            <small class="small text-muted text-uppercase">Ngày nhập</small><br />
                                            <strong>' . $phieuNhap->getNgayNhap() .'</strong>
                                        </p>
                                    </div>
                                </div> 
                                <table class="table table-borderless table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Size</th>
                                            <th scope="col" class="text-right">Giá nhập</th>
                                            <th scope="col" class="text-right">Số lượng</th>
                                            <th scope="col" class="text-right">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    for ($i = 0; $i < count($chiTietPhieuNhapList); $i++) {
        $chiTiet = $chiTietPhieuNhapList[$i];
        $sanPham = getProductById($chiTiet->getMaSanPham());
        $thanhTien = intval($chiTiet->getSoLuong()) * intval($chiTiet->getGiaNhap());
        $data .= '
            <tr>
                <th scope="row">' . $i + 1 . '</th>
                <td>' . $sanPham->getTenSanPham() . '</td>
                <td>' . $chiTiet->getMaSize() . '</td>
                <td class="text-right">' . changeMoney($chiTiet->getGiaNhap()) . '₫</td>
                <td class="text-right">' . $chiTiet->getSoLuong() . '</td>
                <td class="text-right">' . changeMoney($thanhTien) . '₫</td>
            </tr>';
    }
    $data .=                        '</tbody>
                                </table>
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <div class="text-right mr-2">
                                            <p class="mb-2 h6">
                                                <span class="text-muted">Thành tiền : </span>
                                                <strong>' . changeMoney($phieuNhap->getTongTien()) . '₫</strong>
                                            </p>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>  
                    </form>
                </div> 
            </div>
        </div>
    </div>';
    echo $data;
}
?>
