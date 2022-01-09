<?php

//connect to the database
$conn = mysqli_connect('localhost', 'root', '', '1951060953_libraries');

// check connection
if (!$conn) {
	echo 'Connection error: ' . mysqli_connect_error();
}