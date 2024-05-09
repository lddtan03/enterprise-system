<?php
require_once './object/database.php';
$manv = $_GET['manv'];
$thang = $_GET['thang'];
$nam = $_GET['nam'];
$nv = new Database;
$getNhanVienTheoMa = $nv->executeQuery("select nv.maNhanVien, avatar, hoTen, gioiTinh, ngaySinh, diaChi, tenPhong, tenChucVu, ngayKetThuc, luongCoBan from chucvu cv join nhanvien nv on cv.maChucVu=nv.maChucVu join phongban pb on pb.maPhong=nv.maPhong join hopdong hd on hd.maNhanVien=nv.maNhanVien where nv.maNhanVien = $manv");
$getBCCtheoMa = $nv->executeQuery("select * from chamcong where maNhanVien = $manv and thangChamCong = '$thang' and namChamCong = '$nam'");
$getNgayNghiTheoMa = $nv->executeQuery("select nv.maNhanVien, SUM(soNgayNghi) soNgayNghiCoPhep from nhanvien nv join donnghiphep dnp on nv.maNhanVien = dnp.maNhanVien where nv.maNhanVien = $manv and MONTH(ngayBatDauNghi) = 3  group by nv.maNhanVien");

// print_r($getBCCtheoMa)

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
                            foreach ($getBCCtheoMa as $bcc) {
                        ?>
                                <div class="card-deck">
                                    <div class="card shadow mb-4">
                                        <div class="card-header">
                                            <img src="assets/avatars/<?php echo $nhanvien['avatar'] ?>" alt="" style="max-width: 200px" class="avatar-img rounded-circle mr-3">
                                            <strong class="card-title" style="font-size: large; font-weight: bold;"><?php echo $nhanvien['hoTen'] . " - Mã nhân viên: " . $nhanvien['maNhanVien'] ?></strong>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="POST" onsubmit="checkForm(event)">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Tháng chấm công</label>
                                                        <input type="text" class="form-control" id="thang" name="thang" placeholder="Email" readonly value="<?php echo $bcc['thangChamCong'] ?>">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4">Năm chấm công</label>
                                                        <input type="text" class="form-control" id="nam" name="nam" placeholder="Password" readonly value="<?php echo $bcc['namChamCong'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress">Số ngày làm việc</label>
                                                    <input type="number" class="form-control" id="songaylamviec" name="songaylamviec" value="<?php echo $bcc['soNgayLamViec'] ?>" min="1" max="26">
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Số ngày nghỉ không phép</label>
                                                        <input type="number" class="form-control" id="songaynghikhongphep" name="songaynghikhongphep" value="<?php echo $bcc['soNgayNghiKhongPhep'] ?>" min="0" max="31">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="songaynghicophep">Số ngày nghỉ có phép</label>
                                                        <input type="text" class="form-control" id="songaynghicophep" name="songaynghicophep" readonly value="<?php if (isset($getNgayNghiTheoMa[0]['soNgayNghiCoPhep'])) echo $getNgayNghiTheoMa[0]['soNgayNghiCoPhep'];
                                                                                                                                                            else echo 0 ?>" min="0" max="31">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4">Số ngày trễ</label>
                                                        <input type="number" class="form-control" id="songaytre" name="songaytre" value="<?php echo $bcc['soNgayTre'] ?>" min="0" max="31">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Số giờ tăng ca</label>
                                                        <input type="number" class="form-control" id="sogiotangca" name="sogiotangca" value="<?php echo $bcc['soGioTangCa'] ?>" min="0" max="31">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Lương thưởng</label>
                                                        <input type="text" class="form-control" name="luongthuong" id="luongthuong" value="<?php echo $bcc['luongThuong'] ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4">Phụ cấp</label>
                                                        <input type="text" class="form-control" name="phucap" id="phucap" value="<?php echo $bcc['phuCap'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Khoản trừ bảo hiểm</label>
                                                        <input type="text" class="form-control" name="khoantrubaohiem" id="khoantrubaohiem" value="<?php echo $bcc['khoanTruBaoHiem'] ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4">Khoản trừ khác</label>
                                                        <input type="text" class="form-control" name="khoantrukhac" id="khoantrukhac" value="<?php echo $bcc['khoanTruKhac'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Thuế</label>
                                                        <input type="text" class="form-control" name="thue" id="thue" readonly value="<?php if ($nhanvien['luongCoBan'] >= 11000000) echo 10;
                                                                                                                                                else echo 0  ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4">Lương cơ bản</label>
                                                        <input type="text" class="form-control" name="luongcoban" id="luongcoban" readonly value="<?php echo $nhanvien['luongCoBan'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4">Thực lãnh</label>
                                                        <input type="text" class="form-control" name="thuclanh" id="thuclanh" readonly value="<?php echo $bcc['thucLanh'] ?>">
                                                    </div>
                                                </div>
                                                <input type="submit" class="btn btn-primary" name="btn_submit" value="Cập nhật"></input>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
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
                            $luongthuong = $_POST['luongthuong'];
                            $phucap = $_POST['phucap'];
                            $khoantrubaohiem = $_POST['khoantrubaohiem'];
                            $khoantrukhac = $_POST['khoantrukhac'];
                            $thue = $_POST['thue'];
                            $thuclanh = $_POST['thuclanh'];

                            $result = $nv->insert_update_delete("UPDATE `chamcong` SET `soNgayLamViec`='$songaylamviec',`soNgayNghiKhongPhep`='$songaynghikhongphep',`soNgayTre`='$songaytre',`soGioTangCa`='$sogiotangca',`luongThuong`='$luongthuong',`phuCap`='$phucap',`khoanTruBaoHiem`='$khoantrubaohiem',`khoanTruKhac`='$khoantrukhac',`thucLanh`='$thuclanh' WHERE maNhanVien = $manv");
                            if ($result) {
                                echo "<script>
                                window.location.href = 'http://localhost:8888/HTTT-DN/index.php?page=chamcongdanhsach'
                                </script>";
                            }
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
       <script>
        $(document).ready(function() {
            var songaylamviec = $('#songaylamviec').val();
            var songaynghikhongphep;
            songaynghikhongphep = 26 - songaylamviec;
            var songaynghicophep = $('#songaynghicophep').val();
            if (songaynghicophep > 3) {
                var songaynghicophep_sau = songaynghicophep - 3
            }else{
                var songaynghicophep_sau = 0
            }
            var songaytre = $('#songaytre').val()
            var sogiotangca = $('#sogiotangca').val()
            var luongthuong = parseInt($('#luongthuong').val());
            var phucap = parseInt($('#phucap').val());
            var khoantrubaohiem = parseInt($('#khoantrubaohiem').val())
            var khoantrukhac = parseInt($('#khoantrukhac').val())
            var thue = parseInt($('#thue').val())
            var luongcoban = parseInt($('#luongcoban').val())
            var thuclanh = $('#thuclanh')
            var val_thuclanh = Math.ceil((luongcoban / 26 * songaylamviec + phucap + luongthuong + sogiotangca * 100000) - (khoantrubaohiem + khoantrukhac + thue / 100 * luongcoban + songaytre * 100000 + songaynghicophep_sau * luongcoban / 26))

            console.log(val_thuclanh);
            thuclanh.attr('value', val_thuclanh)
            console.log();

            $('input').not('#thang').not('#nam').not('#thue').not('#luongcoban').not('#thuclanh').not('#btn_submit').change(() => {
                songaylamviec = $('#songaylamviec').val();
                songaynghikhongphep = 26 - songaylamviec;
                songaylamviec = 26 - songaynghikhongphep;
                $('#songaynghikhongphep').attr('value', songaynghikhongphep);
                songaytre = $('#songaytre').val()
                sogiotangca = $('#sogiotangca').val()
                luongthuong = parseInt($('#luongthuong').val());
                phucap = parseInt($('#phucap').val());
                khoantrubaohiem = parseInt($('#khoantrubaohiem').val())
                khoantrukhac = parseInt($('#khoantrukhac').val())
                thue = parseInt($('#thue').val())
                luongcoban = parseInt($('#luongcoban').val())
                thuclanh = $('#thuclanh')
                val_thuclanh = Math.ceil((luongcoban / 26 * songaylamviec + phucap + luongthuong + sogiotangca * 100000) - (khoantrubaohiem + khoantrukhac + thue / 100 * luongcoban + songaytre * 100000 + songaynghicophep_sau * luongcoban / 26))
                thuclanh.attr('value', val_thuclanh)
                console.log(val_thuclanh);
            })
        })
    </script>

<script>
        function checkForm(e) {
            var numberRegEx = /^[0-9]+$/;
            var luongthuong = document.getElementById("luongthuong");
            var phucap = document.getElementById("phucap");
            var khoantrubaohiem = document.getElementById("khoantrubaohiem");
            var khoantrukhac = document.getElementById("khoantrukhac");

            if (luongthuong.value == "" || luongthuong.value == undefined || luongthuong.value == NaN) {
                alert("Bạn chưa nhập lương thưởng!");
                luongthuong.focus();
                e.preventDefault();
                return false;
            } else if (phucap.value == "" || phucap.value == undefined || phucap.value == NaN) {
                alert("Bạn chưa nhập phụ cấp!");
                phucap.focus();
                e.preventDefault();
                return false;
            } else if (khoantrubaohiem.value == "" || khoantrubaohiem.value == undefined || khoantrubaohiem.value == NaN) {
                alert("Bạn chưa nhập khoản trừ bảo hiểm!");
                khoantrubaohiem.focus();
                e.preventDefault();
                return false;
            } else if (khoantrukhac.value == "" || khoantrukhac.value == undefined || khoantrukhac.value == NaN) {
                alert("Bạn chưa nhập khoản trừ khác!");
                khoantrukhac.focus();
                e.preventDefault();
                return false;
            } else if (!numberRegEx.test(luongthuong.value) && luongthuong.value != "") {
                alert("Lương thưởng không hợp lệ!");
                luongthuong.focus();
                e.preventDefault();
                return false;
            } else if (!numberRegEx.test(phucap.value) && phucap.value != "") {
                alert("Phụ cấp không hợp lệ!");
                phucap.focus();
                e.preventDefault();
                return false;
            } else if (!numberRegEx.test(khoantrubaohiem.value) && khoantrubaohiem.value != "") {
                alert("Khoản trừ bảo hiểm không hợp lệ!");
                khoantrubaohiem.focus();
                e.preventDefault(); 
                return false;
            } else if (!numberRegEx.test(khoantrukhac.value) && khoantrukhac.value != "") {
                alert("Khoản trừ khác không hợp lệ!");
                khoantrukhac.focus();
                e.preventDefault();
                return false;
            }
        }
    </script>
</body>

</html>