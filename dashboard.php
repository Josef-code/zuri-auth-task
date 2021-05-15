<?php
require('auth_session.php');
require('db.php');
$user_id = $_SESSION['userid'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dash.css">
</head>
<body>
    <div class="container">
        <div id="addwrapper">
            <h1 style="text-align:left; align-items:left;">Welcome to your dashboard, <?php echo $_SESSION['username']; ?> .</h1> 
            <a href="logout.php" style="font-size: 1.3em !important;">Logout</a></p>
            <button style="padding: 8px; background: blue; border-radius: 9px; font-size: 1em; width: 11%;"><a href="addcourse.php" style="text-decoration: none; color: white;">Add course</a></button>
        </div>
            <div class="courselist">  

                <?php

                    // This code prints the list of courses from the database for a specific user
                    $sql = "SELECT * FROM `courses` WHERE user_id = $user_id";

                    if ($result = mysqli_query($con, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                               echo "<ul></li>" . $row['course_title'] . " || " . '<a href="editcourse.php?id=' . $row['id'] . '">Edit Course</a>' . " || " . '<a href="deletecourse.php?id=' . $row['id'] . '"> Delete Course</a>' . "</ul></li>";
                            }
                        }
                    }

                    mysqli_close($con);

                ?>

            </div>
        </div>
    </div>
</body>
</html>