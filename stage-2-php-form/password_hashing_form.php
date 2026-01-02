<?php
function addPepper($password) {
    /*
     Adds number BEFORE every 3 characters
     Example:
     admin@123 -> 0adm4in@8123
    */
    $peppered = "";
    $pepperValue = 0;

    for ($i = 0; $i < strlen($password); $i += 3) {
        $peppered .= $pepperValue;
        $peppered .= substr($password, $i, 3);
        $pepperValue += 4; // to match your example
    }

    return $peppered;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Hashing with Pepper</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 40px;
        }
        .box {
            background: white;
            padding: 20px;
            width: 400px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        input[type=password], input[type=submit] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
        .result {
            background: #eef;
            padding: 10px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Password Hashing Demo</h2>

    <form method="post">
        <label>Enter Password:</label>
        <input type="password" name="password" required>
        <input type="submit" value="Generate Hash">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST["password"];

        $pepperedPassword = addPepper($password);
        $hashedPassword = md5($pepperedPassword);

        echo "<div class='result'>";
        echo "<strong>Original Password:</strong> $password<br>";
        echo "<strong>After Pepper Added:</strong> $pepperedPassword<br>";
        echo "<strong>MD5 Hash:</strong> $hashedPassword";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>