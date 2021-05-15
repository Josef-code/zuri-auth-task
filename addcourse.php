<?php

require('auth_session.php');
require('db.php');

$user_id = $_SESSION['userid'];

// This code inserts courses into the database for a specific user in the database
if (isset($_POST['submit'])){
    $coursename = stripcslashes($_POST['coursename']);

    $sql = "INSERT INTO `courses` (course_title, user_id) VALUES ('$coursename', '$user_id')";
    $result = mysqli_query($con, $sql);

    // If the course was added successfully, the user is redirected to the dashboard
    if ($result) {
       header('location: dashboard.php');
    } else {
        echo "something went wroong";
    }
    
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
</head>
<body>
    <h1>Add course</h1>
    <form method="POST" action="">
        <label for="coursetitle">Course Title</label>
        <input type="text" name="coursename" required>
        <input type="submit" name="submit">
    </form>
</body>
</html>