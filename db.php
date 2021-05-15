<?php

//This code holds the host name, database name and password details of the database
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'zuriauth');

// Connect to the database
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//check if connection is NOT successful
if (!$con) {
	echo "Failed to connect to database " . mysqli_connect_error() ;
}


?>