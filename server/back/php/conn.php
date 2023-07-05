<?php
$host = "localhost:3308";
$user = "root";
$password = '';
$dbname = "e-c"; 

$mysqli = new mysqli ($host, $user, $password, $dbname);
if ($mysqli->connect_errno) {
    die("Failed to connect with MySQL: " . $mysqli->connect_errno);
}
return $mysqli;
?>
