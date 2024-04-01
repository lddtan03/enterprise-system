<?php
class ChiTietPhieuNhap {
    private $maChiTiet;
    private $maPhieuNhap;
    private $maSanPham;
    private $soLuong;
    private $giaNhap;
    private $maSize;
    
    function __construct($maChiTiet, $maPhieuNhap, $maSanPham, $soLuong, $giaNhap, $maSize)
    {
        $this->maChiTiet = $maChiTiet;
        $this->maPhieuNhap = $maPhieuNhap;  
        $this->maSanPham = $maSanPham;
        $this->soLuong = $soLuong;
        $this->giaNhap = $giaNhap;
        $this->maSize = $maSize;
    }

    public function setMaChiTiet($maChiTiet) {
        $this->maChiTiet = $maChiTiet;
    }

    public function getMaChiTiet() {
        return $this->maChiTiet;
    }

    public function setMaPhieuNhap($maPhieuNhap) {
        $this->maPhieuNhap = $maPhieuNhap;
    }

    public function getMaPhieuNhap() {
        return $this->maPhieuNhap;
    }

    public function setMaSanPham($maSanPham) {
        $this->maSanPham = $maSanPham;
    }

    public function getMaSanPham() {
        return $this->maSanPham;
    }

    public function setSoLuong($soLuong) {
        $this->soLuong = $soLuong;
    }

    public function getSoLuong() {
        return $this->soLuong;
    }

    public function setGiaNhap($giaNhap) {
        $this->giaNhap = $giaNhap;
    }

    public function getGiaNhap() {
        return $this->giaNhap;
    }

    public function setMaSize($maSize) {
        $this->maSize = $maSize;
    }

    public function getMaSize() {
        return $this->maSize;
    }
}
?>