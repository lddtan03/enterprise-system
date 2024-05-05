<?php
require_once './object/database.php';

$nv = new Database;
?>


<style>
    input[type='file'] {
        display: none;
    }

    #upload {
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

    label#upload:active {
        transform: scale(0.8);
        transition: all .3s;
    }

    .border_red {
        border: 1px solid red;
        outline: 1px solid red;
    }

    .text_red {
        color: red;
    }
</style>

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <h2 class="h3 mb-4 page-title">Thêm nhân viên</h2>
                <div class="my-4">
                    <form enctype="multipart/form-data" class="mb-5" method="post" action="" id="formThemNhanVien">
                        <?php
                        // foreach ($result as $nhanvien) {
                        ?>
                        <hr class="my-4">
                        <div class="form-group">
                            <label for="diachi">Ảnh đại diện</label><br>
                            <div class="image-container mb-3" style="width: 200px">
                                <img src="assets/images/addimg.png" id="pimage" style="max-width: 100%">
                            </div>
                            <input type="file" class="form-control" id="file" name="file" onchange="previewImage();">
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
                                <input type="hidden" id="error_cmnd" name="error_cmnd" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="sdt">Số điện thoại</label>
                                <input type="text" id="sdt" name="sdt" class="form-control">
                                <input type="hidden" id="error_sdt" name="error_sdt" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                                <input type="hidden" id="error_email" name="error_email" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="diachi">Địa chỉ</label>
                            <input type="text" class="form-control" id="diachi" name="diachi">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="ngaysinh">Ngày sinh</label>
                                <input class="form-control input-placeholder" id="ngaysinh" name="ngaysinh" type="date" placeholder="yyyy-mm-dd">
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
                                <input class="form-control input-placeholder" id="ngaybatdauhopdong" type="date" name="ngaybatdau" placeholder="yyyy-mm-dd">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ngayketthuchopdong">Ngày kêt thúc hợp đồng</label>
                                <input class="form-control input-placeholder" placeholder="yyyy-mm-dd" id="ngayketthuchopdong" type="date" name="ngayketthuc">

                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Lưu" id="btn_submit" name="btn_submit"></input>
                        <?php
                        // }
                        ?>
                    </form>
                    <?php
                    // if (isset($_POST['btn_submit'])) {
                    //     $upload_dir = 'assets/avatars/';
                    //     $file_name = $_FILES['file']['name'];
                    //     $upload_file = $upload_dir . $file_name;
                    //     if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                    //         echo "";
                    //     }

                    //     $hoten = $_POST['hoten'];
                    //     $cmnd = $_POST['cmnd'];
                    //     $sdt = $_POST['sdt'];
                    //     $email = $_POST['email'];
                    //     $diachi = $_POST['diachi'];
                    //     $ngaysinh = $_POST['ngaysinh'];
                    //     $inputState5 = $_POST['inputState5'];
                    //     $dantoc = $_POST['dantoc'];
                    //     if ($inputState5 == 'male') {
                    //         $gioitinh = "Nam";
                    //     } else {
                    //         $gioitinh = "Nữ";
                    //     }

                    //     $chucvu = $_POST['chucvu'];
                    //     $phong = $_POST['phong'];
                    //     $luongcoban = $_POST['luongcoban'];
                    //     $loaihopdong = $_POST['loaihopdong'];
                    //     $ngaybatdau = $_POST['ngaybatdau'];
                    //     $ngayketthuc = $_POST['ngayketthuc'];



                    //     $nv->insert_update_delete("INSERT INTO `nhanvien`(`cmnd`, `hoTen`, `gioiTinh`, `ngaySinh`, `diaChi`, `sdt`, `danToc`, `email`, `maChucVu`, `maPhong`, `avatar`,`trangthai`) VALUES ('$cmnd','$hoten','$gioitinh','$ngaysinh','$diachi','$sdt','$dantoc','$email','$chucvu','$phong','$file_name','1')");
                    //     $result1 = $nv->executeQuery("select maNhanVien from nhanvien where cmnd = $cmnd");
                    //     $maNV = $result1[0]['maNhanVien'];
                    //     echo $maNV;
                    //     $nv->insert_update_delete("INSERT INTO `hopdong`(`ngayBatDau`, `ngayKetThuc`, `loaiHopDong`, `luongCoBan`, `maNhanVien`) VALUES ('$ngaybatdau','$ngayketthuc','$loaihopdong','$luongcoban','$maNV')");
                    //     $nv->insert_update_delete("INSERT INTO `taikhoan`(`taikhoan`, `matkhau`, `maNhomQuyen`) VALUES ($maNV,12345,'nhanvien')");
                    //     echo "<script>
                    //             window.location.href = 'http://localhost:8888/HTTT-DN/index.php?page=nhanvien';
                    //         </script>";
                    // }
                    // ?>
                </div>



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


