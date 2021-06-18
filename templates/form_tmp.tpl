<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>calendar</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">

</head>
<body>

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
    <form method="post" action="">


        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Название *</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <input class="input is-fullwidth" type="text" name="topic" value="{place}" required>
                </div>
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Тема</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="select">
                        <select name="type">
                            <option value="1" {t1}>Встреча</option>
                            <option value="2" {t2}>Звонок</option>
                            <option value="3" {t3}>Совещание</option>
                            <option value="4" {t4}>Дело</option>
                            <option value="5" {t5}>Другое</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Место</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <input class="input is-fullwidth" type="text" name="place" value="{place}">
                </div>
            </div>
        </div>


        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Дата и время *</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <input class="input" type="datetime-local" name="date" required value="{date}"></div>
            </div>
        </div>


        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Длительность *</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="select">
                        <select name="duration">
                            <option value="1" {d1}>15 минут</option>
                            <option value="2" {d2}>30 минут</option>
                            <option value="3" {d3}>1 час</option>
                            <option value="4" {d4}>3 часа</option>
                            <option value="5" {d5}>Весь день</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Комментарий</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <textarea class="is-small textarea" name="comment" rows="6" maxlength="1000"> {comment} </textarea>
                </div>
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-label is-normal">
            </div>
            <div class="field-body">
                <div class="field">
                    <button class="button is-link" name="submit" value="{id}">Submit</button>
                </div>
            </div>
        </div>

    </form>
</div>
</body>
</html>
