<?php 
class DonNghiPhep {
    private $maDon;
    private $lyDo;
    private $ngayBatDauNghi;
    private $ngayKetThucNghi;
    private $soNgayNghi;
    private $nguoiPheDuyet;
    private $ngayPheDuyet;
    private $maNhanVien;
    private $trangThai;

    public function __construct($maDon, $lyDo, $ngayBatDauNghi, $ngayKetThucNghi, $soNgayNghi, $nguoiPheDuyet, $ngayPheDuyet, $maNhanVien, $trangThai) {
        $this->maDon = $maDon;
        $this->lyDo = $lyDo;
        $this->ngayBatDauNghi = $ngayBatDauNghi;
        $this->ngayKetThucNghi = $ngayKetThucNghi;
        $this->soNgayNghi = $soNgayNghi;
        $this->nguoiPheDuyet = $nguoiPheDuyet;
        $this->ngayPheDuyet = $ngayPheDuyet;
        $this->maNhanVien = $maNhanVien;
        $this->trangThai = $trangThai;
    }
    public function getMaDon() {
        return $this->maDon;
    }

    public function setMaDon($maDon) {
        $this->maDon = $maDon;
    }
    public function getLyDo() {
        return $this->lyDo;
    }
    
    public function setLyDo($lyDo) {
        $this->lyDo = $lyDo;
    }
    
    public function getNgayBatDauNghi() {
        return $this->ngayBatDauNghi;
    }
    
    public function setNgayBatDauNghi($ngayBatDauNghi) {
        $this->ngayBatDauNghi = $ngayBatDauNghi;
    }
    
    public function getNgayKetThucNghi() {
        return $this->ngayKetThucNghi;
    }
    
    public function setNgayKetThucNghi($ngayKetThucNghi) {
        $this->ngayKetThucNghi = $ngayKetThucNghi;
    }
    
    public function getSoNgayNghi() {
        return $this->soNgayNghi;
    }
    
    public function setSoNgayNghi($soNgayNghi) {
        $this->soNgayNghi = $soNgayNghi;
    }
    
    public function getNguoiPheDuyet() {
        return $this->nguoiPheDuyet;
    }
    
    public function setNguoiPheDuyet($nguoiPheDuyet) {
        $this->nguoiPheDuyet = $nguoiPheDuyet;
    }
    
    public function getNgayPheDuyet() {
        return $this->ngayPheDuyet;
    }
    
    public function setNgayPheDuyet($ngayPheDuyet) {
        $this->ngayPheDuyet = $ngayPheDuyet;
    }
    
    public function getMaNhanVien() {
        return $this->maNhanVien;
    }
    
    public function setMaNhanVien($maNhanVien) {
        $this->maNhanVien = $maNhanVien;
    }
    
    public function getTrangThai() {
        return $this->trangThai;
    }
    
    public function setTrangThai($trangThai) {
        $this->trangThai = $trangThai;
    }
}

?>