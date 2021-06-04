<!DOCTYPE html>
<html class="has-background-dark" lang="ru">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">

    <title>Регистрация</title>
</head>
<body >

<div class="container mt-4 is-justify-content-space-around">
    <div class="column box is-half is-offset-one-quarter">


        <div class="">
            <h1 class="is-size-2">Регистрация</h1>
                {IF? $error}
                    <div class="notification is-danger"><p>{msg}</p></div>
                {ENDIF}
            <form action="register_action.php" method="post">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" type="text" name="login" placeholder="">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" type="password" name="pass" placeholder="">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-link">Submit</button>
                    </div>
                </div>
            </form>


        </div>

    </div>

</div>

</body>
</html>
