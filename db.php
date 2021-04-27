<?php

//This code holds the host name, database name and password details of the database
$con = mysqli_connect("localhost", "root", "", "zuriauth");

//check if connection is successful
if (!$con) {
	echo "Failed to connect to database " . mysqli_connect_error() ;
}


?>