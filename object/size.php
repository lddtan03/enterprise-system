<?php 
class Size {
    private $maSize;
    private $tenSize;

    function __construct($maSize, $tenSize) {
        $this->maSize = $maSize;
        $this->tenSize = $tenSize;
    }

    public function setMaSize($maSize) {
        $this->maSize = $maSize;
    }

    public function getMaSize() {
        return $this->maSize;
    }

    public function setTenSize($tenSize) {
        $this->tenSize = $tenSize;
    }

    public function getTenSize() {
        return $this->tenSize;
    }
}
?>