<?php
    include 'classes/config.php';
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    
    $sql = "SELECT * FROM admin WHERE user = '$user'";
    $result = $conn->query($sql);

    if ($result -> num_rows > 0) {
        while ($row = $result -> fetch_assoc()) {
            if ($pass == $row ['pass']) {
                echo "Successfully Login!";
            }
        }
    }else{
        echo "Login failed";
    }
?>