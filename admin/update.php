<?php
// Include config file
require_once ('../classes/config.php');
 
// Define variables and initialize with empty values
$email = $FirstName = $LastName = $username = $password = $userType = "";
$email_err = $FirstName_err = $LastName_err = $username_err = $password_err = $userType_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    echo $id;
    // Validate name
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email.";     
    } else{
        $email = $input_email;
    }
    
    // Validate firstname
    $input_firstname = trim($_POST["firstname"]);
    if(empty($input_firstname)){
        $FirsName_err = "Please enter an firstname.";     
    } else{
        $FirstName = $input_firstname;
    }
    
    // Validate lastname
    $input_lastname = trim($_POST["lastname"]);
    if(empty($input_lastname)){
        $LastName_err = "Please enter an lastname.";     
    } else{
        $LastName = $input_lastname;
    }

    //Validate username
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err= "Please enter an username.";     
    } else{
        $username = $input_username;
    }

    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err= "Please enter an password.";     
    } else{
        $password = $input_password;
    }
    
    //Validate User Type
    $input_usertype = trim($_POST["usertype"]);
    if(empty($input_usertype)){
        $userType_err = "Please enter an usertype.";     
    } else{
        $userType = $input_usertype;
    }
    
    if(empty($email_err) && empty($FirstName_err) && empty($LastName_err) && empty($username_err) && empty($password_err) && empty($userType_err)){

        $sql = "UPDATE users SET email=?, FirstName=?, LastName=?, username=?, password=?, userType=? WHERE ID=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_email, $param_firstname, $param_lastname, $param_username,  $param_password, $param_usertype, $param_id);

            $param_email = $email;
            $param_firstname = $FirstName;
            $param_lastname = $LastName;
            $param_username = $username;
            $param_password = $password;
            $param_usertype = $userType;
            $param_id = $id;

            if(mysqli_stmt_execute($stmt)){
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
} else{
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE ID = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $email = $row["email"];
                    $FirstName = $row["FirstName"];
                    $LastName = $row["LastName"];
                    $username = $row["username"];
                    $password = $row["password"];
                    $param_usertype = $row["userType"];
                    $ID = $row["ID"];

                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);

    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the user's record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="firstname" class="form-control <?php echo (!empty($FirstName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $FirstName; ?>">
                            <span class="invalid-feedback"><?php echo $FirstName_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lastname" class="form-control <?php echo (!empty($LastName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $LastName; ?>">
                            <span class="invalid-feedback"><?php echo $LastName_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"><?php echo $username; ?></input>
                            <span class="invalid-feedback"><?php echo $username_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"><?php echo $password; ?></input>
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>User Type</label>
                            <input type="text" name="usertype" class="form-control <?php echo (!empty($userType_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $userType; ?>">
                            <span class="invalid-feedback"><?php echo $userType_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>