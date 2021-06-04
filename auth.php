<?php

require_once('init.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmp = 'login_tmp.tpl';
    $auth = new Auth();
    $auth->execute($_POST);
    if ($auth->getError()) {
        header("Location:login.php");
    } else {
        header("Location:index.php");
    }

}

