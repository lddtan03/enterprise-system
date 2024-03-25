<?php
class NhaCungCap
{
    private $id;
    private $ten;
    private $diaChi;
    private $sdt;
    private $email;
    private $tinhTrang;

    function __construct($id, $ten, $diaChi, $sdt, $email, $tinhTrang)
    {
        $this->id = $id;
        $this->ten = $ten;
        $this->diaChi = $diaChi;
        $this->sdt = $sdt;
        $this->email = $email;
        $this->tinhTrang = $tinhTrang;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTen($ten)
    {
        $this->ten = $ten;
    }

    public function getTen()
    {
        return $this->ten;
    }

    public function setDiaChi($diaChi)
    {
        $this->diaChi = $diaChi;
    }

    public function getDiaChi()
    {
        return $this->diaChi;
    }

    public function setSDT($sdt)
    {
        $this->sdt = $sdt;
    }

    public function getSDT()
    {
        return $this->sdt;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setTinhTrang($tinhTrang)
    {
        $this->tinhTrang = $tinhTrang;
    }

    public function getTinhTrang()
    {
        return $this->tinhTrang;
    }

    public function isDifferent($ten, $diaChi, $sdt, $email)
    {
        if (strcmp($this->ten, $ten) != 0)
            return true;
        if (strcmp($this->diaChi, $diaChi) != 0)
            return true;
        if (strcmp($this->sdt, $sdt) != 0)
            return true;
        if (strcmp($this->email, $email) != 0)
            return true;
        return false;
    }
}
