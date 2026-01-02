<?php
require "functions.php";

$users = loadUsers();
$username = $_POST["username"];
$password = $_POST["password"];

if (isset($users[$username])) {
    die("User already exists!");
}

$users[$username] = [
    "password" => hashPassword($password),
    "failed_attempts" => 0,
    "blocked_until" => 0
];

saveUsers($users);

echo "Registration successful! <a href='login.php'>Login now</a>";
?>
