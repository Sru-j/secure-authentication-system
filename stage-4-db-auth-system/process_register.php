<?php
require "db.php";
require "functions.php";

$username = $_POST["username"];
$password = $_POST["password"];

$hash = hashPassword($password);

$sql = "INSERT INTO users (username, password_hash)
        VALUES (?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hash);

if ($stmt->execute()) {
    echo "Registration successful! <a href='login.php'>Login</a>";
} else {
    echo "Username already exists!";
}
?>
