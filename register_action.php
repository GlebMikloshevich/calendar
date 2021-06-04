<?php

require_once('init.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $register = new Register();
    $register->init($_POST);
    if ($register->getError()) {
        header("Location:register.php");
    } else {
        header("Location:login.php");
    }
}






