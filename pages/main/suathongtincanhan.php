<?php
require_once './object/database.php';
$nv = new Database;
$maNhanVien = $_SESSION['taiKhoan'];

if (isset($_POST['btn_submit'])) {
    $hoten = $_POST['hoten'];
    $cmnd = $_POST['cmnd'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $ngaysinh = $_POST['ngaysinh'];
    $inputState5 = $_POST['inputState5'];
    $dantoc = $_POST['dantoc'];
    if ($inputState5 == 'male') {
        $gioitinh = "Nam";
    } else {
        $gioitinh = "Nữ";
    }

    $nv->insert_update_delete("UPDATE `nhanvien` SET `cmnd`='$cmnd',`hoTen`='$hoten',`gioiTinh`='$gioitinh',`ngaySinh`='$ngaysinh',`diaChi`='$diachi',`sdt`='$sdt',`danToc`='$dantoc',`email`='$email' WHERE maNhanVien = $maNhanVien");

    echo "<script>
          window.location.href = 'http://localhost:8888/HTTT-DN/index.php?page=profile-settings';
          </script>";
}
