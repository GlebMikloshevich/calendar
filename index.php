<?php
require_once('init.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $f = new CalendarEvent();
    $f->init($_POST);
    $f->save();
}

$tmp_name = 'form_tmp.tpl';
$view = new View();
$data = [
];
$view->create($tmp_name, $data);
