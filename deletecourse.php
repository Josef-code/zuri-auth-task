<?php
require_once('auth_session.php');
require_once('db.php');

    $course_id = $_REQUEST['id'];
    $user_id = $_SESSION['userid'];


    if (isset($_REQUEST['yesdelete'])) {
        $sql = "DELETE FROM courses WHERE courses.id = '$course_id'";
        $result = mysqli_query($con, $sql);

        
        if ($result) {
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
    <title>Delete course</title>
</head>
<body>
    <section id="confirmation">
        Are you sure you want to delete this course? 
        <form method="POST">
            <button name="yesdelete">DELETE</button>
        </form>
    </section>
</body>
</html>