<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/action.php');

$maSanPham = $_POST['maSanPham'];
$db = new Database();
$sql = "UPDATE `sanpham` SET tinhTrang = 0 WHERE maSanPham = $maSanPham";
if ($db->insert_update_delete($sql)) {
    $db->disconnect();
    echo "
        <script>
            sessionStorage.setItem('deleteProduct', 'success');
            window.location = '/HTTT-DN/index.php?page=sanpham'; 
        </script>";
} else {
    $db->disconnect();
    echo "
        <script>
            sessionStorage.setItem('deleteProduct', 'fail');
            window.location = '/HTTT-DN/index.php?page=sanpham'; 
        </script>";
}



// if ($db->insert_update_delete($sql)) {
//     $db->disconnect();
//     $productTable = "";
//     $productList = getProductList();
//     for ($i = 0; $i < count($productList); $i++) {
//         $product = $productList[$i];
//         if ($product->getTinhTrang() == DA_XOA)
//             continue;
//         $productTable .= '
//             <tr>
//             <td>' . $product->getMaSanPham() . '</td>' .
//                     '<td>' .
//                     '<img src="' . $product->getHinhAnh() . '" alt="" style="width: 50px; height: 50px; border-radius: 1000px;">' .
//                     '</td>' .
//                     '<td>' . $product->getTenSanPham() . '</td>' .
//                     '<td>' . changeMoney($product->getGiaCu()) . '₫</td>' .
//                     '<td>' . changeMoney($product->getGiaMoi()) . '₫</td>' .
//                     '<td>' . $product->getMaNhanHieu() . '</td>' .
//                     '<td>Nam, thể thao</td>' .
//                     '<td>' .
//                     '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#chitietsoluong" 
//             onclick="getChiTietSoLuong(' . $product->getMaSanPham() . ')"></span>'
//                     . getSoLuongSanPham($product->getMaSanPham()) . '</button>' .
//                     '</td>' .
//                     '<td>
//                 <div style="display: flex; align-items: center; justify-content: start; gap: 10px;">
//                 <button type="button" class="btn mb-2 btn-warning" onclick="window.location.href = \'index.php?page=sanpham&action=edit&masanpham=' . $product->getMaSanPham() . '\'">Sửa</button>
//                 <button type="button" class="btn mb-2 btn-danger" onclick="displayDelete(\'product\', ' . $product->getMaSanPham() . ')">Xóa</button>
//                 </div>
//             </td>
//             </tr>';
//     }
//     $response = [
//         'productTable' => $productTable,
//         'script' => "alertMessage('success', 'Xóa sản phẩm thành công');
//         closeConfirmContainer(event);"
//     ];
//     echo json_encode($response);
// } else {
//     $db->disconnect();
//     $response = [
//         'script' => "alertMessage('fail', 'Xóa sản phẩm thất bại');"
//     ];
//     echo json_encode($response);
// }
