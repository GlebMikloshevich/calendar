<?php
require_once('init.php');

//$tmp_name = 'events_tmp.tpl';
//$view = new View();
//$e = new Events();
//$data = [
//    'table' => $e->get_table()
//];

//$view->create($tmp_name, $data);
//echo $e->createTable();


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $conditions = array();
    if (array_key_exists('date', $_GET)) {
        $conditions['date'] = $_GET['date'];
    }

    if (array_key_exists('status', $_GET)) {
        $conditions['status'] = $_GET['status'];
    }
    if (array_key_exists('expired', $_GET)) {
        $conditions['expired'] = $_GET['expired'];
    }

    $tmp_name = 'events_tmp.tpl';
    $view = new View();
    $e = new Events();
    $data = [
        'table' => $e->getTable($conditions)
    ];

    $view->create($tmp_name, $data);

}