<?php
$con = new mysqli('localhost', 'root', '11111111', 'htttdn');

$query = $con->query("
SELECT
    s.maSanPham,
    s.tenSanPham,
    COALESCE((SELECT SUM(cp.soLuong)
              FROM chitietphieunhap cp
              WHERE cp.maSanPham = s.maSanPham), 0) AS tongSoLuongNhap,
    COALESCE((SELECT SUM(cx.soLuong)
              FROM chitietphieuxuat cx
              WHERE cx.maSanPham = s.maSanPham), 0) AS tongSoLuongXuat,
    COALESCE((SELECT SUM(cp.soLuong)
              FROM chitietphieunhap cp
              WHERE cp.maSanPham = s.maSanPham), 0) -
    COALESCE((SELECT SUM(cx.soLuong)
              FROM chitietphieuxuat cx
              WHERE cx.maSanPham = s.maSanPham), 0) AS tonKho
FROM sanpham s
ORDER BY s.maSanPham;
");
?>

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row" style="justify-content: space-between;">
                    <h2 class="mb-2 page-title">Kho hàng</h2>
                    <button type="button" class="btn mb-2 btn-primary">In báo cáo</button>
                </div>
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th>Mã SP</th>
                                            <th>Tên SP</th>
                                            <th>SL Nhập</th>
                                            <th>SL Xuất</th>
                                            <th>Tồn Kho</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $query->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['maSanPham'] . "</td>";
                                            echo "<td>" . $row['tenSanPham'] . "</td>";
                                            echo "<td>" . $row['tongSoLuongNhap'] . "</td>";
                                            echo "<td>" . $row['tongSoLuongXuat'] . "</td>";
                                            echo "<td>" . $row['tonKho'] . "</td>";
                                            echo "</tr>";
                                          }
                                          ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main>

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/simplebar.min.js"></script>
<script src='js/daterangepicker.js'></script>
<script src='js/jquery.stickOnScroll.js'></script>
<script src="js/tinycolor-min.js"></script>
<script src="js/config.js"></script>
<script src='js/jquery.dataTables.min.js'></script>
<script src='js/dataTables.bootstrap4.min.js'></script>

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
    $('#dataTable-1').DataTable(
        {
            autoWidth: true,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });
</script>