<?php
require_once './object/database.php';
$nv = new Database;
$manv = $_GET['manv'];
$getNhanVienTheoMa = $nv->executeQuery("select nv.maNhanVien, avatar, hoTen, gioiTinh, ngaySinh, diaChi, tenPhong, tenChucVu, nv.maPhong, ngayKetThuc, luongCoBan from chucvu cv join nhanvien nv on cv.maChucVu=nv.maChucVu join phongban pb on pb.maPhong=nv.maPhong join hopdong hd on hd.maNhanVien=nv.maNhanVien where nv.maNhanVien = $manv");


?>
<!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->

<body class="vertical light">
    <div class="wrapper">
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="page-title">Chuyển phòng ban</h2>
                        <?php

                        foreach ($getNhanVienTheoMa as $nhanvien) {
                        ?>
                            <div class="card-deck">
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        <img src="assets/avatars/<?php echo $nhanvien['avatar'] ?>" alt="" style="max-width: 200px" class="avatar-img rounded-circle mr-3">
                                        <strong class="card-title" style="font-size: large; font-weight: bold;"><?php echo $nhanvien['hoTen'] . " - Mã nhân viên: " . $nhanvien['maNhanVien'] ?></strong>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Ngày sinh</label>
                                                    <input type="text" class="form-control" placeholder="Email" disabled value="<?php echo $nhanvien['ngaySinh'] ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Giới tính</label>
                                                    <input type="text" class="form-control" placeholder="Password" disabled value="<?php echo $nhanvien['gioiTinh'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input type="text" class="form-control" placeholder="1234 Main St" disabled value="<?php echo $nhanvien['diaChi'] ?>">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Ngày kết thúc hợp đồng</label>
                                                    <input type="text" class="form-control" name="cpb_ngayKetThuc" placeholder="Email" readonly="true" value="<?php echo $nhanvien['ngayKetThuc'] ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Lương cơ bản</label>
                                                    <input type="text" class="form-control" placeholder="Password" disabled value="<?php echo $nhanvien['luongCoBan'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Phòng ban hiện tại</label>
                                                    <input type="email" class="form-control" placeholder="Email" disabled value="<?php echo $nhanvien['tenPhong'] ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Tên chức vụ</label>
                                                    <input type="text" class="form-control" placeholder="Password" disabled value="<?php echo $nhanvien['tenChucVu'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Phòng ban chuyển đến</label>
                                                    <div>
                                                        <select id="tenphong" name="tenphong" class="form-control">
                                                            <?php

                                                            $result = $nv->select("select tenPhong, maPhong from phongban");

                                                            if (mysqli_num_rows($result) > 0) {
                                                                // Duy ệt qua từng hàng kết quả
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    $maPhong = $row['maPhong'];
                                                                    $tenPhong = $row["tenPhong"];
                                                                    if ($nhanvien['tenPhong'] === $tenPhong)
                                                                        echo "<option value='$maPhong' selected>$tenPhong</option>";
                                                                    else
                                                                        echo "<option value='$maPhong'>$tenPhong</option>";
                                                                }
                                                            }
                                                            // Đóng kết nối
                                                            // $nv->disconnect();
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Chức vụ sau khi chuyển</label>
                                                        
                                                    <div>
                                                        <select id="chucvu" name="chucvu" class="form-control">

                                                            <?php
                                                            $maPhong = $nhanvien['maPhong'];
                                                            $result = $nv->select("SELECT cv.maChucVu, cv.tenChucVu FROM chucvu cv WHERE cv.maChucVu not in (select nv.maChucVu from nhanvien nv join phongban pb on nv.maPhong = pb.maPhong WHERE nv.maPhong = '$maPhong' and nv.maChucVu = 'TP')");

                                                            if (mysqli_num_rows($result) > 0) {
                                                                // Duyệt qua từng hàng kết quả
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    $maChucVu = $row['maChucVu'];
                                                                    $tenChucVu = $row["tenChucVu"];
                                                                    if ($nhanvien['tenChucVu'] === $tenChucVu)
                                                                        echo "<option class='chucvu' value='$maChucVu' selected>$tenChucVu</option>";
                                                                    else
                                                                        echo "<option class='chucvu' value='$maChucVu'>$tenChucVu</option>";
                                                                }
                                                            }

                                                            // Đóng kết nối
                                                            // $nv->disconnect();
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" class="btn btn-primary" name="btn_submit" value="Lưu"></input>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    $("#tenphong").change(function() {
                                        let tenphong = $('#tenphong').val();
                                        var data = {
                                            tenphong: tenphong
                                        }
                                        $.ajax({
                                            url: '/HTTT-DN/pages/main/xulychuyenphongbanvachucvu.php',
                                            method: 'POST',
                                            data: data,
                                            dataType: 'json',
                                            success: function(result) {
                                                // alert(result)
                                                var str = "";
                                                result.resultChucVu.forEach(element => {
                                                    str += `<option value='${element.maChucVu}'>${element.tenChucVu}</option>`;
                                                })
                                                $('#chucvu').html(str);
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
                            ob_start();

                            $error = [];
                            if (isset($_POST['btn_submit'])) {
                                $phong = $_POST['tenphong'];
                                $chucvu = $_POST['chucvu'];
                                $result = $nv->executeQuery("select maPhong, maChucVu from nhanvien where maChucVu = 'TP'");

                                foreach ($result as $item) {
                                    if ($item['maPhong'] == "$phong" && $item['maChucVu'] == "$chucvu") {
                                        $error['existTP'] = "Phòng $phong đã có trưởng phòng";
                                        echo "Phòng $phong đã có trưởng phòng";
                                    }
                                }
                                
                                if (empty($error)) {
                                    // $nv->executeQuery("SELECT maNhanVien, maPhong FROM `nhanvien` join `phongban` WHERE maChucVu = 'TP'");
                                    if ($chucvu == "TP") {
                                        $nv->insert_update_delete("update phongban set maTruongPhong = '$manv' where maPhong = '$phong'");
                                        $date = date("Y-m-d");
                                        $nv->insert_update_delete("update phongban set ngayNhanChuc ='$date'  where maPhong = '$phong'");
                                    }
                                    $nv->insert_update_delete("update nhanvien set maPhong = '$phong', maChucVu = '$chucvu' where maNhanVien = '$manv'");
                                    echo "<script>
                                    window.location.href = 'http://localhost:8888/HTTT-DN/index.php?page=nhanvien'
                                    </script>";
                                }
                            }
                            ob_end_flush();
                            ?>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </main> <!-- main -->
    </div> <!-- .wrapper -->

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
</body>

</html>