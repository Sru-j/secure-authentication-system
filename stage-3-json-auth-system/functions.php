<?php

function addPepper($password) {
    $peppered = "";
    $pepperValue = 0;

    for ($i = 0; $i < strlen($password); $i += 3) {
        $peppered .= $pepperValue;
        $peppered .= substr($password, $i, 3);
        $pepperValue += 4;
    }
    return $peppered;
}

function hashPassword($password) {
    return md5(addPepper($password)); // demo only
}

function loadUsers() {
    if (!file_exists("users.json")) {
        return [];
    }
    return json_decode(file_get_contents("users.json"), true);
}

function saveUsers($users) {
    file_put_contents("users.json", json_encode($users, JSON_PRETTY_PRINT));
}
?>
