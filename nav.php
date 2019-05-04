<?php
$menuNav = [
  "Home",
  "Quienes somos",
  "Productos",
  "Contacto",
];

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Navegador</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Syncopate" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <header>
      <div class="logo">
        <img src="img/logo_sin_fondo.png" alt="Logo">
      </div>
      <div class="nav">
        <nav>
          <ul>
            <?php foreach ($menuNav as $opciones): ?>
              <li><?=$opciones?></li>
            <?php endforeach ?>
          </ul>
        </nav>
        <div class="login">
        <?php if (isset($_POST["email"])){ ?>
          <a href="perfil.php"><i class="far fa-user-circle"></i></a>
        <?php } else { ?>
          <a href="login.php">Ingresar</a>
          <a href="register.php">Registrarse</a>
        <?php } ?>
        </div>
    </div>
    </header>
  </body>
</html>
