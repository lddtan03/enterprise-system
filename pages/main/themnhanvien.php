<?php
require_once './object/database.php';

$nv = new Database;
?>


<style>
    input[type='file']{
        display: none;
    }

    #upload{
        display: inline-block;
        text-transform: uppercase;
        color: #fff;
        background: rgb(37, 128, 138);
        text-align: center;
        padding: 7px 9px;
        font-size: 12px;
        font-weight: bold;
        letter-spacing: 1.5px;
        user-select: none;
        cursor: pointer;
        box-shadow: 2px 5px 10px rgba(0, 0, 0, 0.35);
        border-radius: 3px;
    }

    label#upload i {
        font-size: 15px;
        margin-right: 10px;
    }

    label#upload:active{
        transform: scale(0.8);
        transition: all .3s;
    }

</style>

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <h2 class="h3 mb-4 page-title">Thêm nhân viên</h2>
                <div class="my-4">
                    <form enctype="multipart/form-data" class="mb-5" method="POST" action="">
                        <?php
                        // foreach ($result as $nhanvien) {
                        ?>
                            <hr class="my-4">
                            <div class="form-group">
                                <label for="diachi">Ảnh đại diện</label><br>
                                <input type="file" class="form-control" id="file" name="file">
                                <label for="file" id="upload"><i class="fa-solid fa-upload"></i> UPLOAD FILE</label>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="hoten">Họ và tên</label>
                                    <input type="text" id="hoten" name="hoten" class="form-control" value="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cmnd">CMND/CCCD</label>
                                    <input type="text" id="cmnd" name="cmnd" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="sdt">Số điện thoại</label>
                                    <input type="text" id="sdt" name="sdt" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="diachi">Địa chỉ</label>
                                <input type="text" class="form-control" id="diachi" name="diachi">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="ngaysinh">Ngày sinh</label>
                                    <input class="form-control input-placeholder" id="ngaysinh" name="ngaysinh" type="text" placeholder="yyyy-mm-dd">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState5">Giới tính</label>
                                    <select id="inputState5" name="inputState5" class="form-control">
                                        <option value="male">Nam</option>
                                        <option value="female">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="dantoc">Dân tộc</label>
                                    <input class="form-control input-placeholder" id="dantoc" type="text" name="dantoc">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="chucvu">Mã - tên chức vụ</label>
                                    <div>
                                        <select id="chucvu" name="chucvu" class="form-control">

                                            <?php
                                            // $tp = $nhanvien['tenPhong'];

                                            $result = $nv->select("select maChucVu, tenChucVu from chucvu");

                                            if (mysqli_num_rows($result) > 0) {
                                                // Duy ệt qua từng hàng kết quả
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $maChucVu = $row['maChucVu'];
                                                    $tenChucVu = $row["tenChucVu"];
                                                    echo "<option value='$maChucVu'> $maChucVu - $tenChucVu</option>";
                                                }
                                            }
                                            // Đóng kết nối
                                            // $nv->disconnect();
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phong">Mã - tên phòng ban</label>

                                    <div>
                                        <select id="phong" name="phong" class="form-control">

                                            <?php

                                            $result = $nv->select("select maPhong, tenPhong from phongban");

                                            if (mysqli_num_rows($result) > 0) {
                                                // Duy ệt qua từng hàng kết quả
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $maPhong = $row['maPhong'];
                                                    $tenPhong = $row["tenPhong"];
                                                    echo "<option value='$maPhong'> $maPhong - $tenPhong</option>";
                                                }
                                            }
                                            // Đóng kết nối
                                            // $nv->disconnect();
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="luongcoban">Lương cơ bản</label>
                                    <input class="form-control input-placeholder" id="luongcoban" type="text" name="luongcoban">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="loaihopdong">Loại hợp đồng</label>
                                    <input class="form-control input-placeholder" id="loaihopdong" type="text" name="loaihopdong">

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="ngaybatdauhopdong">Ngày bắt đầu hợp đồng</label>
                                    <input class="form-control input-placeholder" id="ngaybatdauhopdong" type="text" name="ngaybatdau" placeholder="yyyy-mm-dd">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ngayketthuchopdong">Ngày kêt thúc hợp đồng</label>
                                    <input class="form-control input-placeholder" placeholder="yyyy-mm-dd" id="ngayketthuchopdong" type="text" name="ngayketthuc">

                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Lưu thay đổi" name="btn_submit"></input>
                        <?php
                        // }
                        ?>
                    </form>
                </div>
                <?php
                if (isset($_POST['btn_submit'])) {
                    $upload_dir = 'assets/avatars/';
                    $file_name = $_FILES['file']['name'];
                    $upload_file = $upload_dir . $file_name;
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                        echo "";
                    }

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

                    $chucvu = $_POST['chucvu'];
                    $phong = $_POST['phong'];
                    $luongcoban = $_POST['luongcoban'];
                    $loaihopdong = $_POST['loaihopdong'];
                    $ngaybatdau = $_POST['ngaybatdau'];
                    $ngayketthuc = $_POST['ngayketthuc'];



                    // $nv->insert_update_delete("INSERT INTO `nhanvien`(`cmnd`, `hoTen`, `gioiTinh`, `ngaySinh`, `diaChi`, `sdt`, `danToc`, `email`, `maChucVu`, `maPhong`, `avatar`) VALUES ('$cmnd','$hoten','$gioitinh','$ngaysinh','$diachi','$sdt','$dantoc','$email','$chucvu','$phong','$file_name')");
                    // $result = $nv->executeQuery("select maNhanVien from nhanvien where cmnd = '$cmnd'");
                    // $maNV = $result[0]['maNhanVien'];
                    // $nv->insert_update_delete("INSERT INTO `hopdong`(`ngayBatDau`, `ngayKetThuc`, `loaiHopDong`, `luongCoBan`, `maNhanVien`) VALUES ('$ngaybatdau','$ngayketthuc','$loaihopdong','$luongcoban','$maNV')");
                    // echo "<script>
                    //           window.location.href = 'http://localhost/HTTT-DN/index.php?page=nhanvien';
                    //           </script>";
                }
                ?>


            </div> <!-- /.card-body -->
        </div> <!-- /.col-12 -->
    </div> <!-- .row -->
    </div> <!-- .container-fluid -->

</main> <!-- main -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/simplebar.min.js"></script>
<script src='js/daterangepicker.js'></script>
<script src='js/jquery.stickOnScroll.js'></script>
<script src="js/tinycolor-min.js"></script>
<script src="js/config.js"></script>
<script src="js/apps.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>