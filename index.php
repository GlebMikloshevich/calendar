<?php

require_once('init.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $f = new CalendarEvent();
    $f->init($_POST);
    $f->save();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
include 'form.php'
?>

</body>
</html>