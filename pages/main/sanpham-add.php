<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/action.php');

// Lấy mã sản phẩm mới dự kiến
$maSanPham = getNewestMaSanPham();
$tenSanPham = trim($_POST['tenSanPham']);
$giaCu = trim($_POST['giaCu']);
$giaMoi = trim($_POST['giaMoi']);
if (isset($_POST['moTa']))
    $moTa = trim($_POST['moTa']);
else
    $moTa = "";
$image = "";
$maNhanHieu = $_POST['maNhanHieu'];

if (isset($_POST['sanPhamHot']))
    $sanPhamHot = $_POST['sanPhamHot'];
else
    $sanPhamHot = 0;

if (isset($_POST['sanPhamMoi']))
    $sanPhamMoi = $_POST['sanPhamMoi'];
else
    $sanPhamMoi = 0;

if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {    
    //Thư mục bạn lưu file upload
    $target_dir = "../../../HTTT-DN/assets/products/";
    //Lấy phần mở rộng của file (txt, jpg, png,...)
    $fileType = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    //Đường dẫn lưu file trên server
    $target_file   = $target_dir . $maSanPham . "." . $fileType;
    $image = "assets/products/" . $maSanPham . "." . $fileType;
    $allowUpload   = true;
    //Những loại file được phép upload
    $allowtypes    = array('jpg', 'png', 'jpeg');
    //Kích thước file lớn nhất được upload (bytes)
    $maxfilesize   = 10000000; //10MB

    //1. Kiểm tra file có bị lỗi không?
    if ($_FILES["image"]['error'] != 0) {
    }

    //2. Kiểm tra loại file upload có được phép không?
    if (!in_array($fileType, $allowtypes)) {
        echo "<script>alertMessage('fail', 'Chỉ cho phép upload file có định dạng .png hoặc .jpg hoặc .jpeg');</script>";
        $allowUpload = false;
    }

    //3. Kiểm tra kích thước file upload có vượt quá giới hạn cho phép
    if ($_FILES["image"]["size"] > $maxfilesize) {
        echo "<script>alertMessage('fail', 'Kích thước của ảnh phải nhỏ hơn $maxfilesize bytes!');</script>";
        $allowUpload = false;
    }

    //4. Kiểm tra file đã tồn tại trên server chưa?
    if (file_exists($target_file)) {
        echo "<script>alertMessage('fail', 'Tên file đã tồn tại trong server!');</script>";
        $allowUpload = false;
    }

    if ($allowUpload) {
        //Lưu file vào thư mục được chỉ định trên server
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "<script> document.getElementById('pimage').src = $target_file; </script>;";
        } else {
            echo "<script>alertMessage('fail', 'Đã xảy ra lỗi trong quá trình upload file!');</script>";
            $image = "assets/images/no-image.png";
        }
    }
} else {
    $image = "assets/images/no-image.png";
}

$db = new Database();    
$query = "INSERT INTO `sanPham` (maSanPham, tenSanPham, giaCu, giaMoi, moTa, hinhAnh, maNhanHieu, sanPhamMoi, sanPhamHot, tinhTrang)
VALUES ($maSanPham, '$tenSanPham', $giaCu, $giaMoi, '$moTa', '$image', '$maNhanHieu', $sanPhamMoi, $sanPhamHot, 1)";


if ($db->insert_update_delete($query)) {
    $db->disconnect();
    echo "<script>
        sessionStorage.setItem('addProduct', 'success');
        window.location = '/HTTT-DN/index.php?page=sanpham'; 
    </script>";
} else {
    $db->disconnect();
    echo "<script>
        sessionStorage.setItem('addProduct', 'fail');
        window.location = '/HTTT-DN/index.php?page=sanpham'; 
        </script>";
}

// if ($db->insert_update_delete($query)) {
//     $db->disconnect();
//     echo "<script>
//         alert(\"Thêm sản phẩm thành công.\");
//     </script>";
// } else {
//     $db->disconnect();
//     echo "<script>
//         alert(\"Thêm sản phẩm thất bại.\"); 
//         </script>";
// }