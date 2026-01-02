<?php
require "functions.php";

$users = loadUsers();
$username = $_POST["username"];
$password = $_POST["password"];
$currentTime = time();

if (!isset($users[$username])) {
    die("Invalid username");
}

$user = $users[$username];

// Check if blocked
if ($currentTime < $user["blocked_until"]) {
    die("Account blocked. Try again later.");
}

// Verify password
if ($users[$username]["password"] === hashPassword($password)) {

    $users[$username]["failed_attempts"] = 0;
    $users[$username]["blocked_until"] = 0;
    saveUsers($users);

    echo "Login successful!";

} else {

    $users[$username]["failed_attempts"]++;

    if ($users[$username]["failed_attempts"] >= 5) {
        $users[$username]["blocked_until"] = time() + 300; // block for 5 minutes
        $users[$username]["failed_attempts"] = 0;
        saveUsers($users);
        die("Too many failed attempts. Account blocked for 5 minutes.");
    }

    saveUsers($users);
    echo "Wrong password!";
}
?>
