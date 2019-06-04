<?php
require_once('functions.php');
$errors=[];
if (!empty($_POST)) {
if (existe('email')) {
  if (vacio('email')){
    $errors['email'][]='Debe completar el mail';
  } elseif (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    $errors['email'][]='El mail no tiene el formato correcto';
  } elseif (!verificacion($_POST['email'])) {
    $errors['email'][]='El mail no se encuentra registrado';
  }
}
if (existe('pass')) {
  if (vacio('pass')){
    $errors['pass'][]='Debe completar la contraseña';
  } elseif (strlen($_POST['pass']) < 8 || strlen($_POST['pass']) > 12){
      $errors['pass'][]='La contraseña debe tener entre 8 y 12 caracteres';
  }
  if (existe('confpass')) {
    if (vacio('confpass')){
  if ($_POST['pass']!= $_POST['confpass']){
      $errors['confpass'][]= 'Las contraseñas no coinciden';
    }
  }
}
}
if(empty($errors)){
  $hashpass= password_hash($_POST['pass'],PASSWORD_DEFAULT);
  $archivo=file_get_contents('usuarios.json');
  $data=json_decode($archivo,true);
  foreach ($data as $usuarios) {
    if ($usuario['email']==$email) {
      $usuario['pass']=$hashpass;
    }
  }
  $jsonFinal=json_encode($data);
  file_put_contents('usuarios.json',$jsonFinal);
  header('location:login.php');
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
    <div class="contenedor-cambioDePass">
    <?php require_once("nav.php") ?>
    <section class="form-container">

      <h1>
        Bienvenido
      </h1>

      <form class="access-form" action="cambioDePass.php" method="post">
        <div class="field-group">
          <label for="email">
            E-mail:
          </label>
          <input type="text" id="email" name="email" placeholder="Email" value="<?= persistencia('email')?>" required>
          <p><?=$errors['email'][0] ?? ''?></p>
        </div>
        <div class="field-group">
          <label for="pass">
            Nueva contraseña:
          </label>
          <input type="password" id="passs" name="pass" placeholder="Nueva contraseña" value="" required>
          <p><?=$errors['password'][0] ?? ''?></p>
        </div>
        <div class="field-group">
          <label for="confpass">
            Confirmar Contraseña:
          </label>
          <input id="confpass" type="password" name="confpass" value="" placeholder="Confirme su contraseña" >
          <p><?= $errors['confpass'][0] ?? ''?></p>
        </div>
        <button name="send">Cambiar contraseña</button>
      </form>
    </section>

    <?php require_once("footer.php") ?>
    </div>
  </body>
</html>
