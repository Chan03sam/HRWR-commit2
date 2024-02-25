<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require('classes/config.php');

if(isset($_POST['user']) && isset($_POST['pass'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $res = $result->fetch_assoc();
        if ($pass == $res['password']) {

            $_SESSION['user'] = $user;

            $stmt = $conn->prepare("SELECT ID, FirstName, LastName, password, type FROM users WHERE username = ?");
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Set the $_SESSION['user_data'] array
                $_SESSION['user_data'] = array(
                    'ID' => $row['ID'],
                    'FirstName' => $row['FirstName'],
                    'LastName' => $row['LastName'],
                    'username' => $user,
                    'password' => $row['password'],
                    'type' => $row['type']
                );
            } else {
                echo "User data not found";
            }

            $stmt->close();
            header("Location: HRInterface.php");
            exit();
        } else {
            echo "<script>alert(\"Login Failed\");</script>";
            header("Location: ./"); 
        }
    } else {
        echo "<script>alert(\"Login Failed\");</script>";
        header("Location: ./");
    }

    $stmt->close();
}
?>
