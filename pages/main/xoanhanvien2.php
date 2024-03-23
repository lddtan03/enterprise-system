<?php

require_once './object/database.php';
$manv = $_GET['manv'];
$nv = new Database;

$nv->insert_update_delete("update nhanvien set trangthai = '0' where maNhanVien = '$manv'");
echo "<script>
    window.location.href = 'http://localhost/HTTT-DN/index.php?page=nhanvien'
</script>";
