<?php

// Bat dau session (quan trong)
session_start();

//Neu nguoi dung da dang nhap thanh cong, thi huy bien session
if (isset($_SESSION['taiKhoan'])) 
{
	unset($_SESSION['taiKhoan']);
}

//Da dang xuat, quay tro lai trang login.php
header('Location: login.php');
?>
