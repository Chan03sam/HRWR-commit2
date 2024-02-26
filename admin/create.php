<?php
require_once('../classes/config.php');
 
// Define variables and initialize with empty values
$email = $FirstName = $LastName = $username = $password = $userType = "";
$email_err = $FirstName_err = $LastName_err = $username_err = $password_err = $userType_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
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
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($FirstName_err) && empty($LastName_err) && empty($username_err) && empty($password_err) && empty($userType_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO users (email, FirstName, LastName, username, password, userType) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssss", $param_email, $param_firstname, $param_lastname, $param_username,  $param_password, $param_usertype);
            
            // Set parameters
            $param_email = $email;
            $param_firstname = $FirstName;
            $param_lastname = $LastName;
            $param_username = $username;
            $param_password = $password;
            $param_usertype = $userType;
            
            if(mysqli_stmt_execute($stmt)){
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }

}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
