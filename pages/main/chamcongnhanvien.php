<?php
require_once './object/database.php';
$manv = $_GET['manv'];
$nv = new Database;
$getNhanVienTheoMa = $nv->executeQuery("select nv.maNhanVien, avatar, hoTen, gioiTinh, ngaySinh, diaChi, tenPhong, tenChucVu, ngayKetThuc, luongCoBan from chucvu cv join nhanvien nv on cv.maChucVu=nv.maChucVu join phongban pb on pb.maPhong=nv.maPhong join hopdong hd on hd.maNhanVien=nv.maNhanVien where nv.maNhanVien = $manv");

?>





<body class="vertical  light">
    <div class="wrapper">
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="page-title">Chấm công</h2>
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
                                        <form action="" method="POST">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Tháng chấm công</label>
                                                    <input type="text" class="form-control" id="inputEmail4" name="thang" placeholder="Email" readonly value="3">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Năm chấm công</label>
                                                    <input type="text" class="form-control" id="inputPassword4" name="nam" placeholder="Password" readonly value="2024">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress">Số ngày làm việc</label>
                                                <input type="number" class="form-control" id="inputAddress" name="songaylamviec" value="22" min="1" max="31">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Số ngày nghỉ không phép</label>
                                                    <input type="number" class="form-control" id="inputAddress" name="songaynghikhongphep" value="0" min="0" max="31">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Số ngày trễ</label>
                                                    <input type="number" class="form-control" id="inputAddress" name="songaytre" value="0" min="0" max="31">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Số giờ tăng ca</label>
                                                    <input type="number" class="form-control" id="inputAddress" name="sogiotangca" value="0" min="0" max="31">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress">Mã đơn</label>
                                                    <select id="cars" name="madon" class="form-control">
                                                        <option value="No">Không</option>
                                                        <option value="Yes">Có</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Lương thưởng</label>
                                                    <input type="text" class="form-control" name="luongthuong" id="inputAddress" value="0">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Phụ cấp</label>
                                                    <input type="text" class="form-control" name="phucap" id="inputAddress" value="0">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Khoản trừ bảo hiểm</label>
                                                    <input type="text" class="form-control" name="khoantrubaohiem" id="inputAddress" value="0">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Khoản trừ khác</label>
                                                    <input type="text" class="form-control" name="khoantrukhac" id="inputAddress" value="0">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Thuế</label>
                                                    <input type="text" class="form-control" name="thue" id="inputAddress" readonly value="10%">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Thực lãnh</label>
                                                    <input type="text" class="form-control" name="thuclanh" id="inputAddress" readonly value="0">
                                                </div>
                                            </div>
                                            <input type="submit" class="btn btn-primary" name="btn_submit" value="Lưu"></input>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if (isset($_POST['btn_submit'])) {
                            $nam = $_POST['nam'];
                            $thang = $_POST['thang'];
                            $songaylamviec = $_POST['songaylamviec'];
                            $songaynghikhongphep = $_POST['songaynghikhongphep'];
                            $songaytre = $_POST['songaytre'];
                            $sogiotangca = $_POST['sogiotangca'];
                            $madon = 1;
                            $luongthuong = $_POST['luongthuong'];
                            $phucap = $_POST['phucap'];
                            $khoantrubaohiem = $_POST['khoantrubaohiem'];
                            $khoantrukhac = $_POST['khoantrukhac'];
                            $thue = $_POST['thue'];
                            $thuclanh = $_POST['thuclanh'];

                            $result = $nv->insert_update_delete("INSERT INTO `chamcong`(`maNhanVien`, `thangChamCong`, `namChamCong`, `soNgayLamViec`, `soNgayNghiKhongPhep`, `soNgayTre`, `soGioTangCa`, `maDon`, `luongThuong`, `phuCap`, `khoanTruBaoHiem`, `khoanTruKhac`, `thue`, `thucLanh`) VALUES ('$manv','$thang','$nam','$songaylamviec','$songaynghikhongphep','$songaytre','$sogiotangca','$madon','$luongthuong','$phucap','$khoantrubaohiem','$khoantrukhac','$thue','$thuclanh')");
                            if ($result) {
                                echo "<script>
                                window.location.href = 'http://localhost/HTTT-DN/index.php?page=nhanvien'
                                </script>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    <?php
    ob_start();
    if (isset($_POST['btn_submit'])) {
        $ngayKetThuc = $_POST['ngayKetThuc'];
        $nv->insert_update_delete("update hopdong set ngayKetThuc = '$ngayKetThuc' where maNhanVien = $manv");
        echo "<script>
            window.location.href = 'http://localhost/HTTT-DN/index.php?page=nhanvien'
            </script>";
        // header("location:../../index.php?page=nhanvien");
    }
    ob_end_flush();
    ?>
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