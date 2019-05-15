<?php
session_start();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?= $_SESSION['email'] ?? ''?>
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
  </body>
</html>
