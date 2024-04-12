<?php

$manv = $_GET['manv'];

echo "<script> 
let del = confirm('Bạn có chắc chắn muốn xóa?');
if(!del){
    window.location.href = 'http://localhost:8888/HTTT-DN/index.php?page=nhanvien'
}else{
    window.location.href = 'http://localhost:8888/HTTT-DN/index.php?page=xoanhanvien2&manv=$manv'
}  
</script>"
;


