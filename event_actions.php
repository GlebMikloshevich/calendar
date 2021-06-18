<?php
require_once('init.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['check'])) {
    $id = isset($_POST['check']);
    $query = 'UPDATE `events` SET `finished_at` = IF(`finished_at` is NULL, CURRENT_TIMESTAMP(), NULL) WHERE  id =  :id LIMIT 1';
    $stmt = Database::get_pdo()->prepare($query);
    $stmt->bindParam(':id', $_POST['check']);
    $stmt->execute();
    header("Location:events.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['edit'])) {
    $query = 'SELECT * FROM `events` WHERE `id` = :id LIMIT 1';
    $stmt = Database::get_pdo()->prepare($query);
    $stmt->bindParam(':id', $_POST['edit']);
    $stmt->execute();
    $f_data = $stmt->fetchALL();
    $event = new CalendarEvent();
    $event->init($f_data[0]);
    $data = $event->get_raw_data();
    $data['id'] = $_POST['edit'];
    var_dump($data);
    $tmp_name = 'form_tmp.tpl';
    $view = new View();
    $view->create($tmp_name, $data);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['delete'])) {
    $id = isset($_POST['delete']);
    echo $_POST['delete'];

    $query = 'UPDATE `events` SET `deleted_at` = CURRENT_TIMESTAMP() WHERE  id =  :id LIMIT 1';
    $stmt = Database::get_pdo()->prepare($query);
    $stmt->bindParam(':id', $_POST['delete']);
    $stmt->execute();
//    $stmt->debugDumpParams();
    header("Location:events.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['submit'])) {
//    var_dump($_POST);
    $query = 'SELECT * FROM `events` WHERE `id` = :id LIMIT 1';
    $stmt = Database::get_pdo()->prepare($query);
    $stmt->bindParam(':id', $_POST['submit']);
    $stmt->execute();
    $f_data = $stmt->fetchALL();
    $event = new CalendarEvent();
    $event->fill_copy($f_data[0]);
    $event->alter($_POST);

    header("Location:events.php");
}

//header("Location:events.php");
