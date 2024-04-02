<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "htttdn";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra nếu người dùng đã đăng nhập
if (isset($_SESSION['taiKhoan'])) {
    $loggedInUser = $_SESSION['taiKhoan'];
    
    // Lấy maNhomQuyen từ cơ sở dữ liệu dựa trên taiKhoan
    $sql = "SELECT maNhomQuyen FROM taikhoan WHERE taiKhoan = '$loggedInUser'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $maNhomQuyen = $row['maNhomQuyen'];
    }
}
?>

<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                    xml:space="preserve">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                </svg>
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="index.php?page=dashboard">
                    <i class="fe fe-calendar fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                </a>
            </li>
        </ul>

        <!-- Admin -->
        <?php if ($maNhomQuyen === 'admin'): ?>
            
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Admin</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="index.php?page=admin-baocao">
                        <i class="fe fe-calendar fe-16"></i>
                        <span class="ml-3 item-text">Báo cáo</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="index.php?page=admin-phongban">
                        <i class="fe fe-calendar fe-16"></i>
                        <span class="ml-3 item-text">Phòng ban</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="index.php?page=admin-sanpham">
                        <i class="fe fe-calendar fe-16"></i>
                        <span class="ml-3 item-text">Sản phẩm</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="index.php?page=admin-nhacungcap">
                        <i class="fe fe-calendar fe-16"></i>
                        <span class="ml-3 item-text">Nhà cung cấp</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="index.php?page=admin-phanquyen">
                        <i class="fe fe-calendar fe-16"></i>
                        <span class="ml-3 item-text">Phân quyền</span>
                    </a>
                </li>
            </ul>
        <?php endif; ?>

        <!-- Nhân viên -->
        <?php if ($maNhomQuyen === 'nhanvien'): ?>
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Nhân viên</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item dropdown">
                    <a href="#luong" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fa-regular fa-money-bill-1 fe-16"></i>
                        <span class="ml-3 item-text">Lương</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="luong">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="index.php?page=luong&id=chitietchamcong"><span
                                    class="ml-1 item-text">Chi tiết chấm công</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="index.php?page=luong&id=luongtheothang"><span
                                    class="ml-1 item-text">Lương theo tháng</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="index.php?page=luong&id=luongtheonam"><span
                                    class="ml-1 item-text">Lương theo năm</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="index.php?page=donnghiphep">
                        <i class="fe fe-calendar fe-16"></i>
                        <span class="ml-3 item-text">Đơn nghỉ phép</span>
                    </a>
                </li>
            </ul>
        <?php endif; ?>

        <!-- Quản lý nhân sự -->
        <?php if ($maNhomQuyen === 'quanlynhansu'): ?>
           
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Quản lý nhân sự</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="index.php?page=thongkenhansu">
                        <i class="fe fe-calendar fe-16"></i>
                        <span class="ml-3 item-text">Thống kê nhân sự</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="index.php?page=nhanvien">
                        <i class="fe fe-calendar fe-16"></i>
                        <span class="ml-3 item-text">Nhân viên</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="index.php?page=duyetdonnghiphep">
                        <i class="fe fe-calendar fe-16"></i>
                        <span class="ml-3 item-text">Duyệt đơn nghỉ phép</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="index.php?page=chamcong">
                        <i class="fe fe-calendar fe-16"></i>
                        <span class="ml-3 item-text">Chấm công</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="index.php?page=chamcongdanhsach">
                        <i class="fe fe-calendar fe-16"></i>
                        <span class="ml-3 item-text">Danh sách chấm công</span>
                    </a>
                </li>
            </ul>
        <?php endif; ?>

        <!-- Quản lý kho hàng -->
        <?php if ($maNhomQuyen === 'quanlykho'): ?>
            
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Quản lý kho hàng</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="index.php?page=thongkekhohang">
                        <i class="fe fe-calendar fe-16"></i>
                        <span class="ml-3 item-text">Thống kê kho hàng</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="index.php?page=sanpham">
                        <i class="fe fe-calendar fe-16"></i>
                        <span class="ml-3 item-text">Sản phẩm</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="index.php?page=nhacungcap">
                        <i class="fe fe-calendar fe-16"></i>
                        <span class="ml-3 item-text">Nhà cung cấp</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#nhaphang" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fa-regular fa-money-bill-1 fe-16"></i>
                        <span class="ml-3 item-text">Nhập hàng</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="nhaphang">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="index.php?page=nhaphang&id=taophieunhap"><span
                                    class="ml-1 item-text">Tạo phiếu nhập</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="index.php?page=nhaphang&id=danhsachphieunhap"><span
                                    class="ml-1 item-text">Danh sách phiếu nhập</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        <?php endif; ?>

        <!-- Quản lý kinh doanh-->
        <?php if ($maNhomQuyen === 'quanlykinhdoanh'): ?>
           
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Quản lý kinh doanh</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="index.php?page=thongkekinhdoanh">
                        <i class="fe fe-calendar fe-16"></i>
                        <span class="ml-3 item-text">Thống kê kinhdoanh</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="index.php?page=xuathang">
                        <i class="fe fe-calendar fe-16"></i>
                        <span class="ml-3 item-text">Xuất hàng</span>
                    </a>
                </li>
            </ul>
        <?php endif; ?>


    </nav>
</aside>