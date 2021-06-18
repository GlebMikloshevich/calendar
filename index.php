<?php
require_once('init.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
    echo "<br><br><br><br>";
    $f = new CalendarEvent();
    $f->init($_POST);
    $f->save();
    var_dump($f);
    exit();
}


$user = Session::get('user');
if (is_null($user)){
    header("Location:login.php");
}

$tmp_name = 'form_tmp.tpl';
$view = new View();
$data = [
];
$view->create($tmp_name, $data);
