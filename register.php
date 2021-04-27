<?php

//Creates a connection to the database file in db.php
require "db.php";

//checks if the username is set after form submission and stores the cleaned user input in a database
if (isset($_REQUEST['username'])) {
    $username = stripcslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);
    $email = stripcslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripcslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $create_datetime = date("Y-m-d H:i:s");

    $query = "INSERT into `users` (username, password, email, create_datetime) 
                VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";

    $result = mysqli_query($con, $query);

    //if the connection is successful, the user gets a success message
    if ($result) {
        $successmsg = '<div class="success">Registration successful! <a href="login.php">Click here</a> to login</div>';
    } else {
        echo "error somewhere";
    }
}

?>

<!DOCTYPE html>
<html>
  <title>Register</title>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
    <body>
        <form action="" method="POST">
        <h1>Registration</h1>
<!--         <div class="icon">
            <i class="fas fa-user-circle"></i>
        </div> -->
        <p>Use the form below to register and get access to all features</p>
        <?php if (isset($successmsg)) {
                echo $successmsg;
            } 
        ?>
       
        <div class="formcontainer">
        <div class="container">
            <label for="uname"><strong>Username</strong></label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <label for="mail"><strong>E-mail</strong></label>
            <input type="text" placeholder="Enter E-mail" name="email" required>
            <label for="psw"><strong>Password</strong></label>
            <input type="password" placeholder="Enter Password" name="password" required>
        </div>
        <button type="submit"><strong>SIGN UP</strong></button>
        <div class="container" style="background-color: #eee">
            <label style="padding-left: 15px">
            </label>
            <span class="psw">Already have an account? <a href="login.php">Login here</a></span>
        </div>
        </form>
    </body>
</html>