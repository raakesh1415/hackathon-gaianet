<?php

$host = 'localhost';     // Database host
$dbname = 'gaia';  // Your database name
$user = 'root';     // Your database username
$pass = ''; // Your database password

$mysqli = new mysqli($host, $user, $pass, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>