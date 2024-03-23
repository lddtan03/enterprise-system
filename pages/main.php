<?php
    if(isset($_GET['page'])){
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
            case 'login':
                require_once 'pages/main/login.php';
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
                require_once 'pages/main/sanpham.php';
                break;    
            case 'nhacungcap':
                require_once 'pages/main/nhacungcap.php';
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
            case 'nhaphang':
                if($_GET['id']=='taophieunhap'){
                    require_once 'pages/main/taophieunhap.php';
                }
                else{
                    require_once 'pages/main/danhsachphieunhap.php';
                }
                break;      
            default:
                require_once 'pages/dashboard.php';
                break;
        }
    }
    else{
        require_once 'pages/dashboard.php';
    }
?>
