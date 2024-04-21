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
    $dantoc = $_POST['dantoc'];
    $dantoc = $_POST['dantoc'];
    $matkhaucu =  $_POST['matkhaucu'];
    $matkhaumoi =  $_POST['matkhaumoi'];



    
    $result = $nv->executeQuery("select maNhanVien from nhanvien where cmnd = '$cmnd'");
    $maNV = $result[0]['maNhanVien'];
    $result = $nv->executeQuery("select matKhau from taikhoan where taikhoan = '$maNV'");
    $password= $result[0]['matKhau'];
    if($password==$matkhaucu){
        $nv->insert_update_delete("UPDATE `nhanvien` SET `cmnd`='$cmnd',`hoTen`='$hoten',`gioiTinh`='$gioitinh',`ngaySinh`='$ngaysinh',`diaChi`='$diachi',`sdt`='$sdt',`danToc`='$dantoc',`email`='$email' WHERE maNhanVien = $maNhanVien");
        $nv->insert_update_delete("UPDATE `taikhoan` SET `matKhau`='$matkhaumoi' WHERE taiKhoan = $maNV");
        $_SESSION['alert_message'] = "Cập nhật thành công";
    }
    else{
        $_SESSION['alert_message'] = "Mật khâủ không đúng";
    }
    
    echo "<script>
          window.location.href = 'http://localhost/HTTT-DN/index.php?page=profile-settings';
          </script>";
}
