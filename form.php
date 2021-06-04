<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>calendar</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<div class="content-wrapper">
    <form method="post" action="">

        <div class="form-item">
            <div class="left">
                <label for="topic">Название *</label>
            </div>
            <div class="right">
                <input type="text" name="topic" required>
            </div>
        </div>

        <div class="form-item">
            <div class="left">
                <label for="type">Тема</label>
            </div>
            <div class="right">
                <select name="type">
                    <option value="1" selected>Встреча</option>
                    <option value="2">Звонок</option>
                    <option value="3">Совещание</option>
                    <option value="4">Дело</option>
                    <option value="5">Другое</option>
                </select>
            </div>
        </div>

        <div class="form-item">
            <div class="left">
                <label for="place">Место</label>
            </div>
            <div class="right">
                <input type="text" name="place">
            </div>
        </div>

        <div class="form-item">
            <div class="left">
                <label for="date">Дата и время *</label>
            </div>
            <div class="right">
                <input type="date" name="date">
                <input type="time" name="time">
            </div>
        </div>

        <div class="form-item">
            <div class="left">
                <label for="duration">Длительность *</label>
            </div>
            <div class="right">
                <select name="duration">
                    <option value="1">15 минут</option>
                    <option value="2">30 минут</option>
                    <option value="3" selected>1 час</option>
                    <option value="4">3 часа</option>
                    <option value="5">Весь день</option>
                </select>
            </div>
        </div>

        <div class="form-item">
            <div class="left">
                <label for="comment">Комментарий</label>
            </div>
            <div class="right">
                <textarea name="comment" rows="8" maxlength="1000"></textarea>
            </div>
        </div>

        <div class="form-item">
            <div class="left"></div>
            <div class="right">
                <input type="submit">

            </div>
        </div>
    </form>
</div>
</body>
</html>
