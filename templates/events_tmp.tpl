<!DOCTYPE html>
<html class="has-background-dark" lang="ru">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">

    <title>Календарь</title>
</head>
<body >

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

</body>
</html>
