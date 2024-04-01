<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/action.php');

$taiKhoan = null;
if (isset($_SESSION['taiKhoan'])) {
    $taiKhoan = getTaiKhoanBy($_SESSION['taiKhoan']);
    if (strcmp($taiKhoan->getMaNhomQuyen(), QUAN_LY_KHO) != 0) {
        header('location:../HTTT-DN/index.php');
        echo "<script>alert('Bạn không có quyền vào trang này')</script>";
    }
} else {
    header('location:../HTTT-DN/index.php');
    echo "<cript>alert('Bạn không có quyền vào trang này')</script>";
}
?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row" style="justify-content: space-between;">
                    <h2 class="mb-2 page-title">Danh sách phiếu nhập</h2>
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
                                            <th>Mã PN</th>
                                            <th>Tên NCC</th>
                                            <th>Tên NV</th>
                                            <th>Ngày nhập</th>
                                            <th>Tổng tiền</th>
                                            <th>Số ượng</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        echo hienThiDanhSachPhieuNhap();
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
    <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="list-group list-group-flush my-n3">
                        <div class="list-group-item bg-transparent">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="fe fe-box fe-24"></span>
                                </div>
                                <div class="col">
                                    <small><strong>Package has uploaded successfull</strong></small>
                                    <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                                    <small class="badge badge-pill badge-light text-muted">1m ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item bg-transparent">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="fe fe-download fe-24"></span>
                                </div>
                                <div class="col">
                                    <small><strong>Widgets are updated successfull</strong></small>
                                    <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                                    <small class="badge badge-pill badge-light text-muted">2m ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item bg-transparent">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="fe fe-inbox fe-24"></span>
                                </div>
                                <div class="col">
                                    <small><strong>Notifications have been sent</strong></small>
                                    <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                                    <small class="badge badge-pill badge-light text-muted">30m ago</small>
                                </div>
                            </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item bg-transparent">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="fe fe-link fe-24"></span>
                                </div>
                                <div class="col">
                                    <small><strong>Link was attached to menu</strong></small>
                                    <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                                    <small class="badge badge-pill badge-light text-muted">1h ago</small>
                                </div>
                            </div>
                        </div> <!-- / .row -->
                    </div> <!-- / .list-group -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-5">
                    <div class="row align-items-center">
                        <div class="col-6 text-center">
                            <div class="squircle bg-success justify-content-center">
                                <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                            </div>
                            <p>Control area</p>
                        </div>
                        <div class="col-6 text-center">
                            <div class="squircle bg-primary justify-content-center">
                                <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                            </div>
                            <p>Activity</p>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-6 text-center">
                            <div class="squircle bg-primary justify-content-center">
                                <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                            </div>
                            <p>Droplet</p>
                        </div>
                        <div class="col-6 text-center">
                            <div class="squircle bg-primary justify-content-center">
                                <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                            </div>
                            <p>Upload</p>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-6 text-center">
                            <div class="squircle bg-primary justify-content-center">
                                <i class="fe fe-users fe-32 align-self-center text-white"></i>
                            </div>
                            <p>Users</p>
                        </div>
                        <div class="col-6 text-center">
                            <div class="squircle bg-primary justify-content-center">
                                <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                            </div>
                            <p>Settings</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- new event modal -->
    <div class="modal fade" id="chitietphieunhap" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 800px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyModalLabel">Chi tiết phiếu nhập</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-8">
                    <div class="card shadow mb-8">
                        <form class="needs-validation" novalidate>
                            <div class="card shadow">
                                <div class="card-body p-5">
                                    <div class="row mb-5">
                                        <div class="col-12 text-center mb-4">
                                            <img src="./assets/images/logo.svg" class="navbar-brand-img brand-sm mx-auto mb-4" alt="...">
                                            <h2 class="mb-0 text-uppercase">Phiếu nhập</h2>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="small text-muted text-uppercase mb-2">Người nhập hàng</p>
                                            <p class="mb-4">
                                                <strong>Mã NV: 23</strong><br /> Hồ Khang <br /> Nhân viên <br />
                                                hodohoangkhang@gmail.com<br /> 009879234<br />
                                            </p>
                                            <p>
                                                <span class="small text-muted text-uppercase">Mã phiêu nhập
                                                    #</span><br />
                                                <strong>1806</strong>
                                            </p>
                                        </div>
                                        <div class="col-md-5">
                                            <p class="small text-muted text-uppercase mb-2">Nhà cung cấp</p>
                                            <p class="mb-4">
                                                <strong>Mã NCC: 12</strong><br />NCC 1 <br />Địa chỉ nhà CC<br />
                                                ncc1@gmail.com<br /> 0988723122<br />
                                            </p>
                                            <p>
                                                <small class="small text-muted text-uppercase">Ngày nhập</small><br />
                                                <strong>12/21/2021</strong>
                                            </p>
                                        </div>
                                    </div>
                                    <table class="table table-borderless table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Sản phẩm</th>
                                                <th scope="col">Size</th>
                                                <th scope="col" class="text-right">Giá nhập</th>
                                                <th scope="col" class="text-right">Số lượng</th>
                                                <th scope="col" class="text-right">Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                        </tbody>
                                    </table>
                                    <div class="row mt-5">
                                        <div class="col-md-12">
                                            <div class="text-right mr-2">
                                                <p class="mb-2 h6">
                                                    <span class="text-muted">Thành tiền : </span>
                                                    <strong></strong>
                                                </p>                                                
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
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
<script src='js/jquery.dataTables.min.js'></script>
<script src='js/dataTables.bootstrap4.min.js'></script>
<script>
    $('#dataTable-1').DataTable({
        autoWidth: true,
        "lengthMenu": [
            [16, 32, 64, -1],
            [16, 32, 64, "All"]
        ]
    });
