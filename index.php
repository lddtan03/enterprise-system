<?php
session_start();
ob_start();
?>
<!doctype html>
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
  <div class="wrapper">

    <?php
    if (!isset($_GET['page']) || ($_GET['page'] !== 'signup' && $_GET['page'] !== 'forgetPass' && $_GET['page'] !== 'login')) {
      include_once 'config/config.php';
      include_once 'pages/header.php';
      include_once 'pages/slidebar.php';
    }

    if (isset($_GET['page'])) {
      $page = $_GET['page'];
      if ($page === 'forgetPass') {
        include_once 'pages\main\forgetPass.php';
      } else if ($page === 'signup') {
        include_once 'pages\main\signup.php';
      }
    } else {
      // Include main content for the default page (optional)
      include_once 'pages/main.php';
    }
    include_once 'pages/main.php';
    ?>

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