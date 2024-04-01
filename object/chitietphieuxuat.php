<?php
class ChiTietPhieuXuat {
    private $maChiTiet;
    private $maPhieuXuat;
    private $maSanPham;
    private $maSize;
    private $giaBan;
    private $soLuong;
    
    function __construct($maChiTiet, $maPhieuXuat, $maSanPham, $maSize, $soLuong, $giaBan)
    {
        $this->maChiTiet = $maChiTiet;
        $this->maPhieuXuat = $maPhieuXuat;  
        $this->maSanPham = $maSanPham;
        $this->maSize = $maSize;
        $this->soLuong = $soLuong;
        $this->giaBan = $giaBan;
    }

    public function setMaChiTiet($maChiTiet) {
        $this->maChiTiet = $maChiTiet;
    }

    public function getMaChiTiet() {
        return $this->maChiTiet;
    }

    public function setMaPhieuXuat($maPhieuXuat) {
        $this->maPhieuXuat = $maPhieuXuat;
    }

    public function getMaPhieuXuat() {
        return $this->maPhieuXuat;
    }

    public function setMaSanPham($maSanPham) {
        $this->maSanPham = $maSanPham;
    }

    public function getMaSanPham() {
        return $this->maSanPham;
    }

    public function setMaSize($maSize) {
        $this->maSize = $maSize;
    }

    public function getMaSize() {
        return $this->maSize;
    }

    public function setSoLuong($soLuong) {
        $this->soLuong = $soLuong;
    }

    public function getSoLuong() {
        return $this->soLuong;
    }

    public function setgiaBan($giaBan) {
        $this->giaBan = $giaBan;
    }

    public function getgiaBan() {
        return $this->giaBan;
    }
}
?>