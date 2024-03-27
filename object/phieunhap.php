<?php
class PhieuNhap
{
    private $maPhieuNhap;
    private $maNhanVien;
    private $ngayNhap;
    private $maNhaCungCap;
    private $tongTien;
    private $tongSoLuong;
    private $trangThai;

    function __construct($maPhieuNhap, $maNhanVien, $ngayNhap, $maNhaCungCap, $tongTien, $tongSoLuong, $trangThai)
    {
        $this->maPhieuNhap = $maPhieuNhap;
        $this->maNhanVien = $maNhanVien;
        $this->ngayNhap = $ngayNhap;
        $this->maNhaCungCap = $maNhaCungCap;
        $this->tongTien = $tongTien;
        $this->tongSoLuong = $tongSoLuong;
        $this->trangThai = $trangThai;
    }

    public function setMaPhieuNhap($maPhieuNhap)
    {
        $this->maPhieuNhap = $maPhieuNhap;
    }

    public function getMaPhieuNhap()
    {
        return $this->maPhieuNhap;
    }

    public function setMaNhanVien($maNhanVien)
    {
        $this->maNhanVien = $maNhanVien;
    }

    public function getMaNhanVien()
    {
        return $this->maNhanVien;
    }

    public function setNgayNhap($ngayNhap)
    {
        $this->ngayNhap = $ngayNhap;
    }

    public function getNgayNhap()
    {
        return $this->ngayNhap;
    }

    public function setMaNhaCungCap($maNhaCungCap)
    {
        $this->maNhaCungCap = $maNhaCungCap;
    }

    public function getMaNhaCungCap()
    {
        return $this->maNhaCungCap;
    }

    public function setTongTien($tongTien)
    {
        $this->tongTien = $tongTien;
    }

    public function getTongTien()
    {
        return $this->tongTien;
    }

    public function setTongSoLuong($tongSoLuong) {
        $this->tongSoLuong = $tongSoLuong;
    }

    public function getTongSoLuong() {
        return $this->tongSoLuong;
    }

    public function setTrangThai($trangThai) {
        $this->trangThai = $trangThai;
    }

    public function getTrangThai() {
        return $this->trangThai;
    }
}
