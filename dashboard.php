<?php

require('auth_session.php');
include('db.php');

//Stores the user id in a variable
$userid = $_SESSION['id'];

// checks if the coursename was filled in the form and inserts it into the database with the user id
if (isset($_POST['coursename'])) {
	
	$coursename = stripcslashes($_POST['coursename']);

	$query = "INSERT INTO `courses` (course_title, user_id) VALUES ('$coursename', '$userid')";

	$result = mysqli_query($con, $query);

	if ($result) {
		$successmsg ='<div class="success">Course added successfully!</div>';
	} else {
		$errormsg = '<div id="errormsg">Error adding course to the database, try again!</div>';
	}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<div class="container">
		<h1><?php echo $_SESSION['username']; ?> , welcome to your dashboard!</h1>
		<p>UserID: <?php echo $_SESSION['id']; ?> </br>
		Want to leave? <a href="logout.php">Logout here</a></p>

		<?php

			if (isset($successmsg)) {
				echo $successmsg;

			}

		?>

		<!-- This section holds the add form container -->
		<section id="formcontainer">
			<form method="POST" id="addbox">
				<label><h3>Course title :</h3></label>
				<input type="text" name="coursename" placeholder="Enter course title" required>
				<button type="submit"><strong>Add course</strong></button>
			</form>
		</section>

		<!-- This section displays the courses for the user -->
		<section id="formcontainer">
			<?php

				$sql = "SELECT * FROM `courses` WHERE id ='$userid'";
				$output = mysqli_query($con, $sql);
			?>
		</section>
	</div>
</body>
</html>