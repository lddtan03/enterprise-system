<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/database.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/donnghiphep.php');
    function showAllDonNghiPhep(){
        $db = new Database();
        $kq = mysqli_query($db->getConnection(), "SELECT * FROM donnghiphep Where maNhanVien='".$_SESSION['taiKhoan']."' Order by maDon DESC");
        while ($row = mysqli_fetch_assoc($kq)) {?>
            <tr>
            <td><?php echo $row['maDon'] ?></td>
            <td><?php echo $row['maNhanVien'] ?></td>
            <td><?php echo $row['ngayBatDauNghi'] ?></td>
            <td><?php echo $row['ngayKetThucNghi'] ?></td>
            <td><?php echo $row['soNgayNghi'] ?></td>
            <td><?php echo $row['lyDo'] ?></td>
            <td><?php echo $row['nguoiPheDuyet'] ?></td>
            <td><?php echo $row['ngayPheDuyet'] ?></td>
            <td>
                <?php
                    if($row['trangThai']==0){
                        echo "Chưa duyệt";
                    }
                    else{
                        echo "Đã duyệt";
                    }
                ?>
            </td>
            <td>
            <div style="display: flex; align-items: center; justify-content: start; gap: 10px; color: white;">
                <a href="pages/main/donnghiphep-xuly.php?maDon=<?php echo $row['maDon']?>" class="btn mb-2 btn-danger">Xóa</a>
            </div>
            </td>
            </tr>
        <?php }
        $db->disconnect();
    };
?>