</script>
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
    function getChiTietPhieuNhap(maPhieuNhap) {
        var xml = new XMLHttpRequest();
        var request = "/HTTT-DN/pages/main/danhsachphieunhap-list.php?maPhieuNhap=" + maPhieuNhap;
        xml.open("GET", request, true);
        xml.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xml.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("chitietphieunhap").innerHTML = this.responseText;
            }
        };
        xml.send();
    }
</script>

<?php
function hienThiDanhSachPhieuNhap()
{
    require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/action.php');

    $phieuNhapList = getPhieuNhapList();
    for ($i = 0; $i < count($phieuNhapList); $i++) {
        $phieuNhap = $phieuNhapList[$i];
        $nhaCungCap = getNhaCungCapById($phieuNhap->getMaNhaCungCap());
        $nhanVien = getNhanVienById($phieuNhap->getMaNhanVien());
        $trangThai = "";
        if ($phieuNhap->getTrangThai() == DA_NHAN)
            $trangThai = "Đã nhận";
        else if ($phieuNhap->getTrangThai() == DANG_XU_LY)
            $trangThai = "Đang xử lý";
        else
            $trangThai = "Đã hủy";
        echo '
        <tr>
            <td>' . $phieuNhap->getMaPhieuNhap() . '</td>
            <td>' . $nhaCungCap->getTen() . '</td>
            <td>' . $nhanVien->getHoTen() . '</td>
            <td>' . $phieuNhap->getNgayNhap() . '</td>
            <td>' . changeMoney($phieuNhap->getTongTien()) . '₫</td>
            <td>' . $phieuNhap->getTongSoLuong() . '</td>
            <td>' . $trangThai . '</td>
            <td>
                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" data-toggle="modal"
                        data-target="#chitietphieunhap" href="#" onclick="getChiTietPhieuNhap(' . $phieuNhap->getMaPhieuNhap() . ')">Chi tiết
                    </a>
                    <a class="dropdown-item" href="/HTTT-DN/pages/main/danhsachphieunhap-edittrangthai.php?maPhieuNhap=' . $phieuNhap->getMaPhieuNhap() . '&trangThai=1">Đã nhận hàng</a>
                    <a class="dropdown-item" href="/HTTT-DN/pages/main/danhsachphieunhap-edittrangthai.php?maPhieuNhap=' . $phieuNhap->getMaPhieuNhap() . '&trangThai=2">Hủy nhận hàng</a>
                </div>
            </td>
        </tr>';
    }
}
?>