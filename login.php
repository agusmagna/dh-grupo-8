<?php
session_start();
require_once('functions.php');
$errors=[];
if (!empty($_POST)) {
  if (isset($_POST['email'])) {
    if ($_POST['email']=='') {
      $errors['email'][]='Debe completar el mail';
    } elseif (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
      $errors['email'][]='El mail no tiene el formato correcto';
    } elseif (!verificacion($_POST['email'])){
      $errors['email'][]= 'El mail ingresado no se encuentra registrado';
    }
  }

  if (isset($_POST['password'])) {
    if ($_POST['password']=='') {
      $errors['password'][]='Debe completar la contraseña';
    } elseif (!verificacion($_POST['email'],$_POST['password'])){
      $errors['password'][]= 'La constraseña ingresada no es correcta';
    }
  }
  if (empty($errors)) {
    $_SESSION['email']=$_POST['email'];
    header('location:index.php');
  }
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Syncopate" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      TIGOÛT - Ingresar
    </title>
  </head>
  <body>
    <div class="contenedor-login">
    <?php require_once("nav.php") ?>
    <section class="form-container">

      <h1>
        Bienvenido
      </h1>

      <form class="access-form" action="login.php" method="post">
        <div class="field-group">
          <label for="email">
            E-mail:
          </label>
          <input type="text" id="email" name="email" placeholder="Email" value="<?= persistencia('email')?>" required>
          <p><?=$errors['email'][0] ?? ''?></p>
        </div>
        <div class="field-group">
          <label for="pass">
            Contraseña:
          </label>
          <input type="password" id="passsword" name="password" placeholder="Password" value="" required>
          <p><?=$errors['password'][0] ?? ''?></p>
          <p><a href="cambioDePass.php">Olvidé mi contraseña</a></p>
        </div>
      <div class="field-group remember-me">
        <input type="checkbox" id="remember-me" name="remember-me" value="">
        <label for="remember-me">Recordarme</label>
      </div>
        <button name="send">Ingresar</button>
      </form>
    </section>

    <?php require_once("footer.php") ?>
    </div>
  </body>
</html>
