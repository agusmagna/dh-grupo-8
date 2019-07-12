<?php
session_start();
require_once('functions.php');
require_once('Class/UserValidator.php');
require_once('Class/User.php');
require_once('Class/Db.php');

DB::$HOST = 'localhost';
DB::$DBNAME = 'tigout_db';
DB::$USER = 'root';
DB::$PASS = '';

if ($_POST) {
  $usuario = new User;
  $validator = new UserValidator($usuario);
  $validator->validateEmpty($_POST['email'],'email')
            ->validateEmpty($_POST['pass'],'pass');
  $validator->validatePass($_POST['pass']);

  $pdo = DB::getInstance();
  $consulta = $pdo->prepare("SELECT * from users WHERE email = :email ");
  $consulta ->bindValue('email', $_POST['email']);
  $consulta->execute();
  $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
  $validator->validateLoginEmail($_POST['email'],$resultado);
  // $hashpass= password_hash($_POST['pass'],PASSWORD_DEFAULT);
  $validator->validateLoginPass($_POST['pass'],$resultado);

if($validator->IsErrorsEmpty()){
  $usuario->setAvatarLogin($resultado[0]['avatar']);
  $usuario->setName($resultado[0]['first_name'])
          ->setSurname($resultado[0]['last_name'])
          ->setCountry($resultado[0]['country_born'])
          ->setEmail($resultado[0]['email'])
          ->setUsername($resultado[0]['username'])
          ->setPhoneNumber($resultado[0]['phone_number']);
  if($resultado[0]['source_referral']!='NULL'){
          $usuario->setMet($resultado[0]['source_referral']);
  }

    $_SESSION['usuario']=$usuario;
    setcookie('usuario',$usuario->getEmail(),time()+60*60*24*30);
    header('location:perfil.php');
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
          <?php if(isset($_COOKIE['usuario'])) : ?>
            <input type="text" id="email" name="email" placeholder="Email" value="<?= $_COOKIE['usuario']?>" required>
          <?php else: ?><input type="text" id="email" name="email" placeholder="Email" value="<?= persistencia('email')?>" required>
        <?php endif; ?>
          <p><?=isset($validator) ? $validator->getError('email') : ''?></p>
        </div>
        <div class="field-group password">
          <label for="pass">
            Contraseña:
          </label>
          <input type="password" id="pas" name="pass" placeholder="Password" value="" required>
          <p><?=isset($validator) ? $validator->getError('pass') : ''?></p>
          <p><a href="cambioDePass.php">Olvidé mi contraseña</a></p>
        </div>
      <div class="field-group remember-me">
        <input type="checkbox" id="remember-me" name="remember-me" value="">
        <label for="remember-me">Recordar usuario</label>
      </div>
        <button name="send">Ingresar</button>
      </form>
    </section>

    <?php require_once("footer.php") ?>
    </div>
  </body>
</html>
