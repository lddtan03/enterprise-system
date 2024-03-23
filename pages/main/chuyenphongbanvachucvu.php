<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
</head>


<?php
require_once './object/database.php';
$manv = $_GET['manv'];
$nv = new Database;
$getNhanVienTheoMa = $nv->executeQuery("select nv.maNhanVien, avatar, hoTen, gioiTinh, ngaySinh, diaChi, tenPhong, tenChucVu, ngayKetThuc, luongCoBan from chucvu cv join nhanvien nv on cv.maChucVu=nv.maChucVu join phongban pb on pb.maPhong=nv.maPhong join hopdong hd on hd.maNhanVien=nv.maNhanVien where nv.maNhanVien = $manv");

?>

<body class="vertical  light  ">
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
                                        <form action="" method="POST">
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
                                                    <label for="inputEmail4">Ngày kết thúc hợp đồng</label>
                                                    <input type="text" class="form-control" id="ngayKetThuc" name="ngayKetThuc" placeholder="Email" readonly="true" value="<?php echo $nhanvien['ngayKetThuc'] ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Lương cơ bản</label>
                                                    <input type="text" class="form-control" id="inputPassword4" placeholder="Password" disabled value="<?php echo $nhanvien['luongCoBan'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Phòng ban hiện tại</label>
                                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" disabled value="<?php echo $nhanvien['tenPhong'] ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Tên chức vụ</label>
                                                    <input type="text" class="form-control" id="inputPassword4" placeholder="Password" disabled value="<?php echo $nhanvien['tenChucVu'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div id="weather-temp">

                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress">Phòng ban chuyển đến</label>
                                                    <?php
                                                    $result = $nv->select("select tenPhong, maPhong from phongban");
                                                    ?>
                                                    <div>
                                                        <select id="tenphong" name="tenphong" class="form-control">

                                                            <?php
                                                            $tp = $nhanvien['tenPhong'];

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
                                                    <label for="inputAddress">Chức vụ sau khi chuyển</label>
                                                    <?php
                                                    $result = $nv->select("select tenChucVu, maChucVu from chucvu");
                                                    ?>
                                                    <div>
                                                        <select id="chucvu" name="chucvu" class="form-control">

                                                            <?php
                                                            $result = $nv->select("select tenChucVu, maChucVu from chucvu");

                                                            if (mysqli_num_rows($result) > 0) {
                                                                // Duyệt qua từng hàng kết quả
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    $maChucVu = $row['maChucVu'];
                                                                    $tenChucVu = $row["tenChucVu"];
                                                                    if ($nhanvien['tenChucVu'] === $tenChucVu)
                                                                        echo "<option value='$maChucVu' selected>$tenChucVu</option>";
                                                                    else
                                                                        echo "<option value='$maChucVu'>$tenChucVu</option>";
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

                                        <!-- <script>
                                            $(document).ready(function() {
                                                $("#chucvu").change(() => {
                                                    let chucvu = $('#chucvu').val();
                                                    var data = {
                                                        chucvu: chucvu
                                                    }
                                                    $.ajax({
                                                        url: "",
                                                        method: "GET",
                                                        data: data,
                                                        dataType: "json",
                                                        success: function(result) {
                                                            console.log(result);
                                                            $("#weather-temp").html("<strong>" + result.chucvu + "</strong>");
                                                        },
                                                        error: function(xhr, ajaxOptions, thrownError) {
                                                            alert(xhr.status);
                                                            alert(thrownError);
                                                        },
                                                    });
                                                })
                                                $("#tenphong").change(() => {
                                                    let tenphong = $('#tenphong').val();
                                                    var data = {
                                                        tenphong: tenphong
                                                    }
                                                    $.ajax({
                                                        url: "",
                                                        method: "GET",
                                                        data: data,
                                                        dataType: "text",
                                                        success: function(result) {
                                                            console.log(result);
                                                            $("#weather-temp").html("<strong>" + result + "</strong>");
                                                        },
                                                        error: function(xhr, ajaxOptions, thrownError) {
                                                            alert(xhr.status);
                                                            alert(thrownError);
                                                        },
                                                    });
                                                })
                                            })
                                        </script> -->
                                    </div>
                                </div>
                            </div>
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
                                    }
                                    $nv->insert_update_delete("update nhanvien set maPhong = '$phong', maChucVu = '$chucvu' where maNhanVien = '$manv'");
                                    echo "<script>
                                    window.location.href = 'http://localhost/HTTT-DN/index.php?page=nhanvien'
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