<script>
    function previewImage() {
        var imageInput = document.getElementById('file');
        var previewImg = document.getElementById('pimage');
        var file = imageInput.files[0]; // Lấy tệp tin đã chọn

        // Kiểm tra xem người dùng đã chọn tệp tin hay chưa
        if (file) {
            var reader = new FileReader();

            // Đọc dữ liệu hình ảnh từ tệp tin
            reader.onload = function(e) {
                previewImg.src = e.target.result; // Hiển thị hình ảnh
            }

            reader.readAsDataURL(file); // Đọc dữ liệu dưới dạng URL dữ liệu
        } else {
            previewImg.src = 'assets/images/no-image.png'; // Reset hình ảnh nếu không có tệp tin được chọn
        }
    }

    function checkForm(e) {
        var numberRegEx = /^[0-9]+$/;
        var hoten = document.getElementById("hoten");
        var cnmd = document.getElementById("cmnd");
        var sdt = document.getElementById("sdt");
        var email = document.getElementById("email");
        var diachi = document.getElementById("diachi");
        var sdt = document.getElementById("sdt");
        var ngaysinh = document.getElementById("ngaysinh");
        var dantoc = document.getElementById("dantoc");
        var luongcoban = document.getElementById("luongcoban");
        var loaihopdong = document.getElementById("loaihopdong");
        var ngaybatdauhopdong = document.getElementById("ngaybatdauhopdong");
        var ngayketthuchopdong = document.getElementById("ngayketthuchopdong");
        if (hoten.value == "" || hoten.value == undefined || hoten.value == NaN) {
            alert("Bạn chưa nhập họ tên!");
            hoten.focus();
            e.preventDefault();
            return false;
        } else if (cnmd.value == "" || cnmd.value == undefined || cnmd.value == NaN) {
            alert("Bạn chưa nhập CCCD/CMND!");
            cnmd.focus();
            e.preventDefault();
            return false;
        } else if (sdt.value == "" || sdt.value == undefined || sdt.value == NaN) {
            alert("Bạn chưa nhập số điện thoại!");
            sdt.focus();
            e.preventDefault();
            return false;
        } else if (!numberRegEx.test(sdt.value) && sdt.value != "") {
            alert("Số điện thoại không hợp lệ!");
            sdt.focus();
            e.preventDefault();
            return false;
        } else if (email.value == "" || email.value == undefined || email.value == NaN) {
            alert("Bạn chưa nhập email!");
            email.focus();
            e.preventDefault();
            return false;
        } else if (diachi.value == "" || diachi.value == undefined || diachi.value == NaN) {
            alert("Bạn chưa nhập địa chỉ!");
            diachi.focus();
            e.preventDefault();
            return false;
        } else if (ngaysinh.value == "" || ngaysinh.value == undefined || ngaysinh.value == NaN) {
            alert("Bạn chưa nhập ngày sinh!");
            cnmd.focus();
            e.preventDefault();
            return false;
        } else if (dantoc.value == "" || dantoc.value == undefined || dantoc.value == NaN) {
            alert("Bạn chưa nhập dân tộc!");
            dantoc.focus();
            e.preventDefault();
            return false;
        } else if (luongcoban.value == "" || luongcoban.value == undefined || luongcoban.value == NaN) {
            alert("Bạn chưa nhập lương cơ bản!");
            luongcoban.focus();
            e.preventDefault();
            return false;
        } else if (loaihopdong.value == "" || loaihopdong.value == undefined || loaihopdong.value == NaN) {
            alert("Bạn chưa nhập loại hợp đồng!");
            loaihopdong.focus();
            e.preventDefault();
            return false;
        } else if (ngaybatdauhopdong.value == "" || ngaybatdauhopdong.value == undefined || ngaybatdauhopdong.value == NaN) {
            alert("Bạn chưa nhập ngày bắt đầu hợp đồng!");
            ngaybatdauhopdong.focus();
            e.preventDefault();
            return false;
        } else if (ngayketthuchopdong.value == "" || ngayketthuchopdong.value == undefined || ngayketthuchopdong.value == NaN) {
            alert("Bạn chưa nhập ngày kết thúc hợp đồng!");
            ngayketthuchopdong.focus();
            e.preventDefault();
            return false;
        } else if (cmnd.classList.contains('border_red')) {
            // cmnd.focus();
            e.preventDefault();
            return false;
        } else if (sdt.classList.contains('border_red')) {
            // cmnd.focus();
            e.preventDefault();
            return false;
        } else if (email.classList.contains('border_red')) {
            // cmnd.focus();
            e.preventDefault();
            return false;
        }
    }
