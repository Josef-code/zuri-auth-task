<?php
require_once('auth_session.php');
require_once('db.php');

// ------------------ This section prints out the course details in the HTML form 
   $user_id = $_SESSION['userid'];
   $courseid = $_GET['id'];
    
    $sql = "SELECT * FROM `courses` WHERE id = '$courseid' AND `user_id` = '$user_id'";
    
    if ($result = mysqli_query($con, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $course_title = $row['course_title'];
        } else {
            echo 'ERROR: NO results for this user.';
        }
    } else {
        echo 'ERROR: Connecting to database!';
    }

    //---------------- This section updates the course records from the database
    $updated_course;
    $user_id;

    if(isset($_POST['submit'])){
        $updated_course = $_POST['newcourse'];
        // $courseid = $_GET['id'];

        $query = "UPDATE courses SET course_title = '$updated_course' WHERE courses.id = '$courseid'";
        $comm = mysqli_query($con, $query);

        if ($comm) {
            header( 'Location: dashboard.php');
        }

        

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
</head>
<body>
    <form action="" method="POST">
        <label for="coursename">Edit Course</label>
        <input type="text" name="newcourse" value="<?php echo $course_title; ?>">
        <input type="submit" name="submit">
    </form>
</body>
</html>
