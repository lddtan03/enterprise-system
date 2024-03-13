<?php
class SoLuong {
    private $maSanPham;
    private $soLuong;
    private $maSize;

    function __construct($maSanPham, $soLuong, $maSize) {
        $this-> $maSanPham = $maSanPham;
        $this->soLuong = $soLuong;
        $this->maSize = $maSize;
    }

    public function setMaSaPham($maSanPham) {
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

    public function setMaSize($maSize) {
        $this->maSize = $maSize;
    }

    public function getMaSize() {
        return $this->maSize;
    }
}
?>