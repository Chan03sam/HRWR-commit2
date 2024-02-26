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

            $stmt = $conn->prepare("SELECT ID, email, FirstName, LastName, password, userType FROM users WHERE username = ?");
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                
                $_SESSION['user_data'] = array(
                    'ID' => $row['ID'],
                    'email' => $row['email'],
                    'FirstName' => $row['FirstName'],
                    'LastName' => $row['LastName'],
                    'username' => $user,
                    'password' => $row['password'],
                    'userType' => $row['userType']
                );

                $userType = $row['userType'];
                
                if($userType == 'admin'){
                    header("Location: admin/index.php"); // This line triggers a redirect if the user_type is admin
                } else {
                    header("Location: HRInterface.php"); // This line triggers for other user_types
                }
                
            } else {
                echo "User data not found";
            }
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
