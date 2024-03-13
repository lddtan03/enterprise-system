<?php
class SanPham {
    private $maSanPham;
    private $tenSanPham;
    private $giaCu;
    private $giaMoi;
    private $moTa;
    private $hinhAnh;
    private $maNhanHieu;
    private $sanPhamMoi;
    private $sanPhamHot;
    private $tinhTrang;

    function __construct($maSanPham, $tenSanPham, $giaCu, $giaMoi, $moTa, $hinhAnh,
                        $maNhanHieu, $sanPhamMoi, $sanPhamHot, $tinhTrang) {
        $this->maSanPham = $maSanPham;
        $this->$tenSanPham = $tenSanPham;
        $this->giaCu = $giaCu;
        $this->giaMoi = $giaMoi;
        $this->moTa = $moTa;
        $this->hinhAnh = $hinhAnh;
        $this->maNhanHieu = $maNhanHieu;
        $this->sanPhamMoi = $sanPhamMoi;
        $this->sanPhamHot = $sanPhamHot;
        $this->tinhTrang = $tinhTrang;
    }

    public function setMaSanPham($maSanPham) {
        $this->maSanPham = $maSanPham;
    }

    public function getMaSanPham() {
        return $this->maSanPham;
    }

    public function setTenSanPham($tenSanPham) {
        $this->tenSanPham = $tenSanPham;
    }

    public function getTenSanPham() {
        return $this->tenSanPham;
    }

    public function setGiaCu($giaCu) {
        $this->giaCu = $giaCu;
    }

    public function getGiaCu() {
        return $this->giaCu;
    }

    public function setGiaMoi($giaMoi) {
        $this->giaMoi = $giaMoi;
    }

    public function getGiaMoi() {
        return $this->giaMoi;
    }

    public function setMoTa($moTa) {
        $this->moTa = $moTa;
    }

    public function getMoTa() {
        return $this->moTa;
    }

    public function setHinhAnh($hinhAnh) {
        $this->hinhAnh = $hinhAnh;
    }

    public function getHinhAnh() {
        return $this->hinhAnh;
    }

    public function setMaNhanHieu($maNhanHieu) {
        $this->maNhanHieu = $maNhanHieu;
    }

    public function getMaNhanHieu() {
        return $this->maNhanHieu;
    }

    public function setSanPhamMoi($sanPhamMoi) {
        $this->sanPhamMoi = $sanPhamMoi;
    }

    public function getSanPhamMoi() {
        return $this->sanPhamMoi;
    }

    public function setSanPhamHot($sanPhamHot) {
        $this->sanPhamHot = $sanPhamHot;        
    }

    public function getSanPhamHot() {
        return $this->sanPhamHot;
    }

    public function setTinhTrang($tinhTrang) {
        $this->tinhTrang = $tinhTrang;
    }

    public function getTinhTrang() {
        return $this->tinhTrang;
    }
}
?>