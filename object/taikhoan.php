<?php
class TaiKhoan {
    private $taiKhoan;
    private $matKhau;
    private $maNhomQuyen;

    function __construct($taiKhoan, $matKhau, $maNhomQuyen)
    {
        $this->taiKhoan = $taiKhoan;
        $this->matKhau = $matKhau;
        $this->maNhomQuyen = $maNhomQuyen;
    }

    public function setTaiKhoan($taiKhoan) {
        $this->taiKhoan = $taiKhoan;
    }

    public function getTaiKhoan() {
        return $this->taiKhoan;
    }

    public function setMatKhau($matKhau) {
        $this->matKhau = $matKhau;
    } 

    public function getMatKhau() {
        return $this->matKhau;
    }

    public function setMaNhomQuyen($maNhomQuyen) {
        $this->maNhomQuyen = $maNhomQuyen;
    }

    public function getMaNhomQuyen() {
        return $this->maNhomQuyen;
    }
 }
?>