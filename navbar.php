<?php
require_once('currentUser.php');
if(isset($_SESSION['user_data'])) {
    $user_data = $_SESSION['user_data'];
    $user_id = $user_data['ID'];
    $FirstName = $user_data['FirstName'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c32a190826.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="assets/ncfl_logo.png" type="image/x-icon">

  <style>
    .right a {
      color: blue;
    }

    .logo {
    }

    .navbar {
      height: 52px;
    }

    h2 {
      color: white;
    }

    @media (max-width: 768px) {
      .right a span {
        display: none;
      }

      .right a i {
        display: inline-block;
      }

      .logo {
        max-width: 100%;
        height: auto;
      }
    }
  </style>
</head>

<body>

  <nav class="sticky navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
      <img src="assets/ncfl_logo2.png" alt="Company Logo" style="width: 120px; height: 50px" class="logo">
      <div class="d-flex">
        <h2 class="fs-5">HR Workhours Report</h2>
      </div>
      <div class="d-flex ms-auto right">
        <a href="#" class="me-3 text-white text-decoration-none" onclick="logout()">
          <span style="margin-right: 15px;">Hello, <?php echo $user_data['FirstName']; ?> <?php echo $user_data['LastName']; ?></span>
          <i class="fa-solid fa-right-from-bracket logout me-1" ></i>
          <span>Logout</span>
        </a>
      </div>
    </div>
  </nav>
</body>
  <script>
    function logout() {
      window.location.href = "logout.php";
    }
  </script>
</html>
