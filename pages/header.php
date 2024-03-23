<?php
require_once 'object/database.php';

if (isset($_SESSION['taiKhoan'])) {
  $username = $_SESSION['taiKhoan'];
  $nv = new Database;
  $result = $nv->executeQuery("select avatar from nhanvien where maNhanVien = '$username'");
}

?>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<nav class="topnav navbar navbar-light">
  <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
    <i class="fe fe-menu navbar-toggler-icon"></i>
  </button>
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
        <i class="fe fe-sun fe-16"></i>
      </a>
    </li>
    <li class="nav-item nav-notif">
      <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
        <span class="fe fe-bell fe-16"></span>
        <span class="dot dot-md bg-success"></span>
      </a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="avatar avatar-sm mt-2">
          <img src="./assets/avatars/<?php echo $result[0]['avatar'] ?>" alt="..." class="avatar-img rounded-circle">
        </span>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="index.php?page=profile-settings">Thông tin</a>
        <a class="dropdown-item" style="color: red;" href="index.php?page=login">Đăng xuất</a>
      </div>
    </li>
  </ul>
</nav>