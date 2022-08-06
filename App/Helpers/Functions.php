<?php

function secureInput($str) {
    $input = trim($str);
    $input = stripslashes($str);
    $input = htmlspecialchars($str);

    return $input;
}