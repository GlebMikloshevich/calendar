<!DOCTYPE html>
<html class="" lang="ru">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">

    <title>Календарь</title>

</head>
<body >
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php">
            <h1 class="is-size-4">Календарь</h1>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item is-size-5" href="index.php">
                Создать событие
            </a>

            <a class="navbar-item is-size-5" href="events.php">
                Просмотр событий
            </a>
        </div>
    </div>
</nav>

<div class="container mt-4 is-justify-content-space-around box">
    <div>
        <form class="buttons are-small mb-1" action='' method='get'>
            <div class="has-background-light pl-2 pr-2  pt-1 pb-1 box">
                <button class="button " name='date' value='1'>Все</button>
                <button class="button" name='date' value='2'>Сегодня</button>
                <button class="button" name='date' value='3'>Завтра</button>
                <button class="button is-success ml-1" name='status' value='1'>Завершенные</button>
                <button class="button" name='status' value='2'>Незавершенные</button>
                <button class="button is-danger" name='expired' value='1'>Просроченные</button>

            </div>
        </form>

    </div>
    <div class="column box is-four-fifth is-offset-x">
        {table}
    </div>

</div>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>
</html>
