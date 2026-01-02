<?php
require "db.php";
require "functions.php";

$username = $_POST["username"];
$password = $_POST["password"];
$currentTime = time();

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Invalid username");
}

$user = $result->fetch_assoc();

// Check block
if ($currentTime < $user["blocked_until"]) {
    die("Account blocked. Try later.");
}

// Verify password
if ($user["password_hash"] === hashPassword($password)) {

    $reset = $conn->prepare(
        "UPDATE users SET failed_attempts = 0, blocked_until = 0 WHERE username = ?"
    );
    $reset->bind_param("s", $username);
    $reset->execute();

    echo "Login successful!";

} else {

    $attempts = $user["failed_attempts"] + 1;
    $blockedUntil = $user["blocked_until"];

    if ($attempts >= 5) {
    $blockedUntil = time() + 60; // 1 minute block
    $attempts = 0;
    echo "Too many attempts. Account blocked for 1 minute.";
    } else {
        echo "Wrong password!";
    }

    $update = $conn->prepare(
        "UPDATE users SET failed_attempts = ?, blocked_until = ? WHERE username = ?"
    );
    $update->bind_param("iis", $attempts, $blockedUntil, $username);
    $update->execute();
}
?>
