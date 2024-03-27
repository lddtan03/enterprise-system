<?php
class ChucVu {
    private $maChucVu;
    private $tenChucVu; 

    function __construct($maChucVu, $tenChucVu)
    {
        $this->maChucVu = $maChucVu;
        $this->tenChucVu = $tenChucVu;
    }

    public function setMaChucVu($maChucVu) {
        $this->maChucVu = $maChucVu;        
    }

    public function getMaChucVu() {
        return $this->maChucVu;
    }

    public function setTenChucVu($tenChucVu) {
        $this->tenChucVu = $tenChucVu;
    }

    public function getTenChucVu() {
        return $this->tenChucVu;
    }
}
?>