</script>


<script>
    $(document).ready(function() {
        $('#cmnd').blur(function(e) {
            var cmnd = $('#cmnd').val();
            var data = {
                cmnd: cmnd,
            }
            $.ajax({
                url: '/HTTT-DN/pages/main/themnhanvien_ajax.php',
                method: 'POST',
                data: data,
                dataType: 'json',
                success: function(result) {
                    if (result.error.cmnd != "") {
                        alert(result.error.cmnd)
                        $('#cmnd').addClass('border_red')
                    } else {
                        $('#cmnd').removeClass('border_red')
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                },
            });
        })
        $('#sdt').blur(function(e) {
            var sdt = $('#sdt').val();
            var data = {
                sdt: sdt,
            }
            $.ajax({
                url: '/HTTT-DN/pages/main/themnhanvien_ajax.php',
                method: 'POST',
                data: data,
                dataType: 'json',
                success: function(result) {
                    if (result.error.sdt != "") {
                        alert(result.error.sdt)
                        $('#sdt').addClass('border_red')
                    } else {
                        $('#sdt').removeClass('border_red')
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                },
            });
        })
        $('#email').blur(function(e) {
            var email = $('#email').val();
            var data = {
                email: email,
            }
            $.ajax({
                url: '/HTTT-DN/pages/main/themnhanvien_ajax.php',
                method: 'POST',
                data: data,
                dataType: 'json',
                success: function(result) {
                    if (result.error.email != "") {
                        alert(result.error.email)
                        $('#email').addClass('border_red')
                    } else {
                        $('#email').removeClass('border_red')
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                },
            });
        })


        $('#formThemNhanVien').submit(function(e) {
            // e.preventDefault();
            checkForm(e)
            var cmnd = $('#cmnd').val();
            var sdt = $('#sdt').val();
            var email = $('#email').val();
            var data = {
                cmnd: cmnd,
                sdt: sdt,
                email: email,
            }

            $.ajax({
                url: '/HTTT-DN/pages/main/themnhanvien_ajax.php',
                method: 'POST',
                data: data,
                dataType: 'json',
                success: function(result) {
                    if (result.error.cmnd != "") {
                        alert(result.error.cmnd)
                        e.preventDefault()
                        return false
                    }

                    if (result.error.sdt != "") {
                        alert(result.error.sdt)
                        e.preventDefault()
                        return false
                    }

                    if (result.error.email != "") {
                        alert(result.error.email)
                        e.preventDefault()
                        return false
                    }


                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                },
            });
        })
    })
</script>


<?php

$error;
if (isset($_POST['btn_submit'])) {
    print_r($_POST);
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


    $nv->insert_update_delete("INSERT INTO `nhanvien`(`cmnd`, `hoTen`, `gioiTinh`, `ngaySinh`, `diaChi`, `sdt`, `danToc`, `email`, `maChucVu`, `maPhong`, `avatar`) VALUES ('$cmnd','$hoten','$gioitinh','$ngaysinh','$diachi','$sdt','$dantoc','$email','$chucvu','$phong','$file_name')");
    $result = $nv->executeQuery("select maNhanVien from nhanvien where cmnd = '$cmnd'");
    $maNV = $result[0]['maNhanVien'];
    $nv->insert_update_delete("INSERT INTO `hopdong`(`ngayBatDau`, `ngayKetThuc`, `loaiHopDong`, `luongCoBan`, `maNhanVien`) VALUES ('$ngaybatdau','$ngayketthuc','$loaihopdong','$luongcoban','$maNV')");
    $nv->insert_update_delete("INSERT INTO `taikhoan`(`taikhoan`, `matkhau`, `maNhomQuyen`) VALUES ($maNV,12345,'nhanvien')");
    echo "<script>
                                    window.location.href = 'http://localhost/HTTT-DN/index.php?page=nhanvien';
                                    </script>";
}
?>