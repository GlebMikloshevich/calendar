<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>calendar</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">

</head>
<body>
<div class="container mt-4 is-justify-content-space-around box">
    <form method="post" action="">


        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Название *</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <input class="input is-fullwidth" type="text" name="topic" required>
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
                            <option value="1" selected>Встреча</option>
                            <option value="2">Звонок</option>
                            <option value="3">Совещание</option>
                            <option value="4">Дело</option>
                            <option value="5">Другое</option>
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
                    <input class="input is-fullwidth" type="text" name="place">
                </div>
            </div>
        </div>


        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Дата и время *</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <input class="input" type="date" name="date" required>
                </div>
                <div class="field">
                    <input class="input" type="time" name="time">
                </div>
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
                            <option value="1">15 минут</option>
                            <option value="2">30 минут</option>
                            <option value="3" selected>1 час</option>
                            <option value="4">3 часа</option>
                            <option value="5">Весь день</option>
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
                    <textarea class="is-small textarea" name="comment" rows="6" maxlength="1000"></textarea>
                </div>
            </div>
        </div>


        <div class="field is-horizontal">
            <div class="field-label is-normal">
            </div>
            <div class="field-body">
                <div class="field">
                    <button class="button is-link">Submit</button>
                </div>
            </div>
        </div>

    </form>
</div>
</body>
</html>
