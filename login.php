<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      TIGOUT - Ingresar
    </title>
  </head>
  <body>

    <section class="form-container">

      <h1>
        Bienvenido
      </h1>

      <form class="access-form" action="index.php" method="post">
        <div class="field-group">
          <label for="email">
            E-mail:
          </label>
          <input type="email" id="email" name="email" placeholder="Email" value="" required>
        </div>
        <div class="field-group">
          <label for="pass">
            Contraseña:
          </label>
          <input type="password" id="passsword" name="password" placeholder="Password" value="" required>
        </div>
      </div>
      <div class="field-group remember-me">
        <input type="checkbox" id="remember-me" name="remember-me" value="">
        <label for="remember-me">Recordarme</label>
      </div>
        <button type="submit" name="send">Ingresar</button>
      </form>
</section>
  </body>
</html>
