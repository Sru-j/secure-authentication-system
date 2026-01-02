<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "secure_login";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database connection failed");
}
?>
