<?php
class NhanVien {
    private $maNhanVien;
    private $cmnd;
    private $hoTen;
    private $gioiTinh;
    private $ngaySinh;
    private $diaChi;
    private $sdt;
    private $danToc;
    private $email;
    private $maChucVu;
    private $maPhong;
    private $avatar;

    function __construct($maNhanVien, $cmnd, $hoTen, $gioiTinh, $ngaySinh, $diaChi, $sdt, $danToc, $email, $maChucVu, $maPhong, $avatar)
    {
        $this->maNhanVien = $maNhanVien;
        $this->cmnd = $cmnd;
        $this->hoTen = $hoTen;
        $this->gioiTinh = $gioiTinh;
        $this->ngaySinh = $ngaySinh;
        $this->diaChi = $diaChi;
        $this->sdt = $sdt;
        $this->danToc = $danToc;
        $this->email = $email;
        $this->maChucVu = $maChucVu;
        $this->maPhong = $maPhong;
        $this->avatar = $avatar;
    }

    public function setMaNhanVien($maNhanVien) {
        $this->maNhanVien = $maNhanVien;
    }

    public function getMaNhanVien() {
        return $this->maNhanVien;
    }

    public function setCMND($cmnd) {
        $this->cmnd = $cmnd;
    }

    public function getCMND() {
        return $this->cmnd;
    }

    public function setHoTen($hoTen) {
        $this->hoTen = $hoTen;
    }

    public function getHoTen() {
        return $this->hoTen;
    }

    public function setGioiTinh($gioiTinh) {
        $this->gioiTinh = $gioiTinh;
    }

    public function getGioiTinh() {
        return $this->gioiTinh;
    }

    public function setNgaySinh($ngaySinh) {
        $this->ngaySinh = $ngaySinh;
    }

    public function getNgaySinh() {
        return $this->ngaySinh;
    }

    public function setDiaChi($diaChi) {
        $this->diaChi = $diaChi;
    }

    public function getDiaChi() {
        return $this->diaChi;
    }

    public function setSDT($sdt) {
        $this->sdt = $sdt;
    }

    public function getSDT() {
        return $this->sdt;
    }

    public function setDanToc($danToc) {
        $this->danToc = $danToc;
    }

    public function getDanToc() {
        return $this->danToc;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setMaChucVu($maChucVu) {
        $this->maChucVu = $maChucVu;
    }

    public function getMaChucVu() {
        return $this->maChucVu;
    }

    public function setMaPhong($maPhong) {
        $this->maPhong = $maPhong;
    }

    public function getMaPhong() {
        return $this->maPhong;
    }

    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    public function getAvatar() {
        return $this->avatar;
    }
}
?>