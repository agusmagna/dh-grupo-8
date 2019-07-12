<?php
session_start();
require_once('Class/User.php');
$user = new User;
$user->setAvatarLogin($_SESSION['usuario']['avatar']);
$user->setName($_SESSION['usuario']['first_name'])
        ->setSurname($_SESSION['usuario']['last_name'])
        ->setCountry($_SESSION['usuario']['country'])
        ->setEmail($_SESSION['usuario']['email'])
        ->setUsername($_SESSION['usuario']['username'])
        ->setPhoneNumber($_SESSION['usuario']['phone_number'])
        ->setMet($_SESSION['usuario']['met']);

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TIGOUT - Perfil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <?php require_once("nav.php") ?>

    <h1>¡Hola <?= $user->getName() ?? ''?>!</h1>

    <?php if (isset($_SESSION['direccion'])) : ?>

    <?php elseif (!isset($_SESSION['direccion'])) : ?>
    <form class="" action="perfil.php" method="post">
      <div class="">
        <label for="calle">Calle:</label>
        <input type="text" name="calle">
      </div>
      <div class="">
        <label for="altura">Altura:</label>
        <input type="text" name="altura">
      </div>
      <div class="">
        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad">
      </div>
      <div class="">
        <label for="prov">Provincia:</label>
        <input type="text" name="prov">
      </div>
      <div class="">
        <label for="pais">Pais:</label>
        <input type="text" name="pais">
      </div>
      <div class="">
        <label for="cp">Código postal:</label>
        <input type="text" name="cp">
      </div>
      <button>Guardar datos</button>
    </form>
  <?php endif ?>

  <?php require_once("footer.php") ?>
  </body>
</html>
