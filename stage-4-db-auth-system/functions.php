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
?>
