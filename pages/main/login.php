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
    $sql = "SELECT * FROM taikhoan WHERE taiKhoan = ? AND matKhau = ?";
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
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    </head>

<main role="main" class="">
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <form class="col-lg-5 col-md-6 col-15 mx-auto text-center" method="post">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                    </a>
                <h1 class="h6 mb-3">Sign in</h1>
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
                <div class="form-row mx-auto">
                    <div class="form-group col-md-6 mx-auto ">
                        <!-- <button class="btn btn-lg btn-primary btn-block" formaction="index.php?page=forgetPass">Quên mật khẩu</button> -->
                        <a href="index.php?page=forgetPass" class="btn btn-lg btn-primary btn-block">Quên mật khẩu</a>
                    </div>
                    <div class="form-group col-md-4 mx-auto">
                        <!-- <button class="btn btn-lg btn-primary btn-block" formaction="index.php?page=signup">Đăng ký</button> -->
                        <a href="index.php?page=signup" class="btn btn-lg btn-primary btn-block">Đăng ký</a>
                    </div>
                </div>
                <p class="mt-5 mb-3 text-muted">© 2024</p>
      </form>
    </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/moment.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/simplebar.min.js"></script>
  <script src='js/daterangepicker.js'></script>
  <script src='js/jquery.stickOnScroll.js'></script>
  <script src="js/tinycolor-min.js"></script>
  <script src="js/config.js"></script>
  <script src="js/apps.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
  </script>
</main>

</html>