<?php
require('auth_session.php');


// Delete certain session
unset($_SESSION['username']);
// Delete all session variables
session_destroy();

// Jump to login page
header('Location: login.php');

?>