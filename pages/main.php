<?php
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'logout':
            require_once 'pages/main/logout.php';
            break;
        case 'forgetPass':
            require_once 'pages/main/forgetPass.php';
            break;
        case 'signup':
            require_once 'pages/main/signup.php';
            break;
        case 'nhanvien':
            require_once 'pages/main/nhanvien.php';
            break;
        case 'giahanhopdong':
            require_once 'pages/main/giahanhopdong.php';
            break;
        case 'admin-phongban':
            require_once 'pages/main/admin-phongban.php';
            break;
        case 'profile-settings':
            require_once 'pages/main/profile-settings.php';
            break;
        case 'admin-sanpham':
            require_once 'pages/main/admin-sanpham.php';
            break;
        case 'admin-nhacungcap':
            require_once 'pages/main/admin-nhacungcap.php';
            break;
        case 'sanpham':
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'add')
                    require_once 'pages/main/sanpham-add-page.php';
                else
                    require_once 'pages/main/sanpham-edit-page.php';
            } else {
                require_once 'pages/main/sanpham.php';
            }
            break;
        case 'nhacungcap':
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'add')
                    require_once 'pages/main/nhacungcap-add-page.php';
                else
                    require_once 'pages/main/nhacungcap-edit-page.php';
            } else {
                require_once 'pages/main/nhacungcap.php';
            }
            break;
        case 'donnghiphep':
            require_once 'pages/main/donnghiphep.php';
            break;
        case 'duyetdonnghiphep':
            require_once 'pages/main/duyetdonnghiphep.php';
            break;
        case 'thongkekhohang':
            require_once 'pages/main/thongkekhohang.php';
            break;
        case 'thongkenhansu':
            require_once 'pages/main/thongkenhansu.php';
            break;
        case 'thongkekinhdoanh':
            require_once 'pages/main/thongkekinhdoanh.php';
            break;
        case 'admin-phanquyen':
            require_once 'pages/main/admin-phanquyen.php';
            break;
        case 'xuathang':
            require_once 'pages/main/xuathang.php';
            break;
        case 'chamcong':
            require_once 'pages/main/chamcong.php';
            break;
        case 'chuyenphongbanvachucvu':
            require_once 'pages/main/chuyenphongbanvachucvu.php';
            break;
        case 'chitiet':
            require_once 'pages/main/chitiet.php';
            break;
        case 'xoanhanvien':
            require_once 'pages/main/xoanhanvien.php';
            break;
        case 'xoanhanvien2':
            require_once 'pages/main/xoanhanvien2.php';
            break;
        case 'themnhanvien':
            require_once 'pages/main/themnhanvien.php';
            break;
        case 'suathongtincanhan':
            require_once 'pages/main/suathongtincanhan.php';
            break;
        case 'xulychuyenphongbanvachucvu':
            require_once 'pages/main/xulychuyenphongbanvachucvu.php';
            break;
        case 'chamcongnhanvien':
            require_once 'pages/main/chamcongnhanvien.php';
            break;
        case 'chamcongdanhsach':
            require_once 'pages/main/chamcongdanhsach.php';
            break;
        case 'chamcong-update':
            require_once 'pages/main/chamcong-update.php';
            break;
        case 'luong_danhsachchamcongcuanhanvien':
            require_once 'pages/main/luong_danhsachchamcongcuanhanvien.php';
            break;
        case 'luong_chitietchamcong':
            require_once 'pages/main/luong_chitietchamcong.php';
            break;
        case 'luong_theothang':
            require_once 'pages/main/luong_theothang.php';
            break;
        case 'luong_theonam':
            require_once 'pages/main/luong_theonam.php';
            break;
               case 'nhaphang':
            if ($_GET['id'] == 'taophieunhap') {
                require_once 'pages/main/taophieunhap.php';
            } else {
                require_once 'pages/main/danhsachphieunhap.php';
            }
            break;
        default:
            require_once 'pages/dashboard.php';
            break;
    }
} else {
    require_once 'pages/dashboard.php';
}
