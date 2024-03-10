<?php
$thisPageName = basename($_SERVER["PHP_SELF"]);
if($thisPageName == 'connect.inc.php')
{
	header('Location: index.php');
}


$servername= 'localhost';
$username = 'root';
$password = '';
$dbname = 'a_database';

 $conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}







?>