<?php
    require_once ('classes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="assets/ncfl_logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/c32a190826.js" crossorigin="anonymous"></script>
    <title>HRWH - Login</title>
</head>

<style>
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

html{
    scroll-behavior: smooth;
}
html, body{
      height:calc(100%) !important;
      width:calc(100%) !important;
    }

body{
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Poppins';
    background-image: url('assets/ncfl.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
}
.bg{
    width: 100%;
    height: 100vh;
    background-color: rgba(255, 255, 255, 0.3);
}
.form-group{
    margin-bottom: 12px;
    border: 1px solid green;
    border-radius: 5px;
}
.card{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>

<body>
    <div class="bg">
        <div class="d-flex w-100 h-100 justify-content-center align-items-center">
            <div class="card col-sm-12 col-md-6 col-lg-3 card-outline card-success">
                <div class="card-header d-flex w-100 h-100 justify-content-center align-items-center">
                    <img src="assets/ncfl_logo.png" alt="" style="justify-content: center; width: auto; height: 50px;">
                </div>
                <div class="card-body">
                    <form action="login.php" method="post" autocomplete="off">
                        <div class="input-group mb-3">
                            <input type="text" name="user" id="user" placeholder="Username" autofocus class="form-control" required>
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="pass" id="pass" placeholder="Password" class="form-control" required>
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <i>
                                    <a href="forgot_password.php" style="text-decoration: none; color: green;">Forgot Password?</a>
                                </i>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-success" style="width: 90px">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>