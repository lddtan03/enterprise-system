<?php
    session_start();
    if(isset($_SESSION['taiKhoan'])){
        header('Location: index.php');
    }
?>
<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "htttdn";

// Establish a single database connection (improved efficiency)
$conn = mysqli_connect($host, $username, $password, $database);

// Check for connection errors
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize user input to prevent SQL injection (security)
    $username = mysqli_real_escape_string($conn, $_POST['inputEmail']);
    $password = mysqli_real_escape_string($conn, $_POST['inputPassword']);

    // Construct a secure prepared statement (security)
    $sql = "SELECT * FROM taikhoan tk join nhanvien nv on tk.taiKhoan = nv.maNhanVien WHERE taiKhoan = ? AND matKhau = ? and nv.trangthai = '1'";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind values to the prepared statement (security)
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);

        // Execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Get the result (if any)
        $result = mysqli_stmt_get_result($stmt);

        // Close the prepared statement
        mysqli_stmt_close($stmt);

        if (mysqli_num_rows($result) > 0) {
            // Valid credentials
            session_start();
            $_SESSION['taiKhoan'] = $username; // Use username or ID for session (consider ID for consistency)
            header("Location: index.php");
            exit; // Prevent further code execution after redirect
        } else {
            // Invalid credentials
            echo "<p>Thông tin đăng nhập không chính xác!</p>";
        }
    } else {
        echo "<p>Lỗi hệ thống! Vui lòng thử lại.</p>"; // Handle prepared statement errors gracefully
    }
}

mysqli_close($conn); // Close the database connection after processing

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
  <!-- Simple bar CSS -->
  <link rel="stylesheet" href="css/simplebar.css">
  <!-- Fonts CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./fonts/fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.min.css"> <!-- icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
  <!-- Icons CSS -->
  <link rel="stylesheet" href="css/feather.css">
  <link rel="stylesheet" href="css/select2.css">
  <link rel="stylesheet" href="css/dropzone.css">
  <link rel="stylesheet" href="css/uppy.min.css">
  <link rel="stylesheet" href="css/jquery.steps.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">
  <link rel="stylesheet" href="css/quill.snow.css">
  <!-- Date Range Picker CSS -->
  <link rel="stylesheet" href="css/daterangepicker.css">
  <!-- App CSS -->
  <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
  <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
  <link rel="stylesheet" href="css/dataTables.bootstrap4.css">
  <script src="js/jquery-3.7.1.min.js"></script>
  <!-- HNam CSS -->
  <link rel="stylesheet" href="css/HNam.css">
</head>

<body class="vertical  light  "  onload="checkAlert()">
  <div id="alert-theme" onclick="closeAlert()">
    <div id="alert-container">
      <div class="alert-icon-container">
        <div class="alert-icon"></div>
      </div>
      <div class="type-message"></div>
      <div class="message"></div>
      <div class="confirm-container">
        <button id="confirm-btn">OK</button>
      </div>
    </div>
    <script src="js/HNam.js"></script>
  </div>
  <main role="main" class="">
        <div class="wrapper vh-100">
            <div class="row align-items-center h-100">
                <form class="col-lg-5 col-md-6 col-15 mx-auto text-center" method="post">
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                        </a>
                    <h1 class="h6 mb-3" style="font-size: 30px;">Sign in</h1>
                    <?php
                        // echo "Nhân viên: 21".'<br>'."Admin: 25".'<br>'."Quản lý kinh doanh: 29".'<br>'."Quản lý nhân sự: 37".'<br>'."Quản lý kho: 43".'<br>';
                    ?>
                    <div class="form-group">
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="text" name="inputEmail" id="inputEmail" class="form-control form-control-lg"
                            placeholder="Email address" required autofocus="">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" name="inputPassword" id="inputPassword" class="form-control form-control-lg"
                            placeholder="Password" required="">
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
                    <br>
                    <!-- <div class="form-row mx-auto">
                        <div class="form-group col-md-6 mx-auto ">
                            <a href="index.php?page=forgetPass" class="btn btn-lg btn-primary btn-block">Quên mật khẩu</a>
                        </div>
                        <div class="form-group col-md-4 mx-auto">
                            <a href="index.php?page=signup" class="btn btn-lg btn-primary btn-block">Đăng ký</a>
                        </div>
                    </div> -->
                    <p class="mt-5 mb-3 text-muted">Group 20 © 2024</p>
        </form>

        </div>

    </div>
    </main>
    <?php
    // include_once 'pages/header.php';
    // include_once 'pages/slidebar.php';
    // include_once 'pages/main.php';
    // include_once 'pages/main/login.php';
    // include_once 'pages/forgetPass.php';

    ?>
  </div> <!-- .wrapper -->

</body>

</html>