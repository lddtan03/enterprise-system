<?php 
class NhanHieu {
    private $maNhanHieu;
    private $tenNhanHieu;

    function __construct($maNhanHieu, $tenNhanHieu)
    {
        $this->maNhanHieu = $maNhanHieu;
        $this->tenNhanHieu = $tenNhanHieu;
    }

    public function setMaNhanHieu($maNhanHieu) {
        $this->maNhanHieu = $maNhanHieu;        
    }

    public function getMaNhanHieu() {
        return $this->maNhanHieu;
    }

    public function setTenNhanHieu($tenNhanHieu) {
        $this->tenNhanHieu = $tenNhanHieu;
    }

    public function getTenNhanHieu() {
        return $this->tenNhanHieu;
    }
}
?>