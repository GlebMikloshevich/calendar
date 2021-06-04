<?php
    require_once('init.php');

$tmp_name = 'login_tmp.tpl';
    $view = new View();
    $data = [
        'error' => Session::get('auth_error'),
        'msg' => Session::get('auth_msg')
    ];
    $view->create($tmp_name, $data);
