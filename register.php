<?php

require_once('init.php');

$tmp = 'register_tmp.tpl';
$view = new View();
$data = [
    'error' => Session::get('reg_error'),
    'msg' => Session::get('reg_msg')
];
$view->create($tmp, $data);
