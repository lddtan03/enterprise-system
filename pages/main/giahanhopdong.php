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
                        <h2 class="page-title">Gia hạn hợp đồng</h2>
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
                                        <form action="" method="POST" onsubmit="return checkForm(event)">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Ngày sinh</label>
                                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Email" disabled value="<?php echo $nhanvien['ngaySinh'] ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Giới tính</label>
                                                    <input type="text" class="form-control" id="inputPassword4" placeholder="Password" disabled value="<?php echo $nhanvien['gioiTinh'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress">Địa chỉ</label>
                                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" disabled value="<?php echo $nhanvien['diaChi'] ?>">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Phòng ban</label>
                                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" disabled value="<?php echo $nhanvien['tenPhong'] ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Chức vụ</label>
                                                    <input type="text" class="form-control" id="inputPassword4" placeholder="Password" disabled value="<?php echo $nhanvien['tenChucVu'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Ngày kết thúc hợp đồng</label>
                                                    <input type="text" class="form-control" id="ngayKetThuc" name="ngayKetThuc" placeholder="Email" readonly="true" value="<?php echo $nhanvien['ngayKetThuc'] ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Lương cơ bản</label>
                                                    <input type="text" class="form-control" id="inputPassword4" placeholder="Password" disabled value="<?php echo $nhanvien['luongCoBan'] ?>">
                                                </div>
                                            </div>
                                            <label for="inputAddress">Thời gian gia hạn thêm</label>
                                            <div class="form-group col-md-4">
                                                <select id="cars" name="cars" class="form-control">
                                                    <option value="">Chọn</option>
                                                    <option value="1">1 năm</option>
                                                    <option value="2">2 năm</option>
                                                    <option value="3">3 năm</option>
                                                    <option value="4">4 năm</option>
                                                </select>
                                            </div>
                                            <input type="submit" class="btn btn-primary" name="btn_submit" value="Lưu"></input>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script>
        let ngayKetThuc = document.getElementById('ngayKetThuc');
        const valueNgayKetThuc = ngayKetThuc.value
        console.log(valueNgayKetThuc);

        const today = new Date();
        console.log(today.getTime());

        let cars = document.getElementById('cars');
        cars.addEventListener('change', () => {
            if (cars.value == 1) {
                let substr = valueNgayKetThuc.split('-')
                let nam = Number(substr[0]) + 1
                ngayKetThuc.value = nam + "-" + substr[1] + "-" + substr[2]
            } else if (cars.value == 2) {
                let substr = valueNgayKetThuc.split('-')
                let nam = Number(substr[0]) + 2
                ngayKetThuc.value = nam + "-" + substr[1] + "-" + substr[2]
            } else if (cars.value == 3) {
                let substr = valueNgayKetThuc.split('-')
                let nam = Number(substr[0]) + 3
                ngayKetThuc.value = nam + "-" + substr[1] + "-" + substr[2]
            } else if (cars.value == 4) {
                let substr = valueNgayKetThuc.split('-')
                let nam = Number(substr[0]) + 4
                ngayKetThuc.value = nam + "-" + substr[1] + "-" + substr[2]
            } else {
                ngayKetThuc.value = valueNgayKetThuc
            }
        })

        function checkForm(e) {

            var cars = document.getElementById("cars");

            if (cars.value == "" || cars.value == undefined || cars.value == NaN) {
                alert("Bạn chưa chọn thời gian gia hạn hợp đồng!");
                cars.focus();
                e.preventDefault();
                return false;
            }
        }
    </script>
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