<?php
	
	//Starts the session
	session_start();

	//connects to the database
	require('db.php');

	// checks if the username is set and collects the form data
	if (isset($_POST['username'])) {
		$username = stripcslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($con, $username);
		$password = stripcslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con, $password);

		//Check if the user has registered in the database
		$query = "SELECT * FROM `users` WHERE username = '$username' AND password = '" . md5($password) . "'";
		$result = mysqli_query($con, $query) or die(mysql_error());

		$rows = mysqli_num_rows($result);

			// If the user is registered in the database, create a session for the user
			if ($rows == 1) {
				$_SESSION['username'] = $username;
				// $_SESSION['id'] = $user_id;

				//This query searches for the id of the user and stores it in a session for further use
				$sql_query = "SELECT id FROM `users` WHERE username LIKE '$username'";
				$output = mysqli_query($con, $sql_query);

				// If the id is found, the user is given a session and stored
				if(mysqli_num_rows($output) > 0 ){

				$row = mysqli_fetch_assoc($output);
				$user_id =  $row['id'];
				$_SESSION['userid'] = $user_id;
			
			}

	            //Redirect to user dashboard page
	            header("Location: dashboard.php");
				} else {

					//Displays this message if the user name or password is not correct
					$errormsg = '<div id="errormsg">Your password or username is not correct!</div>';
			}
	}



?>
<!DOCTYPE html>
<html>
  <title>Login</title>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
    <body>
        <form action="" method="POST">
        <h1>Login</h1>
<!--         <div class="icon">
            <i class="fas fa-user-circle"></i>
        </div> -->
        <?php 

        if (isset($errormsg)) {
        	echo $errormsg;
        } 

        ?>
        <p>Use the credentials you used for registration to login below</p>
        <div class="formcontainer">
        <div class="container">
            <label for="uname"><strong>Username</strong></label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <label for="psw"><strong>Password</strong></label>
            <input type="password" placeholder="Enter Password" name="password" required>
        </div>
        <button type="submit"><strong><Login>Login</Login></strong></button>
        <div class="container" style="background-color: #eee">
            <label style="padding-left: 15px">
            <a href="register.php">Create account</a>
            </label>
            <span class="psw"><a href="forgotpassword.php">Forgot password?</a></span>
        </div>
        </form>
    </body>
</html>