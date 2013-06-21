<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Вход</title>
    <link rel="stylesheet" href="/templates/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/public/css/bootstrap-responsive.min.css">
    <style>
      .container, button {
        margin-top: 2em;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="span4 offset4 well">
          <legend>Вход на сайт</legend>
          <div id="error" class="alert alert-error hide">Неверный логин или пароль!</div>
          <form method="post" action="/login/">
            <input type="text" id="username" class="input-block-level" name="username" placeholder="Логин" required autocomplete="off">
            <input type="password" id="password" class="input-block-level" name="password" placeholder="Пароль" required autocomplete="off">
            <label class="checkbox">
              <input type="checkbox" name="remember" value="1"> Запомнить меня
            </label>
            <button type="submit" name="submit" class="btn btn-info btn-block">Войти</button>
          </form>
        </div>
      </div>
    </div>
    <script>
      if (location.hash == '#error') {
        document.getElementById('error').style.display = 'block';
      }
    </script>
  </body>
</html>